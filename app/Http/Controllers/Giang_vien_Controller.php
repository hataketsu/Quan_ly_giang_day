<?php

namespace App\Http\Controllers;

use App\Giang_vien;
use Illuminate\Http\Request;

class Giang_vien_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data.giang_vien.list', ['items' => Giang_vien::all(), 'title' => 'Danh sách giảng viên']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.giang_vien.edit', ['item' => new Giang_vien(), 'title' => "Tạo giảng viên mới"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->process_save($request, new Giang_vien);
        return redirect('/giang_vien');
    }

    private function process_save(Request $request, Giang_vien $giang_vien)
    {
        $request->validate(
            [
                'ten' => 'required|string',
                'chuyen_mon' => 'required|string',
                'chuc_vu' => 'required|string',
                'ngay_sinh' => 'required|string',
                'gioi_tinh' => 'required|numeric',
                'dien_thoai' => 'required|string',
                'khoa_id' => 'required|numeric',
            ]
        );
        $giang_vien->fill($request->all());
        $giang_vien->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Giang_vien $giang_vien)
    {
        return view('data.giang_vien.list', ['items' => [$giang_vien], 'title' => 'Xem giảng viên']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Giang_vien $giang_vien)
    {
        return view('data.giang_vien.edit', ['item' => $giang_vien, 'title' => "Sửa giảng viên"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giang_vien $giang_vien)
    {
        $this->process_save($request, $giang_vien);
        return redirect('/giang_vien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giang_vien $giang_vien)
    {
        Giang_vien::destroy($giang_vien->id);
        return redirect('/giang_vien');
    }

    public function delete($id)
    {
        Giang_vien::destroy($id);
        return redirect('/giang_vien');
    }

    public function mass_delete(Request $request)
    {
        foreach ($request->post() as $key => $value) {
            if (strpos($key, 'checked') === 0)
                Giang_vien::destroy(explode('_', $key)[1]);
        }
        return redirect('/giang_vien');
    }
}
