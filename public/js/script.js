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
  </script>
</head>
