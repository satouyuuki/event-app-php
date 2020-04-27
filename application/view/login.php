<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>ログインページ</title>
</head>
<body>
    <div class="container">
        <h1 class="h1">ログインページ</h1>
        <form method="post">
            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" name="email" placeholder="メールアドレスを入力してください" id="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="パスワードを入力してください" id="password" required>
            </div>
            <button class="btn btn-primary" type="submit">送信</button>
        </form>
    </div>
</body>
</html>