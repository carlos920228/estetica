<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<title>Modificar Solicitud</title>
<div class="container">

      <!--Modal para agregar partida-->
  <div id="modal1" class="modal modal">
    <div class="modal-content">
      <div class="row">
        <?php 
        if(empty($meta)){
          redirect('welcome/verMisSolicitudes');
        }
        ?>
        <form class="col s12" method="post" action='<?php echo base_url()."welcome/addPartida";?>' accept-charset="utf-8" enctype="multipart/form-data">
          <div class="row modal-form-row">
             <input id="solicitudes_folio" type="text" name="solicitudes_folio" class="validate" required
             <?php $use=$meta[0];
               echo 'value="'.$use->folio.'"';?> hidden>
            <div class="input-field col s6">
            <select id="concepto" name="descripcion" class="validate" required>
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="Autobuses">Autobuses</option>
            <option value="Gasolina">Gasolina</option>
            <option value="Casetas">Casetas</option>
            <option value="Hotel">Hotel</option>
            <option value="Comidas">Comidas</option>
            <option value="Otro">Otro</option>
            </select>
            <label data-error="wrong" data-success="right" for="concepto">Concepto</label>
            </div>
            <div class="input-field col s6">
            <input id="total" name="total" type="number" class="validate" step="any" placeholder="0.00" min="1" required><label for="total">Cantidad</label>
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
      <div class="row">
          <div class="row modal-form-row">
            <div class="input-field col s3">
              <input id="Fecha" type="date" name="Fecha" 
              <?php $use=$meta[0];
               echo 'value="'.$use->Fecha.'"';?> readonly>
              <label for="Fecha">Fecha de Solicitud</label>
            </div>
            <div class="input-field col s9">
              <input id="Nombre" name="Nombre" type="text"
              <?php $use=$meta[0];
               echo 'value="'.$use->Nombre.'"';?> readonly>
              <label for="Nombre">Nombre del Solicitante</label>
            </div>

          </div>

          <div class="row">
          <div class="input-field col s3">
              <input id="area" type="text" name="area"
              <?php $use=$meta[0];
               echo 'value="'.$use->area.'"';?> readonly>
              <label for="area">Area</label>
            </div>
            <div class="input-field col s3">
              <input id="ciudad_origen" type="text" name="ciudad_origen" 
              <?php $use=$meta[0];
              if ($use->tipo_sol==0)
               {echo 'value="Viaticos"';}
               else {echo 'value="Reembolso"';} ?> readonly>
              <label for="ciudad_origen">Tipo de Solicitud</label>
            </div>
          </div>
          
          <div class="row">
            <div class="input-field col s3">
              <input id="ciudad_origen" type="text" name="ciudad_origen" 
              <?php $use=$meta[0];
               echo 'value="'.$use->ciudad_origen.'"';?> readonly>
              <label for="ciudad_origen">Ciudad Origen</label>
            </div>
            <div class="input-field col s3">
              <input id="estado_origen" name="estado_origen" type="text" 
              <?php $use=$meta[0];
               echo 'value="'.$use->estado_origen.'"';?> readonly>
              <label for="estado_origen">Estado Origen</label>
            </div>
            <div class="input-field col s3">
              <input id="ciudad_destino" type="tel" name="ciudad_destino"
              <?php $use=$meta[0];
               echo 'value="'.$use->ciudad_destino.'"';?> readonly>
              <label for="ciudad_destino">Ciudad Destino</label>
            </div>
            <div class="input-field col s3">
              <input id="estado_destino" name="estado_destino" type="text"
              <?php $use=$meta[0];
               echo 'value="'.$use->estado_destino.'"';?> readonly>
              <label for="estado_destino">Estado Destino</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s9">
              <input id="motivo" name="motivo" type="text" <?php $use=$meta[0];
               echo 'value="'.$use->motivo.'"';?> readonly>
              <label for="motivo">Actividad</label>            
            </div>
            <div class="input-field col s3">
              <input id="total" name="total" type="text" <?php $use=$meta[0];
               echo 'value="'.number_format($use->total, 2, '.', ',').'"';?> readonly>
              <label for="motivo">Total</label>            
            </div>
            <?php $use=$meta[0];
            if($use->estado=='pendiente'){
             echo '<a class="btn-floating waves-effect waves-light red pulse btn modal-trigger right" href="#modal1"><i class="material-icons">add</i></a>';}
             ?>
          </div>   
               <table class="responsive-table">
        <thead>
          <tr>
              <th>Descripción</th>
              <th>Total</th>
              <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
         <?php
         $use=$meta[0];
         $ok=0;
          foreach ($partidas->result() as $user) {
            if($user->estatus!='1'){
              $ok=0;
            }else{
              $ok=$user->estatus;
            }
            echo "<tr>";
            echo "<td>$user->descripcion</td>";
            echo "<td><b>".number_format($user->total, 2, '.', ',')."</b></td>";
            echo '<td align="center"><a href="'.base_url().'welcome/restSol?id='.$user->solicitudes_folio.'&to='.$user->total.'&part='.$user->idpartidas.'"<i class="material-icons red-text center">delete</i></td>';
            echo "</tr>";
          }?> 
        </tbody>
      </table> 
      <br>
      </table>

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
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });           
  </script>