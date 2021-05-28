<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">Seasonable-fashion</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item">{!! link_to_route('newpost.get', '新規投稿', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザー', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()],  ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                {{--@else
                    {{-- ユーザ登録ページへのリンク --}}
                    {{--<li class="nav-item">{!! link_to_route('signup.get', 'アカウント登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    {{--<li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>--}}
                @endif
            </ul>
        </div>
    </nav>
</header>