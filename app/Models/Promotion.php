<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'discount',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $cats = [
        'is_active' => 'boolean',
    ]; 
}
