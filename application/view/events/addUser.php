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
<script type="text/javascript">
    window.onload = () => {
        console.log('hello');
    };
    function getSelectLabel(idname){
        var obj = document.getElementById(idname);
        var idx = obj.selectedIndex;       //インデックス番号を取得
        var val = obj.options[idx].value;  //value値を取得
        var txt  = obj.options[idx].text;  //ラベルを取得
        const name = document.getElementById('name');
        // name.value = txt;
        if(val == 0 || val == -1) {
            name.value = '';
            name.placeholder = '新しいユーザを追加してください'
            name.readOnly = false;
        } else {
            name.value = txt;
            name.readOnly = true;
        }
        // console.log('選択したのは「インデックス:' + idx + ' 値:' + val + ' ラベル:' + txt + '」です');
    }
</script>
