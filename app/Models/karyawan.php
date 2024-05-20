<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'karyawan',
        'id_divisi',
        'id_posisi',
    ];

    public $timestamps = false;

    public function divisi()
    {
        return $this->belongsTo(divisi::class, 'id_divisi', 'id');
    }

    public function posisi()
    {
        return $this->belongsTo(posisi::class, 'id_posisi', 'id');
    }

    public function airport()
    {
        return $this->belongsTo(airport::class, 'id_aiport', 'id');
    }
}
