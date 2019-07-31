<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Omnipay\Common\Exception\InvalidCreditCardException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {  
        if($exception instanceOf TokenExpiredException)
        {
            return response()->json(['error'=>'Token Expired']);
            
        }
        if($exception instanceOf NotFoundHttpException)
        {
            //dd($exception);
            if($request->expectsJson())
            {
                return response()->json(['error'=>'Page Not Found']);
            }
           else
            {
                return redirect('/404');
            }
        }
        if($exception  instanceOf QueryException )
        {
            if($request->expectsJson())
            {
                return response()->json('You Have exception on query'.$exception->getMessage());
            }
            else {
                 return $exception->getMessage();
            }
        }
        if($exception instanceof InvalidCreditCardException)
        {
            return $exception->getMessage();
        }
        return parent::render($request, $exception);
    }
}
