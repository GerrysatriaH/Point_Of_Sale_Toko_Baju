<?php

namespace App\Controllers;

class Dashboard extends BaseController {

    protected $data;

    public function index() {

        $this->data['title'] = "Dashboard";

        return view('dashboard/index', $this->data);
    }
}