<?php

namespace App\Virtual\Responses;

/**
 * @OA\Schema(
 *      title="Server Error Response",
 *      type="object",
 *      @OA\Property(
 *        property="status",
 *        type="number",
 *        example=500
 *      ),
 *      @OA\Property(
 *        property="code",
 *        type="string",
 *        example="server_error"
 *      ),
 *      @OA\Property(
 *        property="error",
 *        type="object",
 *        example="{}",
 *        additionalProperties=true
 *      )
 * )
 */
class ServerErrorResponse {}