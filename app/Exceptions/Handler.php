<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        // ضع هنا أنواع الاستثناءات التي لا تريد الإبلاغ عنها
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    public function register(): void
    {
        $this->renderable(function (Throwable $e, $request) {
            // إذا كان الطلب من نوع API
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                    'code' => $e->getCode() ?: 500,
                ], $e->getCode() ?: 500);
            }

            // إذا كان الطلب من خلال Blade أو متصفح
            return response()->view('errors.custom', [
                'message' => $e->getMessage(),
                'code' => $e->getCode() ?: 500,
            ], $e->getCode() ?: 500);
        });
    }

    public function render($request, Throwable $exception)
{
    if ($request->expectsJson()) {
        return response()->json([
            'success' => false,
            'message' => $exception->getMessage(),
            'code' => $exception->getCode() ?: 500,
        ], $exception instanceof \Illuminate\Http\Exceptions\HttpResponseException ? $exception->getStatusCode() : 500);
    }
    if ($exception instanceof AccessDeniedHttpException) {
        return response()->json([
            'message' => 'You do not have permission to perform this action.',
            'type' => 'error',
            'code' => Response::HTTP_FORBIDDEN,
        ], Response::HTTP_FORBIDDEN);
    }


    return parent::render($request, $exception);
}

}
