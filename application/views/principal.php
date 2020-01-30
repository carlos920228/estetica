<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title>SIFI</title>
  <div class="container ">
    <div class="row center">
      <div class="col s12 center">
        
      </div>
    </div>
  </div>
</body>

    <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js">
  </script>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });    
  </script>