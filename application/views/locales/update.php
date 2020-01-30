<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title>Administración Locales</title>
    <div class="container">
      
  <div class="modificar">
    <div class="modal-content">
      <h4 class="center">Modificar Local</h4>
      <div class="row">
        <form class="col s12" method="post" action='<?php echo base_url()."Locales/update_apply";?>'>
          <div class="row modal-form-row">
            <div class="row">
            <div class="input-field col s6">
              <input id="id" type="text" name="id" class="validate" 
              <?php $use=$data[0];
               echo 'value="'.$use->id.'"';?>
              hidden>
              <input id="nombre" type="text" name="nombre" class="validate" 
              <?php $use=$data[0];
               echo 'value="'.$use->nombre.'"';?>
              required>
              <label for="nombre">Nombre</label>
            </div>
            
          <div class="input-field col s6">
              <input id="direccion" type="text" name="direccion" class="validate" 
              <?php $use=$data[0];
               echo 'value="'.$use->direccion.'"';?>
              required>
              <label for="nombre">Direccion</label>
            </div>
          </div>
          </div>      
          <div class="row">
            <div class="input-field col s6">
              <input id="telefono" type="tel" name="telefono" class="validate" 
                <?php $use=$data[0];
               echo 'value="'.$use->telefono.'"';?>
              required>
              <label for="telefono">Teléfono</label>
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
  