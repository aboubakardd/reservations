<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Show extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'poster_url',
        'localition_id',
        'bookable',
        'price',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $tables = ['shows'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /*
    * Lieu de création du spectacle
    */
    public function lieuCreation() : BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the representations of this show.
     */
    public function representations() : HasMany
    {
        return $this->hasMany(Representation::class);
    }

    /**
     * Get the performances (artists in a type of collaboration) for the show
     */
    public function artistTypes()
    {
        return $this->belongsToMany(ArtistType::class);
    }


}
