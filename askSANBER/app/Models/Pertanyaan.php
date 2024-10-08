<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan';

    protected $fillable = ['title', 'content', 'image', 'user_id', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
