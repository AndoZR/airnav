<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class airport extends Model
{
    use HasFactory;

    protected $table = 'airport';

    protected $fillable = [
        'name',
        'SOP',
        'LOCA',
        'url'
    ];

    public $timestamps = false;
}
