<?php

namespace App\Http\Controllers;

use App\Khoa;
use Illuminate\Http\Request;

class Khoa_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("data.khoa.list", ["items" => Khoa::all(), "title" => "Danh sách khoa"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("data.khoa.edit", ["item" => new Khoa(), "title" => "Tạo khoa mới"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->process_save($request, new Khoa);
        return redirect("/khoa");
    }

    private function process_save(Request $request, Khoa $khoa)
    {
        $request->validate(
            [
                "name" => "required|string",
            ]
        );
        $khoa->fill($request->all());
        $khoa->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Khoa $khoa)
    {
        return view("data.khoa.list", ["items" => [$khoa], "title" => "Xem khoa"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Khoa $khoa)
    {
        return view("data.khoa.edit", ["item" => $khoa, "title" => "Sửa khoa"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Khoa $khoa)
    {
        $this->process_save($request, $khoa);
        return redirect("/khoa");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Khoa $khoa)
    {
        Khoa::destroy($khoa->id);
        return redirect("/khoa");
    }

    public function delete($id)
    {
        Khoa::destroy($id);
        return redirect("/khoa");
    }

    public function mass_delete(Request $request)
    {
        foreach ($request->post() as $key => $value) {
            if (strpos($key, "checked") === 0)
                Khoa::destroy(explode("_",$key)[1]);
        }
        return redirect("/khoa");
    }
}
