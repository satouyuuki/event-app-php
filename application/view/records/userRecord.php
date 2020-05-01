<?php
// var_dump($records);
// exit();
?>
<h1 class="h1"><?= $data['records'][0]->u_name; ?>さんのイベント履歴</h1>
<form method="post" name="record" id="form">
    <?php for($i = 0; $i < count($data['records']); $i++): ?>
        <div class="form-group">
            <input 
            class="form-control" 
            type="text" 
            placeholder="イベント名" 
            value="<?= $i + 1; ?>つ目: <?= $data['records'][$i]->e_name; ?>"
            readonly
            >
            <input type="hidden" name="e_id<?= $i; ?>" value="<?= $data['records'][$i]->e_id; ?>">
        </div>
        <?php if($data['mode'] == 'get'): ?>
            <div>
                <p>内容:</p>
                <div>
                    <?= $data['records'][$i]->text; ?>
                </div>
            </div>
        <?php elseif($data['mode'] == 'edit'): ?>
            <div class="row">
                <div class="col-6">
                    <label for="text">ユーザメモ</label>
                </div>
                <div class="col-6">
                    <p>プレビュー</p>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <textarea class="form-control" name="text<?= $i; ?>" id="text" cols="30" rows="10" placeholder="メモを記入してください"><?= $this->h($data["records"][$i]->text); ?></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="border w-100 h-100 previewFlg" id="preview<?= $i; ?>">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <hr><br>
    <?php endfor; ?>

    <?php if($data['mode'] == 'get'): ?>
        <a class="btn btn-primary" href="/records/userRecord/<?= $data['records'][0]->u_id; ?>/edit">編集する</a>
    <?php elseif($data['mode'] == 'edit'): ?>
        <button class="btn btn-primary" type="submit">
            更新する
        </button>
    <?php endif; ?>

</form>