<?php

namespace App\Controllers;

use App\Services\AuthService;
use App\DTOs\RegisterDTO;
use App\DTOs\LoginDTO;

class AuthController extends BaseController
{
    private $authService;

    // __construct() 메서드는 클래스가 인스턴스화 될 때 자동으로 호출되는 메서드
    public function __construct()
    {
        // Config\Services에 등록된 authService 공유 인스턴스를 가져옴
        $this->authService = service('authService');
    }

    // 회원가입 페이지
    public function register()
    {
        return view('auth/register', ['pageTitle' => '회원가입']);
    }

    // 회원가입 처리
    public function storeRegister()
    {
        // 1. 입력값 검증
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $password_confirm = $this->request->getPost('password_confirm');
        $name = $this->request->getPost('name');

        // 2. 입력값이 비어있는지 확인
        if(empty($username) || empty($password) || empty($password_confirm) || empty($name)){
            return redirect()->back()->with('error', '모든 필드를 입력해주세요.');
        }

        // 3. 비밀번호 일치 확인
        if($password !== $password_confirm){
            return redirect()->back()->with('error', '비밀번호가 일치하지 않습니다.');
        }

        // DTO 생성
        $registerDTO = new RegisterDTO(
            username: $username,
            password: $password,
            name: $name
        );

        $result = $this->authService->register($registerDTO);

        if ($result['success']) {
            return redirect()->to('/auth/login')->with('success', $result['message']);
        }
        
        return redirect()->back()->with('error', $result['message']);       
    }

    // 로그인 페이지
    public function login()
    {
        return view('auth/login', ['pageTitle' => '로그인']);
    }

    // 로그인 처리
    public function authenticate()
    {
        // 1. 입력값 검증
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // 2. 입력값이 비어있는지 확인
        if(empty($username) || empty($password)){
            return redirect()->back()->with('error', '모든 필드를 입력해주세요.');
        }

        $loginDTO = new LoginDTO(
            username: $this->request->getPost('username'),
            password: $this->request->getPost('password')
        );

        $result = $this->authService->authenticate($loginDTO);

        if ($result['success']) {

            $userAuth  = $result['userAuth'];
            
            // 사용자 역할 확인 (admin이면 'admin', 아니면 'user')
            $userRole = 'user'; // 기본값
            if (!empty($userAuth->roles)) {
                foreach ($userAuth->roles as $role) {
                    if (isset($role['name']) && $role['name'] === 'admin') {
                        $userRole = 'admin';
                        break;
                    }
                }
            }

            session()->set([
                'id' => $userAuth->id,
                'username' => $userAuth->username,
                'name' => $userAuth->name,
                'roles' => $userAuth->roles,
                'role' => $userRole,  // 🔑 현재 사용자의 역할
                'isLoggedIn' => true
            ]);

            return redirect()->to('/dashboard')->with('success', '로그인 되었습니다.');
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