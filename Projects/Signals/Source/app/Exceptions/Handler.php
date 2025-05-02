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

// Import request Library
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

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


        if($exception instanceof MethodNotAllowedHttpException){
            // Handle incorrect request methods, {delete, post. get, put}
            if (($request->user() && in_array($request->user()->role, ['user', 'premium']))) {
                return response()->view('frontend.errors.405', [], 405);
            }else{
                return response()->view('backend.errors.405', [], 405);
            }
        }

        if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
            // Handle generally internal server {errors}.
            if (($request->user() && in_array($request->user()->role, ['user', 'premium']))) {
                return response()->view('frontend.errors.404', [], 404);
            }else{
                return response()->view('backend.errors.404', [], 404);
            }
        }


        if($exception instanceof UnauthorizedHttpException){
            // Handle cases where auth is required, but failed , or has not been provided
            if (($request->user() && in_array($request->user()->role, ['user', 'premium']))) {
                return response()->view('frontend.errors.401', [], 401);
            }else{
                return response()->view('backend.errors.401', [], 401);
            }
        }

        if($exception instanceof ForbiddenHttpException){
            // Handle cases where the client doesn't have necessary permissions for visit resouces.
            if (($request->user() && in_array($request->user()->role, ['user', 'premium']))) {
                return response()->view('frontend.errors.403', [], 403);
            }else{
                return response()->view('backend.errors.403', [], 403);
            }
        }

        if($exception instanceof TooManyRequestHttpException){
            // Handle cases where many requests has been send to the server in a given amount of time.
            if (($request->user() && in_array($request->user()->role, ['user', 'premium']))) {
                return response()->view('frontend.errors.429', [], 429);
            }else{
                return response()->view('backend.errors.429', [], 429);
            }
        }

        if($exception instanceof ServicesUnavailableHtttpException){
            // Handle cases where the server is temporarily unable to handle the reuqest.
            if (($request->user() && in_array($request->user()->role, ['user', 'premium']))) {
                return response()->view('frontend.errors.503', [], 503);
            }else{
                return response()->view('backend.errors.503', [], 503);
            }
        }

        if($exception instanceof HttpExcetion && $exception->getStatusCode() === 500 || $this->isHttpException($exception)){
            // Handle generally internal server {errors}.
            if (($request->user() && in_array($request->user()->role, ['user', 'premium']))) {
                return response()->view('frontend.errors.500', [], 500);
            }else{
                return response()->view('backend.errors.500', [], 500);
            }
        }

        if($exception instanceof AuthenticationException){
            // Handle generally internal server {errors}.
            if (($request->user() && in_array($request->user()->role, ['user', 'premium']))) {
                return response()->view('frontend.errors.419', [], 419);
            }else{
                return response()->view('backend.errors.419', [], 419);
            }
        }

        if (!$request->user() && 
            strpos($request->path(), 'admin') !== false || 
            strpos($request->path(), 'user') !== false || 
            strpos($request->path(), 'premium') !== false || 
            strpos($request->path(), 'expert') !== false) {

        toastr()->error('Session Timeout, Login Again!', 'Error!');

        return Redirect::to('/login');
        }

        return parent::render($request, $exception);
    }


}
