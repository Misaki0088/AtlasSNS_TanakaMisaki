        <div id="head">
            <h1><a href="{{ route('top') }}"><img src="../images/atlas.png" style="width: 10%; height: auto;"></a></h1>
                <div id="clear">
                    @if (session('username'))
                    <p>{{ session('username') }}さん</p>
                    @endif
                </div>
                <div class="accordion-menu">
                <span class="accordion"></span>
                    <ul class="accordion-content">
                        <li><a href="{{ route('top') }}">HOME</a></li>
                        <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
                        <li><a href="logout">ログアウト</a></li>
                    </ul>
        </div>
        </div>