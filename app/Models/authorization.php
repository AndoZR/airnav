<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authorization extends Model
{
    use HasFactory;
    protected $table = 'authorization_account';
    protected $primaryKey = 'no';
    public $timestamps = true;
}
