<?php
 
namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class userAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {
        $except = [
            'auth/register',
            'auth/auth_register',
            'auth/login',
            'auth/auth_login',
        ];

        if (is_null(session()->get('logged_in')) && !in_array($request->uri->getPath(), $except)) {
            return redirect()
                ->to(base_url('/auth/login'))
                ->with('error', 'Silakan login terlebih dahulu!');
        }

        if (!is_null(session()->get('logged_in')) && in_array($request->uri->getPath(), $except)) {
            return redirect()
                ->back()
                ->with('success', 'Anda sudah login.');
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
    }
}