<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
//ruta de ingreso login
$routes->get('/', 'LoginController::index');
$routes->get('/lcrc', 'LoginController::restablecerContraseña');
$routes->get('/lci', 'LoginController::invitacion');
//ruta de autenticacion 
$routes->post('/lca', 'LoginController::acceso');
//ruta cerrar session
$routes->get('/css', 'LoginController::logout');

$routes->get('/ai', 'AdministradorController::index');
$routes->get('/er0rr', 'Home::error');
$routes->get('/acec', 'AdministradorController::EstudiantesConductor');
   
$routes->get('/mcua', 'MapasController::UbicacionActual');
//ruta de GESTION TRANSPORTE/ TELEFONO
$routes->get('/gtctv', 'GestionTransporteController::TelefoniaView');
//ruta para ver datos en tabla
$routes->get('/gtcdtv', 'GestionTransporteController::DatosTelefonoView');
//ruta para agregar telefono 
$routes->post('/gtcat', 'GestionTransporteController::agregarTelefono');
//ruta para eliminar telefono
$routes->post('/gtcet','GestionTransporteController::eliminarTelefono');
//extraccion del telefono
$routes->post('/gtcetv', 'GestionTransporteController::ExtracionTelefonoView');
//ruta para actualizar telefono
$routes->post('/gtcate','GestionTransporteController::actualizarTelefono');

//ruta de mapas 
$routes->get('/mcut', 'MapasController::TrayectoriaCamino');
//ver perfil
$routes->get('/gpfucp', 'GestionPerfilUserController::PerfilView');
$routes->get('/gpfudp', 'GestionPerfilUserController::datosPerfilView');
//ruta para perfil
$routes->post('/gdpuca', 'GestionPerfilUserController::agregarPerfil');
//extraccion del perfil
$routes->post('/gtpuce', 'GestionPerfilUserController::ExtracionPerfilView');
//ruta para actualizar perfil
$routes->post('/gtpucap','GestionPerfilUserController::actualizarPerfil');
//ruta para eliminar perifl
$routes->post('/gpucep','GestionPerfilUserController::eliminarPerfil');




  //ruta seguimiento
  $routes->post('/sgcgg', 'SeguimientoGPSController::guardarLocalizacion');
  $routes->post('/sggru', 'SeguimientoGPSController::guardarRuta');
  $routes->get('/sgcua', 'SeguimientoGPSController::ubicacionActual');
  $routes->post('/sgcue', 'SeguimientoGPSController::ubicacionEstudiante');


  
  
  //rutas para registro de seguimiento
  $routes->post('/sgciv', 'SeguimientoGPSController::iniciar_viaje');
  $routes->post('/sgcfv', 'SeguimientoGPSController::finalizar_viaje');



  //rutas para dasbord extraccion de datos 
  $routes->get('/dgcoh', 'DatosGeograficosController::obtenerDatosHogarEstudiante');
  $routes->get('/dgcodh', 'DatosGeograficosController::obtenerDatosHogar');
  $routes->get('/dgcodhec', 'DatosGeograficosController::obtenerDatosHogarEstudiantesConductor');

//para el listado de estudiantes conductor
  $routes->post('/acacs', 'AlertasController::AlertasDeConductor');
  $routes->post('/aceel', 'AlertasController::EliminarEstudianteLista');
  

  
