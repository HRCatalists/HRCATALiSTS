<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpRank3 extends Model
{
    use HasFactory;

    protected $table = 'emp_rank3';

    protected $fillable = [
        'emp_id',
        'Excellent',
        'Very_Good',
        'Good',
        'Fair',
        'Poor',
    ];

    public function rank2()
    {
        return $this->belongsTo(EmpRank2::class, 'emp_id', 'emp_id');
    }
}
