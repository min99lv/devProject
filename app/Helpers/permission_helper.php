<?php

use App\Models\UsersModel;

if(!function_exists('userHasRole')){

    // 현재 사용자가 특정 역할을 가지는지 확인
    function userHasRole($role){
        $session = session();
        $userAuth = $session->get('userAuth');
    }

}

?>