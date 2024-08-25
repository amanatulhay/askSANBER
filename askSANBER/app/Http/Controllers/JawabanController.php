<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use Illuminate\Http\Request;

use App\Models\Pertanyaan;
use App\Models\Kategori;

use File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JawabanController extends Controller
{
    public function store($pertanyaan_id, Request $request){
        $request->validate([
            'content' => 'required',
        ]);
        
        $userId = Auth::id();
        $jawaban = new Jawaban;

        $jawaban->image = request('image', '');

        $jawaban->content= $request->content;
        $jawaban->user_id= $userId;
        $jawaban->pertanyaan_id= $pertanyaan_id;

        $jawaban->save();    
        
        Alert::success('SUCCESS', 'Your answer has been posted');

        return redirect('/pertanyaan/'.$pertanyaan_id);
    }

    public function edit($id)
     {
         $jawaban = Jawaban::find($id);
         $kategori = Kategori::get();
 
         return view('jawaban.update', ['jawaban'=> $jawaban]);
     }

     public function update(Request $request, $id)
     {
         $request->validate([             
             'content' => 'required',
         ]);
 
         $jawaban = Jawaban::find($id);      
         $pertanyaan_id = $jawaban->pertanyaan_id;
         
         $jawaban->image = request('image', '');

         $userId = Auth::id();
         
        $jawaban->content= $request->content;
        $jawaban->user_id= $userId;
        $jawaban->pertanyaan_id= $pertanyaan_id;
  
         $jawaban->save();
         
         Alert::success('SUCCESS', 'Answer update has completed');
  
         return redirect('/pertanyaan/'.$pertanyaan_id);
     }

     public function destroy($id)
     {
         $jawaban = Jawaban::find($id);         
         $pertanyaan_id = $jawaban->pertanyaan_id;
         $jawaban->delete();

         
         Alert::success('SUCCESS', 'Answer has been deleted');
 
         return redirect('/pertanyaan/'.$pertanyaan_id);
     }
}
