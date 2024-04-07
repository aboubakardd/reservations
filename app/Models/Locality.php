<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Locality extends Model
{
    use HasFactory;

    protected $fillable = [
        'postal_code', 
        'locality',
    ];

    protected $tables = ['localities'];

    public $timestamps = false;

    public function locations() :hasMany
    {
        return $this->hasMany(Location::class);
    }
}
