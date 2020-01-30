<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title>Administración usuarios</title>
    <div class="container">
      
  <div class="modificar">
    <div class="modal-content">
      <h4 class="center">Modificar Usuario</h4>
      <div class="row">
        <form class="col s12" method="post" action='<?php echo base_url()."Usuario/update_apply";?>'>
          <div class="row modal-form-row">
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
            <select id="rol" name="rol" required>
            <option
            <?php $use=$data[0];
               echo 'value="'.$use->rol.'"';?>>
               <?php $use=$data[0];
               if($use->rol=="1"){echo "Administrador";}
               else{echo "Normal";}?></option>
            <option value="0">Normal</option>
            <option value="1">Administrador</option>
            </select>
            <label data-error="wrong" data-success="right" for="rol">Tipo Usuario</label>
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
            <div class="input-field col s6">
              <input id="usuario" name="usuario" type="text" class="validate" 
                <?php $use=$data[0];
               echo 'value="'.$use->usuario.'"';?>
              required>
              <label for="usuario">Usuario</label>
            </div>
          </div>   
          <div class="row">
            <div class="input-field col s6">
             <select id="locales_id" name="locales_id" required>
              <option
              <?php $use=$data[0];
               echo 'value="'.$use->locales_id.'"';?> selected>
               <?php $use=$data[0];
               echo $use->direccion;?>
                 
               </option>
                      <?php
                        foreach ($locales->result() as $user) {
                        echo '<option value="'.$user->id.'">'.$user->direccion.'</option>';
                      }?>
            </select>
            <label data-error="wrong" data-success="right" for="rol">Local</label> 
            </div>
            <div class="input-field col s6">
              <input id="password" name="password" type="password" class="validate" 
                   <?php $use=$data[0];
                    echo 'value="'.$use->password.'"';?>
              required>
              <label for="password">Contraseña</label>
            </div>
            <input type="text" name="activo" value="1" hidden>
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
  