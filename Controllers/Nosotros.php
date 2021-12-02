<?php 
	class Nosotros extends Controllers{
		public function __construct()
		{
			session_start();
			parent::__construct();
			
			getPermisos(MDPAGINAS);
		}

		public function nosotros()
		{
			$pageContent = getPageRout('nosotros');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = NOMBRE_EMPESA;
				$data['page_title'] = NOMBRE_EMPESA." - ".$pageContent['titulo'];
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"nosotros",$data);  
			}

		}

	}
 ?>
