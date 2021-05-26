@if (count($posts) > 0)
    <ul class="list-unstyled">
        @foreach ($posts as $post)
            <li class="media mb-3">
                  　<div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {{--{!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id]) !!}--}}
                    </div>
                    <div class="container-fluid col-sm-6">
                        {{-- 投稿内容 --}}
                        <img src="{{ $post->image_path }}" class="img-fluid"><br>
                        <span class="text-muted">{{ $post->created_at }}</span>
                    </div>
                    <div class="col-sm-6">
                        <h5>Contents</h5>
                        <p class="mb-0">天気： {!! nl2br(e($post->weather)) !!}</p>
                        <p class="mb-0">最高気温： {!! nl2br(e($post->highTemperature)) !!}度</p>
                        <p class="mb-0">最低気温： {!! nl2br(e($post->lowTemperature)) !!}度</p>
                        <br>
                        <p class="mb-0"> {!! nl2br(e($post->content)) !!}</p>
                        <br>
                        
                        {{--{!! link_to_route('posts.detail', '編集する', ['post' => $post->id], ['class' => 'btn btn-light']) !!}--}}
            
                        {!! Form::model($post, ['route' => ['posts.delete', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除する', ['class' => 'btn btn-light']) !!}
                        {!! Form::close() !!}
                    </div>
            </li>
            <hr noshade>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $posts->links() }}
@endif