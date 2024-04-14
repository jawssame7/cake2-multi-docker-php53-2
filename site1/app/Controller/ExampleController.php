<?php

App::uses('AppController', 'Controller');
class ExampleController extends AppController
{

    public $components = array('RequestHandler');

    public function index()
    {
        $this->layout = false;

        $this->RequestHandler->respondAs('application/pdf');
        //
        $this->render('estimate');

    }
}
