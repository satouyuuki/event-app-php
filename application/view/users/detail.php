<h1 class="h1"><?= $user[0]->name; ?></h1>
<div>
    <span>日付: </span><?= $user[0]->date; ?>
</div>
<div>
    <textarea 
    name="text"
    rows="10"
    cols="40"
    readonly
    ><?= $user[0]->text; ?></textarea>
</div>
<div class="justify-content-between align-items-center">
    <a class="btn btn-primary" href="/users/edit/<?= $user[0]->id; ?>">編集する</a>
    <a class="btn btn-primary" href="./index.php?page=create_user&e_id=<?= $user[0]->id; ?>">ユーザーを追加する</a>
</div>
