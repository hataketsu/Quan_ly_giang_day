<?php

namespace App\Http\Controllers;

use App\Hoc_phan;
use App\Phan_cong_giang_day;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Phan_cong_giang_day_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('start') and $request->has('end')) {
            $start_time = $request->get('start');
            $end_time = $request->get('end');
            $date_range = "$start_time - $end_time";
            $items = Phan_cong_giang_day::query()->whereDate('ngay_bat_dau', '>=', new Carbon($start_time))
                ->whereDate('ngay_bat_dau', '<=', new Carbon($end_time))->get();
            $items2 = Phan_cong_giang_day::query()->whereDate('ngay_ket_thuc', '>=', new Carbon($start_time))
                ->whereDate('ngay_ket_thuc', '<=', new Carbon($end_time))->get();
            $items = $items->merge($items2)->unique();
        } else {
            $date_range = 'Lọc theo thời gian';
            $items = Phan_cong_giang_day::all();
        }
        return view("data.phan_cong_giang_day.list", ["items" => $items, "title" => "Danh sách phân công giảng dạy",
            'date_range' => $date_range,]);
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
                "ngay_bat_dau" => "required|date",
                "ngay_ket_thuc" => "required|date",
                "tiet_hoc" => "required",
                "ngay_trong_tuan" => "required",
                "phong_hoc_id" => "required"
            ]
        );

        $phan_cong_giang_day->tiet_hoc = json_encode($request->post('tiet_hoc'));
        $phan_cong_giang_day->ngay_trong_tuan = json_encode($request->post('ngay_trong_tuan'));
        $phan_cong_giang_day->fill($request->all());

        $items = Phan_cong_giang_day::query()->whereDate('ngay_bat_dau', '>=', new Carbon($phan_cong_giang_day->ngay_bat_dau))
            ->whereDate('ngay_bat_dau', '<=', new Carbon($phan_cong_giang_day->ngay_ket_thuc))->get();
        $items2 = Phan_cong_giang_day::query()->whereDate('ngay_ket_thuc', '>=', new Carbon($phan_cong_giang_day->ngay_bat_dau))
            ->whereDate('ngay_ket_thuc', '<=', new Carbon($phan_cong_giang_day->ngay_ket_thuc))->get();
        $items = $items->merge($items2)->unique();
        foreach ($items as $phan_cong) {
            if ($phan_cong->id == $phan_cong_giang_day->id)
                continue;
            if ($phan_cong->phong_hoc != $phan_cong_giang_day->phong_hoc)
                continue;
            if ($phan_cong->lop != $phan_cong_giang_day->lop)
                continue;

            foreach ($request->post('tiet_hoc') as $tiet) {
                if (in_array($tiet, json_decode($phan_cong->tiet_hoc))) {
                    $msg = Hoc_phan::getClasses()[$tiet] . " không còn trống do phân công <a href='/phan_cong_giang_day/$phan_cong->id'>này</a> đã lên lịch trước.";
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
        return view("data.phan_cong_giang_day.list", ["items" => [$phan_cong_giang_day], "title" => "Xem phân công giảng dạy", 'date_range' => '']);
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

    public function from_user(Request $request)
    {
        if (\Auth::user()->role == 'giang_vien') {
            if ($request->has('start') and $request->has('end')) {
                $start_time = $request->get('start');
                $end_time = $request->get('end');
                $date_range = "$start_time - $end_time";
                $items = \Auth::user()->giang_vien->phan_cong_giang_day()->whereDate('ngay_bat_dau', '>=', new Carbon($start_time))
                    ->whereDate('ngay_bat_dau', '<=', new Carbon($end_time))->get();
                $items2 = \Auth::user()->giang_vien->phan_cong_giang_day()->whereDate('ngay_ket_thuc', '>=', new Carbon($start_time))
                    ->whereDate('ngay_ket_thuc', '<=', new Carbon($end_time))->get();
                $items = $items->merge($items2)->unique();
            } else {
                $date_range = 'Lọc theo thời gian';
                $items = \Auth::user()->giang_vien->phan_cong_giang_day;
            }
            return view("data.phan_cong_giang_day.list", ["items" => $items, "title" => "Danh sách phân công giảng dạy", 'date_range' => $date_range]);

        }
        return abort(403, 'Tài khoản này không phải giảng viên');
    }

}
