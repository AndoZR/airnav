<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasilTest extends Model
{
    use HasFactory;

    protected $table = 'hasilTest';

    protected $fillable = [
        'hasil',
        'waktu_mulai',
        'waktu_selesai',
        'id_user',
        'id_test',
    ];

    public $timestamps = false;

    public function test()
    {
        return $this->belongsTo(Test::class, 'id_test', 'id');
    }
}