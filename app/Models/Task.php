<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'deadline', 'status'];

    public static $rules = array(
        'content' => 'required | max:20',
        'deadline' => 'required | max:20'
    );
}