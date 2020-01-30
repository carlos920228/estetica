<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public $estatus;
	private $resultado;
	private $pdfdoc = array();

function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('User_model');
		$this->load->model('Prov_model');
		$this->load->model('Estruc_model');
		$this->load->model('Solicitud_model');
		$this->load->model('Locales_model');
		$this->resultado="";
		
	}
	public function index(){
		if(isset($_SESSION['username'])){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$this->load->view('menu',$test);
			$this->load->view('principal');
		}else{
		$this->load->view('loginv2');
		}
	}
	public function entrar(){
		if(isset($_SESSION['username'])){

		}
		if($this->User_model->login($_POST['username'],$_POST['password'])){
			//Guardamos el nombre de usuario
			$this->session->set_userdata('username',$_POST['username']);
			$user=$this->User_model->data($_POST['username']);
			$test['user']=$user;
			$use=$user[0];
			//Guardamos el rol en la sesion
			$this->session->set_userdata('rol',$use->rol);
			$this->load->view('menu',$test);
			$this->load->view('principal');
		}else{
			redirect('welcome');
			}
		
	}
		
	public function exit(){
		$this->session->sess_destroy();
		redirect('welcome');
	}



//Funcion que muestra el listado de mis solicitudes
public function verMisSolicitudes()
{
	if(isset($_SESSION['username']))
	{
		$test['user']=$this->User_model->data($_SESSION['username']);
		$user=$test['user'];
		$use=$user[0];
		$name=$use->nombre." ".$use->apellidos;
		$test['pendientes']=$this->Solicitud_model->get_solUserPenWait($name,'pendiente');
		$test['canceladas']=$this->Solicitud_model->get_solUserPenWait($name,'cancelada');
		$test['aceptadas']=$this->Solicitud_model->get_solUserPenWait($name,'aceptada');
		$test['pagadas']=$this->Solicitud_model->get_solUserPenWait($name,'pagada');
		$test['finalizadas']=$this->Solicitud_model->get_solUserPenWait($name,'finalizadas');
		$this->load->view('menu',$test);
		$this->load->view('solicitudes',$test);
	}
	else
	{
		$this->load->view('loginv2');
	}
}


//Funcion que muestra las solicitudes (Administrador)
public function verSolicitudes()
{
	if(isset($_SESSION['username'])&&$_SESSION['rol']>=1)
	{
		$test['user']=$this->User_model->data($_SESSION['username']);
		$this->load->view('menu',$test);
		$test['data']=$this->Solicitud_model->get_solicitud();
		$this->load->view('crudSol',$test);
	}
	else
	{
		$this->load->view('loginv2');
	}
}


	public function verProveedores(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$test['data']=$this->Prov_model->get_prov();
			$this->load->view('menu',$test);
			$this->load->view('crudProv',$test);
		}else{
		$this->load->view('loginv2');
		}
	}
	public function verUsuarios(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$test['data']=$this->User_model->get_user();
			$test['locales']=$this->Locales_model->get_locales();
			$this->load->view('menu',$test);
			$this->load->view('crudUsuarios',$test);
		}else{
		$this->load->view('loginv2');
		}
	}
	public function addUser(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$this->User_model->add_user($_POST);
			redirect('welcome/verUsuarios');
			}else{
		redirect('welcome');
		}
	}
	public function deleteUser(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->User_model->delete_user($_GET['id']);
			redirect('welcome/verUsuarios');
		}else{
		redirect('welcome');
		}
	}

	public function addProv(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$this->Prov_model->add_prov($_POST);
			redirect('welcome/verProveedores');
			}else{
		redirect('welcome');
		}
	}
	public function deleteProv(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Prov_model->delete_prov($_GET['id']);
			redirect('welcome/verProveedores');
		}else{
		redirect('welcome');
		}}

		//Método para actualizar al proveedor
	public function updateProv(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['prov']=$this->Prov_model->get_prov_detalle($_GET['id']);
			$test['user']=$this->User_model->data($_SESSION['username']);
			$this->load->view('menu',$test);
			$this->load->view('modProv',$test);
		}else{
		redirect('welcome');
		}
	}
	public function updateProvTrue(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Prov_model->update_prov($_GET['id'],$_POST);
			redirect('welcome/verProveedores');
		}else{
		redirect('welcome');
		}
	}
	//Métodos estructuras
	//Pantalla inicial
	public function estructuras(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$test['data']=$this->Estruc_model->get_estructuras();
			$this->load->view('menu',$test);
			$this->load->view('crudEstructuras',$test);
		}else{
		$this->load->view('loginv2');
		}}
