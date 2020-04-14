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
                    $_question = '';
                    $_answers = '';
                    switch ($value) {
                        case 1:
                            $_question = '学生からアプローチが届きました。見送りたい場合、不採用通知は必要ですか。';
                            $_answers = '学生からアプローチが届きました。見送りたい場合、不採用通知は必要ですか。 学生からアプローチが届きました。見送りたい場合、不採用通知は必要ですか。学生からアプローチが届きました。見送りたい場合、不採用通知は必要ですか。';
                            break;
                        case 2:
                            $_question = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            $_answers = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            break;
                        case 3:
                            $_question = '学生との連絡は、Ｅメールや電話で行うことはできますか。';
                            $_answers = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            break;
                        case 4:
                            $_question = '学生の性格タグは何を表していますか。';
                            $_answers = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            break;
                        case 5:
                            $_question = 'オファーメール代行サービスを停止したいです。';
                            $_answers = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            break;
                        case 6:
                            $_question = '採用を締め切りました。スカウトサービスの利用を停止したいです。';
                            $_answers = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            break;
                        case 7:
                            $_question = '契約書は郵送ですか。';
                            $_answers = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            break;
                        case 8:
                            $_question = '料金形態を教えてください。';
                            $_answers = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            break;
                        case 9:
                            $_question = '退会方法を教えてください。';
                            $_answers = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            break;
                        case 10:
                            $_question = 'マイページの閲覧・操作時に不具合が発生しました。';
                            $_answers = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            break;    
                    }
            ?>
            <div class="question_div">
                <div class="question_content">
                    <div class="img_div">
                        <img src="<?php echo $cfg['site']['assest_path']; ?>image/icon/question_icon.png" alt=""/>
                    </div>
                    <p>
                        <?php echo $_question; ?>
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
                        <?php echo $_answers; ?>
                    </p>
                </div>
               
            </div>
            <?php }?>
        </div>
    </section>
</div>
