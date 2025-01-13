        <div id="head">
            <h1><a><img src="images/atlas.png"></a></h1>
            <div id="">
                <div id="clear">
                    @if (session('username'))
                    <p>{{ session('username') }}さん</p>
                    @endif
                </div>
                <ul>
                    <li><a href="top">ホーム</a></li>
                    <li><a href="profile">プロフィール</a></li>
                    <li><a href="logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
