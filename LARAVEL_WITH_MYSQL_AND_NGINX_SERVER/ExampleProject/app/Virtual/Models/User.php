<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *      title="User",
 *      type="object",
 *      required={"id", "name", "email"}
 * )
 */
class User
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
   *      example="User"
   * )
   *
   * @var string
   */
  public $name;

  /**
   * @OA\Property(
   *      example="user@mail.com"
   * )
   *
   * @var string
   */
  public $email;
}
