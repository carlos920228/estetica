<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<style>
     #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
.card2{
    background:rgba(159,159,159, .6);
  }
.card4{
    background:rgba(229,229,229, .6);
  }
.modificar{
    background:rgba(255,255,255, .8);
  }
  .sidenav.sidenav-fixed {
     background:rgba(0,59,59, .6);
  }
  .barra{
    background:rgba(220,229,229, .6);
  }
body { background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQRTpxiM8IyBCcaqh5iCy0eK2myw-2aW1rKRpRVhlXW8yEhBFTG);
  background-repeat: no-repeat;
 background-position: center;
  background-size: cover;
  position: relative;
}
  }
.login{
    background:rgba(0, 0, 0, .6);
  }

  .login input{
    font-size: 20px !important;
    color: #ccc;
    
  }
  .login label{
    font-size: 15px;
    color: #ccc;
  }
  .login button:hover{
    padding: 0px 40px; 
}
.hero-image {
  
  height:750px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;

}
.map{
      display: flow-root;
}
.material-icons.green600{ color:green; }
header, main, footer ,body{
      padding-left: 200px;
    }
.material-icons.yellow600{ 
	float: left;
	padding-right:3px;
	color: #29e319; }
header, main, footer ,body{
      padding-left: 200px;
    }
    @media only screen and (max-width : 992px) {
      header, main, footer, body {
        padding-left: 0;
      }
    }
</style>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<div class="hero-image">
    <div>
    	   <ul id="menu-side" class="sidenav sidenav-fixed barra">
           <li>
            <div class="user-view">
                <div class="">
                <a href="<?php echo base_url()?>">
                <!--<img src="https://img.freepik.com/vector-gratis/arbol-deja-frontera-fondo-defocused-abstracto-verde_33099-1423.jpg?size=626&ext=jpg"></a>
              -->
              </div>
               <a href="<?php echo base_url()?>"><img class="circle" src="https://pbs.twimg.com/profile_images/678760221607522304/BtT1ZMXQ_400x400.jpg"></a>
               <a href="#name"><span class="white-text name">Bienvenido <?php $use=$user[0];
               echo $use->nombre;?></span></a>
           </li>
           
           <li><a class='dropdown-trigger white-text' href='#' data-target='dropdown1'><i class="small material-icons white-text">add_shopping_cart</i>Venta</a></li>
           <li><a class='dropdown-trigger white-text' href='#' data-target='dropdown1'><i class="small material-icons white-text">assessment</i>Corte</a></li>
           <?php 
           if($_SESSION['rol']==1){
            echo '<li><a href="'.base_url().'welcome/Produtos" class="white-text"><i class="small material-icons white-text">add_to_photos</i>Productos</a></li>';
            echo '<li><a href="'.base_url().'Pagos/verPagos" class="white-text"><i class="small material-icons white-text">payment</i>Forma de pago</a></li>';
            echo '<li><a href="'.base_url().'Locales/verLocales" class="white-text"><i class="small material-icons white-text">account_balance</i>Locales</a></li>';
            echo '<li><a href="'.base_url().'welcome/verUsuarios" class="white-text"><i class="small material-icons white-text">account_box</i>Usuarios</a></li>';         
            }
           ?>
            <li><a href='<?php echo base_url()."welcome/exit";?>' class="btn red"><i class="small material-icons white-text">announcement</i><h4>Salir</h4></a></li>
        </ul>
    	<a href="#" class="sidenav-trigger" data-target="menu-side"><i class="medium material-icons green600">menu</i></a>
    </div>
