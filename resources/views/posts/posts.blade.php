@if (count($posts) > 0)
    <ul class="list-unstyled">
        @foreach ($posts as $post)
            <li class="media mb-3">
                  　<div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id]) !!}
                        
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <img src="{{ $post->image_path }}" class="img-fluid" alt="Responsive image">
                        <p class="mb-0">{!! nl2br(e($post->content)) !!}</p>
                        <p class="mb-0">{!! nl2br(e($post->highTemperature)) !!}</p>
                        <p class="mb-0">{!! nl2br(e($post->lowTemperature)) !!}</p>
                    </div>
                    <div>
                        {!! link_to_route('posts.detail', '詳しく見る', ['post' => $post->id], ['class' => 'btn btn-light']) !!}
                    </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $posts->links() }}
@endif