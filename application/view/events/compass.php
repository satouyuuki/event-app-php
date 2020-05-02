<?php
// var_dump($data);
?>
<h1 class="h1">コンパスイベント検索</h1>
<?php if(!empty($data['message'])): ?>
    <?php if(!empty($data['message']['success'])): ?>
        <div class="alert alert-success">
            <?= $this->h($data['message']['success']); ?>
        </div>
    <?php elseif(!empty($data['message']['error'])): ?>
        <div class="alert alert-danger">
            <?= $this->h($data['message']['error']); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
<form method="post" name="searchForm">
    <div class="form-group">
        <label for="keyword">キーワードを入力してください</label>
        <input class="form-control" type="text" id="keyword" name="keyword" value="<?= isset($_POST['keyword']) ? $this->h($_POST['keyword']) : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="keyword">MAX取得する数を入力してください</label>
        <input class="form-control" type="number" id="maxCount" name="maxCount" value="<?= isset($_POST['maxCount']) ? $this->h($_POST['maxCount']) : ''; ?>">
    </div>
    <button class="btn btn-primary" type="submit" name="searchBtn" value="send">送信</button>
</form>
<?php if(!empty($data['events'])) : ?>
    <form method="post" name="searchResultForm">
        <?php for($i=0; $i < count($data['events']); $i++) : ?>
            <div class="form-group">
                <label for="name">イベント名</label>
                <input class="form-control
                <?php if(!empty($data['errors']['name'])): ?>
                is-invalid
                <?php endif; ?>
                " type="text" name="name<?= $i; ?>" placeholder="イベント名" value="<?= isset($_POST['name']) ? $this->h($_POST['name']) : $this->h($data['events'][$i]['name']); ?>">
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
                " type="date" name="date<?= $i; ?>" value="<?= isset($_POST['date']) ? $this->h($_POST['date']) : $this->h($this->inputDateFormat($data['events'][$i]['date'])); ?>"
                >
                <div class="invalid-feedback">
                <?= $data['errors']['date']; ?>
                </div>
            </div>

        <?php endfor; ?>
        <button class="btn btn-primary" type="submit" name="addBtn" value="add">追加</button>
    </form>
<?php endif; ?>