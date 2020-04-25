<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="/events/index">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link 
                    <?php 
                        $url= $_SERVER['REQUEST_URI'];
                        if(strstr($url, 'events') == true) {
                            echo 'active';
                        }
                    ?>
                    " 
                    href="/events/index"
                    >
                    イベント一覧</a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link
                    <?php 
                        $url= $_SERVER['REQUEST_URI'];
                        if(strstr($url, 'users') == true) {
                            echo 'active';
                        }
                    ?>
                    " 
                    href="/users/index"
                    >ユーザ一覧</a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link
                    <?php 
                        $url= $_SERVER['REQUEST_URI'];
                        if(strstr($url, 'records') == true) {
                            echo 'active';
                        }
                    ?>
                    " 
                    href="/records/index"
                    >イベント履歴</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">

