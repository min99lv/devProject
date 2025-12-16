<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevProject</title>
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
            background: linear-gradient(135deg,rgb(138, 160, 255) 0%, rgb(146, 166, 255) 100%);
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
            background-color: #333;
            padding: 15px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
            background-color: #555;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
            min-height: calc(100vh - 250px);
        }

        footer {
            background-color: #333;
            color: white;
            padding: 30px 20px;
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
        }

        footer p {
            margin: 5px 0;
        }
        h1 a{
            color: white;
            text-decoration: none;
            font-size: 32px;
            font-weight: bold;
            transition: color 0.3s;
        }
        h1 a:hover {
            color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="/dashboard">Header</a></h1>
    </header>

    <nav>
        <?php if (session()->get('isLoggedIn')): ?>
            <div>
            <a href="/user/show">내정보</a>
            <a href="/auth/logout" style="background-color: #d32f2f; padding: 8px 15px; border-radius: 4px;">로그아웃</a>
            </div>
        <?php else: ?>
            <a href="/auth/register">회원가입</a>
            <a href="/auth/login" style="background-color: #667eea;">로그인</a>
        <?php endif; ?>
    </nav>

    <div class="container">

