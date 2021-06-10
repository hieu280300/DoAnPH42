<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request; 
use DB; 
use Hash; 

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @return \Illuminate\View\View
     */
    public function create($token)
    {
        return view('frontend.home.reset-password',['token' => $token]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        {
 
            $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',
          
            ]);
          
            $updatePassword = DB::table('password_resets')
                                ->where(['email' => $request->email, 'token' => $request->token])
                                ->first();
          
            if(!$updatePassword)
                // return back()->withInput()->with('error', 'Invalid token!');
              $user = User::where('email', $request->email)
                          ->update(['password' => Hash::make($request->password)]);
              DB::table('password_resets')->where(['email'=> $request->email])->delete();
              session()->flash('message', 'Bạn đã thay đổi mật khẩu thành công!!!');
              return redirect()->route('login');
          
            }
    }
}
