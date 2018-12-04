<?php

namespace App\Http\Controllers;

use App\Phong_hoc;
use Illuminate\Http\Request;

class Phong_hoc_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("data.phong_hoc.list", ["items" => Phong_hoc::all(), "title" => "Danh sách phòng học"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("data.phong_hoc.edit", ["item" => new Phong_hoc(), "title" => "Tạo phòng học mới"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->process_save($request, new Phong_hoc);
        return redirect("/phong_hoc");
    }

    private function process_save(Request $request, Phong_hoc $phong_hoc)
    {
        $request->validate(
            [
                "ten" => "required|string",
                "so_ban" => "required|numeric",
                "dia_diem" => "required|string",
            ]
        );
        $phong_hoc->fill($request->all());
        $phong_hoc->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Phong_hoc $phong_hoc)
    {
        return view("data.phong_hoc.list", ["items" => [$phong_hoc], "title" => "Xem phòng học"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Phong_hoc $phong_hoc)
    {
        return view("data.phong_hoc.edit", ["item" => $phong_hoc, "title" => "Sửa phòng học"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phong_hoc $phong_hoc)
    {
        $this->process_save($request, $phong_hoc);
        return redirect("/phong_hoc");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phong_hoc $phong_hoc)
    {
        Phong_hoc::destroy($phong_hoc->id);
        return redirect("/phong_hoc");
    }

    public function delete($id)
    {
        Phong_hoc::destroy($id);
        return redirect("/phong_hoc");
    }

    public function mass_delete(Request $request)
    {
        foreach ($request->post() as $key => $value) {
            if (strpos($key, "checked") === 0)
                Phong_hoc::destroy(explode("_", $key)[1]);
        }
        return redirect("/phong_hoc");
    }
}
