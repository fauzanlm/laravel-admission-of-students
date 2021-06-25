<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    use HasFactory;
    protected $fillable=[
        'nisn',
        'pertanyaan1',
        'pertanyaan2',
        'pertanyaan3',
        'pertanyaan4',
        'pertanyaan5',
        'pertanyaan6',
        'pertanyaan7',
        'pertanyaan8',
        'pertanyaan9',
        'pertanyaan1ortu',
        'pertanyaan2ortu',
        'pertanyaan3ortu',
        'pertanyaan4ortu',
        'pertanyaan5ortu',
        'pertanyaan6ortu',
        'pertanyaan7ortu',
        'pertanyaan8ortu',
    ];
}
