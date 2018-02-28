<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    /**
     * article과는 다대다 관계이므로 서로 복수형의 메서드를 가지면 될 것 같다.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class); // 나는 여러개의 article에 소속됩니다. 
    }
}
