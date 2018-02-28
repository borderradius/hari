<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // 엘로퀀트는 모든테이블에 create_at, updated_at 컬럼이 있다고 가정한다.
    public $timestamps = false;
    // 입력을 허용할 열을 지정함. 화이트리스트 방식
    protected $fillable = ['email', 'password'];
}
