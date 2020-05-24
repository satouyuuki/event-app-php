<form method="post" class="form-layout">
    <h1 class="h2">サインアップページ</h1>
    <?php if (isset($data['errors']['signup'])) :?>
        <div class="alert alert-danger">
            <?= $data['errors']['signup']; ?>
        </div>
    <?php endif; unset($data['errors']['signup']); ?>
    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
    <div class="form-group">
        <label for="email">E-mail</label>
        <input class="form-control
        <?php if(!empty($data['errors']['email'])): ?>
         is-invalid
        <?php endif; ?>
        " type="email" name="email" placeholder="メールアドレスを入力してください" id="email" autofocus value="
        <?= isset($_POST['email']) ? $this->utility->h($_POST['email']) : ''; ?>
        ">
        <div class="invalid-feedback">
          <?= isset($data['errors']['email']) ? $this->utility->h($data['errors']['email']) : ''; unset($data['errors']['email']); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control
        <?php if(!empty($data['errors']['password'])): ?>
         is-invalid
        <?php endif; ?>
        " type="password" name="password" placeholder="パスワードを入力してください" id="password">
        <div class="invalid-feedback">
          <?= isset($data['errors']['password']) ? $this->utility->h($data['errors']['password']) : ''; unset($data['errors']['password']); ?>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">送信</button>
</form>
