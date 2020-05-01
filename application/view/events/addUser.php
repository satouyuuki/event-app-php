<?php
// var_dump($data);
?>
<h1 class="h1">追加するユーザーを選択</h1>
<form name="form" method="post">
    <select name="users" id="users" onChange="getSelectLabel('users');">
        <option value="0" selected>▼ユーザを選択</option>
        <?php foreach ($data['users'] as $user): ?>
            <option value="<?= $this->h($user->id); ?>"><?= $this->h($user->name); ?></option>
        <?php endforeach; ?>
        <option value="-1">新しいユーザ</option>
    </select>
    <div class="form-group">
        <label for="name">ユーザ名</label>
        <input class="form-control-plaintext
        <?php if(!empty($data['errors']['name'])): ?>
         is-invalid
        <?php endif; ?>
        " type="text" name="name" placeholder="ユーザ名" id="name" value="">
        <div class="invalid-feedback">
          <?= $data['errors']['name']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="text">追加するユーザメモ</label>
        </div>
        <div class="col-6">
            <p>プレビュー</p>
        </div>
        <div class="col-6">
            <div class="form-group">
                <textarea class="form-control" name="text" id="" cols="30" rows="10" placeholder="メモを記入してください"><?= isset($_POST['text']) ? $this->h($_POST['text']) : ''; ?></textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="border w-100 h-100" id="preview">
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">ユーザ 追加</button>

</form>
