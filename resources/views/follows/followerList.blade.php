<x-login-layout>
  <h2>フォロワーリスト</h2>
  @foreach ($users as $user)
    <div>
    <div class="user-card">
    <a href="{{ route('user-profile', ['id' => $user->id]) }}"></a>
    @if( $user->icon_image!="icon1.png")
    <img src="{{ asset('storage/' . $user->icon_image) }}" height="60" width="60">
    @else
    <img src="{{ asset('images/icon1.png') }}">
    @endif
    @endforeach
    </div>
    @foreach ($users as $user)
      <!-- ユーザーアイコンの表示 -->
    <div>
      @if( $user->icon_image!="icon1.png")
    <img src="{{ asset('storage/' . $user->icon_image) }}" alt="アイコン" id="icon" height="60" width="60">
    @else
    <img src="{{ asset('images/icon1.png') }}" alt="初期アイコン" id="firsticon">
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
