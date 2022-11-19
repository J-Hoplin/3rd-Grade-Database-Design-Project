<?php

include_once $_SERVER['DOCUMENT_ROOT']."/home/common/common.php";

Header::render();
?>
    <div class="index-main">
        <div class="index-main__top">
            <?php
            title_main::title();
            ?>
            <div class="index-main__top__search">
                <form action="">
                    <input type="text" placeholder="팀 검색, 선수 검색..">
                    <button>
                        <i class="fas fa-search fa-2x"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php
Footer::render();
?>