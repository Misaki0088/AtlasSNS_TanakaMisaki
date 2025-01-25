<x-login-layout>



<!-- 投稿フォームとボタンの設置 -->
    <form action="/tweet" method="post">
        @csrf
    <input type="text" name="tweet" value="" class="Input_form" placeholder="投稿内容を入力してください" required>
    <button type="submit" class="Submit_button"><a><img src="images/post.png"></a></button>
    </form>

<!-- 投稿の表示 -->
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->post }}</td>

            <td><a class="btn btn-primary" href="/index/{{$post->id}}/update-form">更新</a></td>
            <td><a class="btn btn-danger" href="/index/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
            </tr>
        @endforeach

<!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
        <form action="" method="">
                <textarea name="" class="modal_post"></textarea>
                <input type="hidden" name="" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
        </form>
        <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>


</x-login-layout>
