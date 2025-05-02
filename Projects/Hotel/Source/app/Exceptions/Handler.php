<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;


// error 404, error 405
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

// error 401, error 403, error 429, error 503
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\ForbiddenHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ServicesUnavailableHtttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


        public function render($request, Throwable $exception){

        // Check Exception code

        if($exception instanceof NotFoundHttpException){
            // Handle incorrect Pages, not founded
            return response()->view('frontend.pages.error.404', [], 404);
        }

        if($exception instanceof MethodNotAllowedHttpException){
            // Handle incorrect request methods, {delete, post. get, put}
            return response()->view('frontend.pages.error.error', [], 405);
        }


        if($exception instanceof UnauthorizedHttpException){
            // Handle cases where auth is required, but failed , or has not been provided
            return response()->view('frontend.pages.error.error', [], 401);
        }


        if($exception instanceof ForbiddenHttpException){
            // Handle cases where the client doesn't have necessary permissions for visit resouces.
            return response()->view('frontend.pages.error.error', [], 403);
        }

        if($exception instanceof TooManyRequestHttpException){
            // Handle cases where many requests has been send to the server in a given amount of time.
            return response()->view('frontend.pages.error.error', [], 429);
        }

        if($exception instanceof ServicesUnavailableHtttpException){
            // Handle cases where the server is temporarily unable to handle the reuqest.
            return response()->view('frontend.pages.error.error', [], 503);
        }

        if($exception instanceof HttpExcetion && $exception->getStatusCode() === 500 ){
            // Handle generally internal server {errors}.
            return response()->view('frontend.pages.error.error', [], 500);
        }

        return parent::render($request, $exception);
    }


}
