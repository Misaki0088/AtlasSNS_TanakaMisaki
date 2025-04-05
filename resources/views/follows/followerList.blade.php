<x-login-layout>
<div class="user-list">
  <div class="user-card">
    <h3>フォロワーリスト</h3>
      <div class="user_group">
        @foreach ($users as $user)
            <a href="{{ route('user-profile', ['id' => $user->id]) }}"></a>
          @if( $user->icon_image!="icon1.png")
            <img src="{{ asset('storage/' . $user->icon_image) }}" height="60" width="60">
          @else
            <img src="{{ asset('images/icon1.png') }}">
          @endif
        @endforeach
      </div>
  </div>
</div>

<div class="user">
  @foreach ($posts as $post)
    <!-- ユーザーアイコンの表示 -->
    @if( $post->user->icon_image!="icon1.png")
    <img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="アイコン" height="60" width="60">
    @else
    <img src="{{ asset('images/icon1.png') }}">
    @endif
      <p class="username">{{ $post->user->username }}</p> <!-- ユーザー名 -->
      <div class="follows_post">
          <p>{{ $post->post }}</p> <!-- 投稿内容 -->
          <p>{{ $post->created_at }}</p><!-- 投稿日付 -->
      </div>
  @endforeach
</div>
</x-login-layout>
