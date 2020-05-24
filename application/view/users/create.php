<h1>ユーザ追加</h1>
<?php if(!empty($data['errors']['top'])): ?>
  <div class="alert alert-danger">
    <?= $this->h($data['errors']['top']); ?>
  </div>
<?php endif; ?>
<form name="form" method="post" id="form">
    <div class="form-group">
        <label for="name">ユーザ名</label>
        <input class="form-control
        <?php if(!empty($data['errors']['name'])): ?>
         is-invalid
        <?php endif; ?>
        " type="text" name="name" placeholder="ユーザ名" id="name" value="<?= isset($_POST['name']) ? $this->h($_POST['name']) : ''; ?>">
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
        " type="date" name="date" id="date" value="<?= isset($_POST['date']) ? $this->h($_POST['date']) : date("Y-m-d"); ?>"
        >
        <div class="invalid-feedback">
          <?= $data['errors']['date']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
          <label for="text">ユーザメモ</label>
          <div class="form-group">
              <textarea class="form-control input-area" name="text" id="" cols="30" rows="10" placeholder="メモを記入してください"><?= isset($_POST['text']) ? $this->h($_POST['text']) : ''; ?></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <label for="preview">プレビュー</label>
          <div class="input-area" id="preview">
          </div>
        </div>
    </div>
    <a class="btn btn-outline-primary" href="#" onClick="history.back(); return false;">戻る</a>
    <button class="btn btn-primary" type="submit">ユーザ追加</button>
</form>
