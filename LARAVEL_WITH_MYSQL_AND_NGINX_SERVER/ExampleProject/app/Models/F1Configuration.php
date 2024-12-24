<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @OA\Schema(
 *   title="F1 Configuration",
 *   @OA\Property(
 *     type="integer",
 *     property="id",
 *     example=1
 *   ),
 *   @OA\Property(
 *     type="object",
 *     property="configuration",
 *     example="{}"
 *   ),
 *   @OA\Property(
 *     type="string",
 *     format="date-time",
 *     property="created_at",
 *     example="2000-01-01T00:00:00.000Z"
 *   ),
 *   @OA\Property(
 *     type="string",
 *     format="date-time",
 *     property="updated_at",
 *     example="2000-01-01T00:00:00.000Z"
 *   )
 * )
 */
class F1Configuration extends Model
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
