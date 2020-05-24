<h1 class="h1"><?= $this->utility->h($data['user']->name); ?></h1>
<div>
    <span>日付: </span><?= $this->utility->h($data['user']->date); ?>
</div>
<div class="input-area">
    <?= $this->utility->h($data['user']->text); ?>
</div>
<a class="btn btn-outline-primary" href="#" onClick="history.back(); return false;">戻る</a>
<a class="btn btn-primary" href="/users/edit/<?= $this->utility->h($data['user']->id); ?>">編集する</a>
