<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


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

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::oldest()->get()
    ]);
});


Route::get('posts/{post:slug}', function (Post $post) {
    //======20강. 수정본 =========//
    // $id 대신 Post 모델의 $post 아이디를 사용함
    // return view('post', [
    //     'post' => $post
    // ]);

    //===23강. Post::where('slug')
    return view('post', [
        'post' => $post
    ]);


    //======20강. 수정본 =========//
    // return view('post', [
    //     'post' => Post::findOrFail($id)
    // ]);
    //something부분에서 받은 걸 $address 변수로 받을 수 있는 것 같음.

    //주소는  / 기본이 public이므로  기본에서 ../ 상위 폴더로 올라가서 rosources로 들어가는 식으로 진행
    // $path = __DIR__ . "/../resources/posts/{$address}.html";

    // if (! file_exists($path)) {
        // dd("존재하지 않는 경로입니다. 경로를 확인하세요.")
        // ddd("존재하지 않는 경로입니다. 경로를 확인하세요.")
        // abort(404);
    //     return redirect('/posts');
    // }

    //얻은 컨텐츠를 $post변수에 저장
    // $post = file_get_contents($path);

    //post.blade.php파일을 보여주는데, post에 post변수를 넣어줌.
    // return view('post', [
        // var_dump($post)
    //     'post' => $post
    // ]);

    //======10강. 수정본 ========//

    //파일 존재하는 지 확인하고 path 변수 설정
    // if (! file_exists($path = __DIR__ . "/../resources/posts/{$address}.html")) {
    //     return redirect('/posts');
    // }

    //something 와일드카드 변수 설정 cache함수로
    // $something = cache()->remember("posts.{$address}", 3, function() use ($path) {
    //     var_dump($path);
    //     return file_get_contents($path);
    // });
    // $something = cache()->remember("posts.{$address}", 3, fn() => file_get_contents($path));

    // return view('post', [
    //     'post' => $something
    // ]);


    //======11강. 수정본 ========//

//     return view('post', [
//         'post' => Post::find($slug)
//     ]);
// })->where('post', '[A-z-_/0-9]+');


    //======16강. 수정본 ========//
    // $post = Post::findOfFail($slug);

    // return view('post', [
    //     'post' => $post
    // ]);

});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', ['posts'=>$author->posts]);
});
