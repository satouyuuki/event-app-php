<h1 class="h1"><?= $this->h($data['event']->name); ?></h1>
<div>
    <span>日付: </span><?= $this->h($data['event']->date); ?>
</div>
<div class="input-area">
    <?= $data['event']->text; ?>
</div>
<a class="btn btn-outline-primary" href="#" onClick="history.back(); return false;">戻る</a>
<a class="btn btn-primary" href="/events/edit/<?= $this->h($data['event']->id); ?>">編集する</a>
<a class="btn btn-primary" href="/events/addUser/<?= $this->h($data['event']->id); ?>">ユーザーを追加する</a>
