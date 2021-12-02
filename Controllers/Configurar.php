<?php 

class Configurar extends Controllers{ //1-Extender al controllers
		public function __construct()
		{
			session_start();
			parent::__construct();
			
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(MDCONTACTOS);
		}


		public function Configurar() //2-Crear la funcion
		{
			if(empty($_SESSION['permisosMod']['r'])){ // si tenemos permiso de lectura
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Configurar";
			$data['page_title'] = "CONFIGURAR <small>Optica JDM</small>";
			$data['page_name'] = "Configurar";
			$data['page_functions_js'] = "functions_configurar.js";//este archivo lo creamos en Assets/js
			$this->views->getView($this,"configurar",$data);//llamado hacia la vista, creamos la vista en Views
		}

			public function setConfigurar(){

			if($_POST){
				if(empty($_POST['txtDescripcion']) || empty($_POST['txtValor']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					//captura los valores del formulario
					$intIdConfig = intval($_POST['idConfig']);
					$strDescripcion =  strClean($_POST['txtDescripcion']);
					$strValor = strClean($_POST['txtValor']);
					$strComentario = strClean($_POST['txtComentario']);
					$request_configurar = "";

					//dep($intIdConfig); dep($strDescripcion);exit();

					if($intIdConfig == 0)
					{
						//Crear
						if($_SESSION['permisosMod']['w']){

							$request_configurar = $this->model->insertConfigurar($strDescripcion, $strValor,$strComentario);
							$option = 1;
						}
					}else{
						//Actualizar
						if($_SESSION['permisosMod']['u']){
							$request_configurar = $this->model->updateConfigurar($intIdConfig,$strDescripcion, $strValor,$strComentario);
							$option = 2;
						}
					}
					if($request_configurar > 0 )
					{				
						if($option == 1)
						{
							$arrResponse = array('status' => true, 'msg' => 'Datos insertados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else if($request_configurar == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! La configuración ya existe.');
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


		//llama al Models que consulta los valores de la tabla Config, para la vista principal del formulario escritorio
		public function getConfigurar()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectConfigurar();
				//dep($arrData);
				//exit();
				//Recorremos el array
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';
				
				
					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idConfig'].')" title="Ver configuración"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idConfig'].')" title="Editar configuración"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idConfig'].')" title="Eliminar configuración"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


		public function getConfig($idConfig)

		{
			if($_SESSION['permisosMod']['r']){
				$intIdConfig = intval($idConfig);
				if($intIdConfig > 0)
				{
					$arrData = $this->model->selectConfig($intIdConfig);
					//dep($arrData);exit();
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}


		public function delConfig()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdConfig = intval($_POST['idConfig']);
					$requestDelete = $this->model->deleteConfig($intIdConfig);
					if($requestDelete == 'ok')
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la configuracion');
					}else if($requestDelete == 'exist'){
						$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar la configuracion');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la configuracion.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}


}

