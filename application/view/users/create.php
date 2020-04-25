<?php
/* @var Controller $this */
?>
<h1>ユーザ追加</h1>
<form method="post">
    <div class="form-group">
        <label for="name">ユーザ名</label>
        <input class="form-control" type="text" name="name" placeholder="ユーザ名" id="name">
    </div>
    <div class="form-group">
        <label for="date">日付</label>
        <input class="form-control" type="date" name="date" id="date">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="text" id="" cols="30" rows="10" placeholder="メモを記入してください"></textarea>
    </div>
    <button class="btn btn-primary" type="submit">ユーザ追加</button>
</form>
