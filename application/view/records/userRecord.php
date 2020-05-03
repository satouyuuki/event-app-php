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
                <div class="input-area">
                    <?= $data['records'][$i]->text; ?>
                </div>
            </div>
        <?php elseif($data['mode'] == 'edit'): ?>
            <div class="row">
                <div class="col-md-6">
                    <label for="text">ユーザメモ</label>
                    <div class="form-group">
                        <textarea class="form-control input-area" name="text<?= $i; ?>" placeholder="メモを記入してください"><?= $this->h($data["records"][$i]->text); ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="preview<?= $i; ?>">プレビュー</label>
                    <div class="input-area previewFlg" id="preview<?= $i; ?>">
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