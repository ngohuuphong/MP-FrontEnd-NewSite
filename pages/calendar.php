<div id="draw-calendar"></div>


<script>


function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}









function Calendar() {

    this.dateLoop     = 1;

    this.toDay        = new Date();
    this.currentDate  = this.toDay.getDate();
    this.currentMonth = this.toDay.getMonth();
    this.currentYear  = this.toDay.getFullYear();

    this.indexDate   = new Date();
    this.selectDate  = this.toDay.getDate();
    this.selectMonth = this.toDay.getMonth();
    this.selectYear  = this.toDay.getFullYear();

    this.firstDay     = (new Date(this.selectYear, this.selectMonth)).getDay()

    this.labelMonths = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];
    this.labelYear   = ' năm ';
    this.labelMonth  = ' tháng ';

    this.classCell       = 'cột';
    this.classRow        = 'dòng';
    this.classInToday    = 'today';
    this.classWrapperRow = 'wrapper-row';
    this.classHeader     = 'table-calendar-header';
    this.classTable      = 'table-calendar'

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
    }
    this.setSelectMonth = function( _month ){

        this.indexDate   = new Date(this.selectYear, _month, 1 );
        this.selectDate  = this.indexDate.getDate();
        this.selectMonth = this.indexDate.getMonth();
        this.selectYear  = this.indexDate.getFullYear();
    }
    this.setSelectYear = function( _year ){

        this.indexDate   = new Date( _year, this.selectMonth, 1 );
        this.selectDate  = this.indexDate.getDate();
        this.selectMonth = this.indexDate.getMonth();
        this.selectYear  = this.indexDate.getFullYear();
    }

    // check how many days in a month code
    this.daysInMonth = function (iMonth, iYear) {

        return 32 - new Date(iYear, iMonth, 32).getDate();
    }

    this.draw = function(selector){

        var table           = document.createElement("div");
            table.className = this.classTable;
        var header          = this.createHeader();
        
        table.appendChild(header);

        var tableBody = this.createCells();
        table.appendChild(tableBody);
        
        if( selector ){
            
            selector.appendChild(table);
        }
    }

    this.createHeader = function(){

        header       = document.createElement("div");
        header.className = this.classHeader;
        header.innerHTML =  this.selectYear + this.labelYear + 
                            this.labelMonths[this.selectMonth] + this.labelMonth
                            this.selectDate
        return header;
    }

    this.createCell = function(i, j){

        var cell           = document.createElement("div");
            cell.className = this.classCell;
        var type = 0;

        if (i === 0 && j < this.firstDay) {
            
            cell.innerHTML = '';
        }
        else if (this.dateLoop > this.daysInMonth(this.selectMonth, this.selectYear)) {

            cell = -1;
        } else {

            cell.innerHTML = this.dateLoop;
            // color today's date
            if (    this.dateLoop === this.currentDate && 
                    this.selectYear  === this.currentYear &&
                    this.selectMonth === this.currentMonth
            ) {
                cell.classList.add(this.classInToday);
            }

            this.dateLoop++;
        }
        return cell;
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
                if( dataCell === -1 ){
                    break;
                }
                row.appendChild(dataCell);
            }

            // appending each row into calendar body.
            wrapperRow.appendChild(row); 
        }

        //// reset dateLoop to 1
        this.dateLoop = 1;
        return wrapperRow;
    }
};

var selector = document.getElementById('draw-calendar')

var insatnceCalendar = new Calendar();
insatnceCalendar.draw(selector);

</script>