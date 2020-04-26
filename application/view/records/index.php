<?php
// var_dump($records);
?>
<h1 class="h1">イベント履歴</h1>
<?php if(!empty($error)): ?>
    <?php if(($error[0] === 'deleteSuc')): ?>
    <div class="alert alert-success">
        削除が成功しました。
    </div>
    <?php endif; ?>
<?php endif; ?>
<ul class="list-group">
    <?php foreach ($records as $record): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/records/eventRecord/<?= $record->e_id; ?>">
                <?= $record->e_name; ?>
            </a>
            <a href="/records/userRecord/<?= $record->u_id; ?>">
                <?= $record->u_name; ?>
            </a>
            <a class="btn btn-primary" onclick="return confirm('本当に削除しますか？');" href="/records/delete/<?= $record->e_id; ?>/<?= $record->u_id; ?>">削除</a>
        </li>
    <?php endforeach; ?>
</ul>