//Agregar
public function addEstructuras(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);
			$this->Estruc_model->add_estructura($_POST);
			redirect('welcome/estructuras');
			}else{
		redirect('welcome');
		}
	}
		//Vista a detalle de estructura seleccionada
		public function updateEstruc(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['prov']=$this->Estruc_model->get_detalle($_GET['id']);
			$test['user']=$this->User_model->data($_SESSION['username']);
			$this->load->view('menu',$test);
			$this->load->view('modEstruc',$test);
		}else{
		redirect('welcome');
		}
	
	}
	// Actualizar estructura
	public function updateEstrucTrue(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Estruc_model->update_estruc($_GET['id'],$_POST);
			redirect('welcome/estructuras');
		}else{
		redirect('welcome');
		}
	}
	//Eliminar Estructura
	public function deleteEstruc(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Estruc_model->delete_estruc($_GET['id']);
			redirect('welcome/estructuras');
		}else{
		redirect('welcome');
		}
	}


//Funcion que genera una nueva solicitud de viaticos
public function generarSolicitud()
{
	if(isset($_SESSION['username']))
	{
		$test['user']=$this->User_model->data($_SESSION['username']);
		$this->load->view('menu',$test);
		$this->load->view('solPropia');
	}
	else
	{
		$this->load->view('loginv2');
	}
}


//Funcion que guarda la solicitud de viaticos y redirige para agregar las partidas	
public function addSol()
{
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1)
	{
		$test['user']=$this->User_model->data($_SESSION['username']);
		redirect('welcome/generarSolicitudPartidas?id='.$this->Solicitud_model->addMetadata($_POST));
	}
	else
	{
		redirect('welcome');
	}
}

//Funcion que agrega las partidas de la solicitud de viaticos
public function generarSolicitudPartidas(){
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1){
		$test['user']=$this->User_model->data($_SESSION['username']);
		$use=$test['user'];
		$name=$use[0]->nombre." ".$use[0]->apellidos;
		$test['meta']=$this->Solicitud_model->getMetadata($_GET['id'],$name);
		$meta=$test['meta'];
		if($meta[0]->Nombre!=$name){//Validamos que accesa a solicitudes propias por url
			redirect('welcome/verMisSolicitudes');
		}
		$test['partidas']=$this->Solicitud_model->getPartidas($_GET['id']);
		$this->load->view('menu',$test);
		$this->load->view('createSol',$test);

	}else{
	redirect('welcome');
	}
}

//Funcion que realiza la comprobacion de la solicitud de viaticos
public function comprobarSol()
{
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1)
	{
		$test['user']=$this->User_model->data($_SESSION['username']);
		$use=$test['user'];
		$name=$use[0]->nombre." ".$use[0]->apellidos;
		$test['meta']=$this->Solicitud_model->getMetadata($_GET['id'],$name);
		$test['aux']=$this->Solicitud_model->validatePartida($_GET['id']);
		$meta=$test['meta'];
			if($meta[0]->Nombre!=$name){//Validamos que accesa a solicitudes propias por url
				redirect('welcome/verMisSolicitudes');
			}
		
		$test['partidas']=$this->Solicitud_model->getPartidas($_GET['id']);
		$this->load->view('menu',$test);
		$this->load->view('modSol',$test);

	}
	else
	{
		redirect('welcome');
	}
}


	public function finSol(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']<=1){
				$this->Solicitud_model->finSol($_GET['id']);
				redirect('welcome/verMisSolicitudes');
		}else{
		redirect('welcome');
		}
	}


