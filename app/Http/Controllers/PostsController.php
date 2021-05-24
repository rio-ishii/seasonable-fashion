<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Storage;

class PostsController extends Controller
{
    
    public function index(Request $request)
   {
    //$posts = Post::all();

    //return view('posts.index', ['posts' => $posts]);
    
        $data = [];
            if (\Auth::check()) { // 認証済みの場合
                // 認証済みユーザを取得
                $user = \Auth::user();
                // ユーザの投稿の一覧を作成日時の降順で取得
                // （後のChapterで他ユーザの投稿も取得するように変更しますが、現時点ではこのユーザの投稿のみ取得します）
                $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);

                $data = [
                    'user' => $user,
                    'posts' => $posts,
                ];
            }

            // Welcomeビューでそれらを表示
            return view('welcome', $data);
    }//
    
    public function add()
  {
      return view('posts.create');
  }

    public function create(Request $request)
  {
      $post = new Post;
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('image');
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
      // アップロードした画像のフルパスを取得
      $post->image_path = Storage::disk('s3')->url($path);
      $post->content = "a";
      $post->temperature = 22;
      $post->user_id = \Auth::user()->id;
      $post->save();
            
       //   /mypage へルーティングしているメソッドまで遷移する
      //   web.php の定義より、PostsController@show に遷移する
      return redirect()->route('users.show', ['user' => \Auth::user()]);

   }
     
    public function show()
    {
        return view('posts.create');
    } 
     
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->posts()->create([
            'image_path' => $request->image_path,
            'content' => $request->content,
            'temperature' => $request->temperature,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $post = \App\Post::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }

}
