<nav class="sticky-top navbar navbar-expand-md navbar-light bg-light mb-5">
    <button 
    class="navbar-toggler" 
    type="button" 
    data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
    aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if($this->utility->h(!isset($_SESSION['current_member_id']))): ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a 
                    class="nav-link<?= strstr(URI, 'login') ? ' active' : ''; ?>" 
                    href="/login"
                    >ログイン</a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link<?= strstr(URI, 'signup') ? ' active' : ''; ?>" 
                    href="/signup"
                    >サインアップ</a>
                </li>
            </ul>
        <?php else: ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a
                    class="nav-link<?= strstr(URI, 'events') ? ' active' : ''; ?>" 
                    href="/events/index"
                    >
                    イベント一覧</a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link<?= strstr(URI, 'users') ? ' active' : ''; ?>" 
                    href="/users/index"
                    >ユーザ一覧</a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link<?= strstr(URI, 'records') ? ' active' : ''; ?>" 
                    href="/records/index"
                    >イベント履歴</a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link<?= strstr(URI, 'compass') ? ' active' : ''; ?>" 
                    href="/events/compass"
                    >コンパス検索</a>
                </li>
            </ul>
            <span class="navbar-text">
                <a href="/login/logout" class="nav-link">
                    <?= $_SESSION['current_member_email'] ?>
                    ログアウト
                </a>
            </span>
        <?php endif; ?>
    </div>
</nav>
<div class="container-fuild pl-4 pr-4">
