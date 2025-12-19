<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\DTOs\UserDTO;
use DomainException;

class UserController extends BaseController{
    private $userService;

    public function __construct(){
        $this->userService = service('userService');
    }

    // 내 정보 보기
    public function show(){
        $id = session()->get('id');
        if(!$id){
            return redirect()->to('/auth/login')->with('error', '로그인이 필요합니다.');
        }
        
        $user = $this->userService->getUserById($id);
        return view('user/profile', ['user' => $user]);
    }

    // 내 정보 수정
    public function update(){
        $id = session()->get('id');
        $name = trim($this->request->getPost('name'));
        $password = $this->request->getPost('password');
        $password_confirm = $this->request->getPost('password_confirm');

        // 1. 입력값이 비어있는지 확인

        if($name === ''){
            return redirect()->back()->with('error', '이름을 입력해주세요.');
        }

        // 2. 비밀번호 일치 확인
        if($password !== '' || $password_confirm !== ''){
            if($password !== $password_confirm){
                return redirect()->back()->with('error', '비밀번호가 일치하지 않습니다.');
            }
        }

        $userDTO = new UserDTO(
            id: $id,
            name: $name,
            password: $password ?: null
        );

        try{
            $this->userService->updateUser($userDTO);
        }catch(DomainException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->to('/user/show')->with('success', '내 정보가 수정되었습니다.');
    }
}


?>