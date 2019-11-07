<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$fecha=date("Y-m-d");
?>
    <div class="container">
      
      <h4 >Agregar Solicitud</h4>
      <div class="row">
        <form class="col s12" method="post" action='<?php echo base_url()."welcome/addSol";?>' accept-charset="utf-8" enctype="multipart/form-data">
          <div class="row modal-form-row">
            <div class="input-field col s6">
              <input id="Fecha" type="date" name="Fecha" class="validate" value="<?php echo $fecha ?>" required readonly>
              <label for="Fecha">Fecha de Solicitud</label>
            </div>
            <div class="input-field col s6">

              <input id="Nombre" name="Nombre" type="text" class="validate"  value="<?php $use=$user[0];
               echo $use->nombre." ".$use->apellidos;?>"
              required readonly>
              <label for="Nombre">Nombre del Solicitante</label>
            </div>
          </div>      
          <div class="row">
            <div class="input-field col s6">
              <input id="area" type="text" name="area" class="validate" required>
              <label for="area">Area del Solicitante</label>
            </div>
            <div class="input-field col s6">
              <input id="denominacion_comision" name="denominacion_comision" type="text" class="validate" required>
              <label for="denominacion_comision">Comisión</label>
            </div>
          </div>   
          <div class="row">
            <div class="input-field col s6">
              <input id="ciudad_origen" type="text" name="ciudad_origen" class="validate" required>
              <label for="ciudad_origen">Ciudad Origen</label>
            </div>
            <div class="input-field col s6">
              <input id="estado_origen" name="estado_origen" type="text" class="validate" required>
              <label for="estado_origen">Estado Origen</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="ciudad_destino" type="tel" name="ciudad_destino" class="validate" required>
              <label for="ciudad_destino">Ciudad Destino</label>
            </div>
            <div class="input-field col s6">
              <input id="estado_destino" name="estado_destino" type="text" class="validate" required>
              <label for="estado_destino">Estado Destino</label>
            </div>
          </div>  
          <div class="row">
            <div class="input-field col s6 right">
            <button class="btn waves-effect light-blue darken-2 right pulse" type="submit">Continuar
              <i class="material-icons right">arrow_forward</i>
            </button>
          </div>
          </div>
          </div>          
        </form>
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
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
  });           
  </script>