<?php

namespace App\Virtual\Responses;

/**
 * @OA\Examples(
 *  example="missing_token_response",
 *  summary="Missing Bearer Token",
 *  value={"status": 401, "code": "missing_bearer_token", "message": "Missing Authentication Bearer Token from headers"}
 * )
 * 
 * @OA\Schema(
 *      title="Missing Bearer Token Response",
 *      type="object",
 *      @OA\Property(
 *        property="status",
 *        type="number",
 *        example=401
 *      ),
 *      @OA\Property(
 *        property="code",
 *        type="string",
 *        example="missing_bearer_token"
 *      ),
 *      @OA\Property(
 *        property="message",
 *        type="string",
 *        example="Missing Authentication Bearer Token from headers",
 *      )
 * )
 */
class MissingTokenResponse {}