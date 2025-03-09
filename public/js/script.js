    // $(function () {
    //   alert('hello world')
    // });

$(function() {
      // アコーディオンの開閉処理
      $('.accordion-menu').on('click', function() {
        $(this).find('.accordion').toggleClass('open');

      // クリックされたセクションのコンテンツをスライドトグル
      $(this).find('.accordion-content').slideToggle();
      });
    });

        document.addEventListener('DOMContentLoaded', function () {
          const modal = document.querySelector('.js-modal');
          const openButtons = document.querySelectorAll('.js-modal-open');
          const closeButtons = document.querySelectorAll('.js-modal-close');

          openButtons.forEach(button => {
              button.addEventListener('click', function () {
                  const postId = this.getAttribute('data-id');
                  const postContent = this.getAttribute('data-post');

                  // モーダル内のフォームにデータをセット
                  document.querySelector('.modal_id').value = postId;
                  document.querySelector('.modal_post').value = postContent;

                  // モーダルを表示
                  modal.classList.add('is-open');
              });
          });

          closeButtons.forEach(button => {
              button.addEventListener('click', function (event) {
                  event.preventDefault();
                  modal.classList.remove('is-open');
              });
          });
      });



