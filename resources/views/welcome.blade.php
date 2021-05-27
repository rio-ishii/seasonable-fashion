@extends('layouts.app')

@section('content')
   @if (Auth::check())
        <div class="row" style="padding-top: 5rem">
            <div class="col-sm-8">--}}
                @if (count($posts) > 0)
                    {{-- 投稿一覧 --}}
                    @include('posts.posts')
                @else
                    <p class="text-center">まだ表示できる投稿がありません</p>
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron" style="padding-top: 5rem">
            <div class="text-center">
                <h1>Seasonable-fashion</h1>
                <p>気温と一緒にコーディネートを投稿してみましょう！</p>
                {{-- ユーザ登録ページへのリンク --}}
                <p>{!! link_to_route('signup.get', 'アカウント登録', [], ['class' => 'btn btn-lg btn-dark']) !!}</p>
                
                {{-- ログインページへのリンク --}}
                <p>{!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-dark']) !!}</p>
            </div>
        </div>
    @endif
@endsection