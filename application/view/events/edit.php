<?php
// var_dump($event);
?>
<h1>イベント編集</h1>
<form name="form" method="post">
    <div class="form-group">
        <label for="name">イベント名</label>
        <input class="form-control" type="text" name="name" placeholder="イベント名" id="name" value="<?= $event->name; ?>">
    </div>
    <div class="form-group">
        <label for="date">日付</label>
        <input class="form-control" type="text" name="date" id="date" value="<?= $event->date; ?>">
    </div>
    <div class="row">
        <div class="col-6">
            <label for="text">感想</label>
        </div>
        <div class="col-6">
            <p>プレビュー</p>
        </div>
        <div class="col-6">
            <div class="form-group">
                <textarea class="form-control" name="text" id="text" cols="30" rows="10" placeholder="メモを記入してください"><?= $event->text; ?></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="border w-100 h-100" id="preview">
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">イベント編集</button>
</form>
