<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/style.css">
    <title>
    <?php 
    if (strstr(URI, 'login')) {
        echo "ログイン画面";
    } elseif (strstr(URI, 'signin')) {
        echo "サインイン画面";
    } elseif (strstr(URI, 'events')) {
        echo "イベント画面";
    } elseif (strstr(URI, 'users')) {
        echo "ユーザ画面";
    } elseif (strstr(URI, 'records')) {
        echo "履歴画面";
    }
    ?>
    </title>
</head>

<body>