//Funcion que vizualiza la informacion de una solicitud
public function detalleSol()
{
	if(isset($_SESSION['username'])&&$_SESSION['rol']>=1)
	{
		$test['user']=$this->User_model->data($_SESSION['username']);
		$use=$test['user'];
		$name=$use[0]->nombre." ".$use[0]->apellidos;
		$test['meta']=$this->Solicitud_model->getMetadata($_GET['id'],$name);
		$meta=$test['meta'];
		$test['partidas']=$this->Solicitud_model->getPartidas($_GET['id']);
		$this->load->view('menu',$test);
		$this->load->view('seeSol',$test);
	}
	else
	{
	redirect('welcome');
	}
}


	public function deleteSol(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']<=1){
			$this->Solicitud_model->deleteSol($_GET['id']);
			redirect('welcome/verMisSolicitudes');
		}else{
			redirect('welcome');
		}
	}
	public function cancelSol(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Solicitud_model->cancelSol($_GET['id']);
			redirect('welcome/verSolicitudes');
		}else{
			redirect('welcome');
		}
	}
public function acceptSol(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Solicitud_model->acceptSol($_GET['id']);
			redirect('welcome/verSolicitudes');
		}else{
			redirect('welcome');
		}
	}
public function paySol(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$this->Solicitud_model->paySol($_GET['id']);
			redirect('welcome/pagarSolicitudes');
		}else{
			redirect('welcome');
		}
	}


//Funcion que envia las solicitudes para la verificacion de los xml
public function verifySol()
{
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1)
	{
		$this->Solicitud_model->verifySol($_GET['id']);
		redirect('welcome/verMisSolicitudes');
	}
	else
	{
		redirect('welcome');
	}
}

//Funcion que agrega las partidas de la solicitud de viaticos
public function addPartida()
{
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1)
	{
		$this->Solicitud_model->addPartida($_POST);
		$this->Solicitud_model->updateTotal($_POST['solicitudes_folio'],$_POST['total']);
		redirect('welcome/generarSolicitudPartidas?id='.$_POST['solicitudes_folio']);
	}
	else
	{
	redirect('welcome/');
	}
}

//Funcion que permite eliminar partidas de la solicitud de viaticos
public function restSol()
{
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1)
	{
		$this->Solicitud_model->restSol($_GET['id'],$_GET['to'],$_GET['part']);
		redirect('welcome/generarSolicitudPartidas?id='.$_GET['id']);
	}
	else
	{
	redirect('welcome/');
	}
}

//Funcion que permite reembolsa partidas de la solicitud de viaticos
public function nousarSol()
{
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1)
	{
		$this->Solicitud_model->notusePartida($_GET['to']);
		redirect('welcome/comprobarSol?id='.$_GET['id']);
	}
	else
	{
	redirect('welcome/');
	}
}

//Funcion que permite reembolsa partidas de la solicitud de viaticos
public function reembolsarSol()
{
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1)
	{
		$this->Solicitud_model->refundPartida($_GET['to']);
		redirect('welcome/comprobarSol?id='.$_GET['id']);
	}
	else
	{
	redirect('welcome/');
	}
}


public function pagarSolicitudes()
{
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1)
	{
		$test['user']=$this->User_model->data($_SESSION['username']);
		$this->load->view('menu',$test);
		$test['data']=$this->Solicitud_model->get_solicitudPagar();
		$this->load->view('solPagar',$test);
	}
	else
	{
		redirect('welcome/');
	}
}


