<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 17:23
 */
class MY_Controller extends CI_Controller
{

    public $data = array();
    public function __construct()
    {
        parent::__construct();

        $this->page->setLoadCss('assets/bootstrap/css/bootstrap.min');
        $this->page->setLoadJs('assets/jquery/jquery-3.2.1.min');
        $this->page->setLoadJs('assets/bootstrap/js/bootstrap.min');

    }


}