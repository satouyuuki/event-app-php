<?php
?>
<h1 class="h1">イベント一覧</h1>
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
<div>
    <a href="/events/create">イベントを追加する</a>
</div>
<ul class="list-group">
    <?php foreach ($data["events"] as $event): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/events/detail/<?= $this->h($event->id); ?>">
                <?= $this->h($event->name); ?>
            </a>
            <a class="btn btn-primary" onclick="return confirm('本当に削除しますか？');" href="/events/delete/<?= $this->h($event->id); ?>">削除</a>
        </li>
    <?php endforeach; ?>
</ul>