<?php

namespace App\Controllers;

use App\Models\GestionDatosReportesModel;
use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;
use Dompdf\Options;
use Exception;

class ReportesControler extends BaseController
{
	public function from01()
	{
		$Model = new GestionDatosReportesModel();
		$request = service('request');
		$perfil_id = $request->getGet('id');
		$fecha_inicio = $request->getGet('fecha_inicio');
		$fecha_fin = $request->getGet('fecha_final');

		$datosPuntoParada = $Model->repoPuntoParaMovilidades($perfil_id, $fecha_inicio, $fecha_fin);
		$imgauto = '';
		$imgConductor = '';
		if (!empty($datosPuntoParada) && isset($datosPuntoParada[0]['imagenautomovil']) && isset($datosPuntoParada[0]['imagenconductor'])) {
			$imgauto = $datosPuntoParada[0]['imagenautomovil'];
			$imgConductor = $datosPuntoParada[0]['imagenconductor'];
			$session = session();

			$imagen_colegio = 'recursos/Colegio/escudocolegio.png';
			$imagen_contenido = file_get_contents($imagen_colegio);
			$imagColegio = base64_encode($imagen_contenido);
			$imagen_el_alto = 'recursos/Colegio/escudoAlto.png';
			$imagen_contenido1 = file_get_contents($imagen_el_alto);
			$imagElAlto = base64_encode($imagen_contenido1);
			$imagenAuto = 'uploads/Automoviles/' . $imgauto;
			$imagen_contenido2 = file_get_contents($imagenAuto);
			$imagenAutomovil = base64_encode($imagen_contenido2);
			$imagenConducto = 'uploads/Conductores/' . $imgConductor;
			$imagen_contenido3 = file_get_contents($imagenConducto);
			$imagenConductores = base64_encode($imagen_contenido3);
			// Datos del reporte
			$dataReporte = [
				"nombre" => $session->get('nombre'),
				"apellido" => $session->get('apellido'),
				"ci" => $session->get('ci'),
				"telefono" => $session->get('telefono'),
				"direccion" => $session->get('direccion'),
				"datosEstudiante" => $datosPuntoParada,
				"imagColegio" => $imagColegio,
				"imagElAlto" => $imagElAlto,
				"imagenAutomovil" => $imagenAutomovil,
				"imagenConductores" => $imagenConductores,
			];
			$filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);
			$html = view('reportes/reporte01', $dataReporte);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			// Guardar o descargar el PDF
			return $this->response->setContentType('application/pdf')
				->setBody($dompdf->output())
				->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


		} else {
			$session = session();
			$imagen_colegio = 'recursos/Colegio/escudocolegio.png';
			$imagen_contenido = file_get_contents($imagen_colegio);
			$imagColegio = base64_encode($imagen_contenido);
			$imagen_el_alto = 'recursos/Colegio/escudoAlto.png';
			$imagen_contenido1 = file_get_contents($imagen_el_alto);
			$imagElAlto = base64_encode($imagen_contenido1);
			$dataReporte = [
				"nombre" => $session->get('nombre'),
				"apellido" => $session->get('apellido'),
				"ci" => $session->get('ci'),
				"telefono" => $session->get('telefono'),
				"direccion" => $session->get('direccion'),
				"datosEstudiante" => $datosPuntoParada,
				"imagColegio" => $imagColegio,
				"imagElAlto" => $imagElAlto,
			];
			$filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);
			$html = view('reportes/plantilla', $dataReporte);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			// Guardar o descargar el PDF
			return $this->response->setContentType('application/pdf')
				->setBody($dompdf->output())
				->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


		}


	}
	public function ListaEstudiantes()
	{
		$Model = new GestionDatosReportesModel();
		$request = service('request');
		$fecha_inicio = $request->getGet('fecha_inicio');
		$fecha_fin = $request->getGet('fecha_final');
		$datosEstudiante = $Model->repoEstudiantesRegistrador($fecha_inicio, $fecha_fin);
		$imgestudiante = '';
		if (!empty($datosEstudiante)) {
			$session = session();
			$imagen_colegio = 'recursos/Colegio/escudocolegio.png';
			$imagen_contenido = file_get_contents($imagen_colegio);
			$imagColegio = base64_encode($imagen_contenido);
			$imagen_el_alto = 'recursos/Colegio/escudoAlto.png';
			$imagen_contenido1 = file_get_contents($imagen_el_alto);
			$imagElAlto = base64_encode($imagen_contenido1);
			// Datos del reporte
			$dataReporte = [
				"nombre" => $session->get('nombre'),
				"apellido" => $session->get('apellido'),
				"ci" => $session->get('ci'),
				"telefono" => $session->get('telefono'),
				"direccion" => $session->get('direccion'),
				"datosEstudiante" => $datosEstudiante,
				"imagColegio" => $imagColegio,
				"imagElAlto" => $imagElAlto,
			];
			$filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);
			$html = view('reportes/ListaEstudiante', $dataReporte);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			// Guardar o descargar el PDF
			return $this->response->setContentType('application/pdf')
				->setBody($dompdf->output())
				->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');
		} else {
			$session = session();
			$imagen_colegio = 'recursos/Colegio/escudocolegio.png';
			$imagen_contenido = file_get_contents($imagen_colegio);
			$imagColegio = base64_encode($imagen_contenido);
			$imagen_el_alto = 'recursos/Colegio/escudoAlto.png';
			$imagen_contenido1 = file_get_contents($imagen_el_alto);
			$imagElAlto = base64_encode($imagen_contenido1);
			$dataReporte = [
				"nombre" => $session->get('nombre'),
				"apellido" => $session->get('apellido'),
				"ci" => $session->get('ci'),
				"telefono" => $session->get('telefono'),
				"direccion" => $session->get('direccion'),
				"datosEstudiante" => $datosEstudiante,
				"imagColegio" => $imagColegio,
				"imagElAlto" => $imagElAlto,
			];
			$filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);
			$html = view('reportes/plantilla', $dataReporte);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			// Guardar o descargar el PDF
			return $this->response->setContentType('application/pdf')
				->setBody($dompdf->output())
				->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


		}


	}
	public function ListaAutomoviles()
	{
		$Model = new GestionDatosReportesModel();
		$request = service('request');
		$fecha_inicio = $request->getGet('fecha_inicio');
		$fecha_fin = $request->getGet('fecha_final');
		$datosAutomovil = $Model->repoAutomovilRegistrador($fecha_inicio, $fecha_fin);
		if (!empty($datosAutomovil)) {
			$session = session();
			$imagen_colegio = 'recursos/Colegio/escudocolegio.png';
			$imagen_contenido = file_get_contents($imagen_colegio);
			$imagColegio = base64_encode($imagen_contenido);
			$imagen_el_alto = 'recursos/Colegio/escudoAlto.png';
			$imagen_contenido1 = file_get_contents($imagen_el_alto);
			$imagElAlto = base64_encode($imagen_contenido1);
			// Datos del reporte
			$dataReporte = [
				"nombre" => $session->get('nombre'),
				"apellido" => $session->get('apellido'),
				"ci" => $session->get('ci'),
				"telefono" => $session->get('telefono'),
				"direccion" => $session->get('direccion'),
				"datosAutomovil" => $datosAutomovil,
				"imagColegio" => $imagColegio,
				"imagElAlto" => $imagElAlto,
			];
			$filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);
			$html = view('reportes/ListaAutomoviles', $dataReporte);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			// Guardar o descargar el PDF
			return $this->response->setContentType('application/pdf')
				->setBody($dompdf->output())
				->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');
		} else {
			$session = session();
			$imagen_colegio = 'recursos/Colegio/escudocolegio.png';
			$imagen_contenido = file_get_contents($imagen_colegio);
			$imagColegio = base64_encode($imagen_contenido);
			$imagen_el_alto = 'recursos/Colegio/escudoAlto.png';
			$imagen_contenido1 = file_get_contents($imagen_el_alto);
			$imagElAlto = base64_encode($imagen_contenido1);
			$dataReporte = [
				"nombre" => $session->get('nombre'),
				"apellido" => $session->get('apellido'),
				"ci" => $session->get('ci'),
				"telefono" => $session->get('telefono'),
				"direccion" => $session->get('direccion'),
				"datosEstudiante" => $datosAutomovil,
				"imagColegio" => $imagColegio,
				"imagElAlto" => $imagElAlto,
			];
			$filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);
			$html = view('reportes/plantilla', $dataReporte);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			// Guardar o descargar el PDF
			return $this->response->setContentType('application/pdf')
				->setBody($dompdf->output())
				->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


		}


	}
	public function GuiaTelefonica()
	{
		$Model = new GestionDatosReportesModel();
		$datosguia = $Model->repoGuiaTelefonica();
		if (!empty($datosguia)) {
			$session = session();
			$imagen_colegio = 'recursos/Colegio/escudocolegio.png';
			$imagen_contenido = file_get_contents($imagen_colegio);
			$imagColegio = base64_encode($imagen_contenido);
			$imagen_el_alto = 'recursos/Colegio/escudoAlto.png';
			$imagen_contenido1 = file_get_contents($imagen_el_alto);
			$imagElAlto = base64_encode($imagen_contenido1);
			// Datos del reporte
			$dataReporte = [
				"nombre" => $session->get('nombre'),
				"apellido" => $session->get('apellido'),
				"ci" => $session->get('ci'),
				"telefono" => $session->get('telefono'),
				"direccion" => $session->get('direccion'),
				"datosguia" => $datosguia,
				"imagColegio" => $imagColegio,
				"imagElAlto" => $imagElAlto,
			];
			$filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);
			$html = view('reportes/GuisTelefonica', $dataReporte);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			// Guardar o descargar el PDF
			return $this->response->setContentType('application/pdf')
				->setBody($dompdf->output())
				->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');
		} else {
			$session = session();
			$imagen_colegio = 'recursos/Colegio/escudocolegio.png';
			$imagen_contenido = file_get_contents($imagen_colegio);
			$imagColegio = base64_encode($imagen_contenido);
			$imagen_el_alto = 'recursos/Colegio/escudoAlto.png';
			$imagen_contenido1 = file_get_contents($imagen_el_alto);
			$imagElAlto = base64_encode($imagen_contenido1);
			$dataReporte = [
				"nombre" => $session->get('nombre'),
				"apellido" => $session->get('apellido'),
				"ci" => $session->get('ci'),
				"telefono" => $session->get('telefono'),
				"direccion" => $session->get('direccion'),
				"datosEstudiante" => $datosguia,
				"imagColegio" => $imagColegio,
				"imagElAlto" => $imagElAlto,
			];
			$filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);
			$html = view('reportes/plantilla', $dataReporte);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			// Guardar o descargar el PDF
			return $this->response->setContentType('application/pdf')
				->setBody($dompdf->output())
				->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


		}


	}
	public function ListaEstudianteAuto()
	{
		$Model = new GestionDatosReportesModel();
		$request = service('request');
		$id = $request->getGet('id');
		$AutoEstudiante = $Model->repoEstudiantesAuto($id);
		$imgauto = '';
		$imgConductor = '';
		if (!empty($AutoEstudiante) && isset($AutoEstudiante[0]['imagenautomovil']) && isset($AutoEstudiante[0]['imagenconductor'])) {
			$imgauto = $AutoEstudiante[0]['imagenautomovil'];
			$imgConductor = $AutoEstudiante[0]['imagenconductor'];
			$session = session();

			$imagen_colegio = 'recursos/Colegio/escudocolegio.png';
			$imagen_contenido = file_get_contents($imagen_colegio);
			$imagColegio = base64_encode($imagen_contenido);
			$imagen_el_alto = 'recursos/Colegio/escudoAlto.png';
			$imagen_contenido1 = file_get_contents($imagen_el_alto);
			$imagElAlto = base64_encode($imagen_contenido1);
			$imagenAuto = 'uploads/Automoviles/' . $imgauto;
			$imagen_contenido2 = file_get_contents($imagenAuto);
			$imagenAutomovil = base64_encode($imagen_contenido2);
			$imagenConducto = 'uploads/Conductores/' . $imgConductor;
			$imagen_contenido3 = file_get_contents($imagenConducto);
			$imagenConductores = base64_encode($imagen_contenido3);
			// Datos del reporte
			$dataReporte = [
				"nombre" => $session->get('nombre'),
				"apellido" => $session->get('apellido'),
				"ci" => $session->get('ci'),
				"telefono" => $session->get('telefono'),
				"direccion" => $session->get('direccion'),
				"AutoEstudiante" => $AutoEstudiante,
				"imagColegio" => $imagColegio,
				"imagElAlto" => $imagElAlto,
				"imagenAutomovil" => $imagenAutomovil,
				"imagenConductores" => $imagenConductores,
			];
			$filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);
			$html = view('reportes/AutoEstudiante', $dataReporte);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			// Guardar o descargar el PDF
			return $this->response->setContentType('application/pdf')
				->setBody($dompdf->output())
				->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


		} else {
			$session = session();
			$imagen_colegio = 'recursos/Colegio/escudocolegio.png';
			$imagen_contenido = file_get_contents($imagen_colegio);
			$imagColegio = base64_encode($imagen_contenido);
			$imagen_el_alto = 'recursos/Colegio/escudoAlto.png';
			$imagen_contenido1 = file_get_contents($imagen_el_alto);
			$imagElAlto = base64_encode($imagen_contenido1);
			$dataReporte = [
				"nombre" => $session->get('nombre'),
				"apellido" => $session->get('apellido'),
				"ci" => $session->get('ci'),
				"telefono" => $session->get('telefono'),
				"direccion" => $session->get('direccion'),
				"datosEstudiante" => $AutoEstudiante,
				"imagColegio" => $imagColegio,
				"imagElAlto" => $imagElAlto,
			];
			$filename = 'generated_pdf_' . date('Y-m-d_H-i-s') . '.pdf';
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);
			$html = view('reportes/plantilla', $dataReporte);
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4', 'portrait');
			$dompdf->render();
			// Guardar o descargar el PDF
			return $this->response->setContentType('application/pdf')
				->setBody($dompdf->output())
				->setHeader('Content-Disposition', 'inline; filename="Reporte_' . date("Y-m-d_H:i:s") . '.pdf"');


		}


	}

	

	
}

