<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper as ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

use App\Models\User;

class AuthController extends ApiController
{
  private $registerRules;
  private $loginRules;

  public function __construct()
  {
    $this->registerRules = [
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => ['required', 'string', Password::min(8)]
    ];

    $this->loginRules = [
      'email' => 'required|email',
      'password' => 'required|string|min:8'
    ];
  }

  public function register(Request $request)
  {
    $validator = Validator::make($request->input(), $this->registerRules);
    if ($validator->fails()) {
      return $validator->errors();
    }
    $data = $validator->validated();
    $user = User::create($data);
    return $user;
  }

  /**
   * @OA\Post(
   *      path="/auth/login",
   *      operationId="authLogin",
   *      tags={"Authentication"},
   *      summary="Auth Login",
   *      description="Login to Data Cellar Dashboard API",
   *      security={},
   *      @OA\RequestBody(
   *          required=true,
   *          @OA\JsonContent(ref="#/components/schemas/AuthLoginRequest")
   *      ),
   *      @OA\Response(
   *          response=200,
   *          description="Success Operation",
   *          @OA\JsonContent(
   *            type="object",
   *            @OA\Property(
   *              property="status",
   *              type="number",
   *              example=200
   *            ),
   *            @OA\Property(
   *              property="code",
   *              type="string",
   *              example="login_success"
   *            ),
   *            @OA\Property(
   *              property="data",
   *              type="object",
   *              ref="#/components/schemas/LoginSuccessResponse"
   *            )
   *          )
   *       ),
   *      @OA\Response(
   *          response=400,
   *          description="Invalid Request Body",
   *          @OA\JsonContent(
   *            type="object",
   *            @OA\Property(
   *              property="status",
   *              type="number",
   *              example=400
   *            ),
   *            @OA\Property(
   *              property="code",
   *              type="string",
   *              example="login_invalid_data"
   *            ),
   *            @OA\Property(
   *              property="message",
   *              type="string",
   *              example="Login body has invalid data"
   *            ),
   *            @OA\Property(
   *              property="error",
   *              type="object",
   *              ref="#/components/schemas/ValidatorError"
   *            )
   *          )
   *       ),
   *       @OA\Response(
   *          response=401,
   *          description="Wrong credentials",
   *          @OA\JsonContent(
   *            type="object",
   *            @OA\Property(
   *              property="status",
   *              type="number",
   *              example=401
   *            ),
   *            @OA\Property(
   *              property="code",
   *              type="string",
   *              example="wrong_credentials"
   *            ),
   *            @OA\Property(
   *              property="message",
   *              type="string",
   *              example="Email or password is incorrect"
   *            )
   *          )
   *       ),
   *      @OA\Response(
   *          response=500,
   *          description="Server Error",
   *          @OA\JsonContent(ref="#/components/schemas/ServerErrorResponse")
   *      )
   *     )
   */
  public function login(Request $request)
  {
    try {
      $validator = Validator::make($request->input(), $this->loginRules);
      if ($validator->fails()) {
        return ApiResponse::BadRequest()
          ->code('login_invalid_data')
          ->message('Login body has invalid data')
          ->error($validator->errors())
          ->send();
      }

      $credentials = $validator->validated();
      if (!Auth::attempt($credentials)) {
        return ApiResponse::Unauthorized()
          ->code('wrong_credentials')
          ->message('Email or password is incorrect')
          ->send();
      }

      $user = Auth::user();

      //delete any existing tokens
      $user->tokens()->delete();

      $token = $user->createToken('access_token');

      return ApiResponse::Success()
        ->code('login_success')
        ->data([
          'token' => $token->plainTextToken,
          'user' => $user->only('id', 'name', 'email')
        ])
        ->send();
    } catch (\Throwable $err) {
      return ApiResponse::ServerError()
        ->error($err)
        ->send();
    }
  }

  /**
   * @OA\Post(
   *      path="/auth/logout",
   *      operationId="authLogout",
   *      tags={"Authentication"},
   *      summary="Auth logout",
   *      description="Logout from Data Cellar Dashboard API and invalidate the given access / bearer token",
   *      @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *          @OA\JsonContent(
   *            type="object",
   *            @OA\Property(
   *              property="status",
   *              type="number",
   *              example=200
   *            ),
   *            @OA\Property(
   *              property="code",
   *              type="string",
   *              example="logout_success"
   *            )
   *          )
   *       ),
   *      @OA\Response(
   *          response=401,
   *          description="Unauthorized",
   *          @OA\JsonContent(
   *            type="object",
   *            oneOf={
   *                @OA\Schema(ref="#/components/schemas/MissingTokenResponse"),
   *                @OA\Schema(ref="#/components/schemas/InvalidTokenResponse"),
   *            },
   *            @OA\Examples(
   *              example="missing_token_response",
   *              ref="#/components/examples/missing_token_response"
   *            ),
   *            @OA\Examples(
   *              example="invalid_token_response",
   *              ref="#/components/examples/invalid_token_response"
   *            )
   *          )
   *      ),
   *      @OA\Response(
   *          response=500,
   *          description="Server Error",
   *          @OA\JsonContent(ref="#/components/schemas/ServerErrorResponse")
   *      )
   *     )
   */
  public function logout()
  {
    try {
      Auth::user()->tokens()->delete();
      Auth::logout();
      return ApiResponse::Success()
        ->code('logout_success')
        ->send();
    } catch (\Throwable $err) {
      return ApiResponse::ServerError()
        ->error($err)
        ->send();
    }
  }

  /**
   * @OA\Get(
   *      path="/auth/user",
   *      operationId="authUser",
   *      tags={"Authentication"},
   *      summary="Auth User",
   *      description="Get the authenticated user's information",
   *      @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *          @OA\JsonContent(
   *            type="object",
   *            @OA\Property(
   *              property="status",
   *              type="number",
   *              example=200
   *            ),
   *            @OA\Property(
   *              property="code",
   *              type="string",
   *              example="get_user"
   *            ),
   *            @OA\Property(
   *              property="data",
   *              type="object",
   *              ref="#/components/schemas/User"
   *            )
   *          )
   *       ),
   *      @OA\Response(
   *          response=401,
   *          description="Unauthorized",
   *          @OA\JsonContent(
   *            type="object",
   *            oneOf={
   *                @OA\Schema(ref="#/components/schemas/MissingTokenResponse"),
   *                @OA\Schema(ref="#/components/schemas/InvalidTokenResponse"),
   *            },
   *            @OA\Examples(
   *              example="missing_token_response",
   *              ref="#/components/examples/missing_token_response"
   *            ),
   *            @OA\Examples(
   *              example="invalid_token_response",
   *              ref="#/components/examples/invalid_token_response"
   *            )
   *          )
   *      ),
   *      @OA\Response(
   *          response=500,
   *          description="Server Error",
   *          @OA\JsonContent(ref="#/components/schemas/ServerErrorResponse")
   *      )
   *     )
   */
  public function user()
  {
    try {
      return ApiResponse::Success()
        ->code('get_user')
        ->data(Auth::user()->only('id', 'name', 'email'))
        ->send();
    } catch (\Throwable $err) {
      return ApiResponse::ServerError()
        ->error($err)
        ->send();
    }
  }
}
