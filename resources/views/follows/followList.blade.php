<x-login-layout>
  <h2>フォローリスト</h2>
  @foreach ($users as $user)
    <div>
      <!-- ユーザーアイコンの表示 -->
      @if ($user->Icon_Image)
      <img src="{{ asset('storage/' . $user->Icon_Image) }}">
        @endif
        <p>{{ $user->username }}</p> <!-- ユーザー名 -->
        <p>{{ $user->bio }}</p> <!-- 自己紹介文 -->
        @foreach ($posts as $post)
            @if ($post->user_id === $user->id)
                <div>
                    <p>{{ $post->post }}</p> <!-- 投稿内容 -->
                </div>
            @endif
        @endforeach
    </div>
@endforeach
</x-login-layout>


