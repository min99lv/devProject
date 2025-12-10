<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthCheckFilter implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null){
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/auth/login')->with('error', '로그인이 필요합니다.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
    // 추가적인 작업이 없으면 비워둠 
    }
}

?>