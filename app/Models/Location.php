<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'address',
        'locality_id',
        'website',
        'phone',
    ];

    
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $tables = ['locations'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the locality of the location
     */
    public function locality() : BelongsTo
    {
        return $this->belongsTo(Locality::class);
    }

        /**
     * Get the shows in this location.
     */
    public function shows() : HasMany
    {
        return $this->hasMany(Show::class);
    }

    
    /**
     * Get the representations in this location.
     */
    public function representations()
    {
        return $this->hasMany(Representation::class);
    }
}
