<div class="page3">
    <section>
        <div class="header">
            <img src="<?php echo $cfg['site']['assest_path']; ?>image/icon/icon_faq_menu.png" alt=""/>
            <span>よくあるご質問</span>
        </div>
        <div class="content">
            <?php 
                $arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
                foreach ($arr as $value){
                    $text_show = '';
                    switch ($value) {
                        case 1:
                            $text_show = '学生からアプローチが届きました。見送りたい場合、不採用通知は必要ですか。';
                            break;
                        case 2:
                            $text_show = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            break;
                        case 3:
                            $text_show = '学生との連絡は、Ｅメールや電話で行うことはできますか。';
                            break;
                        case 4:
                            $text_show = '学生の性格タグは何を表していますか。';
                            break;
                        case 5:
                            $text_show = 'オファーメール代行サービスを停止したいです。';
                            break;
                        case 6:
                            $text_show = '採用を締め切りました。スカウトサービスの利用を停止したいです。';
                            break;
                        case 7:
                            $text_show = '契約書は郵送ですか。';
                            break;
                        case 8:
                            $text_show = '料金形態を教えてください。';
                            break;
                        case 9:
                            $text_show = '退会方法を教えてください。';
                            break;
                        case 10:
                            $text_show = 'マイページの閲覧・操作時に不具合が発生しました。';
                            break;    
                    }
            ?>
            <div class="question_div">
                <div class="question_content">
                    <div class="img_div">
                        <img src="<?php echo $cfg['site']['assest_path']; ?>image/icon/question_icon.png" alt=""/>
                    </div>
                    <p>
                        <?php echo $text_show; ?>
                    </p>
                </div>
                <div class="img_div">
                    <a href=""><img src="<?php echo $cfg['site']['assest_path']; ?>image/icon/expand_icon.png" alt=""/></a>
                </div>
            </div>
            <div class="answer_div">
                <div class="answer_content">
                    <div class="img_div">
                        <img src="<?php echo $cfg['site']['assest_path']; ?>image/icon/answer_icon.png" alt=""/>
                    </div>
                    <p>
                        <?php echo $text_show; ?>
                    </p>
                </div>
               
            </div>
            <?php }?>
        </div>
    </section>
</div>
