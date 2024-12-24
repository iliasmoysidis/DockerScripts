<?php

namespace App\Virtual\Responses;

/**
 * @OA\Schema(
 *      title="Login Response",
 *      type="object",
 *      required={"token"}
 * )
 */
class AuthLoginResponse
{
  /**
   * @OA\Property(
   *      example="access_token"
   * )
   *
   * @var string
   */
  public $token;
}
