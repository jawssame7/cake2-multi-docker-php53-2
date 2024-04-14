<?php

App::uses('AppController', 'Controller');
class PdfController extends AppController
{
    public $components = array('RequestHandler');

    public function index() {
        $this->layout = false;
        $this->RequestHandler->respondAs('application/pdf');
    }
}
