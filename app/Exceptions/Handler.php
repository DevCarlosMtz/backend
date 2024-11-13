<?php

namespace App\Exceptions;

use Throwable;
use App\Enums\HttpStatusEnum;
use App\Helpers\ResponseHelper;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $e
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function render($request, Throwable $th)
    {
        if (!$request->wantsJson()) return parent::render($request, $th);

        $status  = $this->isHttpException($th) ? $th->getStatusCode() : HttpStatusEnum::INTERNAL_SERVER_ERROR;
        $message = trim($th->getMessage()) === '' ? null : $th->getMessage();
        $data    = null;
        if (config('app.debug')) {
            $dataDev = [
                'file'  => $th->getFile(),
                'line'  => $th->getLine(),
                'trace' => $th->getTrace(),
            ];
        }

        /*
         * ****************************************
         *   Most common errors handling
         * ****************************************
         */

        if ($th instanceof ValidationException) {
            $status  = HttpStatusEnum::UNPROCESSABLE_ENTITY;
            $message = 'Los datos recibidos son incorrectos';
            $data    = [
                'validation' => true,
                'errors'     => $th->errors(),
            ];

            return ResponseHelper::jsonError($message, $data, $status);
        }

        if ($th->getPrevious() instanceof ModelNotFoundException) {
            $status  = HttpStatusEnum::NOT_FOUND;
            $th      = $th->getPrevious();

            if (!$message) {
                $model = class_basename($th->getModel());
                $id    = $th->getIds()[0];
                $message = "No hay resultados para el modelo {$model} {$id}";
            }

            return ResponseHelper::jsonError($message, $data, $status);
        }

        if ($th instanceof AuthenticationException) {
            $status  = HttpStatusEnum::UNAUTHORIZED;
            if (!$message) $message = 'No autorizado';

            return ResponseHelper::jsonError($message, $data, $status);
        }

        if ($th instanceof AuthorizationException) {
            $status  = HttpStatusEnum::FORBIDDEN;
            if (!$message) $message = 'Acción prohibida';

            return ResponseHelper::jsonError($message, $data, $status);
        }

        if ($th instanceof NotFoundHttpException) {
            $status  = HttpStatusEnum::NOT_FOUND;
            if (!$message) $message = 'No se encontró';

            return ResponseHelper::jsonError($message, $data, $status);
        }

        if ($th instanceof MethodNotAllowedHttpException) {
            $status  = HttpStatusEnum::METHOD_NOT_ALLOWED;
            if (!$message) $message = 'Método no permitido';

            return ResponseHelper::jsonError($message, $data, $status);
        }

        if ($th instanceof UnprocessableEntityHttpException) {
            $status  = HttpStatusEnum::UNPROCESSABLE_ENTITY;
            $data = json_decode($th->getMessage(), true) ?? $th->getMessage();
            $message = $data['in'][0] ?? 'Los datos recibidos son incorrectos.';

            return ResponseHelper::jsonError($message, $data, $status);
        }

        if ($th instanceof HttpException) {
            $status  = $th->getStatusCode();
            if (!$message) $message = 'Error';

            return ResponseHelper::jsonError($message, $data, $status);
        }

        if ($th instanceof ThrottleRequestsException) {
            $status  = HttpStatusEnum::TOO_MANY_REQUESTS;
            if (!$message) $message = 'Demasiadas solicitudes';

            return ResponseHelper::jsonError($message, $data, $status);
        }

        if ($th instanceof QueryException) {
            $message = $th->getMessage();
            $code    = $th->errorInfo[1] == 2002 ? 500 : 409;

            return ResponseHelper::jsonError($message, $data, $code);
        }

        /*
         * ****************************************
         *  End Most common errors handling
         * ****************************************
         */

        $message = $message ?? $this->globalErrorMessage;
        if (!config('app.debug')) $data = $dataDev;

        return ResponseHelper::jsonError($message, $data, $status);
    }
}
