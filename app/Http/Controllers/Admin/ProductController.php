<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateProductResquest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $data = [];
        // get list data of table posts
        $products =Product::with('category')->with('product_detail');
        // add new  param to search
        // search post name
        if (!empty($request->name)) {
            $products = $products->where('name', 'like', '%' . $request->name . '%');
        }

        // search category_id
        if (!empty($request->category_id)) {
            $products = $products->where('category_id', $request->category_id);
        }
        // pagination
        $products = $products->paginate(2);

        // get list data of table categories
        $categories = Category::pluck('name', 'id')
            ->toArray();
        $productDetails = ProductDetail::pluck('content')->toArray();
        $data['productdetails'] = $productDetails;
        $data['categories'] = $categories;
        // dd($posts);
        $data['products'] = $products;
        return view('admin.auth.posts.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataInsert = [];
        $categories = Category::pluck('name', 'id')->toArray();
        $dataInsert['categories'] = $categories;
        return view('admin.auth.posts.create', $dataInsert);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        dd($request);

        $thumbnailPath = null;
        if (
            $request->hasFile('thumbnail')
            && $request->file('thumbnail')->isValid()
        ) {
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $images = $request->file('thumbnail');
            //luwu tru folder
            $thumbnailPath = $images->move('thumbnail', $images->getClientOriginalName());
        }
        $dataInsert = [
            'name' => $request->name,
            'thumbnail' => $thumbnailPath,
            'category_id' => $request->category_id,
        ];
         dd($dataInsert);
        DB::beginTransaction();

        try {
            Product::create($dataInsert);

            DB::commit();

            // success
            return redirect()->route('admin.post.index')->with('success', 'Insert successful!');
        } catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.auth.posts.detail', ['product' => Product::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $data = [];
    //     $post = Post::findOrFail($id);
    //     $categories = Category::pluck('name', 'id')->toArray();
    //     $data['posts'] = $post;
    //     $data['categories'] = $categories;
    //     return view('posts.edit', $data);
    // }
    public function edit($id)
    {
        $data = [];
        $categories = Category::pluck('name', 'id')
            ->toArray();
        // $post = Post::find($id); // case 1
        $products = Product::findOrFail($id); // case 2
        $data['products'] = $products;
        $data['categories'] = $categories;
        return view('admin.auth.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $productDetailId = $product->product_detail ? $product->product_detail->id : null;
        $thumbnailOld = $product->thumbnail;

        // update data for table posts
        $product->name = $request->name;
        $product->category_id = $request->category_id;

        $thumbnailPath = null;
        if (
            $request->hasFile('thumbnail')
            && $request->file('thumbnail')->isValid()
        ) {
            // Nếu có thì thục hiện lưu trữ file vào public/thumbnail
            $image = $request->file('thumbnail');
            $extension = $request->thumbnail->extension();
            $fileName = 'thumbnail_' . time() . '.' . $extension;
            $thumbnailPath = $image->move('thumbnail', $fileName);
            $product->thumbnail = $thumbnailPath;
            Log::info('thumbnailPath: ' . $thumbnailPath);
        }
        DB::beginTransaction();

        try {
            // update data for table posts
            $product->save();

            $dataDetailPost = [
                'content' => $request->content,
                'post_id' => $id,
            ];

            // create or update data for table post_details
            if (!$productDetailId) { // create
                $productDetail = new PostDetail($dataDetailProduct);
                $productDetail->save();
            } else { // update
                ProductDetail::find($productDetailId)
                    ->update($dataDetailPost);
            }

            DB::commit();

            // SAVE OK then delete OLD file
            if (File::exists(public_path($thumbnailOld))) {
                File::delete(public_path($thumbnailOld));
            }

            // success
            return redirect()->route('admin.post.index')->with('success', 'Update successful!');
        } catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $post = Post::find($id);
            $post->delete();

            DB::commit();

            return redirect()->route('admin.post.index')
                ->with('success', 'Delete Post successful!');
        } catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
