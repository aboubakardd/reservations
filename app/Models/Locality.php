<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    protected $fillable = [
        'postal_code', 
        'locality',
    ];

    protected $tables = ['localities'];

    public $timestamps = false;
}
