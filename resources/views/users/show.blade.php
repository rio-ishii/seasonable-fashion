@extends('layouts.app')

@section('content')
    <div class="row" style="padding-top: 5rem">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 100]) }}" alt="">
                </div>
            </div>
            @if (Auth::id() == $user->id)
            <p><div class="text-center">
                {!! link_to_route('newpost.get', '新規投稿', [], ['class' => 'btn btn-lg btn-dark']) !!}
            </div>
            </p>
            @endif
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                {{-- 投稿一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
                        投稿一覧
                    </a>
                </li>
                {{--<li class="nav-item">
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
                        いいね一覧
                    </a>
                </li>--}}
            </ul>
            @if (count($posts) > 0)
                {{-- 投稿一覧 --}}
                @include('posts.posts')
            @else
                <p>まだ投稿がありません</p>
                @if (Auth::id() == $user->id)
                {!! link_to_route('newpost.get','コーディネートを投稿してみる', [], ['class' => 'btn btn-dark']) !!}
                @endif
            @endif
        </div>
    </div>
@endsection
