@if (count($posts) > 0)
    <ul class="list-unstyled">
        @foreach ($posts as $post)
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
                            {{--{!! link_to_route('posts.detail', '編集する', ['post' => $post->id], ['class' => 'btn btn-light']) !!}--}}
                        <p>@include('favorites.favorite_button')</p>
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
            </li>
            <hr noshade>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $posts->links() }}
@endif