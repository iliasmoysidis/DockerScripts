<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Create Project Request",
 *      type="object",
 *      required={"name", "lifespan","location_id","latitude","longitude","altitude"}
 * )
 */
class CreateProjectRequest
{
  /**
   * @OA\Property(
   *      description="Project's name: must be up to 255 characters",
   *      example="Project Name"
   * )
   *
   * @var string
   */
  public $name;

  /**
   * @OA\Property(
   *      description="Project's lifespan: must positive integer",
   *      example=1
   * )
   *
   * @var integer
   */
  public $lifespan;

  /**
   * @OA\Property(
   *      description="Project's location: must a valid location id",
   *      example=1
   * )
   *
   * @var integer
   */
  public $location_id;

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
}
