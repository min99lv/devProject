<?php

namespace App\Services;

use App\Models\UsersModel;
use App\DTOs\RegisterDTO;
use App\DTOs\LoginDTO;

class AuthService
{
    protected $usersModel;

    public function __construct()
    {
        // $this->usersModel = new UsersModel();
        $this->usersModel = service('usersModel');
    }

    public function register($registerDTO)
    {

        // 1. 아이디 중복 체크
        $existingUser = $this->usersModel->where('username', $registerDTO->username)->first();
        if($existingUser){
            return [
                'success' => false,
                'message' => '이미 존재하는 아이디입니다.'
            ];
        }

        if($this->usersModel->insert([
            'username' => $registerDTO->username,
            'password' => password_hash($registerDTO->password, PASSWORD_DEFAULT),
            'name' => $registerDTO->name
        ])){
            return [
                'success' => true,
                'message' => '회원가입 성공했습니다.'
            ];
        }else{
            return [
                'success' => false,
                'message' => '회원가입에 실패했습니다.'
            ];
        }        
    }

    public function authenticate($LoginDTO)
    {

        // 1. 사용자 조회
        $user = $this->usersModel->where('username', $LoginDTO->username)->first();

        // 2. 사용자 존재 확인 및 비밀번호 일치 확인
        if($user && password_verify($LoginDTO->password, $user->password)){
            return [
                'success' => true,
                'user' => $user,
                'message' => '로그인 성공했습니다.'
            ];
        }else{
            return [
                'success' => false,
                'message' => '아이디 또는 비밀번호가 틀렸습니다.'
            ];
        }
    }
}


?>