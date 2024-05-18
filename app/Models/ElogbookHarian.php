<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElogbookHarian extends Model{
    use HasFactory;
    protected $table = 'elogbook_harian';
    protected $primaryKey = 'no';

    protected $fillable = [
        'elogbook_uid',
        'username',
        'user_id',
        'tanggal',
        'morning_ctr',
        'morning_ass',
        'morning_rest',
        'afternoon_ctr',
        'afternoon_ass',
        'afternoon_rest',
        'night_ctr',
        'night_ass',
        'night_rest',
        'unit_adc',
        'unit_app',
        'unit_app_surv',
        'unit_adc_app',
        'unit_acc',
        'unit_acc_surv',
    ];
   
}
?>