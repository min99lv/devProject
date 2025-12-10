<?php

namespace Config;

use CodeIgniter\Config\BaseService;
use App\Services\AuthService;
use App\Models\UsersModel;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    /*
     * public static function example($getShared = true)
     *     if ($getShared) {
     * {
     *         return static::getSharedInstance('example');
     *     }
     *
     *     return new \CodeIgniter\Example();
     * }
     */
    
    public static function authService($getShared = true){
        if ($getShared){
            // 싱글톤 패턴 : 같은 객체를 여러 번 요청해도 한 번만 생성하고 재사용하는 패턴
            return static::getSharedInstance('authService');
        }
        
        return new AuthService();
    }
    public static function usersModel($getShared = true){
        if ($getShared){
            // 싱글톤 패턴 : 같은 객체를 여러 번 요청해도 한 번만 생성하고 재사용하는 패턴
            return static::getSharedInstance('usersModel');
        }
        
        return new UsersModel();
    }
}
