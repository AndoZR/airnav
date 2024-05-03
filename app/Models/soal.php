<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    use HasFactory;

    protected $table = 'soal';

    protected $fillable = [
        'id_test',
        'pertanyaan',
    ];

    public $timestamps = false;

    public function test()
    {
        return $this->belongsTo(test::class,'id_test','id');
    }
}