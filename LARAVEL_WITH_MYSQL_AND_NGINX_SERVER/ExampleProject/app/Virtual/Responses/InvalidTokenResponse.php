<?php

namespace App\Virtual\Responses;

/**
 * @OA\Examples(
 *    example="invalid_token_response",
 *    summary="Invalid Bearer Token",
 *    value={"status": 401, "code": "invalid_token", "message": "Bearer Token is invalid or expired"}
 * )
 * 
 * @OA\Schema(
 *      title="Invalid Bearer Token Response",
 *      type="object",
 *      @OA\Property(
 *        property="status",
 *        type="number",
 *        example=401
 *      ),
 *      @OA\Property(
 *        property="code",
 *        type="string",
 *        example="invalid_token"
 *      ),
 *      @OA\Property(
 *        property="message",
 *        type="string",
 *        example="Bearer Token is invalid or expired",
 *      )
 * )
 */
class InvalidTokenResponse {}