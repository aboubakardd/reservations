<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'poster_url',
        'localition_id',
        'bookable',
        'price',
    ];

    protected $tables = ['shows'];

    public $timestamps = false;

    /*
    * Lieu de création du spectacle
    */
    public function lieuCreation() : BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
