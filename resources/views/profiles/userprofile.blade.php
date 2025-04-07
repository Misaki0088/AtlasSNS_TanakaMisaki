<x-login-layout>
<!-- フォローしているユーザーのプロフィール表示 -->
<div class="user_profile_container">
        <div class="user_profile_names">
            @if( $users->icon_image!="icon1.png")
                <img src="{{ asset('storage/' . $users->icon_image) }}"alt="アイコン" id="user_profile_icon">
            @else
                <img src="{{ asset('images/icon1.png') }}"alt="初期アイコン" id="firsticon">
            @endif
            <p class="user_profile_username_title">ユーザー名</p>
            <p class="user_profile_name">{{ $users->username }}</p> <!-- ユーザー名を表示 -->
        </div>
            <div class="user_profile_bios">
                <p class="user_profile_bios_title">自己紹介</p>
                <p class="user_profile_bio">{{ $users->bio }}</p> <!-- ユーザーの自己紹介を表示 -->
                    <div class="user_profile_btn">
                        @if (auth()->user()->isFollowing($users->id))
                            <form action="/unfollow/{{$users->id}}" method="post">
                                @csrf
                            <button type="submit" class="danger_button">フォロー解除</button>
                            </form>
                        @else
                            <form action="/follow/{{$users->id}}" method="post">
                                @csrf
                            <button type="submit" class="primary_button">フォローする</button>
                            </form>
                        @endif
                    </div>
            </div>
</div>
<!-- ユーザーの投稿を表示 -->
@foreach ($posts as $post)
    <div class="user_profile">
        <div class ="user_profile_name_time">
            <div class="user_profile_icon">
                <!-- ユーザーアイコンの表示 -->
                @if( $post->user->icon_image!="icon1.png")
                    <a href="{{ route('user-profile', ['id' => $post->user->id]) }}">
                    <img src="{{ asset('storage/' . $post->user->icon_image) }}" height="60" width="60">
                @else
                    <img src="{{ asset('images/icon1.png') }}">
                @endif
                    </a>
            </div>
            <p class="user_profile_postname">{{ $post->user->username }}</p> <!-- ユーザー名 -->
                <p class="user_profile_postdate">{{ $post->created_at }}</p><!-- 投稿日付 -->
            </div>
            <div class="user_profile_post">
                <p>{{ $post->post }}</p> <!-- 投稿内容 -->
            </div>
    </div>
@endforeach
</x-login-layout>
