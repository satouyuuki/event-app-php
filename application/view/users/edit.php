<?php
// print_r($user);
?>
<h1>イベント編集</h1>
<form method="post">
    <div class="form-group">
        <label for="name">ユーザー名</label>
        <input class="form-control" type="text" name="name" placeholder="イベント名" id="name" value="<?= $user[0]->name; ?>">
    </div>
    <div class="form-group">
        <label for="date">日付</label>
        <input class="form-control" type="text" name="date" id="date" value="<?= $user[0]->date; ?>">
    </div>
    <div class="form-group">
        <label for="text">感想</label>
        <textarea class="form-control" name="text" id="text" cols="30" rows="10" placeholder="メモを記入してください"><?= $user[0]->text; ?></textarea>
    </div>
    <button class="btn btn-primary" type="submit">ユーザ編集</button>
</form>




