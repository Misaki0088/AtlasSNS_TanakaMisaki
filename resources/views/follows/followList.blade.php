<x-login-layout>
<div class="user-list">
    <div class="user-card">
        <h3>フォローリスト</h3>
            <div class="user_group">
                @foreach ($users as $user)<!-- フォローしている人 -->
                <a href="{{ route('user-profile', ['id' => $user->id]) }}"></a>
                @if( $user->icon_image!="icon1.png")<!-- もしフォローしている人のアイコンがicon1じゃなかったら… -->
                <img src="{{ asset('storage/' . $user->icon_image ) }}" height="60" width="60"><!-- ストレージに入っているアイコンを表示してくれ -->
                @else
                <img src="{{ asset('images/icon1.png') }}"><!-- ストレージにはいっていなかったらicon1を表示させてくれ -->
                @endif
                @endforeach
            </div>
    </div>
</div>

<div class="user">
    @foreach ($users as $user)
    <!-- ユーザーアイコンの表示 -->
    @if( $user->icon_image!="icon1.png")
        <img src="{{ asset('storage/' . $user->icon_image) }}" height="60" width="60">
    @else
        <img src="{{ asset('images/icon1.png') }}">
    @endif
    <p class="username">{{ $user->username }}</p> <!-- ユーザー名 -->

    @foreach ($posts as $post)
            @if ($post->user_id === $user->id)
            <div class="follows_post">
                    <p>{{ $post->post }}</p> <!-- 投稿内容 -->
                    <p class="post-date">{{ $post->created_at }}</p><!-- 投稿日付 -->
            </div>
            @endif
        @endforeach
    @endforeach
</div>
</x-login-layout>
