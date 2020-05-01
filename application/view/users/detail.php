<h1 class="h1"><?= $this->h($data['user']->name); ?></h1>
<div>
    <span>日付: </span><?= $this->h($data['user']->date); ?>
</div>
<div style="border: 1px solid #ccc;">
    <?= $data['user']->text; ?>
</div>
<div class="justify-content-between align-items-center">
    <a class="btn btn-primary" href="/users/edit/<?= $this->h($data['user']->id); ?>">編集する</a>
</div>
