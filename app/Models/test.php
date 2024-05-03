<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;

    protected $table = 'test';

    protected $fillable = [
        'subjek',
        'status',
        'durasi',
    ];

    public $timestamps = false;

    public function soal()
    {
        return $this->hasMany(soal::class, 'id_test', 'id');
    }

}
