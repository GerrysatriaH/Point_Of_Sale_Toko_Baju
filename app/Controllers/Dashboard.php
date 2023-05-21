<?php

namespace App\Controllers;

class Dashboard extends BaseController {

    protected $data;

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