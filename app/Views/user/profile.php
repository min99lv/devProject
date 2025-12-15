<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내 정보</title>
</head>
<body>
    <h2>내 정보</h2>
    <table>
        <tr>
            <td>아이디</td>
            <td><?= session()->get('username') ?></td>
        </tr>
        <tr>
            <td>이름</td>
            <td><input type="text" name="name" value="<?= session()->get('name') ?>"></td>
        </tr>
        <tr>
            <td>비밀번호</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>비밀번호 확인</td>
            <td><input type="password" name="password_confirm"></td>
        </tr>
        <tr>
            <td>
                <button type="submit">저장</button>
            </td>
        </tr>
    </table>
</body>
</html>