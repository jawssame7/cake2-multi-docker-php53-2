<?php

App::uses('AppController', 'Controller');
App::uses('PdfHelper', 'View/Helper');

class PdfController extends AppController
{



    public function index() {
        $this->layout = false;
    }

    public function test()
    {
        $this->layout = false;
    }

    public function wkhtmltopdf()
    {
//        $this->layout = false;
//        $this->render('/pdf/wkhtmltopdf');
    }

    public function invoice()
    {
//        $this->layout = false;
//        $this->render('/pdf/invoice');
    }

    public function downloadPdf()
    {
        $this->autoRender = false;
        $this->helpers[] = 'Pdf';
        $this->Pdf = new PdfHelper(new View());

//        // Create some HTML content
//        $html = $this->createEstimateHtml();
//

        // レンダリングした結果のviewを取得
        $view = new View();
        $view->viewPath = 'Pdf';
        $view->layout = false;
        $html = $view->render('index');
//        var_dump($html);
        // Create the PDF
        $pdf = $this->Pdf->createPdf($html);

        // Set the headers and send the PDF to the browser
        header('Content-type: application/pdf');
        echo $pdf;
    }

    private function createEstimateHtml()
    {
        $html = '';
        $html .= '<style>';
        $html .= '@font-face {';
        $html .= 'font-family: ipag;';
        $html .= 'font-style: normal;';
        $html .= 'font-weight: normal;';
        $html .= 'src: url("../fonts/ipaexg.ttf");';
        $html .= '}';
        $html .= 'body {';
        $html .= 'font-family: ipag;';
        $html .= '}';
        $html .= '</style>';
        $html .= '<body>';
        $html .= '<p>見積書の内容</p>';
        $html .= '</body>';
//        var_dump($html);
        return $html;
    }
}
