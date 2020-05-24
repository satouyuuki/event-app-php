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
<ul class="list-group">
    <?php foreach ($data["records"] as $record): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/records/eventRecord/<?= $this->utility->h($record->e_id); ?>">
                <?= $this->utility->h($record->e_name); ?>
            </a>
            <a href="/records/userRecord/<?= $this->utility->h($record->u_id); ?>">
                <?= $this->utility->h($record->u_name); ?>
            </a>
            <a class="btn btn-primary" onclick="return confirm('本当に削除しますか？');" href="/records/delete/<?= $this->utility->h($record->e_id); ?>/<?= $this->utility->h($record->u_id); ?>">削除</a>
        </li>
    <?php endforeach; ?>
</ul>