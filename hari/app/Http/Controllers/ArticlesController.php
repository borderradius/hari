<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = \App\Article::with('user')->get(); // N+1쿼리 해결방법은 with()메서드의 인자로 관계를 미리 로드. with('user')에서 user는 Article모델이 가진 관계표현 메서드
        $articles = \App\Article::latest()->paginate(3);

        // $articles = \App\Article::get();
        // user() 관계가 필요없는 다른 로직 수행
        // $articles->load('user');
        // dd(view('articles.index', compact('articles'))->render()); // render()는 뷰 인스턴스에 저장된 HTML코드를 출력해준다.
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        $article = \App\User::find(1)->articles()->create($request->all());
        // 유효성 검사규칙
        // $rules = [
        //     'title' => ['required'],
        //     'content' => ['required', 'min:10'],
        // ];

        // $messages = [
        //     'title.required' => '제목은 필수 입력 항목입니다.',
        //     'content.required' => '본문은 필수 입력 항목입니다.',
        //     'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.',
        // ];

        // $validator = \Validator::make($request->all(), $rules, $messages);
        // $this->validate($request, $rules, $messages); // 트레이트이용

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }

        
        if (! $article) {
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }

        // dump('이벤트를 던집니다.');
        // event('article.created', [$article]);
        // event(new \App\Events\ArticleCreated($article));
        // dump('이벤트를 던졌습니다.');

        event(new \App\Events\ArticlesEvent($article));
        

        return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = \App\Article::findOrFail($id);

        debug($article->toArray());

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __METHOD__ . '은 다음 기본키를 가진 Article 모델을 수정하기 위한 폼을 담은 뷰를 반환합니다.' . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return __METHOD__ . '은 사용자의 입력한 폼 데이터로 다음 기본 키를 가진 Article 모델을 수정합니다.' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __METHOD__ . '은 다음 기본키를 가진 Article 모델을 삭제합니다.' . $id;
    }
}
