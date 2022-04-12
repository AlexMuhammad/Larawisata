<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pembeli;

class PembeliControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelis = Pembeli::all();
        return view('pembeli.index', compact('pembelis'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_telp' => 'required'
        ]);
        Pembeli::create($request->all());

        return redirect()->route('pembeli.index')->with('success', 'Data berhasil di inputkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Pembeli $pembelis)
    {
        $pembelis = Pembeli::findOrFail($id);

        return view('pembeli.show', compact('pembelis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembelis = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembelis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_telp' => 'required'
        ]);

        $pembelis = Pembeli::findOrFail($id);
        $pembelis->update($request->all());

        return redirect()->route('pembeli.index')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembeli $pembelis)
    {
        $pembelis->delete();

        return \redirect()->route('pembeli.index')->with('success', 'Data berhasil di hapus');
    }
}
