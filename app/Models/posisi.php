<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posisi extends Model
{
    use HasFactory;

    protected $table = 'posisi';

    protected $fillable = [
        'posisi',
    ];

    public $timestamps = false;

    public function karyawan()
    {
        return $this->hasMany(karyawan::class, 'id_posisi', 'id');
    }
}
