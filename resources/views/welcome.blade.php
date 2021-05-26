@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row" style="padding-top: 5rem">
            {{--<aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded img-fluid" alt="">
                    </div>
                </div>
                <br>
                <div class="text-center">
                    {!! link_to_route('newpost.get', '新規投稿', [], ['class' => 'btn btn-lg btn-dark']) !!}
                </div>
            </aside>
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
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Seasonable-fashion</h1>
                <p>気温と一緒にコーディネートを投稿してみましょう！</p><br>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'アカウント登録', [], ['class' => 'btn btn-lg btn-dark']) !!}
                <br><br>
                {{-- ログインページへのリンク --}}
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-dark']) !!}
            </div>
        </div>
    @endif
@endsection