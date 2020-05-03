<h1 class="h1">追加するユーザーを選択</h1>
<?php if(!empty($data['errors']['top'])): ?>
  <div class="alert alert-danger">
    <?= $this->h($data['errors']['top']); ?>
  </div>
<?php endif; ?>

<form name="form" method="post">
    <select name="users" id="users" onChange="getSelectLabel('users');">
        <option value="-1">新しいユーザ</option>
        <?php foreach ($data['users'] as $user): ?>
            <option value="<?= $this->h($user->id); ?>"><?= $this->h($user->name); ?></option>
        <?php endforeach; ?>
    </select>
    <div class="form-group">
        <label for="name">ユーザ名</label>
        <input class="form-control
        <?php if(!empty($data['errors']['name'])): ?>
         is-invalid
        <?php endif; ?>
        " type="text" name="name" placeholder="ユーザ名" id="name" value="">
        <div class="invalid-feedback">
          <?= $data['errors']['name']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="text">追加するユーザメモ</label>
            <div class="form-group">
                <textarea class="form-control input-area" name="text" id="text" placeholder="メモを記入してください"><?= isset($_POST['text']) ? $this->h($_POST['text']) : ''; ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <label for="preview">プレビュー</label>
            <div class="input-area" id="preview">
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">ユーザ 追加</button>

</form>
