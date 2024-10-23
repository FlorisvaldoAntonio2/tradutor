<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_input',
        'text_output',
        'type',
        'language_from',
        'language_to',
        'path_file'
    ];
}
