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
            value="<?= $i + 1; ?>つ目: <?= $records[$i]->e_name; ?>"
            readonly
            >
            <input type="hidden" name="e_id<?= $i; ?>" value="<?= $records[$i]->e_id; ?>">
        </div>
        <div>
            <p>内容:</p>
            <?php if($mode == 'get'): ?>
                <?= $records[$i]->text; ?>
            <?php elseif($mode == 'edit'): ?>
                <textarea 
                name="text<?= $i; ?>"
                rows="10"
                cols="40"
                ><?= $records[$i]->text; ?></textarea>
            <?php endif; ?>
        </div>
        <hr><br>
    <?php endfor; ?>

    <?php if($mode == 'get'): ?>
        <a class="btn btn-primary" href="/records/userRecord/<?= $records[0]->u_id; ?>/edit">編集する</a>
    <?php elseif($mode == 'edit'): ?>
        <button class="btn btn-primary" type="submit">
            更新する
        </button>
    <?php endif; ?>

</form>