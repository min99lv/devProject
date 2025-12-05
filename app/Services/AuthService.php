<?php

namespace App\Services;

use App\Models\UsersModel;

class AuthService
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function register($username, $password, $password_confirm, $name)
    {
        // 1. 비밀번호 일치 확인
        if($password !== $password_confirm){
            return [
                'success' => false,
                'message' => '비밀번호가 일치하지 않습니다.'
            ];
        }

        // 2. 아이디 중복 체크
        $existingUser = $this->usersModel->where('username', $username)->first();
        if($existingUser){
            return [
                'success' => false,
                'message' => '이미 존재하는 아이디입니다.'
            ];
        }

        // 사용자 생성 
        $data = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'name' => $name
        ];

        if($this->usersModel->insert($data)){
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

    public function authenticate($username, $password)
    {
        // 1. 사용자 조회
        $user = $this->usersModel->where('username', $username)->first();

        // 2. 사용자 존재 확인 및 비밀번호 일치 확인
        if($user && password_verify($password, $user->password)){
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