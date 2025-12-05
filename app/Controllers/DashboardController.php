<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // 로그인 확인
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }

        return render('dashboard/index');
    }
}
?>

