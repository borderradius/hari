<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     * 여기에 예외 이름을 등록하면 해당하는 예외는 로그에 기록되지 않고 정의한 보고 로직도 타지 않는다.
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
     * Report or log an exception. 예외를 보고하는 메서드
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.  예외를 화면에 표시하는 메서드, 오류나 에러가 발생했을 때 브라우저에서 볼 수 있는 화면은 이 메서드가 반환한 것.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (app()->environment('production')) {
            if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response(view('errors.notice', [
                    'title' => '찾을 수 없습니다.',
                    'description' => '죄송합니다! 요청하신 페이지가 없습니다.'
                ]), 404);
            }
        }

        return parent::render($request, $exception);
    }
}
