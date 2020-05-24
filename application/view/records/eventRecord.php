<h1 class="h1"><?= $data['records'][0]->e_name; ?>のユーザ一覧</h1>
<form name="record" method="post" id="form">
    <?php for($i = 0; $i < count($data['records']); $i++): ?>
        <div class="form-group">
            <input 
            class="form-control" 
            type="text" 
            placeholder="ユーザ名" 
            value="<?= $i + 1; ?>人目: <?= $data['records'][$i]->u_name; ?>さん"
            readonly
            >
            <input type="hidden" name="u_id<?= $i; ?>" value="<?= $data['records'][$i]->u_id; ?>">
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
                    <label for="text<?= $i; ?>">ユーザメモ</label>
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
    <a class="btn btn-outline-primary" href="#" onClick="history.back(); return false;">戻る</a>
    <?php if($data['mode'] == 'get'): ?>
        <a class="btn btn-primary" href="/records/eventRecord/<?= $data['records'][0]->e_id; ?>/edit">編集する</a>
        <a class="btn btn-primary" href="/events/addUser/<?= $this->h($data['records'][0]->e_id); ?>">ユーザーを追加する</a>
    <?php elseif($data['mode'] == 'edit'): ?>
        <button class="btn btn-primary" type="submit">
            更新する
        </button>
    <?php endif; ?>
</form>
