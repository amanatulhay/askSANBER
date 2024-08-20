<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    
    protected $table = 'jawaban';

    protected $fillable = ['title', 'content', 'image', 'user_id', 'pertanyaan_id'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
