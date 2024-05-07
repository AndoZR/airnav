<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban';

    protected $fillable = [
        'id_soal',
        'jawaban',
        'nilai'
    ];

    public $timestamps = false;

    public function soal()
    {
        return $this->hasMany(soal::class, 'id_soal', 'id');
    }
}
