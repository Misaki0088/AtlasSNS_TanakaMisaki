<x-login-layout>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- スマホ・タブレット対応 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>検索フォーム</title>
</head>
<body>

    {{ Form::open(['url' => '/search','method' => 'GET']) }}
        @csrf

    <input type="text" name="search" value="" class="search_form" placeholder="ユーザー名" required>
    <button type="submit" class="Submit_button"><a><img src="images/search.png"></a></button>
    {{ Form::close() }}

</x-login-layout>
