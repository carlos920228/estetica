<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title>Administración usuarios</title>
    <div class="container">
      <a class="btn-floating btn-large waves-effect waves-light red pulse btn modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
<!--Modal para agregar usuario-->
  <div id="modal1" class="modal modal">
    <div class="modal-content">
      <h4 class="center">Agregar Usuario</h4>
      <div class="row">
        <form class="col s12" method="post" action='<?php echo base_url()."welcome/addUser";?>'>
          <div class="row modal-form-row">
            <div class="input-field col s6">
              <input id="nombre" type="text" name="nombre" class="validate" required>
              <label for="nombre">Nombre</label>
            </div>
           <div class="input-field col s6">
            <select id="rol" name="rol" required>
            <option value="0" selected>Normal</option>
            <option value="1">Administrador</option>
            </select>
            <label data-error="wrong" data-success="right" for="rol">Tipo Usuario</label>
            </div> 
          </div>      
          <div class="row">
            <div class="input-field col s6">
              <input id="telefono" type="tel" name="telefono" class="validate" required>
              <label for="telefono">Teléfono</label>
            </div>
            <div class="input-field col s6">
              <input id="usuario" name="usuario" type="text" class="validate" required>
              <label for="usuario">Usuario</label>
            </div>
          </div>   
          <div class="row">
            <div class="input-field col s6">
             <select id="locales_id" name="locales_id" required>
                      <?php
                        foreach ($locales->result() as $user) {
                        echo '<option value="'.$user->id.'">'.$user->direccion.'</option>';
                      }?>
            </select>
            <label data-error="wrong" data-success="right" for="rol">Local</label> 
            </div>
            <div class="input-field col s6">
              <input id="password" name="password" type="password" class="validate" required>
              <label for="password">Contraseña</label>
            </div>
            <input type="text" name="activo" value="1" hidden>
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
    <th>Nombre</th>
    <th>Teléfono</th>
    <th>Usuario</th>
    <th>Local</th>
    <th></th>
  </tr> 
</thead>
<tbody>
  <?php
          foreach ($data->result() as $user) {
            echo "<tr>";
            echo "<td><b>$user->nombre</td>";
            echo "<td><b>$user->telefono</td>";
            echo "<td><b>$user->usuario</td>";
            echo "<td><b>$user->direccion</td>";
            echo '<td><b><a href="'.base_url().'welcome/deleteUser?id='.$user->id.'"title="Borrar" <i class="material-icons red-text center">delete</i></td>';
            echo '<td><b><a href="'.base_url().'usuario/update?id='.$user->id.'" title="Modificar"<i class="material-icons red-text center">update</i></td>';
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
  