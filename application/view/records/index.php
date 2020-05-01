<?php
// var_dump($records);
?>
<h1 class="h1">イベント履歴</h1>
<?php if(!empty($data['delResult'])): ?>
    <?php if($data['delResult'] === 'deleteFail'): ?>
    <div class="alert alert-danger">
        削除に失敗しました。
    </div>
    <?php elseif($data['delResult'] === 'deleteSuc'): ?>
    <div class="alert alert-success">
        削除が成功しました。
    </div>
    <?php endif; ?>
<?php endif; ?>
<div class="text-left">
    <a class="btn btn-primary" onclick="return confirm('本当に全部削除しますか？');" href="/records/delete/all">一括削除</a>
</div>
<ul class="list-group">
    <?php foreach ($data["records"] as $record): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/records/eventRecord/<?= $this->h($record->e_id); ?>">
                <?= $this->h($record->e_name); ?>
            </a>
            <a href="/records/userRecord/<?= $this->h($record->u_id); ?>">
                <?= $this->h($record->u_name); ?>
            </a>
            <a class="btn btn-primary" onclick="return confirm('本当に削除しますか？');" href="/records/delete/<?= $this->h($record->e_id); ?>/<?= $this->h($record->u_id); ?>">削除</a>
        </li>
    <?php endforeach; ?>
</ul>