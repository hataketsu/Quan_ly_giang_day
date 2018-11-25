<?php

namespace App\Http\Controllers;

use App\Lop;
use Illuminate\Http\Request;

class Lop_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data.lop.list', ['items' => Lop::all(), 'title' => 'Danh sách lớp']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.lop.edit', ['item' => new Lop(), 'title' => "Tạo lớp mới"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->process_save($request, new Lop);
        return redirect('/lop');
    }

    private function process_save(Request $request, Lop $lop)
    {
        $request->validate(
            [
                'ten' => 'required|string',
                'khoa_dao_tao_id' => 'required|numeric',
                'so_sinh_vien' => 'required|numeric',
            ]
        );
        $lop->fill($request->all());
        $lop->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lop $lop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lop $lop)
    {
        return view('data.lop.edit', ['item' => $lop, 'title' => "Sửa lớp"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lop $lop)
    {
        $this->process_save($request, $lop);
        return redirect('/lop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lop $lop)
    {
        Lop::destroy($lop->id);
        return redirect('/lop');
    }

    public function delete($id)
    {
        Lop::destroy($id);
        return redirect('/lop');
    }

    public function mass_delete(Request $request)
    {
        foreach ($request->post() as $key => $value) {
            if (strpos($key, 'checked') === 0)
                Lop::destroy(explode('_', $key)[1]);
        }
        return redirect('/lop');
    }
}
