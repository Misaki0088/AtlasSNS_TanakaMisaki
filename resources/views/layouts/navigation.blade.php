        <div id="head">
            <h1><a href="{{ route('top') }}"><img src="../images/atlas.png"></a></h1>
            <div id="">
                <div id="clear">
                    @if (session('username'))
                    <p>{{ session('username') }}さん</p>
                    @endif
                </div>
                </div>
                <ul>
            <li>
        <a class="toggle"></a>
                <ul class="link">
                    <li><a href="{{ route('top') }}">ホーム</a></li>
                    <li><a href="{{ route('profile') }}">プロフィール</a></li>
                    <li><a href="logout">ログアウト</a></li>
                </ul>
                </ul>
            </li>
            </div>
        </div>
