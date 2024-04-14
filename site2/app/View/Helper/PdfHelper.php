<?php
App::uses('AppHelper', 'View/Helper');

class PdfHelper extends AppHelper {

	public function createPdf($html) {

		// Instantiate the dompdf class
		$dompdf = new Dompdf\Dompdf();

		// Load the HTML
		$dompdf->loadHtml($html);

		// Render the HTML as PDF
		$dompdf->render();

		// Return the generated PDF
		return $dompdf->output();
	}
}
