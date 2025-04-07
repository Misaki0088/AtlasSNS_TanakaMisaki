<x-login-layout>
<div class="user-list">
    <div class="user-card">
        <h3>フォローリスト</h3>
            <div class="user_group">
                @foreach ($users as $user)<!-- フォローしている人 -->
                        <a href="{{ route('user-profile', ['id' => $user->id]) }}">
                    @if( $user->icon_image!="icon1.png")<!-- もしフォローしている人のアイコンがicon1じゃなかったら… -->
                        <img src="{{ asset('storage/' . $user->icon_image ) }}" height="60" width="60"><!-- ストレージに入っているアイコンを表示してくれ -->
                    @else
                        <img src="{{ asset('images/icon1.png') }}"><!-- ストレージにはいっていなかったらicon1を表示させてくれ -->
                    @endif
                        </a>
                @endforeach
            </div>
    </div>
</div>

@foreach ($posts as $post)
    <div class="user">
        <div class ="follows_name_time">
            <div class="follows_icon">
                <!-- ユーザーアイコンの表示 -->
                @if( $post->user->icon_image!="icon1.png")
                    <a href="{{ route('user-profile', ['id' => $post->user->id]) }}">
                    <img src="{{ asset('storage/' . $post->user->icon_image) }}" height="60" width="60">
                @else
                    <img src="{{ asset('images/icon1.png') }}">
                @endif
                    </a>
            </div>
                <p class="username">{{ $post->user->username }}</p> <!-- ユーザー名 -->
                <p class="post-date">{{ $post->created_at }}</p><!-- 投稿日付 -->
            </div>
            <div class="follows_post">
                <p>{{ $post->post }}</p> <!-- 投稿内容 -->
            </div>
    </div>
@endforeach
</x-login-layout>
