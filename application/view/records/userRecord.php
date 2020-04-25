<?php
// var_dump($records);
// exit();
?>
<h1 class="h1"><?= $records[0]->u_name; ?>さんの履歴</h1>
<?php foreach($records as $record): ?>
<p>イベント名: <?= $record->e_name; ?></p>
<div>
    <p>内容:</p>
    <textarea 
    name="text"
    rows="10"
    cols="40"
    readonly
    ><?= $record->text; ?></textarea>
</div>
<hr><br>
<?php endforeach; ?>
<div class="justify-content-between align-items-center">
    <a class="btn btn-primary" href="/records/eventEdit/<?= $user[0]->id; ?>">編集する</a>
    <a class="btn btn-primary" href="<?= $user[0]->id; ?>">ユーザーを追加する</a>
</div>
