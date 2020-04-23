<?php
// function print_r2($results) {
//     foreach($results as $result) {
//         echo '<br>';
//         print_r($result);
//         echo '<br>';
//     }
// }
?>
<h1 class="h1">イベント一覧</h1>
<div>
    <a href="./index.php?page=create_event">イベントを追加する</a>
</div>
<ul class="list-group">
    <?php foreach ($events as $event): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="./index.php?page=show_details&e_id=<?= $event->id; ?>">
                <?= $event->name; ?>
            </a>
            <a class="btn btn-primary" onclick="return confirm('本当に削除しますか？');" href="./index.php?page=delete_event&e_id=<?= $event->id; ?>">削除</a>
        </li>
    <?php endforeach; ?>
</ul>