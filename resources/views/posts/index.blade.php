<x-login-layout>



<!-- 投稿フォームとボタンの設置 -->
    <form action="/tweet" method="post">
        @csrf
        <input type="text" name="tweet" value="" class="Input_form" placeholder="投稿内容を入力してください" required>
        <button type="submit" class="Submit_button"><a><img src="images/post.png" alt="投稿ボタン" id="submitbutton"></a></button>
    </form>

<!-- 投稿の表示 -->
    @foreach ($posts as $post)
    <!-- アイコンの表示 -->
        <div class="post"><a><img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="アイコン" id="icon"></a></div>
                {{ $post->post }}

    <div class="button-container">
        <!-- 編集ボタンの設置 -->
        <button type="button" class="update_button js-modal-open" data-id="{{ $post->id }}" data-post="{{ $post->post }}">
        <a><img src="images/edit.png" alt="編集ボタン" id="update_button"></a></button>

        <!-- 削除ボタンの設置 -->
        <button type="submit" class="delete_button" >
        <a href="/post/{{$post->id}}/delete"><img src="images/trash.png" alt="削除ボタン" id="delete_button">
        </a></button>
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
