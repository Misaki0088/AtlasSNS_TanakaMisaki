    // $(function () {
    //   alert('hello world')
    // });

    // $(function(){
    //   $(".toggle").on("click", function () {
    //     $(this).next().slideToggle()
    //   })
    // });

$(function() {
      // アコーディオンの開閉処理
      $('.accordion-menu').on('click', function() {
        $(this).find('.accordion').toggleClass('open');

      // クリックされたセクションのコンテンツをスライドトグル
      $(this).find('.accordion-content').slideToggle();
      });
    });
        // 現在クリックされたセクションのコンテンツを選択
        // var content = $(this).next();
      // 開いたメニューの矢印を変更する（回転するアニメーション）


        // 他の開いているセクションのコンテンツを閉じる
        // $(".accordion-content").not(content).slideUp();

        



