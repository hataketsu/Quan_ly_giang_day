<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    use ProcessImage;


    public function change_avatar(Request $request, User $user)
    {
        if ($request->isMethod("post")) {
            if ($request->has("avatar")) {
                $img = $this->process_image($request->file("avatar"));
                \Auth::user()->avatar = $img;
                \Auth::user()->save();
            }

            return redirect("/profile/" );
        } else {
            return view("profile.change_avatar", ["user" => \Auth::user(), "title" => "Đổi ảnh đại diện"]);
        }
    }


    public function info(Request $request)
    {
        $user = \Auth::user();
        if ($request->isMethod("post")) {
            $request->validate([
                "name" => "required",
                "about" => "required"
            ]);
            $user->fill($request->all());
            $user->save();
        }

        return view("profile.user_info", ["user" => $user, "title" => "Thông tin tài khoản"]);

    }

    public function change_pw(Request $request)
    {
        if ($request->isMethod("post")) {
            $request->validate([
                "old_pw" => "required|min:6",
                "new_pw" => "required|string|min:6|confirmed",
            ]);

            $current_password = \Auth::User()->password;
            if (\Hash::check($request->input("old_pw"), $current_password)) {
                $obj_user = \Auth::user();
                $obj_user->password = \Hash::make($request->input("new_pw"));
                $obj_user->save();
                \Auth::logout();

                return redirect("/login");
            }
        }

        return view("profile.change_password", ["user" => \Auth::user(), "title" => "Thay đổi mật khẩu"]);

    }

}
