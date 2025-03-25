<x-login-layout>
    <h2>フォローリスト</h2>
    <div class="user-list">
    @foreach ($users as $user)<!-- フォローしている人 -->
    <div>
    <div class="user-card">
        <a href="{{ route('user-profile', ['id' => $user->id]) }}">
        @if( $user->icon_image!="icon1.png")<!-- もしフォローしている人のアイコンがicon1じゃなかったら… -->
        <img src="{{ asset('storage/' . $user->icon_image) }}"><!-- ストレージに入っているアイコンを表示してくれ -->
        @else
        <img src="{{ asset('images/icon1.png') }}"><!-- ストレージにはいっていなかったらicon1を表示させてくれ -->
        @endif
    @endforeach
    </div>
    @foreach ($users as $user)
    <!-- ユーザーアイコンの表示 -->
    <div>

    @if( $user->icon_image!="icon1.png")
        <img src="{{ asset('storage/' . $user->icon_image) }}">
    @else
        <img src="{{ asset('images/icon1.png') }}">
    @endif
    <p class="username">{{ $user->username }}</p> <!-- ユーザー名 -->
        @foreach ($posts as $post)
            @if ($post->user_id === $user->id)
            <div class="post">
                    <p>{{ $post->post }}</p> <!-- 投稿内容 -->
                    <p class="post-date">{{ $post->created_at }}</p><!-- 投稿日付 -->
                </div>
            @endif
        @endforeach
                </div>
    @endforeach
</x-login-layout>
