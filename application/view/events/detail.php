<?php
// var_dump($event);
?>
<h1 class="h1"><?= $event->name; ?></h1>
<div>
    <span>日付: </span><?= $event->date; ?>
</div>
<div style="border: 1px solid #ccc;">
    <?= $event->text; ?>
</div>
<div class="justify-content-between align-items-center">
    <a class="btn btn-primary" href="/events/edit/<?= $event->id; ?>">編集する</a>
    <a class="btn btn-primary" href="/events/addUser/<?= $event->id; ?>">ユーザーを追加する</a>
</div>
