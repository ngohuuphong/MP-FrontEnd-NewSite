<!-- Modal HTML embedded directly into document -->
<div id="js-modal-event" class="modal calendar">
    <div class="modal-header">
        <div class="title position-relative">
            <span class="title-modal-header">
                <img src="<?= asset('image/icon/modal-add-event.png') ?>" alt="add-event" />
            </span>
            予定の登録
        </div>
    </div>
    <div class="modal-body">
        <div class="item set-date">
            <label for="year">日付</label>
            <select name="year" id="js-time-event-year" disabled>
                <?php for($year = 1990; $year < 2030; $year++): ?>
                    <option value="<?= $year ?>"><?= $year ?> 年</option>
                <?php endfor; ?>
            </select>
            <select name="month" id="js-time-event-month" disabled>
                <?php for($month = 1; $month < 13; $month++): ?>
                    <option value="<?= $month ?>"><?= $month ?> 月 </option>
                <?php endfor; ?>
            </select>
            <select name="date" id="js-time-event-date" disabled>
                <?php for($date = 1; $date < 32; $date++): ?>
                    <option value="<?= $date ?>"><?= $date ?> 日</option>
                <?php endfor; ?>
            </select>
            <select name="date" id="js-time-event-date-from" class="d-none" disabled>
                <?php for($date = 1; $date < 32; $date++): ?>
                    <option value="<?= $date ?>"><?= $date ?> 日</option>
                <?php endfor; ?>
            </select>
            <select name="date" id="js-time-event-date-to" class="d-none" disabled>
                <?php for($date = 1; $date < 32; $date++): ?>
                    <option value="<?= $date ?>"><?= $date ?> 日</option>
                <?php endfor; ?>
            </select>
        </div>
        
        <div class="item set-time">
            <label for="hour">時間</label>
            <select name="hour" id="js-time-event-begin-h">
                <?php for($hour = 0; $hour < 24; $hour++): ?>
                    <option value="<?= $hour ?>"><?= $hour ?> 時</option>
                <?php endfor; ?>
            </select>
            <select name="minute" id="js-time-event-begin-m">
                <?php for($minute = 0; $minute < 60; $minute++): ?>
                    <option value="<?= $minute ?>"><?= $minute ?> 分 </option>
                <?php endfor; ?>
            </select>
            <label class="divider-item " for="hour"> ～　</label>
            <select name="hour" id="js-time-event-end-h">
                <?php for($hour = 0; $hour < 24; $hour++): ?>
                    <option value="<?= $hour ?>"><?= $hour ?> 時</option>
                <?php endfor; ?>
            </select>
            <select name="minute" id="js-time-event-end-m">
                <?php for($minute = 0; $minute < 60; $minute++): ?>
                    <option value="<?= $minute ?>"><?= $minute ?> 分 </option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="item set-type">
            <label for="hour">予定</label>
            <select name="hour" id="js-type" class="bg-pink">
                <option value="面接"> 面接 </option>
                <option value="ahihi"> ahihi </option>
            </select>
        </div>
        <div class="item set-memo">
            <label for="memo">メモ</label>
            <textarea name="memo" id="js-memo" class="memo">会社：トラストグロース
場所：西新宿（地下鉄：都庁前）</textarea>
        </div>

        <div class="modal-footer d-flex">
            <a href="javascript:void(0)" class="btn btn-accept js-accept-event">登録する</a>
            <a href="javascript:void(0)" class="btn btn-cancel js-cancel-event" rel="modal:close">キャンセル</a>
        </div>

    </div>
</div>