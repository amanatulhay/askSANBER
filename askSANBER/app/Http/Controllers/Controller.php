<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\Kategori;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard(){
        $pertanyaan = Pertanyaan::latest()->first();

        $jawaban = Jawaban::latest()->first();

        return view('welcome', ['pertanyaan'=> $pertanyaan, 'jawaban'=>$jawaban]);
    }

    public function home(){
        $pertanyaan = Pertanyaan::latest()->first();

        $jawaban = Jawaban::latest()->first();

        return view('index', ['pertanyaan'=> $pertanyaan, 'jawaban'=>$jawaban]);
    }
}
