<h1>ユーザ編集</h1>
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
        " type="text" name="name" placeholder="ユーザ名" id="name" value="<?= isset($_POST['name']) ? $this->h($_POST['name']) : $this->h($data["user"]->name); ?>">
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
        " type="date" name="date" id="date" value="<?= isset($_POST['data']) ? $this->h($this->inputDateFormat($_POST['data'])) : $this->h($this->inputDateFormat($data["user"]->date)); ?>">
        <div class="invalid-feedback">
          <?= $data['errors']['date']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="text">ユーザメモ</label>
        </div>
        <div class="col-6">
            <p>プレビュー</p>
        </div>
        <div class="col-6">
            <div class="form-group">
                <textarea class="form-control" name="text" id="text" cols="30" rows="10" placeholder="メモを記入してください"><?= isset($_POST['text']) ? $this->h($_POST['text']) : $this->h($data["user"]->text); ?></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="border w-100 h-100" id="preview">
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">ユーザ編集</button>
</form>
