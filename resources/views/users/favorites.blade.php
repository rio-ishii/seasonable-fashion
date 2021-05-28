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
                        <span class="badge badge-secondary">{{ $user->posts_count }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.favorites') ? 'active' : '' }}">
                        いいね一覧
                        <span class="badge badge-secondary">{{ $user->favorites_count }}</span>
                    </a>
                </li>
            </ul>
            @if (count($favorites) > 0)
                <ul class="list-unstyled">
                    @foreach ($favorites as $post)
                    <li class="media mb-3">
                        <p><div class="container-fluid col-sm-5">
                            {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            <p>{!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id]) !!}</p>
                            {{-- 投稿内容 --}}
                            <img src="{{ $post->image_path }}" class="img-fluid"><br>
                            <span class="text-muted">{{ $post->created_at }}</span>
                        </div></p>
                        <div class="col-sm-6">
                            <h5>Contents</h5>
                            <p class="mb-0">天気： {!! nl2br(e($post->weather)) !!}</p>
                            <p class="mb-0">最高気温： {!! nl2br(e($post->highTemperature)) !!}度</p>
                            <p class="mb-0">最低気温： {!! nl2br(e($post->lowTemperature)) !!}度</p>
                            <br>
                            <p class="mb-0"> {!! nl2br(e($post->content)) !!}</p>
                            <br>
                        </div>
                        <div class="col-sm-1">
                            <p>@include('favorites.favorite_button')</p>
                            <div>
                                @if (Auth::id() == $user->id)
                                    <form action="{{ route('posts.delete',$post->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @else
                        
                                @endif
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                {{-- ページネーションのリンク --}}
                {{ $favorites ->links() }}
            @endif
        </div>
    </div>
@endsection