public function verificarComprobacion(){
	
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1){
		$test['user']=$this->User_model->data($_SESSION['username']);
		$this->load->view('menu',$test);
		$test['data']=$this->Solicitud_model->get_solicitudVerificar();
		$this->load->view('solVerificar',$test);
		
		}else{
		redirect('welcome/');
		}
}






	//Eucario
	public function addSolfactura(){
		if(isset($_SESSION['username'])&&$_SESSION['rol']>=1){
			$test['user']=$this->User_model->data($_SESSION['username']);

    if ($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE)
    {
    	echo "Error al subir la factura";
    }
    else
    {
      $this->cargar_factura();

      $this->Solicitud_model->fecha = $this->input->post('Fecha');
  	  $this->Solicitud_model->nombre = $this->input->post('Nombre');
      $this->Solicitud_model->area = $this->input->post('area');
      $this->Solicitud_model->comision = $this->input->post('denominacion_comision');
      $this->Solicitud_model->c_origen = $this->input->post('ciudad_origen');
      $this->Solicitud_model->e_origen = $this->input->post('estado_origen');
      $this->Solicitud_model->c_destino = $this->input->post('ciudad_destino');
  	  $this->Solicitud_model->e_destino = $this->input->post('estado_destino');
  	  //$this->solicitud_model->archivo = $this->input->post('userfile');
      $this->Solicitud_model->estatus = $this->estatus;

      $this->Solicitud_model->add_sol($_POST);
    }

			redirect('welcome/verSolicitudes');
			}else{
		redirect('welcome');
		}
	}


//Funcion que se encarga de generar el pdf
public function viewpdf(){
	
	$test=$this->Solicitud_model->getMetadata($_GET['id'],"");
	$test2['partidas']=$this->Solicitud_model->getPartidas($_GET['id']);

	$this->load->library('pdf');
	$html = '
	<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Solicitud de Viaticos</title>
  </head>
  <body>

  <h1 class="text-center bg-info">Solicitud de Viaticos</h1>

  <div class="form-group row">
  <div class="col-xs-2">
    <label for="ex1">Folio</label>
    <input class="form-control input-sm" id="ex1" type="text">
  </div>
  <div class="col-xs-3">
    <label for="ex2">Fecha de Solicitud</label>
    <input class="form-control input-sm" id="ex2" type="text">
  </div>
  <div class="col-xs-6">
    <label for="ex3">Nombre del Solicitante</label>
    <input class="form-control input-sm" id="ex3" type="text">
  </div>
</div>

<div class="form-group row">
<div class="col-xs-4">
  <label for="ex1">Area del Solicitante</label>
  <input class="form-control input-sm" id="ex1" type="text">
</div>
<div class="col-xs-7">
  <label for="ex2">Comisión</label>
  <input class="form-control input-sm" id="ex2" type="text">
</div>
</div>

<div class="form-group row">
<div class="col-xs-3">
  <label for="ex1">Ciudad Origen</label>
  <input class="form-control input-sm" id="ex1" type="text">
</div>
<div class="col-xs-2">
  <label for="ex2">Estado Origen</label>
  <input class="form-control input-sm" id="ex2" type="text">
</div>
<div class="col-xs-3">
  <label for="ex3">Ciudad Destino</label>
  <input class="form-control input-sm" id="ex3" type="text">
</div>
<div class="col-xs-2">
  <label for="ex3">Estado Destino</label>
  <input class="form-control input-sm" id="ex3" type="text">
</div>
</div>

<div class="form-group row">
<div class="col-xs-">
  <label for="ex1">Secretaria</label>
  <input class="form-control input-sm" id="ex1" type="text">
</div>
<div class="col-xs-6">
  <label for="ex2">Motivo</label>
  <input class="form-control input-sm" id="ex2" type="text">
</div>
<div class="col-xs-2">
  <label for="ex3">Total</label>
  <input class="form-control input-sm" id="ex3" type="text">
</div>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Descripción</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Gasolina</td>
            <td>$500.00</td>
        </tr>
        <tbody>
</table>

</body>
</html>
	';

    $this->pdf->generate($html, 'prueba', true, 'Letter', 'portrait');
		
}


