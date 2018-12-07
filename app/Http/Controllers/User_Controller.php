<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class User_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("data.tai_khoan.list", ["items" => User::all(), "title" => "Danh sách tài khoản"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("data.tai_khoan.edit", ["item" => new User(), "title" => "Tạo tài khoản mới"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->process_save($request, new User);
        return redirect("/tai_khoan");
    }

    private function process_save(Request $request, User $tai_khoan)
    {
        if ($tai_khoan->id == null) {
            $request->validate(
                [
                    'email' => "email",
                    "password" => "required|string|min:6|confirmed",
                ]
            );
            $tai_khoan->name = $request->post("email");
            $tai_khoan->email = $request->post("email");
            $tai_khoan->password = Hash::make($request->post("password"));
        }
        $tai_khoan->role = $request->post("role");
        $tai_khoan->giang_vien_id = $request->post("giang_vien_id");
        $tai_khoan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $tai_khoan)
    {
        return view("data.tai_khoan.list", ["items" => [$tai_khoan], "title" => "Xem tài khoản"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $tai_khoan)
    {
        return view("data.tai_khoan.edit", ["item" => $tai_khoan, "title" => "Sửa tài khoản"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $tai_khoan)
    {
        $this->process_save($request, $tai_khoan);
        return redirect("/tai_khoan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $tai_khoan)
    {
        User::destroy($tai_khoan->id);
        return redirect("/tai_khoan");
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect("/tai_khoan");
    }

    public function mass_delete(Request $request)
    {
        foreach ($request->post() as $key => $value) {
            if (strpos($key, "checked") === 0)
                User::destroy(explode("_", $key)[1]);
        }
        return redirect("/tai_khoan");
    }
}
