<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Jiannei\Response\Laravel\Support\Traits\ExceptionTrait;

class Handler extends ExceptionHandler
{
    use ExceptionTrait;

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

    public function render($request, Throwable $exception)
    {

        if($request->is("api/*") || $request->is("notify/*")){

            if($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException ){
                $code = 404;
                $message = "NotFoundHttpException";
            }else if($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException){
                $code = 500;
                $message = "MethodNotAllowedHttpException";
            }else if($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException){
                $code = 404;
                $message = "数据不存在";
            }else if($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException){
                //abort
                $code = $exception->getStatusCode();
                $message = $exception->getMessage()?:"异常数据";
            }else {
                $code = $exception->getCode();
                $message = $exception->getMessage()?:"异常数据";
            }
            return $this->fail($code,$message);
        }

        return parent::render($request, $exception);

    }

    public function fail($code=500,$message='error',$array=[],$http=200)
    {
        return response()->json([
            'status' => 'fail',
            'code' => $code,
            'message' => $message,
            'error' => (object)$array,
            'data' => (object)[],
        ],$http);
    }
}
