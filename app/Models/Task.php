<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'deadline'];

    public static $rules = array(
        'content' => 'required | max:50',
        'deadline' => 'required | max:30'
    );
}