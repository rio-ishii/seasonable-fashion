@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>アカウント登録</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {{-- ログインページへのリンク --}}
            <p class="mt-2 text-center">{!! link_to_route('login', 'すでにアカウントをお持ちの方') !!}</p>

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                 {!! Form::label('gender', '性別') !!}
                <input type="radio" name="gender" value="1" /> 男　
                <input type="radio" name="gender" value="2" /> 女

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-dark btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection