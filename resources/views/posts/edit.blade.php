@extends('layouts.app')

@section('content')
     @if (count($errors) > 0)
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

<!-- ここにページ毎のコンテンツを書く -->
 <h1>編集ページ</h1>

    <div class="row">
        <div class="col-6">
            <form action="{{ action('PostsController@update') }}" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    {!! Form::label('content', '説明') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {{ csrf_field() }}
                <input type="submit" value="更新する">
            </form>

        </div>
    </div>

@endsection