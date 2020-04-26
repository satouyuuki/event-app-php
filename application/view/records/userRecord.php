<?php
// var_dump($records);
// exit();
?>
<h1 class="h1"><?= $records[0]->u_name; ?>さんのイベント履歴</h1>
<form method="post">
    <?php for($i = 0; $i < count($records); $i++): ?>
    <div class="form-group">
        <input 
        class="form-control" 
        type="text" 
        placeholder="イベント名" 
        value="<?= $records[$i]->e_name; ?>"
        readonly
        >
        <input type="hidden" name="e_id<?= $i; ?>" value="<?= $records[$i]->e_id; ?>">
    </div>
    <div>
        <p>内容:</p>
        <textarea 
        name="text<?= $i; ?>"
        rows="10"
        cols="40"
        <?php if(!$editFlg): ?>
            readonly
        <?php endif; ?>
        ><?= $records[$i]->text; ?></textarea>
    </div>
    <hr><br>
    <?php endfor; ?>

    <?php if(!$editFlg): ?>
        <a class="btn btn-primary" href="/records/userRecord/<?= $records[0]->u_id; ?>/edit">編集する</a>
    <?php else: ?>
        <button class="btn btn-primary" type="submit">
            更新する
        </button>
    <?php endif; ?>

</form>