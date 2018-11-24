<?php

namespace App\Http\Controllers;

use App\Mon_hoc;
use Illuminate\Http\Request;

class Mon_hoc_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mon_hoc.list', ['items' => Mon_hoc::all(),'title'=>'Danh sach']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mon_hoc.edit', ['item' => new Mon_hoc(),'title'=>"Tạo mon hoc mới"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->process_save($request, new Mon_hoc);
        return redirect('/mon_hoc');
    }

    private function process_save(Request $request, Mon_hoc $mon_hoc)
    {
        $request->validate(
            [
                'name' => 'required|string',
            ]
        );
        $mon_hoc->fill($request->all());
        $mon_hoc->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mon_hoc $mon_hoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mon_hoc $mon_hoc)
    {
        return view('mon_hoc.edit', ['item' => $mon_hoc,'title'=>"Sửa mon hoc"]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mon_hoc $mon_hoc)
    {
        $this->process_save($request, $mon_hoc);
        return redirect('/mon_hoc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mon_hoc $mon_hoc)
    {
        Mon_hoc::destroy($mon_hoc->id);
        return redirect('/mon_hoc');
    }

    public function delete($id)
    {
        Mon_hoc::destroy($id);
        return redirect('/mon_hoc');
    }
}
