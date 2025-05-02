<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

// error 404, error 405
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

// error 401, error 403, error 429, error 503, error 419
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\ForbiddenHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ServicesUnavailableHtttpException;
use Symfony\Component\HttpKernel\Exception\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Session\TokenMismatchException;
// Import request Library
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Response;

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

        // $feeds = Blog::orderByRaw('(created_at) DESC')->take(8)->get();
        // View::share('feeds', $feeds);

        if ($exception instanceof HttpException && $exception->getStatusCode() == 400) {
            return response()->view('frontend.pages.errors.400', [], 400);
        }

        if($exception instanceof MethodNotAllowedHttpException){

            return response()->view('frontend.pages.errors.405', [], 405);
        }

        if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
            return response()->view('frontend.pages.errors.404', [], 404);
        }


        if($exception instanceof UnauthorizedHttpException){
            return response()->view('frontend.pages.errors.401', [], 401);
        }

        if($exception instanceof ForbiddenHttpException){
            return response()->view('frontend.pages.errors.403', [], 403);
        }

        if($exception instanceof TooManyRequestHttpException){
            return response()->view('frontend.pages.errors.429', [], 429);
        }

        if($exception instanceof ServicesUnavailableHtttpException){
            return response()->view('frontend.pages.errors.503', [], 503);
        }

        if($exception instanceof HttpExcetion && $exception->getStatusCode() === 500 || $this->isHttpException($exception) || $exception instanceof QueryException){
            return response()->view('frontend.pages.errors.500', [], 500);
        }

        if($exception instanceof AuthenticationException){
            return response()->view('frontend.pages.errors.429', [], 429);
        }

        if ($exception instanceof TokenMismatchException) {
            // Handle the 419 error here
            return response()->view('frontend.pages.errors.419', [], 419);
        }

        // Handle ValidationException
        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        if ($exception instanceof HttpException) {
            return response()->view('frontend.pages.errors.public', [], $exception->getStatusCode());
        }

        return parent::render($request, $exception);
    }


}
