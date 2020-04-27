<h1 class="h1"><?= $user->name; ?></h1>
<div>
    <span>日付: </span><?= $user->date; ?>
</div>
<div>
    <textarea 
    name="text"
    rows="10"
    cols="40"
    readonly
    ><?= $user->text; ?></textarea>
</div>
<div class="justify-content-between align-items-center">
    <a class="btn btn-primary" href="/users/edit/<?= $user->id; ?>">編集する</a>
</div>
