<?php
///Switch con el objetivo de usar los js que se requieren por pagina
if (isset($_GET['ruta'])) {
	switch ($_GET['ruta']) {
		case 'perfil':
			$cssTag = '';
			$jsTag = '';
			$jsTagCustom = '<script src="assets/js/p-perfil.js"></script>';
			break;
		case 'inicio':
			$cssTag = '';
			$jsTag = '';
			$jsTagCustom = '<script src="assets/js/p-dashboard.js"></script>';
			break;
		case 'convenios':
			$cssTag = '';
			$jsTag = '<script src="assets/plugins/fileUpload/jquery.fileupload.js"></script>';
			$jsTagCustom = '<script src="assets/js/p-convenios.js?v=1.0.2"></script>';
			break;
		case 'contratos':
			$cssTag = '';
			$jsTag = '<script src="assets/plugins/fileUpload/jquery.fileupload.js"></script>';
			$jsTagCustom = '<script src="assets/js/p-contratos.js?v=1.0.2"></script>';
			break;
		case 'coediciones':
			$cssTag = '';
			$jsTag = '<script src="assets/plugins/fileUpload/jquery.fileupload.js"></script>';
			$jsTagCustom = '<script src="assets/js/p-coediciones.js?v=1.0.0"></script>';
			break;
		case 'catalogos':
			$cssTag = '';
			$jsTag = '';
			$jsTagCustom = '<script src="assets/js/p-catalogos.js"></script>';
			break;
		case 'instituciones':
			$cssTag = '';
			$jsTag = '';
			$jsTagCustom = '<script src="assets/js/p-instituciones.js"></script>';
			break;
		case 'usuarios':
			$cssTag = '';
			$jsTag = '';
			$jsTagCustom = '<script src="assets/js/p-usuarios.js"></script>';
			break;
		case 'modulos':
			$cssTag = '';
			$jsTag = '';
			$jsTagCustom = '<script src="assets/js/p-modulos.js"></script>';
			break;
		case 'permisos':
			$cssTag = '';
			$jsTag = '';
			$jsTagCustom = '<script src="assets/js/p-permisos.js"></script>';
			break;
		case 'roles':
			$cssTag = '';
			$jsTag = '';
			$jsTagCustom = '<script src="assets/js/p-roles.js"></script>';
			break;
		case 'accesos':
			$cssTag = '';
			$jsTag = '';
			$jsTagCustom = '<script src="assets/js/p-accesos.js"></script>';
			break;
		default:
			$cssTag = '';
			$jsTag = '';
			break;
	}
}
