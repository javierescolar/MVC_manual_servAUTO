
<?php
require_once 'controllers/home_controller.php';
require_once 'controllers/unidad_basica_controller.php';
require_once 'controllers/calendario_laboral_controller.php';
require_once 'controllers/servicio_terapia_controller.php';
require_once 'controllers/tecnico_controller.php';
require_once 'controllers/albaran_controller.php';

$request_uri =  explode('?',$_SERVER['REQUEST_URI']);


if ($request_uri[0] == "/home" || $request_uri[0] == "/") { HomeController::index(); }
if ($request_uri[0] == "/generar_script" ) { HomeController::generarScript(); }



//rutas para unidades basicas
if ($request_uri[0] == "/unidades_basicas") { UnidadBasicaController::index(); }
if ($request_uri[0] == "/unidades_basicas_new") { UnidadBasicaController::nuevo(); }
if ($request_uri[0] == "/unidades_basicas_edit" && (isset($_GET['edit_unidad_basica']))) { UnidadBasicaController::edit(); }
if ($request_uri[0] == "/unidades_basicas_delete" && (isset($_POST['delete_unidad_basica']))) { UnidadBasicaController::delete(); }
if ($request_uri[0] == "/unidades_basicas_update" && (isset($_POST['save_unidad_basica']))) { UnidadBasicaController::update(); }
if ($request_uri[0] == "/unidades_basicas_create" && (isset($_POST['save_unidad_basica']))) { UnidadBasicaController::create(); }
if ($request_uri[0] == "/unidades_basicas_import" && (!isset($_POST['import_XML']))) { UnidadBasicaController::import(); }
if ($request_uri[0] == "/unidades_basicas_import" && (isset($_POST['import_XML']))) { UnidadBasicaController::importData(); }


//rutas para calendario laboral
if ($request_uri[0] == "/calendarios_laborales") { CalendarioLaboralController::index(); }
if ($request_uri[0] == "/calendarios_laborales_new") { CalendarioLaboralController::nuevo(); }
if ($request_uri[0] == "/calendarios_laborales_edit" && (isset($_GET['edit_calendario_laboral']))) { CalendarioLaboralController::edit(); }
if ($request_uri[0] == "/calendarios_laborales_delete" && (isset($_POST['delete_calendario_laboral']))) { CalendarioLaboralController::delete(); }
if ($request_uri[0] == "/calendarios_laborales_update" && (isset($_POST['save_calendario_laboral']))) { CalendarioLaboralController::update(); }
if ($request_uri[0] == "/calendarios_laborales_create" && (isset($_POST['save_calendario_laboral']))) { CalendarioLaboralController::create(); }
if ($request_uri[0] == "/calendarios_laborales_import" && (!isset($_POST['import_XML']))) { CalendarioLaboralController::import(); }
if ($request_uri[0] == "/calendarios_laborales_import" && (isset($_POST['import_XML']))) { CalendarioLaboralController::importData(); }


//rutas para perfiles_terapias
if ($request_uri[0] == "/servicios_terapias") { ServicioTerapiaController::index(); }
if ($request_uri[0] == "/servicios_terapias_new") { ServicioTerapiaController::nuevo(); }
if ($request_uri[0] == "/servicios_terapias_edit" && (isset($_GET['edit_servicio_terapia']))) { ServicioTerapiaController::edit(); }
if ($request_uri[0] == "/servicios_terapias_delete" && (isset($_POST['delete_servicio_terapia']))) { ServicioTerapiaController::delete(); }
if ($request_uri[0] == "/servicios_terapias_update" && (isset($_POST['save_servicio_terapia']))) { ServicioTerapiaController::update(); }
if ($request_uri[0] == "/servicios_terapias_create" && (isset($_POST['save_servicio_terapia']))) { ServicioTerapiaController::create(); }
if ($request_uri[0] == "/servicios_terapias_import" && (!isset($_POST['import_XML']))) { ServicioTerapiaController::import(); }
if ($request_uri[0] == "/servicios_terapias_import" && (isset($_POST['import_XML']))) { ServicioTerapiaController::importData(); }

//rutas para tecnicos
if ($request_uri[0] == "/tecnicos") { TecnicoController::index(); }
if ($request_uri[0] == "/tecnicos_new") { TecnicoController::nuevo(); }
if ($request_uri[0] == "/tecnicos_edit" && (isset($_GET['edit_tecnico']))) { TecnicoController::edit(); }
if ($request_uri[0] == "/tecnicos_delete" && (isset($_POST['delete_tecnico']))) { TecnicoController::delete(); }
if ($request_uri[0] == "/tecnicos_update" && (isset($_POST['save_tecnico']))) { TecnicoController::update(); }
if ($request_uri[0] == "/tecnicos_create" && (isset($_POST['save_tecnico']))) { TecnicoController::create(); }
if ($request_uri[0] == "/tecnicos_import" && (!isset($_POST['import_XML']))) { TecnicoController::import(); }
if ($request_uri[0] == "/tecnicos_import" && (isset($_POST['import_XML']))) { TecnicoController::importData(); }


//rutas albaranes
if ($request_uri[0] == "/albaranes") { AlbaranController::index(); }



//Si no encuentra ruta le redirigimos al index
 //HomeController::index();