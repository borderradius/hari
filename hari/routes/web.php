<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// with()를 이용한 데이터바인딩
// Route::get('/', function () {
//     return view('welcome')->with([
//         'name' => 'Foo',
//         'greeting' => '안녕하세요!'
//     ]);
// });
// view의 두번째 인자로 넘기기
// Route::get('/', function () {
//     return view('welcome', [
//         'name' => 'Foo',
//         'greeting' => '안녕하세요!',
//         'items' => [
//             'apple',
//             'banana',
//             'orange'
//         ]
//     ]);
// });

// // URL 파라미터를 정규식으로 강제
// Route::pattern('foo', '[0-9a-zA-Z]{3}');
// Route::get('/{foo?}', function ($foo = 'bar') {
//     return $foo;
// });

// // URL 패턴대신 where() 체인
// Route::get('/{foo?}', function ($foo = 'bar') {
//     return $foo;
// })->where('foo', '[0-9a-zA-Z]{3}');

// // 라우트에 이름을 부여하여 다른 라우트로 리디렉션
// Route::get('/', [
//     'as' => 'home',
//     function() {
//         return 'my name is home';
//     }
// ]);
// Route::get('/home', function() {
//     return redirect(route('home'));
// });
// Route::get('hello/sub',function(){
//     return view('hello/sub');
// });

Route::get('/', 'WelcomeController@index');
Route::resource('articles', 'ArticlesController');

// Route::get('auth/login', function() {
//     $credentials = [
//         'email' => 'john@example.com',
//         'password' => 'password'
//     ];

//     if (! auth()->attempt($credentials)) {
//         return '로그인 정보가 정확하지 않습니다.';
//     }

//     return redirect('protected');
// });

// Route::get('protected', function() {
//     dump(session()->all());

//     if (! auth()->check()) {
//         return '누구세요?';
//     }

//     return '어서오세요' . auth()->user()->name;
// });
// Route::get('protected', ['middleware' => 'auth', function() {
//     dump(session()->all());

//     return '어서오세요' . auth()->user()->name;
// }]);

// Route::get('auth/logout', function() {
//     auth()->logout();

//     return '또 봐요~';
// });

// Route::get('auth/logout', function() {
//     auth()->logout();

//     return '또 봐요';
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * 디비 이벤트 리스너, 데이터베이스에 이벤트가 발생할 때 데이터베이스 쿼리를 감시할 수 있는 방법.
 */
// DB::listen(function($query) {
//     dump($query->sql);
// });

/**
 * 이벤트 받는 곳
 */
// Event::listen('article.created', function($article) {
//     var_dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
//     var_dump($article->toArray());
// });


/**
 * 메일 메시지 만들기
 */
Route::get('mail', function() {
    $article = App\Article::with('user')->find(1);

    // ver. 1        
    return Mail::send(
        'emails.articles.created',
        compact('article'),
        function ($message) use ($article) {
            $message->to('spacemonkey925@gmail.com');
            // $message->to('nisino@naver.com');
            $message->subject('새 글이 등록되었습니다 -' . $article->title);
        }
    );

    // ver. 2
    // return Mail::send(
    //     'emails.articles.created',
    //     compact('article'),
    //     function ($message) use ($article) {
    //         $message->from('nisino@naver.com','Goo');
    //         $message->to(['spacemonkey925@gmail.com', 'qskyq@hanmail.net']);
    //         $message->subject('새 글이 등록완료 -' . $article->title);
    //         $message->cc('qskyq@hanmail.net');
    //         $message->attach(storage_path('bag.jpg'));
    //     }
    // );

});

// 컴포넌트 가져오기 실습 I
// Route::get('markdown', function() {
//     $text =<<<EOT
// # 마크다운 예제 1

// 이 문서는 [마크다운][1]으로 썼습니다. 화면에는 HTML로 변환되어 출력됩니다.

// ## 순서 없는 목록

// - 첫 번째 항목
// - 두 번째 항목[^1]

// [1]: http://daringfireball.net/projects/markdown

// [^1]: 두 번째 항목_ http://google.com
// EOT;

//     return app(ParsedownExtra::class)->text($text);
// });