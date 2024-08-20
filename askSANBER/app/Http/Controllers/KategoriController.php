<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function index()
    {
        // $pertanyaan = Pertanyaan::get();
        $kategori = Kategori::get();
        
        // return view('kategori.index', ['pertanyaan'=> $pertanyaan, 'kategori'=> $kategori]);
        return view('kategori.index', ['kategori'=> $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'description' => 'required',
        ]);

        $kategori = new Kategori;
 
        $kategori->name = $request->name;
        $kategori->description = $request->description;
 
        $kategori->save();

        Alert::success('SUCCESS', 'Category: '.$kategori->name.' has been created');
 
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoriById = Kategori::find($id);

        return view('kategori.detail', ['kategoriById' => $kategoriById]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoriById = Kategori::find($id);

        return view('kategori.update', ['kategoriById' => $kategoriById]);

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
            'description' => 'required',
        ]);

        $kategoriById = Kategori::find($id);
 
        $kategoriById->name = $request->name;
        $kategoriById->description = $request->description;
 
        $kategoriById->save();

        
        Alert::success('SUCCESS', 'Update for Category: '.$kategoriById->name.' has completed');

        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoriById = Kategori::find($id);
            
        $kategoriById->delete();

        Alert::success('SUCCESS', 'Category '.$kategoriById->name.' has been deleted');

        return redirect('/kategori');
    }
}
