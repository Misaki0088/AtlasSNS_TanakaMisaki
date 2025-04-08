<div id="head">
    <div class="atlas">
        <a href="{{ route('top') }}"><img src="../images/atlas.png"></a>
        </div>
            <p class="name">{{ Auth::user()->username }}さん</p>
        <div class="accordion-menu">
            <span class="accordion"></span>
            <div class="accordion-content">
                <ul>
                    <li><a href="{{ route('top') }}">HOME</a></li>
                    <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
                    <li><a href="{{ route('logout') }}">ログアウト</a></li>
                </ul>
            </div>
        </div>
                    <!-- ユーザー名とアイコン -->
                    @if( Auth::user()->icon_image!="icon1.png")
                        <img src="{{ asset('storage/' . Auth::user()->icon_image ) }}"class="header-icon">
                    @else
                        <img src="{{ asset('images/icon1.png') }}"class="header-icon">
                    @endif
</div>
