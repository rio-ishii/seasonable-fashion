@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
 <h1>投稿詳細</h1>

    

    {!! link_to_route('posts.edit', 'この投稿を編集', ['post' => $post->id], ['class' => 'btn btn-light']) !!}
    
   
    {!! Form::model($post, ['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
        {!! Form::submit('この投稿を削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    

@endsection