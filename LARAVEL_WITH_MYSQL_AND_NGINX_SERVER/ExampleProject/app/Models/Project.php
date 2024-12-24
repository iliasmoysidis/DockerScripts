<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lifespan', 'location_id', 'latitude', 'longitude', 'altitude', 'owner', 'sectors', 'from'];

    protected $hidden = ['location_id', 'owner'];

    protected $casts = [
        'sectors' => 'array'
    ];

    /**
     * Get the project's location.
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(ProjectLocation::class, 'location_id');
    }

    /**
     * Get project's user / owner
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner');
    }
}
