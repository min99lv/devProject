<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
/**
 * 인증 확인 필터
 * 요청 전에 세션에서 로그인 상태를 확인하고
 * 비로그인 상태면 로그인 페이지로 리다이렉트
 */
class AuthCheckFilter implements FilterInterface{
    // 요청 전에 실행되는 메서드 
    public function before(RequestInterface $request, $arguments = null){
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/auth/login')->with('error', '로그인이 필요합니다.');
        }
    }

    // 응답 후 실행되는 메서드 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
    // 추가적인 작업이 없으면 비워둠 
    }
}

?>