<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public static $rules = array(
        'content' => 'required | max:20',
        'deadline' => 'required'
    );
}