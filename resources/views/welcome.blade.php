@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Seasonable-fashion</h1>
             {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'アカウント登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection
