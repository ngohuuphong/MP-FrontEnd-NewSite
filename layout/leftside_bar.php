<aside class="left-sidebar">
    <nav class="left-nav">
        <ul class="list-menu-sidebar">
            <li class="<?= isPageActive('top-page') ?>">
                <a href="<?= Route('?page=top-page') ?>"> 
                    <span class="icon-sidebar">
                        <img src="<?= asset('image/icon/top-page.png') ?>"  />
                        <img class="hover" src="<?= asset('image/icon/top-page-hover.png') ?>"  />
                    </span>
                    <span>トップ</span>
                </a>
            </li>
            <li class="<?= isPageActive('search-student') ?>">
                <a href="<?= Route('?page=search-student') ?>"> 
                    <span class="icon-sidebar">
                        <img src="<?= asset('image/icon/student-search.png') ?>"  />
                        <img class="hover" src="<?= asset('image/icon/student-search-hover.png') ?>"  />
                    </span>
                    <span>学生検索</span>
                </a>
            </li>
            <li class="<?= isPageActive('message') ?>">
                <a href="<?= Route('?page=message') ?>"> 
                    <span class="icon-sidebar">
                        <img src="<?= asset('image/icon/email.png') ?>"  />
                        <img class="hover" src="<?= asset('image/icon/email-hover.png') ?>"  />
                    </span>
                    <span>メッセージ</span> 
                    <span class="counter"> 14 </span>
                </a>
            </li>
            <li  class="<?= isPageActive('calendar') ?>">
                <a href="<?= Route('?page=calendar') ?>"> 
                    <span class="icon-sidebar">
                        <img src="<?= asset('image/icon/schedule.png') ?>"  />
                        <img class="hover" src="<?= asset('image/icon/schedule-hover.png') ?>"  />
                    </span>
                    <span>スケジュール管理</span>
                </a>
            </li>
            <li  class="<?= isPageActive('create-page') ?>">
                <a href="<?= Route('?page=create-page') ?>"> 
                    <span class="icon-sidebar">
                        <img src="<?= asset('image/icon/create.png') ?>"  />
                        <img class="hover" src="<?= asset('image/icon/create-hover.png') ?>"  />
                    </span>
                    <span>企業公開ページ作成</span>
                </a>
            </li>
            <li  class="<?= isPageActive('register-info') ?>">
                <a href="<?= Route('?page=register-info') ?>"> 
                    <span class="icon-sidebar">
                        <img src="<?= asset('image/icon/database.png') ?>"  />
                        <img class="hover" src="<?= asset('image/icon/database-hover.png') ?>"  />
                    </span>
                    <span>登録情報</span>
                </a>
            </li>
            <li  class="<?= isPageActive('change-password') ?>">
                <a href="<?= Route('?page=change-password') ?>"> 
                    <span class="icon-sidebar">
                        <img src="<?= asset('image/icon/key.png') ?>"  />
                        <img class="hover" src="<?= asset('image/icon/key-hover.png') ?>"  />
                    </span>
                    <span>パスワード変更</span>
                </a>
            </li>
            <li  class="<?= isPageActive('faq') ?>">
                <a href="<?= Route('?page=faq') ?>"> 
                    <span class="icon-sidebar">
                        <img src="<?= asset('image/icon/QA.png') ?>"  />
                        <img class="hover" src="<?= asset('image/icon/QA-hover.png') ?>"  />
                    </span>
                    <span>よくあるご質問</span>
                </a>
            </li>
            <li class="<?= isPageActive('logout') ?>">
                <a href="<?= Route('?page=logout') ?>"> 
                    <span class="icon-sidebar">
                        <img src="<?= asset('image/icon/logout.png') ?>"  />
                        <img class="hover" src="<?= asset('image/icon/logout-hover.png') ?>"  />
                    </span>
                    <span>ログアウト</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
