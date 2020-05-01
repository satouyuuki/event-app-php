<?php
// var_dump($this->h($data['event']->text));
// exit();
?>
<h1 class="h1"><?= $this->h($data['event']->name); ?></h1>
<div>
    <span>日付: </span><?= $this->h($data['event']->date); ?>
</div>
<div style="border: 1px solid #ccc;">
    <?= $data['event']->text; ?>
</div>
<div class="justify-content-between align-items-center">
    <a class="btn btn-primary" href="/events/edit/<?= $this->h($data['event']->id); ?>">編集する</a>
    <a class="btn btn-primary" href="/events/addUser/<?= $this->h($data['event']->id); ?>">ユーザーを追加する</a>
</div>
