<x-login-layout>
  <h2>フォローリスト</h2>
  @foreach ($users as $user)<!-- フォローしている人 -->
    <div>
    @if( $user->icon_image!="icon1.png")<!-- フォローしている人のアイコンがicon1じゃなかったら… -->
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
        <p>{{ $user->username }}</p> <!-- ユーザー名 -->
        @foreach ($posts as $post)
            @if ($post->user_id === $user->id)
                <div>
                    <p>{{ $post->post }}</p> <!-- 投稿内容 -->
                    <p>{{ $post->created_at }}</p><!-- 投稿日付 -->
                </div>
            @endif
        @endforeach
    </div>
@endforeach
</x-login-layout>


