<?php

namespace App\Http\Controllers;

use App\Hoc_phan;
use Illuminate\Http\Request;

class Hoc_phan_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data.hoc_phan.list', ['items' => Hoc_phan::all(), 'title' => 'Danh sách học phần']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.hoc_phan.edit', ['item' => new Hoc_phan(), 'title' => "Tạo học phần mới"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->process_save($request, new Hoc_phan);
        return redirect('/hoc_phan');
    }

    private function process_save(Request $request, Hoc_phan $hoc_phan)
    {
        $request->validate(
            [
                'khoa_dao_tao_id' => 'required|numeric',
                'mon_hoc_id' => 'required|numeric',
                'tin_chi_thuc_hanh' => 'required|numeric',
                'tin_chi_ly_thuyet' => 'required|numeric',
            ]
        );
        $hoc_phan->fill($request->all());
        $hoc_phan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hoc_phan $hoc_phan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hoc_phan $hoc_phan)
    {
        return view('data.hoc_phan.edit', ['item' => $hoc_phan, 'title' => "Sửa học phần"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hoc_phan $hoc_phan)
    {
        $this->process_save($request, $hoc_phan);
        return redirect('/hoc_phan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hoc_phan $hoc_phan)
    {
        Hoc_phan::destroy($hoc_phan->id);
        return redirect('/hoc_phan');
    }

    public function delete($id)
    {
        Hoc_phan::destroy($id);
        return redirect('/hoc_phan');
    }

    public function mass_delete(Request $request)
    {
        foreach ($request->post() as $key => $value) {
            if (strpos($key, 'checked') === 0)
                Hoc_phan::destroy(explode('_', $key)[1]);
        }
        return redirect('/hoc_phan');
    }
}
