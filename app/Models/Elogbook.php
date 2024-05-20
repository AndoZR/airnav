<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elogbook extends Model{
    use HasFactory;
    protected $table = 'elogbook';
    protected $primaryKey = 'no';

    protected $fillable = [
        'username',
        'user_id',
        'bulan',
        'tahun'
    ];
}
?>