<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class F2Configuration extends Model
{
    use HasFactory;

    protected $fillable = ['configuration', 'owner'];

    protected $hidden = ['owner'];

    protected $casts = [
        'configuration' => 'array'
    ];

    /**
     * Get project's user / owner
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner');
    }
}
