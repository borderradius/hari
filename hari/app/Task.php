<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // 보통 모델명은 테이블명의 단수로 작명한다
    // 테이블이 tasks 라면 모델은 Task
    // StudlyCase 형식으로 만든다
    // protected $table = '관례를 따르지 않고 지은 테이블명 명시';

    // 이 모델이 sqlite를 사용할 경우 이곳에 명시
    // protected $connection = 'sqlite';

    // eloquent는 기본 키 컬럼으로 id라는 이름의 컬럼을 사용.
    // 만일 id가 아닌 다른 컬럼이 기본키라면 아래처럼 설정
    // protected $primaryKey = 'task_id';

    // eloquent는 모든 테이블에 레코드의 생성일을 담고 있는 create_at 컬럼과 
    // 레코드의 최종 갱신일을 담고있는 updated_at 이라는 두개의 DATETIME 컬럼이 있다고 가정한다.
    // 만약 이 컬럼이 없는 테이블일 경우 INSERT / UPDATE 가 실패하므로
    // $timestamps 변수를 false로 설정
    // public $timestamps = 'false';

    // eloquent는 created_at, updated_at 같은 DATETIME컬럼이 있을경우
    // PHP의 DateTime 클래스를 상속받은 Carbon클래스로 만들어주므로 쉽게 날짜와 시간을 다룰 수 있다.
    // 별도의 DATETIME 컬럼이 있을경우 $dates 배열에 추가만해주면 된다.
    // protected $dates = ['due_date', 'assigned_date'];
    // protected $dateFormat = 'Y-m-d H:i:s';
}
