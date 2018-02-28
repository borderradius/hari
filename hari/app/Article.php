<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content'];

    /** 
     * 일대다의 관계에서 일이 되는 모델, 즉 Article 모델은 단수의 메서드, user()를 가짐.
     * 다가 되는 모델, User 모델은 복수의 메서드, articles()를 가짐
     */
    public function user()
    {
        // return $this->belongsTo(User::class, 'author_id'); // 엘로퀀트는 모델이름으로 외래 키의 열 이름을 추정한다. User모델의 외래키 -> user_id, 만일 외래키의 열이름이 다르다면 두번째 인자로 명시해줘야함
        return $this->belongsTo(User::class); // 나는 user 소속입니다. 왜냐하면 user는 article을 여러개 가질 수 있으므로 상위개념. 
    }

    /**
     * 다대다 관계이므로 복수의 메소드
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class); // 다수의 tag와 관계를 맺는다.
    }
}
