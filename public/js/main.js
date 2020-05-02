"use strict";
function getSelectLabel(idname) {
    const obj = document.getElementById(idname);
    const idx = obj.selectedIndex;       //インデックス番号を取得
    const val = obj.options[idx].value;  //value値を取得
    const txt = obj.options[idx].text;  //ラベルを取得
    const name = document.getElementById('name');
    if (val == -1) {
        name.value = '';
        name.placeholder = '新しいユーザを追加してください'
        name.readOnly = false;
    } else {
        name.value = txt;
        name.readOnly = true;
    }
}
