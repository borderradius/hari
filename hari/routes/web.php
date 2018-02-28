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
