@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
 <h1>投稿詳細</h1>

    <div>
        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
        {!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id]) !!}
        <span class="text-muted">posted at {{ $post->created_at }}</span>
    </div>
    <div>
        {{-- 投稿内容 --}}
        <p class="mb-0">{!! nl2br(e($post->content)) !!}</p>
    </div>

    {!! link_to_route('posts.edit', 'この投稿を編集', ['post' => $post->id], ['class' => 'btn btn-light']) !!}
    
   
    {!! Form::model($post, ['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
        {!! Form::submit('この投稿を削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    

@endsection