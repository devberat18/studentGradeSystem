<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = [
        'name',
        'surname',
        'school_number',
        'school_grade',
    ];
}
