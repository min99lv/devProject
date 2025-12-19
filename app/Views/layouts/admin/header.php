<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevProject - 관리자</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        header {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff8c8c 100%);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        header h1 {
            font-size: 32px;
            font-weight: bold;
        }

        nav {
            background-color: #2c3e50;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .nav-left {
            display: flex;
            gap: 20px;
        }

        .nav-right {
            display: flex;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #34495e;
        }

        nav a.admin-btn {
            background-color: #e74c3c;
        }

        nav a.admin-btn:hover {
            background-color: #c0392b;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
            min-height: calc(100vh - 250px);
        }

        footer {
            background-color: #2c3e50;
            color: white;
            padding: 30px 20px;
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
        }

        footer p {
            margin: 5px 0;
        }

        h1 a {
            color: white;
            text-decoration: none;
            font-size: 32px;
            font-weight: bold;
            transition: color 0.3s;
        }

        h1 a:hover {
            color: #f0f0f0;
        }

        .admin-badge {
            background-color: #e74c3c;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="/dashboard">관리자 대시보드</a></h1>
    </header>

    <nav>
        <div class="nav-left">
            <a href="/admin/users/list" class="admin-btn">회원관리</a>
        </div>
        <div class="nav-right">
            <a href="/user/show">내정보</a>
            <a href="/auth/logout" style="background-color: #d32f2f; padding: 8px 15px; border-radius: 4px;">로그아웃</a>
        </div>
    </nav>

    <div class="container">

