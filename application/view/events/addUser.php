<h1 class="h1">追加するユーザーを選択</h1>
<form name="addUserFrom" method="post">
    <select name="users" id="users" onChange="getSelectLabel('users');">
        <option value="0" selected>▼ユーザを選択</option>
        <?php foreach ($users as $user): ?>
            <option value="<?= $user->id; ?>"><?= $user->name; ?></option>
        <?php endforeach; ?>
        <option value="-1">新しいユーザ</option>
    </select>
    <div class="form-group">
        <label for="name">ユーザ名</label>
        <input class="form-control" type="text" name="name" placeholder="ユーザ名" id="name" value="">
    </div>
    <div class="form-group">
        <textarea class="form-control" name="text" id="" cols="30" rows="10" placeholder="メモを記入してください"></textarea>
    </div>
    <button class="btn btn-primary" type="submit">ユーザ 追加</button>

</form>
