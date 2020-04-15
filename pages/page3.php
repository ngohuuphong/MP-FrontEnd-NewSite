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
                            $_answers = 'アプローチを受けて見送る場合の不採用通知は不要です。選考通過後の不採用通知はご対<br/>応をお願いいたします。';
                            break;
                        case 2:
                            $_question = '学生へのオファーメール（スカウト）は何件送ることができますか。';
                            $_answers = '無制限で送ることができます。';
                            break;
                        case 3:
                            $_question = '学生との連絡は、Ｅメールや電話で行うことはできますか。';
                            $_answers = 'サイト内のオファーメールでやり取りをお願いいたします。<br/>ただし、オファーメールから説明会に参加した学生に関しては、双方Ｅメールや電話で連<br/>絡を希望する場合、直接やり取りしていただいても構いません。';
                            break;
                        case 4:
                            $_question = '学生の性格タグは何を表していますか。';
                            $_answers = '学生が企業様にアピールしたい自身の強み・性格です。適性検査などによる診断結果では<br/>ありません。';
                            break;
                        case 5:
                            $_question = 'オファーメール代行サービスを停止したいです。';
                            $_answers = '担当エージェントにお申し付けください。その場で代行を停止いたします。';
                            break;
                        case 6:
                            $_question = '採用を締め切りました。スカウトサービスの利用を停止したいです。';
                            $_answers = '担当エージェントにお申し付けください。スカウトサービスを停止いたします。';
                            break;
                        case 7:
                            $_question = '契約書は郵送ですか。';
                            $_answers = '原則郵送でご対応させていただきます。';
                            break;
                        case 8:
                            $_question = '料金形態を教えてください。';
                            $_answers = '弊社サービスは完全成功報酬型です。学生が内定承諾をした段階で紹介料が発生いたします。<br/>入社前に辞退が発生した場合は全額ご返金、入社後3ヶ月以内迄は返金制度を設けております。<br/>詳細はご提案書・契約書をご確認ください。';
                            break;
                        case 9:
                            $_question = '退会方法を教えてください。';
                            $_answers = '<span class="highlight">「登録情報」</span>から退会手続きを行ってください。';
                            break;
                        case 10:
                            $_question = 'マイページの閲覧・操作時に不具合が発生しました。';
                            $_answers = '当社では以下のOS、ブラウザ、プラグインが推奨動作環境となっております。これ以外の
                            環境の場合、適正に表示されない可能性があります。<br/>
                            　【推奨OS】Windows 7 / 10<br/>
                            　【ブラウザ】Internet Explorer 11,Firefox 68,Google Chrome 74<br/>
                            　【ブラウザ設定】JavaScript 有効許可,Cookie 受取許可<br/>
                            また、ウェブサイトの構成、利用条件、URLおよびコンテンツなどを、予告なしに変更また
                            は中止することがあります。<br/>
                            お急ぎの場合、数日経っても不具合が改善されない場合は<span class="highlight">「お問い合わせ」</span>よりお問い合わ
                            せください。';
                            break;    
                    }
            ?>
            <div class="wrapper_content">
                <div class="question_div">
                    <div class="question_content" onclick="faqExpand(this);" >
                        <div class="img_div">
                            <img src="<?php echo $cfg['site']['assest_path']; ?>image/icon/question_icon.png" alt=""/>
                        </div>
                        <p>
                            <?php echo $_question; ?>
                        </p>
                    </div>
                    <div class="img_expand">
                        <a href="javascript:void(0)">
                            <img class="expand_icon_faq" src="<?php echo $cfg['site']['assest_path']; ?>image/icon/expand_icon.png" alt=""/>
                            <img  class="collapse_icon_faq" src="<?php echo $cfg['site']['assest_path']; ?>image/icon/collapse_icon.png" alt=""/>
                        </a>
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
            </div>
            <?php }?>
        </div>
    </section>
</div>
