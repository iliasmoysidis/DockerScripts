<?php

namespace App\Virtual\Responses;

/**
 * @OA\Schema(
 *      title="Login Success Response",
 *      type="object",
 *      @OA\Property(
 *        property="token",
 *        type="string",
 *        example="OQqqpunXBdR11akxB245MkkAPUAqrIHjvJ"
 *      ),
 *      @OA\Property(
 *        property="user",
 *        type="object",
 *        ref="#/components/schemas/User"
 *      )
 * )
 */
class LoginSuccessResponse {}