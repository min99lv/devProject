<?php
namespace App\Services;

use App\Models\UsersModel;
use App\DTOs\UserDTO;
use DomainException;

class UserService{
    protected $usersModel;

    public function __construct(){
        $this->usersModel = service('usersModel');
    }

    public function getUserById($id){
        return $this->usersModel->find($id);
    }

    public function updateUser($userDTO){

        // 1. 업데이트 필드 준비
        $data = [
            'name' => $userDTO->name,
        ];

        // 2. 비밀번호 처리
        if(!empty($userDTO->password)){
            $data['password'] = password_hash($userDTO->password, PASSWORD_DEFAULT);
        }

        $result = $this->usersModel->update($userDTO->id, $data);

        if(!$result){
            throw new DomainException('내 정보 수정에 실패했습니다.');
        }


        return $result;
    }

    // 회원 목록 조회
    public function getUsersList(){
        return $this->usersModel->findAll();
    }
}

?>