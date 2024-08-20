<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Pertanyaan;
use File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth')->except('index', 'show');
     }
 
     public function index()
     {
         $pertanyaan = Pertanyaan::get();
         $kategori = Kategori::get();
         
         return view('pertanyaan.index', ['pertanyaan'=> $pertanyaan, 'kategori'=> $kategori]);
     
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $kategori = Kategori::get();
         return view('pertanyaan.create', ['kategori'=> $kategori]);
 
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
             'title' => 'required',
             'content' => 'required',
             'image' => 'image|mimes:jpg,png,jpeg',
             'kategori_id' => 'required'
         ]);
 
         $pertanyaan = new Pertanyaan;
         $userId = Auth::id();

         if($request->has('image')){
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'), $fileName);
            
            $pertanyaan->image = $fileName;
         } else {
            $pertanyaan->image = '';
         }         
  
         $pertanyaan->title = $request->title;
         $pertanyaan->content = $request->content;
         $pertanyaan->user_id= $userId;
         $pertanyaan->kategori_id = $request->kategori_id;
  
         $pertanyaan->save();
         
         Alert::success('SUCCESS', 'Your question has been created');
  
         return redirect('/pertanyaan');
 
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $pertanyaan = Pertanyaan::find($id);
         $kategori = Kategori::get();
 
         return view('pertanyaan.detail', ['pertanyaan'=> $pertanyaan, 'kategori'=> $kategori]);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $pertanyaan = Pertanyaan::find($id);
         $kategori = Kategori::get();
 
         return view('pertanyaan.update', ['pertanyaan'=> $pertanyaan, 'kategori'=> $kategori]);
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
             'title' => 'required',
             'content' => 'required',
             'image' => 'image|mimes:jpg,png,jpeg',
             'kategori_id' => 'required'
         ]);
 
         $pertanyaan = Pertanyaan::find($id);
 
         if($request->has('image')){
             $path = 'image/';
             File::delete($path. $pertanyaan->image);
             
             $fileName = time().'.'.$request->image->extension();
             $request->image->move(public_path('image'), $fileName);
 
             $pertanyaan->image = $fileName;
             $pertanyaan->save();
         }

         $userId = Auth::id();

         $pertanyaan->title = $request->title;
         $pertanyaan->content = $request->content;
         $pertanyaan->user_id= $userId;
         $pertanyaan->kategori_id = $request->kategori_id;
  
         $pertanyaan->save();

         
         Alert::success('SUCCESS', 'Question update has completed');
  
         return redirect('/pertanyaan');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $pertanyaan = Pertanyaan::find($id);
         $path = 'image/';
         File::delete($path. $pertanyaan->image);
             
         $pertanyaan->delete();

         
         Alert::success('SUCCESS', 'Question has been deleted');
 
         return redirect('/pertanyaan');
     }
}
