<x-login-layout>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- スマホ・タブレット対応 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>投稿フォーム</title>
</head>
<body>

    {{ Form::open(['url' => '/top','method' => 'GET']) }}
        @csrf

    <input type="text" name="Tweet" value="" class="Input_form" placeholder="投稿内容を入力してください" required>
    <button type="submit" class="Submit_button"><a><img src="images/post.png"></a></button>
    {{ Form::close() }}


</x-login-layout>
