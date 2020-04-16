
function Calendar() {

    this.selector     = null;
    this.dateLoop     = 1;
    this.dateLoopTemp = 0;

    this.srcPlus = BASE_URL + 'image/icon/plus.png';

    this.toDay        = new Date();
    this.currentDate  = this.toDay.getDate();
    this.currentMonth = this.toDay.getMonth();
    this.currentYear  = this.toDay.getFullYear();

    this.indexDate   = new Date();
    this.selectDate  = this.toDay.getDate();
    this.selectMonth = this.toDay.getMonth();
    this.selectYear  = this.toDay.getFullYear();

    this.firstDay = (new Date(this.selectYear, this.selectMonth)).getDay()

    this.labelDays  = ["日", "月", "火", "水", "木", "金", "土"];
    this.labelYear  = '年';
    this.labelMonth = '月';

    this.modalEvent = 'js-modal-event';

    this.data = {
        '2020' : {
            '01' : {
                '07' : [
                    { 'start' : '09:00', 'end' : '14:00', 'type' : 'ahihi', 'memo' : 'dfg hjhf dgfj dgb fdj  gb jg'}
                ]
            },
            '04' : {
                '14' : [
                    { 'start' : '06:00', 'end' : '17:00', 'type' : '面接', 'memo' : 'dfg hjhf dgfj dgb fdj  gb jg'}
                ]
            }
        }
    };

    this.classCell       = 'calendar-cell';
    this.classRow        = 'calendar-row';
    this.classInToday    = 'calendar-today';
    this.classInSunday   = 'calendar-sunday';
    this.classInSatday   = 'calendar-satday';
    this.classWrapperRow = 'calendar-wrapper-row position-relative';
    this.classHeader     = 'calendar-table-header';
    this.classTable      = 'calendar-table'
    this.classFooter     = 'calendar-footer';
    this.classLabelHeader= 'calendar-list-header calendar-row';
    this.classCellDate   = 'calendar-cell-date';
    this.classCellDisable= 'calendar-cell-disable';
    this.classCellEvent  = 'calendar-cell-event';
    this.classCellHasEvent  = 'calendar-cell-has-event'
    this.classImagePlus  = 'calendar-cell-image-plus';

    this.isDrag    = false;
    this.dragBegin = null;
    this.dragEnd   = null;

    this.setCurrentDay = function( _day ){

        this.toDay        = _day;
        this.currentDate  = this.toDay.getDate();
        this.currentMonth = this.toDay.getMonth();
        this.currentYear  = this.toDay.getFullYear();
    }

    this.setSelectIndexDay = function( _day ){

        this.indexDate   = _day;
        this.selectDate  = this.indexDate.getDate();
        this.selectMonth = this.indexDate.getMonth();
        this.selectYear  = this.indexDate.getFullYear();
        this.firstDay    = (new Date(this.selectYear, this.selectMonth)).getDay()
    }
    this.setSelectMonth = function( _month ){

        this.indexDate   = new Date(this.selectYear, _month, 1 );
        this.selectDate  = this.indexDate.getDate();
        this.selectMonth = this.indexDate.getMonth();
        this.selectYear  = this.indexDate.getFullYear();
        this.firstDay    = (new Date(this.selectYear, this.selectMonth)).getDay()
    }
    this.setSelectYear = function( _year ){

        this.indexDate   = new Date( _year, this.selectMonth, 1 );
        this.selectDate  = this.indexDate.getDate();
        this.selectMonth = this.indexDate.getMonth();
        this.selectYear  = this.indexDate.getFullYear();
        this.firstDay    = (new Date(this.selectYear, this.selectMonth)).getDay()
    }
    this.setElementDraw = function(_selector){

        this.selector = _selector;
    }
    this.setModalEvent = function( _selector ){

        this.modalEvent = _selector;
    }
    // check how many days in a month code
    this.daysInMonth = function (iMonth, iYear) {

        return 32 - new Date(iYear, iMonth, 32).getDate();
    }

    this.draw = function(){

        var table           = document.createElement("div");
            table.className = this.classTable;
        var header          = this.createHeader();
        
        table.appendChild(header);

        var tableBody = this.createCells();
        table.appendChild(tableBody);

        var footer = this.createFooter();
        table.appendChild(footer);
        
        if( this.selector ){
            this.selector.innerHTML = '';
            this.selector.appendChild(table);
        }

        window.onmouseup = function (event) {
                
            console.log(event, "onmouseup");
            this.isDrag = false;
        };
    }

    this.createHeader = function(){

        header           = document.createElement("div");
        header.className = this.classHeader;

        titleHead           = document.createElement("div");
        titleHead.className = 'calendar-title-pannel position-relative';

        headerIcon           = document.createElement("span");
        headerIcon.className = "title-modal-header";

        headerIconImg           = document.createElement("img");
        headerIconImg.src = BASE_URL + 'image/icon/schedule-hover.png';

        headerIcon.appendChild(headerIconImg);

        

        TextTitleHead = document.createTextNode(this.selectYear  + this.labelYear + " " + 
                            ( this.selectMonth + 1 ) + this.labelMonth + " "
                            + "スケジュール");
        titleHead.appendChild(headerIcon);
        titleHead.appendChild(TextTitleHead);
        

        header.appendChild(titleHead);

        return header;
    }

    this.createFooter = function(){

        var footer       = document.createElement("div");

        footer.appendChild(this.drawFooter());

        return footer;
    }
    this.drawFooter = function(){

        var footer           = document.createElement("ul");
            footer.className = this.classFooter;

        var PREV = "<<";
        var NEXT = ">>";

        var TAG_PREV           = document.createElement("li");
            TAG_PREV.innerHTML = PREV;

        footer.appendChild(TAG_PREV);

        var instance = this;
        var YEAR_PREV = this.selectYear - 1;
        var TAG_YEAR_PREV           = document.createElement("li");
            TAG_YEAR_PREV.innerHTML = YEAR_PREV+ " " + this.labelYear;
            TAG_YEAR_PREV.onclick = function() {

                instance.setSelectYear(YEAR_PREV);
                console.log('change year')
                instance.draw();
            }

        footer.appendChild(TAG_YEAR_PREV);

        for(let month = 0; month < 12; month ++ ){

            var link  = document.createElement("li");
            link.innerHTML =  ( month + 1 )+ this.labelMonth;
            if( month == this.selectMonth ){
                link.classList.add('active-footer');
            }
            link.onclick = function() {

                instance.setSelectMonth(month);
                instance.draw();
            }
            
            footer.appendChild(link);
        }

        var YEAR_NEXT = this.selectYear + 1;
        var TAG_YEAR_NEXT           = document.createElement("li");
            TAG_YEAR_NEXT.innerHTML = YEAR_NEXT + " " + this.labelYear;
            TAG_YEAR_NEXT.onclick = function() {

                instance.setSelectYear(YEAR_NEXT);
                console.log('change year next')
                instance.draw();
            }

        footer.appendChild(TAG_YEAR_NEXT);

        var TAG_NEXT           = document.createElement("li");
            TAG_NEXT.innerHTML = NEXT;

        footer.appendChild(TAG_NEXT);

        return footer;
    }

    this.createCell = function(i, j){

        var cell           = document.createElement("div");
            cell.className = this.classCell ;
            cell.setAttribute('data-date', this.dateLoop);

        if (i === 0 && j < this.firstDay && this.dateLoopTemp == 0) {
            cell.classList.add(this.classCellDisable);
            var firstDateOfMonth = new Date(this.selectYear, this.selectMonth, 1);
            firstDateOfMonth.setDate(firstDateOfMonth.getDate() - this.firstDay + j );
            
            var textCell           = document.createElement("span");
                textCell.className = this.classCellDate;

                textCell.innerHTML = (firstDateOfMonth.getMonth() + 1) + "/" + firstDateOfMonth.getDate();
            cell.appendChild(textCell);

        }
        else if ( this.dateLoopTemp == 1 || this.dateLoop > this.daysInMonth(this.selectMonth, this.selectYear)) {

            if(this.dateLoopTemp == 0){
                this.dateLoopTemp = 1;
                this.dateLoop = 1
            }
            cell.classList.add(this.classCellDisable);

            var textCell           = document.createElement("span");
            textCell.className = this.classCellDate;
                textCell.innerHTML = (this.selectMonth + 2) + "/" + this.dateLoop;
            cell.appendChild(textCell);
            
            this.dateLoop++;

        } else {

            cell = this.createEventDrag(this, cell);

            var textCell           = document.createElement("span");
            textCell.className = this.classCellDate;
                textCell.innerHTML = (this.selectMonth + 1) + "/" + this.dateLoop;
            cell.appendChild(textCell);


            cell = this.drawEventToDate(cell);
            cell = this.drawPlusButton(cell, this.dateLoop);
            
            // color today's date
            if(this.checkToday()){
                cell.classList.add(this.classInToday);
            }
            // color sunday
            if(this.checkSunDay()){
                cell.classList.add(this.classInSunday);
            }
            // color satDay
            if(this.checkSatDay()){
                cell.classList.add(this.classInSatday);
            }

            this.dateLoop++;
        }
        return cell;
    }
    this.createEventDrag = function(instance, cell ){
        
        cell.onmousedown = function (event) {
            
            var cell = $(event.currentTarget).closest(this.classCell);
            cell.addClass("is-select");
            console.log(event.target, 'down');
            instance.isDrag = true;
            instance.dragBegin = cell
        };
        cell.onmouseover = function (event) {

            if(instance.isDrag){
                var cell = $(event.currentTarget).closest(this.classCell);
                cell.addClass("is-select");
                instance.dragEnd = cell;

                console.log(event.target, 'over');

                var selects = instance.selector.getElementsByClassName('is-select');
                selects.forEach(element => {
                    element.classList.remove("is-select");
                });
                //// 
            }
        };
        cell.onmouseup = function (event) {
                
            var cell = $(event.currentTarget).closest(this.classCell);
            cell.addClass("is-select");

            console.log(event.target, "onmouseup cell");
            instance.isDrag = false;
        };
        
        return cell;
    }

    this.setInstanceToGlobal = function(VariableGlobal){
         
        VariableGlobal = this;
    }

    this.drawPlusButton = function(cell, date){
        var instance = this;

        var textPlus           = document.createElement("span");
        textPlus.classList.add(this.classImagePlus);
        textPlus.onclick = function(){
            /// show popup
            if(!instance.modalEvent){
                alert('modal not setting');
                return false;
            }
            document.getElementById('js-time-event-year').value  = instance.selectYear;
            document.getElementById('js-time-event-month').value  = instance.selectMonth + 1
            document.getElementById('js-time-event-date').value  = date
            
            $("#" + instance.modalEvent).modal({
                escapeClose: false,
                clickClose: false,
                showClose: false
            });
            var btnAccept = document.getElementById(instance.modalEvent).getElementsByClassName('js-accept-event')[0];

            btnAccept.onclick = function(){
                instance.handleBtnAccept(instance, date)
            };
        }


        var imgPlus     = document.createElement("img");
            imgPlus.src = this.srcPlus;

        textPlus.appendChild(imgPlus);

        cell.appendChild(textPlus);

        return cell;
    }
    this.setInitDataDate = function(date){
        if(typeof this.data[this.selectYear]  == 'undefined'){

            this.data[this.selectYear] = {};

            this.data[this.selectYear]
            [this.formatZeroBefore(this.selectMonth + 1)] = {};

            this.data[this.selectYear]
            [this.formatZeroBefore(this.selectMonth + 1)]
            [this.formatZeroBefore(date)] = [];
        }
        
        if( typeof this.data[this.selectYear]
        [this.formatZeroBefore(this.selectMonth + 1)] == 'undefined' ){

            this.data[this.selectYear]
            [this.formatZeroBefore(this.selectMonth + 1)] = {};
            
            this.data[this.selectYear]
            [this.formatZeroBefore(this.selectMonth + 1)]
            [this.formatZeroBefore(date)] = [];

        }
        if( typeof this.data[this.selectYear]
        [this.formatZeroBefore(this.selectMonth + 1)]
        [this.formatZeroBefore(date)] == 'undefined' ){

            this.data[this.selectYear]
            [this.formatZeroBefore(this.selectMonth + 1)]
            [this.formatZeroBefore(date)] = [];
        }
    }
    this.handleBtnAccept = function(instance, date){
        console.log('đã click vào')
        
        var start = this.formatZeroBefore(document.getElementById('js-time-event-begin-h').value) 
                    + ':' 
                    + this.formatZeroBefore(document.getElementById('js-time-event-begin-m').value);
        var end = this.formatZeroBefore(document.getElementById('js-time-event-end-h').value) 
                    + ':' 
                    + this.formatZeroBefore(document.getElementById('js-time-event-end-m').value)

        var evt = { 
            'start': start ,
            'end'  : end,
            'type' : document.getElementById('js-type').value,
            'memo' : document.getElementById('js-memo').value
        };

        console.log(evt);
        instance.setInitDataDate(date);
        

        instance.data[instance.selectYear]
            [instance.formatZeroBefore(instance.selectMonth + 1)]
            [instance.formatZeroBefore(date)].push(evt)
        
        $.modal.close();
        instance.draw();
    }

    this.drawEventToDate = function(cell){
        if(this.data){
            if(typeof this.data[this.selectYear] != 'undefined'){

                if(typeof this.data[this.selectYear][this.formatZeroBefore(this.selectMonth + 1)] != 'undefined'){

                    if(typeof this.data[this.selectYear][this.formatZeroBefore(this.selectMonth + 1)][this.formatZeroBefore(this.dateLoop)] != 'undefined'){

                        var dataEvents = this.data[this.selectYear][this.formatZeroBefore(this.selectMonth + 1)][this.formatZeroBefore(this.dateLoop)];
                        for(var eventLoop = 0; eventLoop < dataEvents.length; eventLoop++ ){

                            var eventIndex = dataEvents[eventLoop];
                            var textEvent           = document.createElement("p");
                            textEvent.classList.add(this.classCellEvent);
                            textEvent.innerHTML = eventIndex.start + '-' + eventIndex.end + " " + eventIndex.type;
                            
                            cell.classList.add(this.classCellHasEvent);
                            cell.appendChild(textEvent);
                        } 
                    }
                }
            }
        }
        return cell
    }
    this.formatZeroBefore = function(number){
        if (number < 10) {
            number = "0" + number;
        }
        return number;
    }
    this.checkToday = function(){

        if (    this.dateLoop === this.currentDate && 
                this.selectYear  === this.currentYear &&
                this.selectMonth === this.currentMonth
        ) {
            return true;
        }
        return false;
    }
    this.checkSunDay = function(){
        var dayNumber = this.dateLoop;
        var theDateLoop = new Date( this.selectYear, this.selectMonth, dayNumber );
        
        if( theDateLoop.getDay() == 0 ){
            return true;
        }
        return false;
    }
    this.checkSatDay = function(){
        var dayNumber = this.dateLoop;
        var theDateLoop = new Date( this.selectYear, this.selectMonth, dayNumber );
        
        if( theDateLoop.getDay() == 6 ){
            return true;
        }
        return false;
    }
    this.createCells = function(){

        var wrapperRow = document.createElement("div");
        wrapperRow.className = this.classWrapperRow;

        var wrapperRowTableHeade = document.createElement("div");
        wrapperRowTableHeade.className = "calendar-wrapper-table-cell";
        

        titleHeading           = document.createElement("div");
        titleHeading.className = this.classLabelHeader;

        for(var head = 0; head < this.labelDays.length; head++){

            var thead  = document.createElement("div");
            thead.className = this.classCell;

            var textCell           = document.createElement("span");
                textCell.className = this.classCellDate;
                textCell.innerHTML =  this.labelDays[head];

            thead.appendChild(textCell);

            
            
            titleHeading.appendChild(thead);
        }
        wrapperRowTableHeade.appendChild(titleHeading);
        wrapperRow.appendChild(wrapperRowTableHeade);




        prevHead           = document.createElement("div");
        prevHead.className = 'calendar-prev-page';
        prevImg           = document.createElement("img");
        prevImg.className = 'calendar-prev-img';
        prevImg.src = BASE_URL + 'image/icon/calendar-prev.png';
        prevHead.appendChild(prevImg);

        (function(_month, instance){
            prevHead.addEventListener("click", function() {

                instance.setSelectMonth(_month);
                instance.draw();
            }, false);
        })(this.selectMonth - 1 , this );
        

        wrapperRow.appendChild(prevHead);

        var row_table = document.createElement("div");
            row_table.className = 'calendar-wrapper-table-cell';
        // creating all cells
        for (let i = 0; i < 6; i++) {
            // creates a table row
            var row = document.createElement("div");
            row.className = this.classRow;

            //creating individual cells, filing them up with data.
            for (let j = 0; j < 7; j++) {
                var dataCell = this.createCell(i , j);
                
                row.appendChild(dataCell);
            }

            // appending each row into calendar body.
            row_table.appendChild(row); 
        }
        wrapperRow.appendChild(row_table); 

        nextFooter           = document.createElement("div");
        nextFooter.className = 'calendar-next-page';
        nextImg           = document.createElement("img");
        nextImg.className = 'calendar-next-img';
        nextImg.src = BASE_URL + 'image/icon/calendar-next.png';
        nextFooter.appendChild(nextImg);

        (function(_month, instance){
            nextFooter.addEventListener("click", function() {

                instance.setSelectMonth(_month);
                instance.draw();
            }, false);
        })(this.selectMonth + 1 , this );

        wrapperRow.appendChild(nextFooter);

        //// reset dateLoop to 1
        this.dateLoop = 1;
        //// reset dateLoopTemp to 1
        this.dateLoopTemp = 0;
        return wrapperRow;
    }
};
