<?php

namespace App\Http\Controllers;

use App\Nganh;
use Illuminate\Http\Request;

class Nganh_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data.nganh.list', ['items' => Nganh::all(), 'title' => 'Danh sách ngành']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.nganh.edit', ['item' => new Nganh(), 'title' => "Tạo ngành mới"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->process_save($request, new Nganh);
        return redirect('/nganh');
    }

    private function process_save(Request $request, Nganh $nganh)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'khoa_id' => 'required',
            ]
        );
        $nganh->fill($request->all());
        $nganh->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Nganh $nganh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nganh $nganh)
    {
        return view('data.nganh.edit', ['item' => $nganh, 'title' => "Sửa ngành"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nganh $nganh)
    {
        $this->process_save($request, $nganh);
        return redirect('/nganh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nganh $nganh)
    {
        Nganh::destroy($nganh->id);
        return redirect('/nganh');
    }

    public function delete($id)
    {
        Nganh::destroy($id);
        return redirect('/nganh');
    }

    public function mass_delete(Request $request)
    {
        foreach ($request->post() as $key => $value) {
            if (strpos($key, 'checked') === 0)
                Nganh::destroy(explode('_', $key)[1]);
        }
        return redirect('/nganh');
    }
}
