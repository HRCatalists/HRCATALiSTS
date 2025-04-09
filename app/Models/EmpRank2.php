<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpRank2 extends Model
{
    use HasFactory;

    protected $table = 'emp_rank2';

    protected $fillable = [
        'emp_id',
        'full_time_service_columban',
        'full_time_service_cesdi',
        'admin_experience',
    ];

    public function rank1()
    {
        return $this->belongsTo(EmpRank1::class, 'emp_id', 'emp_id');
    }
}
