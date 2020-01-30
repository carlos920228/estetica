<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title>Administración de tipos de pago</title>
    <div class="container">
      <a class="btn-floating btn-large waves-effect waves-light red pulse btn modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
<!--Modal para agregar usuario-->
  <div id="modal1" class="modal modal">
    <div class="modal-content">
      <h4 class="center">Agregar forma de pago</h4>
      <div class="row">
        <form class="col s12" method="post" action='<?php echo base_url()."Pagos/add";?>'>
          <div class="row modal-form-row">
            <div class="input-field col s6">
              <input id="tipo" type="text" name="tipo" class="validate" required>
              <label for="tipo">Tipo de pago</label>
            </div>
            <div class="input-field col s6">
              <input id="comision" type="text" name="comision" class="validate" required>
              <label for="nombre">Comision</label>
              <input id="activo" name="activo" type="text" value="1" hidden>
            </div>
          </div>        
          <div class="row">
            <div class="input-field col s6">
            <button class="btn waves-effect light-blue darken-2" type="submit">Guardar
              <i class="material-icons right">save</i>
            </button>
          </div>
          <div class="input-field col s6">
            <a class=" modal-action modal-close waves-effect light-blue darken-2 btn-flat">Cerrar
              <i class="material-icons right">close</i>
            </a>
          </div>
          </div>          
        </form>
      </div>
    </div>
  </div>
  <div class="card2">
<!-- Tabla de usuarios-->
<table class="striped">
   <thead>
  <tr>
    <th>Tipo de pago</th>
    <th>Comisión</th>
    <th></th>
  </tr> 
</thead>
<tbody>
  <?php
          foreach ($pagos->result() as $user) {
            echo "<tr>";
            echo "<td><b>$user->tipo</td>";
            echo "<td><b>$user->comision</td>";
            echo '<td><b><a href="'.base_url().'Pagos/delete?id='.$user->idpagos.'"title="Borrar" <i class="material-icons red-text center">delete</i></td>';
            echo '<td><b><a href="'.base_url().'Pagos/update?id='.$user->idpagos.'" title="Modificar"<i class="material-icons red-text center">update</i></td>';
            echo "</tr>";
          }?> 
</tbody>
</table> 
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
  