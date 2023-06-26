<style>
    html, body {
        font-family: Roboto, "Arial Black";
    }

    .game_area {
        width: 282px;
        height: 282px;
        margin: 0px auto;
        user-select: none;
    }

    .numGame .divTable {
        float: left;
        width: 282px;
        height: 282px;
        border: 1px solid #333;
        border-radius: 10px;
        background-color: #dedede;
        margin: 15px 0;
    }

    .numGame .cell {
        width: 50px;
        height: 50px;
        line-height: 32px;
        text-align: center;
        border: 1px solid #046a07;
        float: left;
        font-size: 20px;
        cursor: pointer;
        padding: 10px;
        margin: 10px;
        background-color: #06790a;
        color: #fff;
        box-shadow: 2px 3px 1px #e5e9e7;
    }

    .numGame .num_btn {
        background-color: #ffffff;
        color: rgb(0, 0, 0);
        padding: 4px 11px;
        text-align: center;
        font-size: medium;
        border: 2px solid #046a07;
        cursor: pointer;
        border-radius: 20px;
        width: 110px;
        margin: 0px auto;
        display: block;
    }

    .numGame .num_btn:hover {
        background-color: #06790a;
        color: #ffffff;
    }

    .numGame .count {
        float: left;
        width: 80px;
        padding: 2px 5px;
        border: 1px solid #a49f9f;
        border-radius: 10px;
        margin: 0 5px 0 0;
    }

    .numGame .color_div {
        float: left;
        width: 280px;
        margin-top: 8px;
    }

    .numGame .color_box {
        width: 20px;
        height: 20px;
        margin: 6px 5px;
        cursor: pointer;
        display: inline-block;
    }

    .numGame #click_count {
        font-weight: bold;
        color: #064d79;
        font-size: 20px;
    }

    .numGame #selCol1 {
        background-color: #06790a;
    }

    .numGame #selCol2 {
        background-color: #064d79;
    }

    .numGame #selCol3 {
        background-color: #794B06FF;
    }

    .numGame #selCol4 {
        background-color: #790625;
    }

    .numGame .button_area {
        position: relative;
        float: left;
        width: 100%;
        margin-top: 5px;
    }
    .num-time{
        width: 125px;
        padding: 2px 5px;
        border: 1px solid #a49f9f;
        border-radius: 10px;
        margin: 0 5px 0 0;
        float: left;
        font-size: 20px;
    }
    #reset_game{
        display: none;
    }



</style>
<script>
    /*let startBtn = document.getElementById('start');
    let stopBtn = document.getElementById('stop');
    let resetBtn = document.getElementById('reset');*/

    let hour = 0;
    let minute = 0;
    let second = 0;
    let count = 0;

    /*startBtn.addEventListener('click', function () {
        timer = true;
        stopWatch();
    });*/

    /*stopBtn.addEventListener('click', function () {
        timer = false;
    });*/

    /*resetBtn.addEventListener('click', function () {
        timer = false;
        hour = 0;
        minute = 0;
        second = 0;
        count = 0;
        /!*document.getElementById('hr').innerHTML = "00";
        document.getElementById('min').innerHTML = "00";
        document.getElementById('sec').innerHTML = "00";
        document.getElementById('count').innerHTML = "00";*!/

        final_time = hour + ':' + minute + ':' + second ;

        $("#num_time").html(final_time);
    });*/

    function stopTimer(){
        timer = false;
    }

    function resetStopWatch(){
        timer = false;
        hour = 0;
        minute = 0;
        second = 0;
        count = 0;

        final_time = '00:00:00';

        $("#num_time").html(final_time);
    }

    function stopWatch() {
        if (timer) {
            count++;

            if (count == 100) {
                second++;
                count = 0;
            }

            if (second == 60) {
                minute++;
                second = 0;
            }

            if (minute == 60) {
                hour++;
                minute = 0;
                second = 0;
            }

            let hrString = hour;
            let minString = minute;
            let secString = second;
            let countString = count;

            if (hour < 10) {
                hrString = "0" + hrString;
            }

            if (minute < 10) {
                minString = "0" + minString;
            }

            if (second < 10) {
                secString = "0" + secString;
            }

            if (count < 10) {
                countString = "0" + countString;
            }

            /*document.getElementById('hr').innerHTML = hrString;
            document.getElementById('min').innerHTML = minString;
            document.getElementById('sec').innerHTML = secString;
            document.getElementById('count').innerHTML = countString;*/

            final_time = hrString + ':' + minString + ':' + secString ;
            $("#num_time").html(final_time);

            setTimeout(stopWatch, 10);
        }
    }

