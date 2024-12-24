<?php

namespace App\Helpers;

use Illuminate\Http\Response;

class ApiResponseHelper
{
  /**
   * HTTP response status code
   * @var int
   */
  private $status;

  /**
   * Response developer code / indentifier
   * @var string
   */
  private $code;

  /**
   * Response user friendly message
   * @var string | NULL
   */
  private $message = null;

  /**
   * Response data
   * @var mixed
   */
  private $data = null;

  /**
   * Response errors
   * @var mixed
   */
  private $error = null;

  public function __construct(int $status, string $code)
  {
    $this->status = $status;
    $this->code = $code;
  }

  public static function prepare(int $status, string $code)
  {
    return new static($status, $code);
  }

  public static function Success()
  {
    return new static(200, 'success');
  }

  public static function Empty()
  {
    return new static(204, 'empty');
  }

  public static function BadRequest()
  {
    return new static(400, 'bad_request');
  }

  public static function Unauthorized()
  {
    return new static(401, 'unauthorized');
  }

  public static function Forbidden()
  {
    return new static(403, 'forbidden');
  }

  public static function NotFound()
  {
    return new static(404, 'not_found');
  }

  public static function UnprocessableEntity()
  {
    return new static(422, 'unprocessable_entity');
  }

  public static function TooManyRequests()
  {
    return new static(429, 'too_many_requests');
  }

  public static function ServerError()
  {
    return new static(500, 'server_error');
  }

  public function code(string $code)
  {
    $this->code = $code;
    return $this;
  }

  public function message(string $message)
  {
    $this->message = $message;
    return $this;
  }

  public function data(mixed $data)
  {
    $this->data = $data;
    return $this;
  }

  public function error(mixed $error)
  {
    if ($error instanceof \Throwable) {
      $this->error = [
        'class' => get_class($error),
        'message' => $error->getMessage(),
        'file' => $error->getFile(),
        'line' => $error->getLine(),
        'trace' => $error->getTrace(),
      ];
    } else {
      $this->error = $error;
    }
    return $this;
  }

  public function send(): Response
  {
    $response = [
      'status' => $this->status,
      'code' => $this->code,
      'message' => $this->message,
      'data' => $this->data,
      'error' => $this->error
    ];
    return response(array_filter($response));
  }

  public static function SendEmpty(): Response
  {
    return response('', 204);
  }
}
