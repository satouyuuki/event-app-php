<h1>イベント編集</h1>
<?php if(!empty($data['errors']['top'])): ?>
  <div class="alert alert-danger">
    <?= $this->utility->h($data['errors']['top']); ?>
  </div>
<?php endif; ?>
<form name="form" method="post" id="form">
    <div class="form-group">
        <label for="name">イベント名</label>
        <input class="form-control
        <?php if(!empty($data['errors']['name'])): ?>
         is-invalid
        <?php endif; ?>
        " type="text" name="name" placeholder="イベント名" id="name" value="<?= $this->utility->h($data["event"]->name); ?>">
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
        " type="date" name="date" id="date" value="<?= $this->utility->h($this->utility->inputDateFormat($data["event"]->date)); ?>">
        <div class="invalid-feedback">
          <?= $data['errors']['date']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="text">イベントメモ</label>
            <div class="form-group">
                <textarea class="form-control input-area" name="text" id="text" placeholder="メモを記入してください"><?= $this->utility->h($data["event"]->text); ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <label for="preview">プレビュー</label>
            <div class="input-area" id="preview">
            </div>
        </div>
    </div>
    <a class="btn btn-outline-primary" href="#" onClick="history.back(); return false;">戻る</a>
    <button class="btn btn-primary" type="submit">イベント編集</button>
</form>
