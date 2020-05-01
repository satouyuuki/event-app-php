
<nav class="navbar navbar-expand-md navbar-light bg-light mb-5">
    <button 
    class="navbar-toggler" 
    type="button" 
    data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
    aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if($this->h(!isset($_SESSION['current_member_id']))): ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a 
                    class="nav-link
                    <?php 
                        $url= $_SERVER['REQUEST_URI'];
                        if(strstr($url, 'login') == true) {
                            echo 'active';
                        }
                    ?>
                    " 
                    href="/login"
                    >ログイン</a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link
                    <?php 
                        $url= $_SERVER['REQUEST_URI'];
                        if(strstr($url, 'signin') == true) {
                            echo 'active';
                        }
                    ?>
                    " 
                    href="/signin"
                    >サインイン</a>
                </li>
            </ul>
        <?php else: ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link 
                    <?php 
                        $url= $_SERVER['REQUEST_URI'];
                        if(strstr($url, 'events') == true) {
                            echo 'active';
                        }
                    ?>
                    " 
                    href="/events/index"
                    >
                    イベント一覧</a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link
                    <?php 
                        $url= $_SERVER['REQUEST_URI'];
                        if(strstr($url, 'users') == true) {
                            echo 'active';
                        }
                    ?>
                    " 
                    href="/users/index"
                    >ユーザ一覧</a>
                </li>
                <li class="nav-item">
                    <a 
                    class="nav-link
                    <?php 
                        $url= $_SERVER['REQUEST_URI'];
                        if(strstr($url, 'records') == true) {
                            echo 'active';
                        }
                    ?>
                    " 
                    href="/records/index"
                    >イベント履歴</a>
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
