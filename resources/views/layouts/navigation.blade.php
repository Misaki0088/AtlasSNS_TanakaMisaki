        <div id="head">
            <h1><a href="{{ route('top') }}"><img src="../images/atlas.png"></a></h1>
            <div id="">
                <div id="clear">
                    @if (session('username'))
                    <p>{{ session('username') }}さん</p>
                    @endif
                </div>
            <div class="accordion">
                <div class="accordion-menu">
                    <ul class="link accordion-content">
                        <li><a href="{{ route('top') }}">ホーム</a></li>
                        <li><a href="{{ route('profile') }}">プロフィール</a></li>
                        <li><a href="logout">ログアウト</a></li>
                    </ul>
            </div>
        </div>
