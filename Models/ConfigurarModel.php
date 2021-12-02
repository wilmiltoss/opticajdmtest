<?php 

class ConfigurarModel extends Mysql{

	public $intIdConfig;
	public $strDescripcion;
	public $strVarlor;
	public $strComentario;


	public function __construct()
	{
		parent::__construct();
	}

	//insercion
	public function insertConfigurar(string $descripcion, string $valor, string $comentario){

			$return = 0;
			//seteamos
			$this->strDescripcion = $descripcion;
			$this->strVarlor = $valor;
			$this->strComentario = $comentario;

			$sql = "SELECT * FROM config WHERE descripcion = '{$this->strDescripcion}' ";//si ya existe?
			$request = $this->select_all($sql);

			if(empty($request))//si es vacia
			{
				$query_insert  = "INSERT INTO config(descripcion,valor,comentario) VALUES(?,?,?)";
	        	$arrData = array($this->strDescripcion, 
								 $this->strVarlor,
								 $this->strComentario);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
	}


	public function selectConfigurar()
	{
		$sql = "SELECT * FROM config ";
		$request = $this->select_all($sql);
		return $request;
	}


	//metodo se invoca desde el controlador
	public function selectConfig(string $idconfig)
	{
		$this->intIdconfig = $idconfig;
		$sql = "SELECT * FROM Config WHERE idConfig = '$this->intIdconfig' ";
		$request = $this->select($sql);
		return $request;
	}


	public function updateConfigurar(int $idconfig, string $descripcion, string $valor,  string $comentario){
		$this->intIdconfig = $idconfig;
		$this->strDescripcion = $descripcion;
		$this->strValor = $valor;
		$this->strComentario = $comentario;


		$sql = "SELECT * FROM config WHERE Descripcion = '$this->strDescripcion' AND idConfig != $this->intIdconfig";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$sql = "UPDATE config SET Descripcion = ?, Valor = ?, Comentario = ? WHERE idConfig = $this->intIdconfig ";
			$arrData = array($this->strDescripcion, 
							 $this->strValor,
							 $this->strComentario);
			$request = $this->update($sql,$arrData);
		}else{
			$request = "exist";
		}
		 return $request;			
	}	


	  public function deleteConfig(int $idConfig)
        {
            $this->intIdConfig = $idConfig;
            $sql = "SELECT * FROM Config WHERE idConfig = $this->intIdConfig";
            $request = $this->select_all($sql);
            if(!empty($request))
            {
                $sql = "Delete from Config WHERE idConfig = $this->intIdConfig ";
                $request = $this->delete($sql);
                if($request)
                {
                    $request = 'ok';    
                }else{
                    $request = 'error';
                }
            }else{
                $request = 'exist';
            }
            return $request;
        }




}
 ?>