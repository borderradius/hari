<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     * 라라벨에 뭔가 등록하기 위한 메서드.
     * 라라벨의 다른 서비스를 쓰지 않도록 주의.
     * 예를 들어 이벤트 처리 로직을 여기에 써서는 안된다.
     * 왜냐하면 이벤트 서비스가 아직 초기화되지 않았을 수 있기 때문.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            // 라라벨 어플리케이션에 새로운 서비스 프로바이더를 등록한다. 
            // 라라벨이 부팅할 때 config/app.php 파일에 선언한 AppServiceProvider 가 실행되고 \Barryvdh\Debugbar\ServiceProvider::class 가 등록된다.
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class); 
        }
    }
}