//rutas para el administrador
$routes->group('', ['filter' => 'RolFilter'], function($routes) {
   

    /******************************************************************************************
     * RUTAS DE BARRA LATERAL
     *******************************************************************************************/
    //ruta de dashboardas
    $routes->get('/ai', 'AdministradorController::index');
    $routes->get('/acdd', 'AdministradorController::dashboardsDispositivo');
    //ruta de mapas 
    $routes->get('/mcua', 'MapasController::UbicacionActual');
    $routes->get('/mcut', 'MapasController::TrayectoriaCamino');
  
    /******************************************************************************************
     * RUTAS DE MENU 
     *******************************************************************************************/
    //ruta de GESTION USUARIO/ PRIVILEGIOS
    $routes->get('/gupv', 'GestionUsuarioController::PrivilegioView');
    //ruta vista de datos de privilegio por ajax
    $routes->get('/gudp', 'GestionUsuarioController::DatosPrivilegioView1');
    //ruta agregar
    $routes->post('/agudp', 'GestionUsuarioController::AgregarDatosPrivilegioView');
    //ruta modificar
    $routes->post('/guce', 'GestionUsuarioController::editar_privilegio');
    //ruta eliminar
    $routes->post('/gucep', 'GestionUsuarioController::elimanar_privilegio');
    
    
    //ruta de GESTION USUARIO/ ROLES
    $routes->get('/gurv', 'GestionUsuarioController::RolesView');
    //vista de datos de roles
    $routes->get('/gucdrv', 'GestionUsuarioController::DatosRolesView');
    //ruta agregar roles
    $routes->post('/gucar', 'GestionUsuarioController::agregar_rol');
    //ruta modificar roles
    $routes->post('/gucedr', 'GestionUsuarioController::editar_rol');
    //ruta eliminar roles
    $routes->post('/gucer', 'GestionUsuarioController::eliminar_rol');
    
    //ruta de GESTION USUARIO/ ESTUDIANTE
    $routes->get('/gucev', 'GestionUsuarioController::EstudianteView');
    //vista de datos de roles
    $routes->get('/gucdev', 'GestionUsuarioController::DatosEstudienteView');
    //agregar estudiante
    $routes->post('/gucaes', 'GestionUsuarioController::agregar_Estudiante');
    //ruta eliminar roles
    $routes->post('/gucee', 'GestionUsuarioController::eliminar_Estudiante');
    
    //ruta de GESTION USUARIO/ PADRE
    $routes->get('/gucpv', 'GestionUsuarioController::PadreView');
    //ruta ver datos
    $routes->get('/gucdpv', 'GestionUsuarioController::DatosPadresView');
    //ruta agregar padre
    $routes->post('/gucap', 'GestionUsuarioController::agregar_Padres');
    //extraccion de datos de los padres
    $routes->post('/gucepv', 'GestionUsuarioController::ExtracionPadresView');
    //ruta eliminar padre
    $routes->post('/gucepp', 'GestionUsuarioController::eliminar_padre');
    //ruta editar padre
    $routes->post('/gucepsp', 'GestionUsuarioController::editar_Padres');
    
    //ruta de GESTION USUARIO/ ADMINISTRADOR
    $routes->get('/gucav', 'GestionUsuarioController::AdministradorView');
    //ruta de GESTION USUARIO/ Ver Datos
    $routes->get('/gucdav', 'GestionUsuarioController::datosAdministradorView');
    //ruta agregar administrador
    $routes->post('/gucaa', 'GestionUsuarioController::agregarAdministrador');
    //ruta eliminar administrador
    $routes->post('/gucea', 'GestionUsuarioController::eliminar_administrador');
    //extraccion de datos de los padres
    $routes->post('/guceav', 'GestionUsuarioController::ExtracionAdministradorView');
    //edicion de datos de los padres
    $routes->post('/gucedita', 'GestionUsuarioController::editarAdministrador');
    
    
    
    //ruta de GESTION TRANSPORTE/ CONDUCTORES
    $routes->get('/guccv', 'GestionTransporteController::ConductoresView');
    //ruta para ver datos en tabla
    $routes->get('/gucdcv', 'GestionTransporteController::datosConductorView');
    //ruta para agregar Conductor 
    $routes->post('/gtcac', 'GestionTransporteController::AgregarConductor');
    //extraccion del conductor
    $routes->post('/gtcecv', 'GestionTransporteController::ExtracionConductorView');
    //ruta para actualizar conductor
    $routes->post('/gtcactc','GestionTransporteController::editarConductor');
    //ruta para eliminar conductor
    $routes->post('/gtcec','GestionTransporteController::eliminarConductor');
    
    
    //ruta de GESTION TRANSPORTE/ AUTOMOVIL
    $routes->get('/gtcav', 'GestionTransporteController::AutomovilView');
    //ruta para ver datos en tabla
    $routes->get('/gtcdav', 'GestionTransporteController::DatosAutomovilView');
    //ruta para agregar automovil 
    $routes->post('/gtcaa', 'GestionTransporteController::agregarAutomivil');
    //ruta para eliminar automovil
    $routes->post('/gtcea','GestionTransporteController::eliminarAutomovil');
    //extraccion del automovil
    $routes->post('/gtceav', 'GestionTransporteController::ExtracionAutomovilView');
    //ruta para actualizar automovil
    $routes->post('/gtcau','GestionTransporteController::actualizarAutomivil');
    //ruta de GESTION TRANSPORTE/ TELEFONO
    $routes->get('/gtctv', 'GestionTransporteController::TelefoniaView');
    //ruta para ver datos en tabla
    $routes->get('/gtcdtv', 'GestionTransporteController::DatosTelefonoView');
    //ruta para agregar telefono 
    $routes->post('/gtcat', 'GestionTransporteController::agregarTelefono');
    //ruta para eliminar telefono
    $routes->post('/gtcet','GestionTransporteController::eliminarTelefono');
    //extraccion del telefono
    $routes->post('/gtcetv', 'GestionTransporteController::ExtracionTelefonoView');
    //ruta para actualizar telefono
    $routes->post('/gtcate','GestionTransporteController::actualizarTelefono');
    
    
    //ruta de GESTION DISPOSITIVO/ GPS
    $routes->get('/gdcgv', 'GestionDispositivosController::GPSView');
    //ruta para ver datos en tabla
    $routes->get('/gtcdv', 'GestionDispositivosController::DatosDispositivoGPSView');
    //ruta para agregar GPS 
    $routes->post('/gdcag', 'GestionDispositivosController::agregarGPS');
    //ruta para eliminar GPS
    $routes->post('/gtcedg','GestionDispositivosController::eliminarDispositivoGPS');
    //extraccion del GPS
    $routes->post('/gtcev', 'GestionDispositivosController::ExtracionGPSView');
    //ruta para actualizar telefono
    $routes->post('/gtcagp','GestionDispositivosController::actualizarGPS');
    
    //ruta de GESTION DISPOSITIVO/ RFID
    $routes->get('/gdcrv', 'GestionDispositivosController::RfidView');
    //ruta para ver datos en tabla
    $routes->get('/gtcdrif', 'GestionDispositivosController::DatosDispositivoRFIDView');
    //ruta para agregar RFID 
    $routes->post('/gdcarf', 'GestionDispositivosController::agregarRFID');
    //ruta para eliminar RFID
    $routes->post('/gtcerfi','GestionDispositivosController::eliminarDispositivoRFID');
    //extraccion del RDIF
    $routes->post('/gtcerv', 'GestionDispositivosController::ExtracionRFIDView');
    //ruta para actualizar RFId
    $routes->post('/gtdcar','GestionDispositivosController::actualizarRFID');
    
    
    /******************************************************************************************
     * RUTAS DE PERFIL
     *******************************************************************************************/
    $routes->get('/gpfucp', 'GestionPerfilUserController::PerfilView');
    $routes->get('/gpfudp', 'GestionPerfilUserController::datosPerfilView');
    //ruta para perfil
    $routes->post('/gdpuca', 'GestionPerfilUserController::agregarPerfil');
    //extraccion del perfil
    $routes->post('/gtpuce', 'GestionPerfilUserController::ExtracionPerfilView');
    //ruta para actualizar RFId
    $routes->post('/gtpucap','GestionPerfilUserController::actualizarPerfil');
    //ruta para eliminar RFID
    $routes->post('/gpucep','GestionPerfilUserController::eliminarPerfil');
    
    
    
    //ruta para eliminar RFID
    $routes->get('/gfdgd','GafricasDashbordController::getData');
    //ruta para eliminar RFID
    $routes->get('/gfdgdg','GafricasDashbordController::getDataGrafica1');
    //ruta para eliminar RFID
    $routes->get('/gfdodb','GafricasDashbordController::obtenerDatosParaGrafico');
    
    
    //ruta seguimiento
    $routes->post('/sgcgg', 'SeguimientoGPSController::guardarLocalizacion');
    $routes->post('/sggru', 'SeguimientoGPSController::guardarRuta');
    $routes->get('/sgcua', 'SeguimientoGPSController::ubicacionActual');
    
    
    //rutas para dasbord extraccion de datos 
    $routes->get('/dgcoh', 'DatosGeograficosController::obtenerDatosHogarEstudiante');
    $routes->get('/dgcodh', 'DatosGeograficosController::obtenerDatosHogar');

    //rutas para Estudiante Auto
    $routes->get('/eacea', 'EstudianteAutoController::EstudianteAutoView');
    //rutas para Estudiante Auto
    $routes->post('/eacgi', 'EstudianteAutoController::GuardarItmes');
    //rutas para Mensajes de Alerta 
    $routes->get('/ecmeav', 'AlertasController::MensajeAlertarView');
   //ruta llamado de datos 
    $routes->get('/aclav', 'AlertasController::listaAlertasView');
    //Elimar alerta
    $routes->post('/acea', 'AlertasController::eliminar_alerta');

    //repostes
    $routes->get('/ecf1', 'ReportesControler::from01');
    $routes->get('/ecf2', 'ReportesControler::ListaEstudiantes');
    $routes->get('/ecf3', 'ReportesControler::ListaAutomoviles');
    $routes->get('/ecf4', 'ReportesControler::GuiaTelefonica');
    $routes->get('/ecf5', 'ReportesControler::ListaEstudianteAuto');

  });







