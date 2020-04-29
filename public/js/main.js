
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
}

