<?php 
	//direccion raiz del proyecto
	// const BASE_URL = "http://localhost:8081/opticajdm";
	const BASE_URL = "https://opticajdmtest.herokuapp.com";
	//const BASE_URL = "https://abelosh.com/tiendavirtual";

	//Zona horaria
	date_default_timezone_set('America/Asuncion');

	//Datos de conexión a Base de Datos local
	/*const DB_HOST = "localhost";
	const DB_NAME = "db_tiendavirtual";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";*/

	//Datos de conexión a Base de Datos externa
	const DB_HOST = "ik1eybdutgxsm0lo.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
	const DB_NAME = "vefhalo3ydeye1do";
	const DB_USER = "utrz1pyo2mzfh9pl";
	const DB_PASSWORD = "bb1rle000xeznxve";
	const DB_CHARSET = "utf8";

	//Para envío de correo
	const ENVIRONMENT = 0; // Local: 0, Produccón: 1;

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = "";
	const SPM = ".";

	//Simbolo de moneda
	const SMONEY = "Gs.  ";
	const CURRENCY = "USD";

	//Api PayPal
	//SANDBOX PAYPAL
	const URLPAYPAL = "https://api-m.sandbox.paypal.com";
	const IDCLIENTE = "";
	const SECRET = "";
	//LIVE PAYPAL
	//const URLPAYPAL = "https://api-m.paypal.com";
	//const IDCLIENTE = "";
	//const SECRET = "";

	//Datos envio de correo
	const NOMBRE_REMITENTE = "Optica JDM";
	//const EMAIL_REMITENTE = "wilmiltoss@gmail.com";
	const EMAIL_REMITENTE = "jdmoptica@gmail.com";
	const NOMBRE_EMPESA = "Optica JDM";
	const WEB_EMPRESA = "www.facebook.com/opticajdm.face";

	const DESCRIPCION = "La mejor para tu salud y belleza visual";
	const SHAREDHASH = "TiendaVirtual";

	//Datos Empresa
	const DIRECCION = "San Sebastian y San Carlos - San Antonio PY";
	const TELEMPRESA = "+595994973161";
	const WHATSAPP = "+595994973161";
	const EMAIL_EMPRESA = "wilmiltoss@gmail.com";
	const EMAIL_PEDIDOS = "wilmiltoss@gmail.com"; 
	const EMAIL_SUSCRIPCION = "wilmiltoss@gmail.com";
	const EMAIL_CONTACTO = "wilmiltoss@gmail.com";

	const CAT_SLIDER = "1,2,3";
	const CAT_BANNER = "4,5,6";
	const CAT_FOOTER = "1,2,3,4,5";

	//Datos para Encriptar / Desencriptar
	const KEY = 'opticajdm';
	const METHODENCRIPT = "AES-128-ECB";

	//Envío
	const COSTOENVIO = 10000;

	//Módulos
	const MDASHBOARD = 1;
	const MUSUARIOS = 2;
	const MCLIENTES = 3;
	const MPRODUCTOS = 4;
	const MPEDIDOS = 5;
	const MCATEGORIAS = 6;
	const MSUSCRIPTORES = 7;
	const MDCONTACTOS = 8;
	const MDPAGINAS = 9;
	const MDCONFIGURAR = 10;

	//Páginas
	const PINICIO = 1;
	const PTIENDA = 2;
	const PCARRITO = 3;
	const PNOSOTROS = 4;
	const PCONTACTO = 5;
	const PPREGUNTAS = 6;
	const PTERMINOS = 7;
	const PSUCURSALES = 8;
	const PERROR = 9;

	//Roles
	const RADMINISTRADOR = 1;
	const RSUPERVISOR = 2;
	const RCLIENTES = 3;

	const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');

	//Productos por página
	const CANTPORDHOME = 8;
	const PROPORPAGINA = 4;
	const PROCATEGORIA = 4;
	const PROBUSCAR = 4;

	//REDES SOCIALES
	const FACEBOOK = "https://www.facebook.com/opticajdm.face";
	const INSTAGRAM = "https://www.instagram.com/";
	

 ?>
