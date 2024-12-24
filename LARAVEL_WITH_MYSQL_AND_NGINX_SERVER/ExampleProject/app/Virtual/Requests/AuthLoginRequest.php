<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Login Request",
 *      type="object",
 *      required={"email","password"}
 * )
 */
class AuthLoginRequest
{
  /**
   * @OA\Property(
   *      example="your@mail.com"
   * )
   *
   * @var string
   */
  public $email;

  /**
   * @OA\Property(
   *      example="password"
   * )
   *
   * @var string
   */
  public $password;
}
