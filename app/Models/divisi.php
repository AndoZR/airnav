<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class divisi extends Model
{
    use HasFactory;

    protected $table = 'divisi';

    protected $fillable = [
        'divisi',
        'id_airport',
    ];

    public $timestamps = false;

    public function karyawan()
    {
        return $this->hasMany(karyawan::class, 'id_divisi', 'id');
    }
}
