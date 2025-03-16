<div id="head">
    <div id="clear">
        <h1><a href="{{ route('top') }}"><img src="../images/atlas.png"></a></h1>
            <p class="name">{{ Auth::user()->username }}さん</p>
                <div class="header-icon">
                    <!-- ユーザー名とアイコン -->
                    @if( Auth::user()->icon_image!="icon1.png")
                        <img src="{{ asset('storage/' . Auth::user()->icon_image ) }}">
                    @else
                        <img src="{{ asset('images/icon1.png') }}">
                    @endif
                </div>
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
