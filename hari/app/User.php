<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable. 데이터 추가가 가능한 컬럼 설정, 대량 할당이 가능하다.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays. App\User::get() 조회쿼리에서 조회하지 않을 열 지정. 즉 조회할 때 값을 가져오지 않겠다는 것.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $date = ['last_login'];

    public function articles()
    {
        return $this->hasMany(Article::class); // 나는 여러개의 article을 가지고 있어.
    }

}
