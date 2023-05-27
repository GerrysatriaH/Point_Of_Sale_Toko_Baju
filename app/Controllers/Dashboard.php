<?php

namespace App\Controllers;

class Dashboard extends BaseController {

    protected $data;
    protected $session;

    public function __construct() {

        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index() {

        $this->data['title'] = "Dashboard";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard'
            )
        );

        return view('dashboard/index', $this->data);
    }
}