</script>
<script>
    gameStart = 0;

    numbersArr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
    blankCell = 'cell_16';
    move = 0;

    CellAdj = [];
    moveCount = 0;

    CellAdj['cell_1'] = ['cell_2', 'cell_5'];
    CellAdj['cell_2'] = ['cell_3', 'cell_6', 'cell_1'];
    CellAdj['cell_3'] = ['cell_2', 'cell_4', 'cell_7'];
    CellAdj['cell_4'] = ['cell_3', 'cell_8'];
    CellAdj['cell_5'] = ['cell_1', 'cell_6', 'cell_9'];
    CellAdj['cell_6'] = ['cell_2', 'cell_5', 'cell_7', 'cell_10'];
    CellAdj['cell_7'] = ['cell_3', 'cell_6', 'cell_8', 'cell_11'];
    CellAdj['cell_8'] = ['cell_4', 'cell_7', 'cell_12'];
    CellAdj['cell_9'] = ['cell_5', 'cell_10', 'cell_13'];
    CellAdj['cell_10'] = ['cell_6', 'cell_9', 'cell_11', 'cell_14'];
    CellAdj['cell_11'] = ['cell_7', 'cell_10', 'cell_12', 'cell_15'];
    CellAdj['cell_12'] = ['cell_8', 'cell_11', 'cell_16'];
    CellAdj['cell_13'] = ['cell_9', 'cell_14'];
    CellAdj['cell_14'] = ['cell_10', 'cell_13', 'cell_15'];
    CellAdj['cell_15'] = ['cell_14', 'cell_11', 'cell_16'];
    CellAdj['cell_16'] = ['cell_12', 'cell_15'];

    function startGame() {
        gameStart = 1;

        $('.cell').html('');
        blankCell = "cell_16";

        numbersArr = shuffle(numbersArr);
        updateCells(numbersArr);
        setTimeout(function(){
            timer = true;
            stopWatch();
        })

        $("#num_btn").css('display', 'none');
        $("#reset_game").css('display', 'block');
    }


    function updateCells(numArr) {
        var cells = document.getElementsByClassName("cell");
        for (var i = 0; i < numArr.length; i++) {
            cells[i].innerText = numArr[i];
        }
    }


    $(document).ready(function () {
        $('.cell').on('click', function () {


            txt = $(this).text();


            clCellId = $(this).attr('id');

            if(gameStart == 1){
                if (arrAdjucentCell(clCellId, blankCell) == true) {
                    $("#" + blankCell).text(txt);
                    $(this).text('');
                    blankCell = $(this).attr('id');

                    moveCount++;

                    $("#click_count").text(moveCount);


                    if (check_success() == true) {

                        alert("Congratulations! Game finished!");
                        stopTimer();
                    }
                }
            }

        })


        $(".color_box").on('click', function () {

            colorId = $(this).attr('id');

            bgColor = '';
            borderCol = '';


            if (colorId == 'selCol1') {
                bgColor = '#06790a';
                borderCol = '#046a07';

                $(".cell").css({
                    'background-color': bgColor,
                    'border-color': borderCol
                })

                $(".num_btn").css({
                    'border-color': borderCol,
                })

                $(".num_btn").mouseover(function () {
                    $(this).css({
                        'background-color': bgColor
                    })
                }).mouseout(function () {
                    $(this).css({
                        'background-color': '#fff'
                    })
                })

            } else if (colorId == 'selCol2') {
                bgColor = '#064d79';
                borderCol = '#063c5e';

                $(".cell").css({
                    'background-color': bgColor,
                    'border-color': borderCol,
                })

                $(".num_btn").css({
                    'border-color': borderCol,
                })

                $(".num_btn").mouseover(function () {
                    $(this).css({
                        'background-color': bgColor
                    })
                }).mouseout(function () {
                    $(this).css({
                        'background-color': '#fff'
                    })
                })

            } else if (colorId == 'selCol3') {
                bgColor = '#794B06FF';
                borderCol = '#563505';

                $(".cell").css({
                    'background-color': bgColor,
                    'border-color': borderCol,
                })

                $(".num_btn").css({
                    'border-color': borderCol,
                })

                $(".num_btn").mouseover(function () {
                    $(this).css({
                        'background-color': bgColor
                    })
                }).mouseout(function () {
                    $(this).css({
                        'background-color': '#fff'
                    })
                })

            } else if (colorId == 'selCol4') {
                bgColor = '#790625';
                borderCol = '#59051c';

                $(".cell").css({
                    'background-color': bgColor,
                    'border-color': borderCol,
                })

                $(".num_btn").css({
                    'border-color': borderCol,
                })

                $(".num_btn").mouseover(function () {
                    $(this).css({
                        'background-color': bgColor
                    })
                }).mouseout(function () {
                    $(this).css({
                        'background-color': '#fff'
                    })
                })

            }

        })
    });


    function arrAdjucentCell(clCell, blCell) {
        //blCellPos = blCell.split("_")[1];

        if (CellAdj[blCell].indexOf(clCell) != -1) {
            return true;

        } else {
            return false;
        }
    }

    function check_success() {
        if ($('#cell_1').text() == 1 && $('#cell_2').text() == 2 && $('#cell_3').text() == 3 && $('#cell_4').text() == 4 && $('#cell_5').text() == 5 && $('#cell_6').text() == 6 && $('#cell_7').text() == 7 && $('#cell_8').text() == 8 && $('#cell_9').text() == 9 && $('#cell_10').text() == 10 && $('#cell_11').text() == 11 && $('#cell_12').text() == 12 && $('#cell_13').text() == 13 && $('#cell_14').text() == 14 && $('#cell_15').text() == 15) {
            return true;
        } else {
            return false;
        }
    }

    function shuffle(a) {
        var j, x, i;
        for (i = a.length - 1; i > 0; i--) {
            j = Math.floor(Math.random() * (i + 1));
            x = a[i];
            a[i] = a[j];
            a[j] = x;
        }
        return a;
    }

    function resetGame() {
        gameStart = 0;
        $('.cell').html('');
        blankCell = "cell_16";
        moveCount = 0;
        $("#click_count").text(moveCount);

        $("#num_btn").html('Start Game');
        resetStopWatch();


        $("#num_btn").css('display', 'block');
        $("#reset_game").css('display', 'none');

        setTimeout(function(){
            $("#arrange15_modal .close").trigger('click');
        }, 300);
    }
