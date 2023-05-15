<?php
 
namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class userAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {

        if(is_null(session()->get('logged_in'))) {
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to(base_url('auth/login'));
        }
 
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {

        if(!is_null(session()->get('logged_in'))) {
            session()->setFlashdata('success', 'Anda sudah login');
            return redirect()->to(base_url('auth/login'));
        }
    }
}