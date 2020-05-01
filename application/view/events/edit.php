<?php
?>
<h1>イベント編集</h1>
<form name="form" method="post">
    <div class="form-group">
        <label for="name">イベント名</label>
        <input class="form-control
        <?php if(!empty($data['errors']['name'])): ?>
         is-invalid
        <?php endif; ?>
        " type="text" name="name" placeholder="イベント名" id="name" value="<?= $this->h($data["event"]->name); ?>">
        <div class="invalid-feedback">
          <?= $data['errors']['name']; ?>
        </div>
    </div>
    <div class="form-group" style="width: 170px;">
        <label for="date">日付</label>
        <input class="form-control
        <?php if(!empty($data['errors']['date'])): ?>
         is-invalid
        <?php endif; ?>
        " type="date" name="date" id="date" value="<?= $this->h($this->inputDateFormat($data["event"]->date)); ?>">
        <div class="invalid-feedback">
          <?= $data['errors']['date']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="text">イベントメモ</label>
        </div>
        <div class="col-6">
            <p>プレビュー</p>
        </div>
        <div class="col-6">
            <div class="form-group">
                <textarea class="form-control" name="text" id="text" cols="30" rows="10" placeholder="メモを記入してください"><?= $this->h($data["event"]->text); ?></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="border w-100 h-100" id="preview">
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">イベント編集</button>
</form>