</script>

<div class="numGame game_area">
    <div class="color_div">
        <span id="selCol1" class="color_box"></span>
        <span id="selCol2" class="color_box"></span>
        <span id="selCol3" class="color_box"></span>
        <span id="selCol4" class="color_box"></span>
    </div>
    <div id="count" class="count"><i class="fa fa-fw fa-exchange" style="margin-right: 8px;"></i> <span id="click_count">0</span></div>
    <div class="num-time">
        <i class="fa fa-fw fa-clock-o"></i>
        <span id="num_time">00:00:00</span>
    </div>


    <div class="divTable">
        <div id="cell_1" class="cell"></div>
        <div id="cell_2" class="cell"></div>
        <div id="cell_3" class="cell"></div>
        <div id="cell_4" class="cell"></div>
        <div id="cell_5" class="cell"></div>
        <div id="cell_6" class="cell"></div>
        <div id="cell_7" class="cell"></div>
        <div id="cell_8" class="cell"></div>
        <div id="cell_9" class="cell"></div>
        <div id="cell_10" class="cell"></div>
        <div id="cell_11" class="cell"></div>
        <div id="cell_12" class="cell"></div>
        <div id="cell_13" class="cell"></div>
        <div id="cell_14" class="cell"></div>
        <div id="cell_15" class="cell"></div>
        <div id="cell_16" class="cell"></div>
    </div>
    <div class="button_area">
        <button id="num_btn" class="num_btn" onclick="startGame()">Start</button>
        <button id="reset_game" type="button" class="num_btn" data-toggle="modal" data-target="#arrange15_modal">Exit</button>
    </div>
</div>


