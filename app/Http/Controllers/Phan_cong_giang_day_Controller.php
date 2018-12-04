<?php

namespace App\Http\Controllers;

use App\Hoc_phan;
use App\Phan_cong_giang_day;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Phan_cong_giang_day_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("data.phan_cong_giang_day.list", ["items" => Phan_cong_giang_day::all(), "title" => "Danh sách phân công giảng dạy"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("data.phan_cong_giang_day.edit", ["item" => new Phan_cong_giang_day(), "title" => "Tạo phân công giảng dạy mới"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->process_save($request, new Phan_cong_giang_day);
        return redirect("/phan_cong_giang_day");
    }

    private function process_save(Request $request, Phan_cong_giang_day $phan_cong_giang_day)
    {

        $request->validate(
            [
                "giang_vien_id" => "required|numeric",
                "hoc_phan_id" => "required|numeric",
                "lop_id" => "required|numeric",
                "ngay_day" => "required|date",
                "tiet_hoc" => "required",
                "phong_hoc_id" => "required"
            ]
        );

        $phan_cong_giang_day->tiet_hoc = json_encode($request->post('tiet_hoc'));
        $phan_cong_giang_day->fill($request->all());
        $cung_ngay_cung_phong = Phan_cong_giang_day::query()->where('phong_hoc_id', $phan_cong_giang_day->phong_hoc_id)->where('ngay_day', $phan_cong_giang_day->ngay_day)->get();
        foreach ($cung_ngay_cung_phong as $cung) {
            if ($cung->id == $phan_cong_giang_day->id)
                continue;
            foreach ($request->post('tiet_hoc') as $tiet) {
                if (in_array($tiet, json_decode($cung->tiet_hoc))) {
                    $msg = Hoc_phan::getClasses()[$tiet] . " không còn trống";
                    throw ValidationException::withMessages(['tiet_hoc' => $msg]);
                }
            }
        }

        $phan_cong_giang_day->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Phan_cong_giang_day $phan_cong_giang_day)
    {
        return view("data.phan_cong_giang_day.list", ["items" => [$phan_cong_giang_day], "title" => "Xem phân công giảng dạy"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Phan_cong_giang_day $phan_cong_giang_day)
    {
        return view("data.phan_cong_giang_day.edit", ["item" => $phan_cong_giang_day, "title" => "Sửa phân công giảng dạy"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phan_cong_giang_day $phan_cong_giang_day)
    {
        $this->process_save($request, $phan_cong_giang_day);
        return redirect("/phan_cong_giang_day");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phan_cong_giang_day $phan_cong_giang_day)
    {
        Phan_cong_giang_day::destroy($phan_cong_giang_day->id);
        return redirect("/phan_cong_giang_day");
    }

    public function delete($id)
    {
        Phan_cong_giang_day::destroy($id);
        return redirect("/phan_cong_giang_day");
    }

    public function mass_delete(Request $request)
    {
        foreach ($request->post() as $key => $value) {
            if (strpos($key, "checked") === 0)
                Phan_cong_giang_day::destroy(explode("_", $key)[1]);
        }
        return redirect("/phan_cong_giang_day");
    }
}
