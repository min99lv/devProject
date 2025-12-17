<?php

namespace App\Services;

use App\Models\UsersModel;
use App\Models\UserRolesModel;
use App\DTOs\RegisterDTO;
use App\DTOs\LoginDTO;
use App\DTOs\UserAuthDTO;

class AuthService
{
    protected $usersModel;
    protected $userRolesModel;
    protected $db;

    public function __construct()
    {
        $this->usersModel = service('usersModel');
        $this->userRolesModel = model(UserRolesModel::class);
        $this->db = \Config\Database::connect();
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

        // 2. 트랜잭션 시작
        $this->db->transBegin();

        try {
            // 사용자 저장
            $userId = $this->usersModel->insert([
                'username' => $registerDTO->username,
                'password' => password_hash($registerDTO->password, PASSWORD_DEFAULT),
                'name' => $registerDTO->name
            ]);

            if(!$userId){
                throw new \Exception('사용자 저장 실패');
            }

            // 기본 역할(user) 할당 - role_id: 2
            $this->userRolesModel->insert([
                'user_id' => $userId,
                'role_id' => 2
            ]);

            // 커밋
            $this->db->transCommit();

            return [
                'success' => true,
                'message' => '회원가입 성공했습니다.'
            ];

        } catch (\Exception $e) {
            // 롤백
            $this->db->transRollback();
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
            $roles = $this->usersModel->getUserRoles($user->id);
            $roleNames = array_column($roles, 'id');

            $userAuthDTO = new UserAuthDTO(
                id: $user->id,
                username: $user->username,
                name: $user->name,
                roles: $roleNames
            );

            return [
                'success' => true,
                'userAuth' => $userAuthDTO,
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