<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;
use App\Services\AuthService;

class AuthController extends BaseController
{
    protected $authService;

    // __construct() 메서드는 클래스가 인스턴스화 될 때 자동으로 호출되는 메서드
    public function __construct()
    {
        $this->authService = new AuthService();
    }

    // 회원가입 페이지
    public function register()
    {
        return render('auth/register');
    }

    // 회원가입 처리
    public function storeRegister()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $password_confirm = $this->request->getPost('password_confirm');
        $name = $this->request->getPost('name');


        $result = $this->authService->register($username, $password, $password_confirm,$name);

        if ($result['success']) {
            return redirect()->to('/auth/login')->with('success', $result['message']);
        }
        
        return redirect()->back()->with('error', $result['message']);       
    }

    // 로그인 페이지
    public function login()
    {
        return render('auth/login');
    }

    // 로그인 처리
    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $result = $this->authService->authenticate($username, $password);

        if ($result['success']) {

            $user = $result['user'];

            session()->set([
                'user_id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'isLoggedIn' => true
            ]);

            return redirect()->to('/dashboard')->with('success', '로그인되었습니다.');
        }

        return redirect()->back()->with('error', $result['message']);
    }

    // 로그아웃 처리
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', '로그아웃이 완료되었습니다.');
    }



}




?>