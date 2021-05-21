@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded img-fluid" alt="">
                    </div>
                </div>
                <div>
                     {!! link_to_route('posts.create','新規投稿', [], ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </aside>
            <div class="col-sm-8">
                @if (count($posts) > 0)
                    {{-- 投稿一覧 --}}
                    @include('posts.posts')
                @else
                    <p>まだ表示できる投稿がありません</p>
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Seasonable-fashion</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'アカウント登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
                {{-- ログインページへのリンク --}}
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection