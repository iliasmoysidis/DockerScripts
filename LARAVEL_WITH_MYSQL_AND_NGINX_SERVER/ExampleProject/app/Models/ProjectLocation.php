<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Project Location",
 *     required={"id","name"}
 * )
 */
class ProjectLocation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @OA\Property(
     *     format="int",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      example="Greece"
     * )
     *
     * @var string
     */
    public $name;
}
