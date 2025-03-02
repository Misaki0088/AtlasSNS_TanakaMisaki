<head>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <script>
    $(function () { // if document is ready
      alert('hello world')
    });

    $(function(){
      $(".toggle").on("click", function () {
        $(this).next().slideToggle()
      })
    });

$(function() {
      // アコーディオンの開閉処理
      $(".accordion").on("click", function() {
        // 現在クリックされたセクションのコンテンツを選択
        var content = $(this).next();

        // 他の開いているセクションのコンテンツを閉じる
        $(".accordion-content").not(content).slideUp();

        // クリックされたセクションのコンテンツをスライドトグル
        content.stop(true, true).slideToggle();

        // 開いたメニューの矢印を変更する（回転するアニメーション）
        $(this).toggleClass("open");
      })
    });
  </script>
</head>
