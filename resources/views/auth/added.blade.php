<x-logout-layout>
  <div id="new_register">
  @if (session('username'))
    <p class=new_register_username>{{ session('username') }}さん</p>
  @endif
    <p class="welcome">ようこそ！AtlasSNSへ！</p>
    <p class="new_register_clear">ユーザー登録が完了しました。</p>
    <p class="login_clear">早速ログインをしてみましょう！</p>

    <p class="new_register_btn"><a href="login">ログイン画面へ</a></p>
  </div>
</x-logout-layout>
