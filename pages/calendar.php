<div id="draw-calendar"></div>



<script>



var OBJECT_DATA = null;
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

    this.modalEvent = '#js-modal-event';

    this.data = {
        '2020' : {
            '01' : {
                '05' : [
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
    this.classWrapperRow = 'calendar-wrapper-row';
    this.classHeader     = 'calendar-table-header';
    this.classTable      = 'calendar-table'
    this.classFooter     = 'calendar-footer';
    this.classLabelHeader= 'calendar-list-header';
    this.classCellDate   = 'calendar-cell-date';
    this.classCellDisable= 'calendar-cell-disable';
    this.classCellEvent  = 'calendar-cell-event';
    this.classCellHasEvent  = 'calendar-cell-has-event'
    this.classImagePlus  = 'calendar-cell-image-plus'

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
    }

    this.createHeader = function(){

        header           = document.createElement("div");
        header.className = this.classHeader;
        header.innerHTML = this.selectYear + this.labelYear +
                            ( this.selectMonth + 1 ) + this.labelMonth
                            + this.selectDate


        titleHeading           = document.createElement("ul");
        titleHeading.className = this.classLabelHeader;

        for(var head = 0; head < this.labelDays.length; head++){

            var thead  = document.createElement("li");
            thead.innerHTML =  this.labelDays[head];
            
            titleHeading.appendChild(thead);
        }

        header.appendChild(titleHeading);
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

        var PREV = "<<<";
        var NEXT = ">>>";

        var TAG_PREV           = document.createElement("li");
            TAG_PREV.innerHTML = PREV;

        footer.appendChild(TAG_PREV);

        var YEAR_PREV = this.selectYear - 1;
        var TAG_YEAR_PREV           = document.createElement("li");
            TAG_YEAR_PREV.innerHTML = YEAR_PREV;

        footer.appendChild(TAG_YEAR_PREV);

        for(var month = 0; month < 12; month ++ ){

            var link  = document.createElement("li");
            link.innerHTML =  ( month + 1 )+ this.labelMonth;
            if( month == this.selectMonth ){
                link.classList.add('active-footer');
            }
            (function(_month, instance){

                link.addEventListener("click", function() {

                    instance.setSelectMonth(_month);
                    instance.draw();
                }, false);
            })(month , this);

            footer.appendChild(link);
        }

        var YEAR_NEXT = this.selectYear + 1;
        var TAG_YEAR_NEXT           = document.createElement("li");
            TAG_YEAR_NEXT.innerHTML = YEAR_NEXT;

        footer.appendChild(TAG_YEAR_NEXT);

        var TAG_NEXT           = document.createElement("li");
            TAG_NEXT.innerHTML = NEXT;

        footer.appendChild(TAG_NEXT);

        return footer;
    }

    this.createCell = function(i, j){

        var cell           = document.createElement("div");
            cell.className = this.classCell;
        var type = 0;

        if (i === 0 && j < this.firstDay && this.dateLoopTemp == 0) {
            cell.classList.add(this.classCellDisable);
            cell.innerHTML = '&nbsp;';
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

            var textCell           = document.createElement("span");
            textCell.className = this.classCellDate;
                textCell.innerHTML = (this.selectMonth + 1) + "/" + this.dateLoop;
            cell.appendChild(textCell);


            cell = this.drawEventToDate(cell);
            cell = this.drawPlusButton(cell);
            
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

    this.setInstanceToGlobal = function(VariableGlobal){
         
        VariableGlobal = this;
    }

    this.drawPlusButton = function(cell){

        var textPlus           = document.createElement("span");
        textPlus.classList.add(this.classImagePlus);

        (function(date, instance){

            textPlus.addEventListener("click", function() {

                /// show popup
                if(!instance.modalEvent){
                    alert('modal not setting');
                    return false;
                }
                console.log(instance.modalEvent);
                $(instance.modalEvent).modal({
                    escapeClose: false,
                    clickClose: false,
                    showClose: false
                });
                (function(_month, instance){

                    document.getElementById("myBtn").addEventListener("click", function(){
                        document.getElementById("demo").innerHTML = "Hello World";
                    });

                    link.addEventListener("click", function() {

                        instance.setSelectMonth(_month);
                        instance.draw();
                    }, false);
                })(month , this);
                
                // instance.setInstanceToGlobal(OBJECT_DATA)

            }, false);
        })(this.dateLoop, this);

        var imgPlus     = document.createElement("img");
            imgPlus.src = this.srcPlus;

        textPlus.appendChild(imgPlus);

        cell.appendChild(textPlus);

        return cell;
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
            wrapperRow.appendChild(row); 
        }

        //// reset dateLoop to 1
        this.dateLoop = 1;
        //// reset dateLoopTemp to 1
        this.dateLoopTemp = 0;
        return wrapperRow;
    }
};

var selector = document.getElementById('draw-calendar')

var insatnceCalendar = new Calendar();
insatnceCalendar.setElementDraw(selector);

insatnceCalendar.draw();



function hung(){
    OBJECT_DATA.data = {
        '2020' : {
            '01' : {
                '07' : [
                    { 'start' : '09:00', 'end' : '14:00', 'type' : 'ahihi', 'memo' : 'dfg hjhf dgfj dgb fdj  gb jg'}
                ]
            },
            '04' : {
                '19' : [
                    { 'start' : '06:00', 'end' : '17:00', 'type' : '面接', 'memo' : 'dfg hjhf dgfj dgb fdj  gb jg'}
                ]
            },
            '05' : {
                '09' : [
                    { 'start' : '09:00', 'end' : '14:00', 'type' : 'ahihi', 'memo' : 'dfg hjhf dgfj dgb fdj  gb jg'}
                ]
            },
        }
    };
}

</script>