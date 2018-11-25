<?php

namespace App\Http\Controllers;

use App\Khoa_dao_tao;
use Illuminate\Http\Request;

class Khoa_dao_tao_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("data.khoa_dao_tao.list", ["items" => Khoa_dao_tao::all(), "title" => "Danh sách khoá đào tạo"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("data.khoa_dao_tao.edit", ["item" => new Khoa_dao_tao(), "title" => "Tạo khoá đào tạo mới"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->process_save($request, new Khoa_dao_tao);
        return redirect("/khoa_dao_tao");
    }

    private function process_save(Request $request, Khoa_dao_tao $khoa_dao_tao)
    {
        $request->validate(
            [
                "ten" => "required|string",
                "nganh_id" => "required|numeric",
                "nam_nhap" => "required|numeric",
                "so_nam_dao_tao" => "required|numeric",
            ]
        );
        $khoa_dao_tao->fill($request->all());
        $khoa_dao_tao->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Khoa_dao_tao $khoa_dao_tao)
    {
        return view("data.khoa_dao_tao.list", ["items" => [$khoa_dao_tao], "title" => "Xem khoá đào tạo"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Khoa_dao_tao $khoa_dao_tao)
    {
        return view("data.khoa_dao_tao.edit", ["item" => $khoa_dao_tao, "title" => "Sửa khoá đào tạo"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Khoa_dao_tao $khoa_dao_tao)
    {
        $this->process_save($request, $khoa_dao_tao);
        return redirect("/khoa_dao_tao");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Khoa_dao_tao $khoa_dao_tao)
    {
        Khoa_dao_tao::destroy($khoa_dao_tao->id);
        return redirect("/khoa_dao_tao");
    }

    public function delete($id)
    {
        Khoa_dao_tao::destroy($id);
        return redirect("/khoa_dao_tao");
    }

    public function mass_delete(Request $request)
    {
        foreach ($request->post() as $key => $value) {
            if (strpos($key, "checked") === 0)
                Khoa_dao_tao::destroy(explode("_", $key)[1]);
        }
        return redirect("/khoa_dao_tao");
    }
}
