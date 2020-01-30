<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title>Administración tipos de pagos</title>
    <div class="container">
      
  <div class="modificar">
    <div class="modal-content">
      <h4 class="center">Modificar tipo de pago</h4>
      <div class="row">
        <form class="col s12" method="post" action='<?php echo base_url()."Pagos/update_apply";?>'>
          <div class="row modal-form-row">
            <div class="row">
            <div class="input-field col s6">
              <input id="idpagos" type="text" name="idpagos" class="validate" 
              <?php $use=$data[0];
               echo 'value="'.$use->idpagos.'"';?>
              hidden>
              <input id="tipo" type="text" name="tipo" class="validate" 
              <?php $use=$data[0];
               echo 'value="'.$use->tipo.'"';?>
              required>
              <label for="tipo">Tipo de pago</label>
            </div>
          <div class="input-field col s6">
              <input id="comision" type="text" name="comision" class="validate" 
              <?php $use=$data[0];
               echo 'value="'.$use->comision.'"';?>
              required>
              <label for="comision">Comisión</label>
            </div>
          </div>
          </div>       
                   
          <div class="row">
            <div class="input-field col s6">
            <button class="btn waves-effect red " type="submit">Guardar
              <i class="material-icons right">save</i>
            </button>
          </div>
          
          </div>          
        </form>
      </div>
    </div>
  </div>
</body>

    <!-- Compiled and minified JavaScript -->
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
     var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
    
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });           
  </script>
  