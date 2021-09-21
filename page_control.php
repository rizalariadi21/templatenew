<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$page = $_GET["page"];
$level = $_SESSION['level'];
			switch($page ){

//BEGIN RIZAL PAGE ================================================================================================

			case ($page=="home") :
				include "pages/home.php";
				break;
			case ($page=="data_user" && $level=='superadmin'):
				include "pages/data_user.php";
				break;
			case ($page=="data_cabor" && $level=='superadmin'):
				include "pages/data_cabor.php";
				break;
			case ($page=="data_sapras" && $level=='superadmin'):
				include "pages/data_sapras.php";
				break;
			case ($page=="jadwal_latihan" && $level=='superadmin'):
				include "pages/jadwal_latihan.php";
				break;
			case ($page=="data_atlit"):
				include "pages/data_atlit.php";
				break;
			case ($page=="data_atlit"):
				include "pages/data_atlit.php";
				break;
			case ($page=="detail_atlit"):
				include "pages/detail_atlit.php";
				break;
			case ($page=="data_pelatih"):
				include "pages/data_atlit_pelatih.php";
				break;
			case ($page=="detail_pelatih"):
				include "pages/detail_pelatih.php";
				break;
			default: 
					include "pages/external/external.php";
					break;

				}
?>