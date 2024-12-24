<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *      title="Field Validator Error",
 *      type="object",
 *      @OA\Property(
 *        property="field",
 *        type="array",
 *        @OA\Items(
 *            @OA\Schema(type="string"),
 *            example={"Validation error1 of field", "Validation error2 of field"}
 *        )
 *      )
 * )
 */
class ValidatorError {}