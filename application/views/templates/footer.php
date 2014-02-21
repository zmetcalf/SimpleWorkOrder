    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <?php
      if($additional_js_el) {
        foreach($additional_js_el as $el) {
          echo $el;
        }
      }
    ?>
  </body>
</html>