//Funcion que se encarga de descargar los comprobantes en zip
public function downloadxml(){
	
	if(isset($_SESSION['username'])&&$_SESSION['rol']<=1){
		$test['user']=$this->User_model->data($_SESSION['username']);
	
		$this->load->library('zip');

		/*
		$path = './uploads/'.$_GET['id'].'/';
		$this->zip->read_dir($path);
		$this->zip->download('my_backup.zip');
		*/
		$files = glob('./uploads/'.$_GET['id'].'/*'); // get all file names
	
			foreach($files as $file)
			{ 
				if(is_file($file))
				$this->zip->read_file($file);
			}

		$filename = $this->zip->archive(FCPATH.'/uploads/'.$_GET['id'].'.zip');
		$this->zip->download($_GET['id'].'.zip');

		}else{
		redirect('welcome/');
		}
}


//funcion que sube los xml al servidor
function cargar_factura($folio,$idpartida) 
{

$comprobantes = array();
$countfiles = count($_FILES['userfile']['name']);
$this->resultado = "";

$carpeta = './uploads/'.$folio;

	if (!file_exists($carpeta)) 
	{
    mkdir($carpeta, 0777, true);
	}

	/*
	$files = glob('./uploads/'.$idpartida.'/*'); // get all file names
	foreach($files as $file)
		{ // iterate files
  		if(is_file($file))
    	unlink($file); // delete file
		}
	*/

	$config["upload_path"] = './uploads/'.$folio;
	$config["allowed_types"] = 'xml|pdf';
	$config["overwrite"] = TRUE;

	$this->load->library('upload', $config);
	$this->upload->initialize($config);

	for($i=0;$i<$countfiles;$i++)
	{
		$_FILES['file']['name']     = $_FILES['userfile']['name'][$i];
		$_FILES['file']['type']     = $_FILES['userfile']['type'][$i];
		$_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
		$_FILES['file']['error']     = $_FILES['userfile']['error'][$i];
		$_FILES['file']['size']     = $_FILES['userfile']['size'][$i];

		if($this->upload->do_upload('file'))
		{
		  	$comprobantes[$i] = $this->upload->data();

			if ($comprobantes[$i]['file_type']=="text/xml")
			{
		  		$this->validar_xml("./uploads/".$folio.'/'.$comprobantes[$i]['file_name']."", $folio, $idpartida);
			}
		}

	}

	/*
$this->load->library('zip');

	for($i=0;$i<count($comprobantes);$i++)
	{
		$this->zip->read_file(FCPATH.'/uploads/'.$idpartida.'/'.$comprobantes[$i]['file_name']);
	}

$this->zip->archive(FCPATH.'/uploads/'.$idpartida.'.zip');
*/

$this->session->set_flashdata('correcto', $this->resultado);
redirect('welcome/comprobarSol?id='.$folio.'');


}


//funcion que sube los xml al servidor
function cargar_reembolso($folio,$idpartida) 
{

$comprobantes = array();
$countfiles = count($_FILES['userfile']['name']);

$carpeta = './uploads/'.$folio.'/'.$idpartida;

	if (!file_exists($carpeta)) 
	{
    mkdir($carpeta, 0777, true);
	}

	$config["upload_path"] = './uploads/'.$folio.'/'.$idpartida;
	$config["allowed_types"] = 'pdf';
	$config["overwrite"] = TRUE;

	$this->load->library('upload', $config);
	$this->upload->initialize($config);

	for($i=0;$i<$countfiles;$i++)
	{
		$_FILES['file']['name']     = $_FILES['userfile']['name'][$i];
		$_FILES['file']['type']     = $_FILES['userfile']['type'][$i];
		$_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
		$_FILES['file']['error']     = $_FILES['userfile']['error'][$i];
		$_FILES['file']['size']     = $_FILES['userfile']['size'][$i];

		if($this->upload->do_upload('file'))
		{
		  	$comprobantes[$i] = $this->upload->data();
		}

	}

redirect('welcome/comprobarSol?id='.$folio.'');


}


