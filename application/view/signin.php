<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>登録ページ</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <button 
        class="navbar-toggler" 
        type="button" 
        data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
        aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a 
                    class="nav-link
                    <?php 
                        $url= $_SERVER['REQUEST_URI'];
                        if(strstr($url, 'login') == true) {
                            echo 'active';
                        }
                    ?>
                    " 
                    href="/login"
                    >ログイン</a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link
                    <?php 
                        $url= $_SERVER['REQUEST_URI'];
                        if(strstr($url, 'signin') == true) {
                            echo 'active';
                        }
                    ?>
                    " 
                    href="/signin"
                    >サインイン</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1 class="h1">サインインページ</h1>
        <?php if (isset($errors)) :?>
            <div class="alert alert-danger">
                <?= $errors; ?>
            </div>
        <?php endif; unset($errors); ?>
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