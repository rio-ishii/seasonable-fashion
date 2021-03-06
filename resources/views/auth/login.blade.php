@extends('layouts.app')

@section('content')
    <div class="text-center" style="padding-top: 5rem">
        <h1>ログイン</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2 text-center">{!! link_to_route('signup.get', 'アカウントをお持ちでない方') !!}</p>

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-dark btn-block']) !!}
            {!! Form::close() !!}

            
        </div>
    </div>
@endsection