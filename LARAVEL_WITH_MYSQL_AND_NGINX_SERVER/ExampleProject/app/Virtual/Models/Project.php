<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *      title="Project",
 *      type="object",
 *      required={"id", "name", "lifespan", "location", "latitude", "longitude", "altitude"}
 * )
 */
class Project
{
  /**
   * @OA\Property(
   *      example=1
   * )
   *
   * @var integer
   */
  public $id;

  /**
   * @OA\Property(
   *      example="Project name"
   * )
   *
   * @var string
   */
  public $name;

  /**
   * @OA\Property(
   *      example=1
   * )
   *
   * @var integer
   */
  public $lifespan;

  /**
   * @OA\Property(
   *      ref="#/components/schemas/ProjectLocation"
   * )
   *
   * @var object
   */
  public $location;

  /**
   * @OA\Property(
   *      example=1.1
   * )
   *
   * @var float
   */
  public $latitude;

  /**
   * @OA\Property(
   *      example=1.1
   * )
   *
   * @var float
   */
  public $longitude;

  /**
   * @OA\Property(
   *      example=1.1
   * )
   *
   * @var float
   */
  public $altitude;

   /**
   * @OA\Property(
   *      description="Project's sectors data",
   *      example="{}",
   *      @OA\Schema(
   *         type="object",
   *         additionalProperties=true
   *      )
   * )
   * 
   * @var object
   */
  public $sectors;

  /**
   * @OA\Property(
   *      example="2024-01-01T00:00:00.000000Z"
   * )
   *
   * @var string
   */
  public $created_at;

  /**
   * @OA\Property(
   *      example="2024-01-01T00:00:00.000000Z"
   * )
   *
   * @var string
   */
  public $updated_at;
}