//Funcion que valida los xml y verifica su estatus
function validar_xml($file, $folio, $idpartida) 
{
	$xml = new SimpleXMLElement ($file,null,true);
	$cadena = htmlentities(file_get_contents($file));
	$ns = $xml->getNamespaces(true);

	if ($xml->getName()=="Comprobante")
	{
      	$xml->registerXPathNamespace('c', $ns['cfdi']);
      	$xml->registerXPathNamespace('t', $ns['tfd']);

      	foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor)
      	{ $emisor = $Emisor['Rfc'];}

      	foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor)
      	{ $receptor = $Receptor['Rfc'];}

      	foreach ($xml->xpath('//cfdi:Comprobante') as $Comprobante)
      	{ $total = $Comprobante['Total'];}
 
      	foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) 
      	{ $uuid= $tfd['UUID'];} 


    	$soap = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/"><soapenv:Header/><soapenv:Body><tem:Consulta><tem:expresionImpresa>?re='.$emisor.'&amp;rr='.$receptor.'&amp;tt='.$total.'&amp;id='.$uuid.'</tem:expresionImpresa></tem:Consulta></soapenv:Body></soapenv:Envelope>';

    	$headers = 
                ['Content-Type: text/xml;charset=utf-8',
                 'SOAPAction: http://tempuri.org/IConsultaCFDIService/Consulta',
                 'Content-length: '.strlen($soap)];

    	$url = 'https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc';
	
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $soap);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

      	$res = curl_exec($ch);
        curl_close($ch);

      	$xml = simplexml_load_string($res);
      	$data = $xml->children('s', true)->children('', true)->children('', true);
      	$data = json_encode($data->children('a', true), JSON_UNESCAPED_UNICODE);
      	$obj = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data), true );

      	$valido = $obj['Estado'];

      	if ($valido=="Vigente")
      	{
			if ($this->Solicitud_model->checkxml($uuid))
			{
				$datos = $this->Solicitud_model->checksolicitud($folio);

				if ($datos->folio!=$folio)
				{
					$this->resultado = $this->resultado . "El Archivo: " . str_replace("./uploads/".$folio."/","",$file) ." es un Comprobante Fiscal en Uso por: ". $datos->Nombre. " Solicitud Folio: " . $folio . "<br>";
					unlink($file);
				}
				
			}
			else
			{
				$this->Solicitud_model->emisor=$emisor;
				$this->Solicitud_model->receptor=$receptor;
				$this->Solicitud_model->total=$total;
				$this->Solicitud_model->folio=$uuid;
	
				//leer el xml y guardarlo como una cadena para evitar guardar los archivos en el servidor
				$this->Solicitud_model->xml=$cadena;
				$this->Solicitud_model->estatus=1;
	
				$this->Solicitud_model->updatepartida($folio,$idpartida);

				$this->resultado = $this->resultado . "El Archivo: " . str_replace("./uploads/".$folio."/","",$file) ." es un Comprobante Fiscal Valido". "<br>";
			}
		
      	}
      	else if ($valido=="Cancelado")
      	{
			$this->resultado = $this->resultado . "El Archivo: " . str_replace("./uploads/".$folio."/","",$file) ." es un Comprobante Fiscal Cancelado". "<br>";
			unlink($file);	
      	}
	}
	else
      	{
			$this->resultado = $this->resultado . "El Archivo: " . str_replace("./uploads/".$folio."/","",$file) ." no es un Comprobante Fiscal Valido". "<br>";
			unlink($file);	
      	}
      
}





}
