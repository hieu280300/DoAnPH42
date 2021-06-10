<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $categories = Category::pluck('id')->toArray();
        
        $listProductNames = [
            'Áo 2 Cổ Degrey',
            'Áo Hoạ Sĩ Degrey',
            'Áo Khoác Nấm Degrey Đen ',
            'Hộp Đựng Khăn Giấy Degrey',
            'Hộp Đựng Khăn Giấy Degrey',
            'Hộp Đựng Khăn Giấy Degrey',
            'Áo Hoạ Sĩ Degrey',
            'Áo Hoạ Sĩ Degrey',
            'Áo Hoạ Sĩ Degrey',
            'Áo Hoạ Sĩ Degrey',
            'Áo Hoạ Sĩ Degrey',
            'Áo Hoạ Sĩ Degrey',
        ];

        $listProductDescriptions = [
            'Trẻ trung và cuốn hút theo phong cách đường phố thu-đông với áo nỉ thêu hình động vật của thương hiệu Asos.- Chất liệu cotton pha- Cổ 3cm- Tay dài, suông- Không lót trong- Màu sắc: XámHướng dẫn sử dụng:- Giặt bằng tay với nhiệt độ không quá 30°C- Không được tẩy- Không được sấy khô- Ủi với nhiệt độ...',
            'Trẻ trung và cuốn hút theo phong cách đường phố thu-đông với áo nỉ thêu hình động vật của thương hiệu Asos.- Chất liệu cotton pha- Cổ 3cm- Tay dài, suông- Không lót trong- Màu sắc: XámHướng dẫn sử dụng:- Giặt bằng tay với nhiệt độ không quá 30°C- Không được tẩy- Không được sấy khô- Ủi với nhiệt độ...',
            'Trẻ trung và cuốn hút theo phong cách đường phố thu-đông với áo nỉ thêu hình động vật của thương hiệu Asos.- Chất liệu cotton pha- Cổ 3cm- Tay dài, suông- Không lót trong- Màu sắc: XámHướng dẫn sử dụng:- Giặt bằng tay với nhiệt độ không quá 30°C- Không được tẩy- Không được sấy khô- Ủi với nhiệt độ...',
            'Trẻ trung và cuốn hút theo phong cách đường phố thu-đông với áo nỉ thêu hình động vật của thương hiệu Asos.- Chất liệu cotton pha- Cổ 3cm- Tay dài, suông- Không lót trong- Màu sắc: XámHướng dẫn sử dụng:- Giặt bằng tay với nhiệt độ không quá 30°C- Không được tẩy- Không được sấy khô- Ủi với nhiệt độ...',
            'Trẻ trung và cuốn hút theo phong cách đường phố thu-đông với áo nỉ thêu hình động vật của thương hiệu Asos.- Chất liệu cotton pha- Cổ 3cm- Tay dài, suông- Không lót trong- Màu sắc: XámHướng dẫn sử dụng:- Giặt bằng tay với nhiệt độ không quá 30°C- Không được tẩy- Không được sấy khô- Ủi với nhiệt độ...',
            'Trẻ trung và cuốn hút theo phong cách đường phố thu-đông với áo nỉ thêu hình động vật của thương hiệu Asos.- Chất liệu cotton pha- Cổ 3cm- Tay dài, suông- Không lót trong- Màu sắc: XámHướng dẫn sử dụng:- Giặt bằng tay với nhiệt độ không quá 30°C- Không được tẩy- Không được sấy khô- Ủi với nhiệt độ...',
            'Được thiết kế cho cả nam lẫn nữ, BVL Black chính là phần đóng góp tuyệt hảo của hãng Bvlgari cho thế giới nước hoa. Loại nước hoa này thể hiện được bản chất tinh túy nhất của những thiết kế chốn đô thành. BVL Black gợi hình ảnh của những dải lề đường khói tỏa của New York, Berlin,...',
            'Mi dày ấn tượng! Mi cong quyến rũ! Làn mi cong vút 75°, dày gấp 3 lần và bền đẹp suốt 18 giờ.',
            'SUGAR RÊVE TATTO LIP TINT – SON KEM KHÔNG TRÔI SUGAR (Son xăm)Công dụng: Chất son kem lỏng là sự kết hợp mới lạ giữa son lì siêu mịn cùng chút mượt mà của son dưỡng. Son không trôi suốt nhiều giờ, hương thơm ngọt dịu. Được chiết xuất từ tinh dầu trái bơ và trái đào an toàn cho... ',
            'Thỏi son Christian Louboutin có thiết kế độc đáo lấy cảm hứng từ Nữ hoàng Ai Cập Nefertiti cùng bảng màu đẹp khó cưỡng. - Màu son lên đẹp, không hề khô, dưỡng ẩm và rất nhẹ. Màu son khá trong và mướt với chỉ một lớp duy nhất, không dính bết khi bôi. Son có mùi hương hoa nhẹ...',
            'Huyết thanh đặc trị phục hồi da sạm đen và trắng sáng da CosRoyale Clinic ampoule AHA Repair- Huyết thanh đặc trị phục hồi da sạm đen và trắng sáng da CosRoyale Clinic ampoule AHA Repair đặc trị chuyên sâu cải thiện làn da thâm nám nhanh chóng. Công nghệ nano đặc chế huyết thanh cung cấp các phân tử...',
            'Công dụng: Hạt phấn siêu mịn chứa khoáng chất, vitamin E cùng độ bám cao cho lớp nền mỏng mịn, kiềm dầu, không trôi suốt nhiều giờ. Công thức tiên tiến phù hợp cho da thường đến da hỗn hợp, chỉ số SPF 35 PA+++ bảo vệ da an toàn dưới ánh nắng mặt trời và tia UVA-UVB. Hiệu chỉnh...',
        ];

        $listThumbnails = [
            "https://product.hstatic.net/1000281824/product/896c8427-e613-4f0a-b05e-c1efc8888cf5_ffdf931f34504beab6c672b706d85fa0_grande.jpeg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            'https://product.hstatic.net/1000281824/product/3db8bf3c-f95d-44b3-b350-2d90315524f4_baf98af3c7e74bf895f26745ca3758cd_grande.jpeg',
            "https://product.hstatic.net/1000281824/product/3db8bf3c-f95d-44b3-b350-2d90315524f4_baf98af3c7e74bf895f26745ca3758cd_grande.jpeg",
            "https://product.hstatic.net/1000281824/product/3db8bf3c-f95d-44b3-b350-2d90315524f4_baf98af3c7e74bf895f26745ca3758cd_grande.jpeg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
            "https://product.hstatic.net/1000281824/product/1-te9101-1-none_c2b525ff9cbd4f5790cbf3a7796196dd_grande.jpg",
        ];


        $quantities = [5, 10, 15, 20, 50, 100, 200];
        foreach ($categories as $categoryId){
            $product = [
                'name' => $listProductNames[array_rand($listProductNames)],
                'description' => $listProductDescriptions[array_rand($listProductDescriptions)],
                'thumbnail' => $listThumbnails[array_rand($listThumbnails)],
                'quantity' => $quantities[array_rand($quantities)],
                'category_id' => $categoryId,
            ];
            $saveProduct = Product::create($product);

            // save product_details
            $productDetail = [
                'content' => $listProductDescriptions[array_rand($listProductDescriptions)],
                'product_id' => $saveProduct->id, // get ID inserted at step above
            ];
            ProductDetail::create($productDetail);
        }
    }
        
    }