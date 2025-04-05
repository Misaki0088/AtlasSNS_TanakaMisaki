<x-login-layout>



<!-- 投稿フォームとボタンの設置 -->
<div class="form-container">
    <div class="icon-container">
        @if( Auth::user()->icon_image!="icon1.png")
        <img src="{{ asset('storage/' . Auth::user()->icon_image) }}" class="tweet-icon">
        @else
        <img src="{{ asset('images/icon1.png') }}" class="tweet-icon">
        @endif
    </div>
    <form action="/tweet" method="post">
        @csrf
        <div class="form">
            <!-- 投稿フォーム -->
            <textarea name="tweet" value="" class="Input_form" placeholder="投稿内容を入力してください" required></textarea>
            <!-- 投稿ボタン -->
            <input type="image" class="Submit_button" src="images/post.png" alt="投稿ボタン" id="submitbutton">
        </div>
        <div class="form_form"></div>
    </form>
</div>


@foreach ($posts as $post)
<div class="tweet">
    <div class="tweet_name_time">
        <!-- アイコンの表示 -->
        <img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="アイコン" id="icon">
    </div>
        <!-- ユーザー名の表示 -->
        <p class="post_username">{{ $post->user->username }}</p>
        <!-- 日時表示 -->
        <p class="post-time">{{ $post->created_at->format('Y-m-d H:i') }}</p>
</div>
    <div class="post">
    <!-- 投稿の表示 -->
    {{ $post->post }}
    </div>

<div class="button-container">
    <div class="two_buttons">
        <!-- 編集ボタンの設置 -->
        <a class="update_button js-modal-open" data-id="{{ $post->id }}" data-post="{{ $post->post }}">
        <img src="images/edit.png" alt="編集ボタン" id="update_button"></a>
        <!-- 削除ボタンの設置 -->
        <td><a id="delete-button" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
        <img src="images/trash.png" onmouseover="this.src='images/trash-h.png'" onmouseout="this.src='images/trash.png'" alt="削除ボタン" id="delete_button">
        <!-- <img src="images/trash-h.png" alt="ホバーボタン" id="delete_h_button"> -->
        </a></td>
    </div>
</div>
@endforeach

<!-- モーダルの中身 -->
<div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="/post/update" method="POST">
                <textarea name="post_content" class="modal_post"></textarea>
                <input type="hidden" name="post_id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
            </form>
        </div>
</div>


</x-login-layout>
