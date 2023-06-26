<?php


include('config.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Arrange 15 Game</title>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <!-- /*
    <scrip src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    */ -->
  <style>
    html,
    body {
      font-family: Roboto, "Arial Black";
    }

    .game_area {
      width: 368px;
      height: 368px;
      margin: 50px auto;
      user-select: none;
    }

    .divTable {
      float: left;
      width: 368px;
      height: 368px;
      border: 1px solid #333;
      border-radius: 10px;
      background-color: #dedede;
      margin: 15px 0;
    }

    .cell {
      width: 50px;
      height: 50px;
      line-height: 50px;
      text-align: center;
      border: 1px solid #046a07;
      float: left;
      font-size: 26px;
      cursor: pointer;
      padding: 10px;
      margin: 10px;
      background-color: #06790a;
      color: #fff;
      box-shadow: 2px 3px 1px #e5e9e7;
    }

    .num_btn {
      background-color: #ffffff;
      color: rgb(0, 0, 0);
      padding: 15px 32px;
      text-align: center;
      font-size: medium;
      border: 2px solid #046a07;
      cursor: pointer;
      border-radius: 20px;
      width: 150px;
      margin: 0px auto;
      display: block;
    }

    .num_btn:hover {
      background-color: #06790a;
      color: #ffffff;
    }

    .count {
      float: left;
      width: 206px;
    }

    .coins {
      float: left;
      width: 206px;
    }

    .color_div {
      float: left;
      width: 200px;
    }

    .color_box {
      width: 35px;
      height: 35px;
      margin: 0 5px;
      cursor: pointer;
      display: inline-block;
      margin-top: 67px;
    }

    .grid_div {
      float: left;
      width: 200px;


    }

    .btn_div {
      width: 35px;
      height: 35px;
      margin: 0 5px;
      cursor: pointer;
      display: inline-block;
      margin-top: 67px;
    }

    #btn_div_01 {
      background-color: #0000002f;
    }

    #btn_div_02 {
      background-color: #0000002f;
    }

    #btn_div_03 {
      background-color: #0000002f;
    }

    #click_count {
      font-weight: bold;
      color: #064d79;
      font-size: 24px;
    }

    #coins_count {
      font-weight: bold;
      color: #064d79;
      font-size: 24px;

    }

    #selCol1 {
      background-color: #06790a;
    }

    #selCol2 {
      background-color: #064d79;
    }

    #selCol3 {
      background-color: #794b06ff;
    }

    #selCol4 {
      background-color: #790625;
    }

    .button_area {
      position: relative;
      float: left;
      width: 100%;
      margin-top: 25px;
    }

    .num-time {
      width: 125px;
      padding: 2px 5px;
      border: 1px solid #a49f9f;
      border-radius: 10px;
      margin: 0 5px 0 0;
      float: left;
      font-size: 20px;
    }

    .reward-animation {
      transform: scale(1.2) rotate(360deg);
      transition: transform 0.5s ease;
    }

    #game_complete_animation {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      animation: gameCompleteAnimation 2s ease-in-out;
      display: none;
    }

    @keyframes gameCompleteAnimation {
      0% {
        transform: translate(-50%, -50%) scale(0);
        opacity: 0;
      }

      50% {
        transform: translate(-50%, -50%) scale(1.1);
      }

      100% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
      }
    }
  </style>
  <script>
    spendTime = 0;

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

    function stopTimer() {
      timer = false;
    }

    function resetStopWatch() {
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

        final_time = hrString + ':' + minString + ':' + secString;
        $("#num_time").html(final_time);

        spendTime = hour * 60 + minute * 60 +second;
        //console.log(spendTime);

        setTimeout(stopWatch, 10);
      }
    }
  </script>
  <script>
    gameStart = 0;
    move = 0;
    moveCount = 0;
    blankCell = '';
    coins = 0;
    final_time = 0;

    

    game_id = '';

    // json_data = JSON.parse(json_data);
    // last_row_id = json_data.last_row_id;

    function startGame() {

      data = {
        user_id: 84,
        game_time: spendTime,
        move_count: moveCount,
        start_game:1
      };


      $.ajax({
        type: "POST",
        url: 'arrrange15_ajax.php',
        data: data,
        dataType: 'JSON',
        success: function(data) {
          
          game_id = data['game_id'];
          //alert(game_id);

          const updateGameData = setInterval(sendUpdatedDataToServer, 5000);
          
        },
        error: function(error) {
          console.log(error);
        }

      });
      gameStart = 1;
      if (gameStart == 1) {
        sendUpdatedDataToServer();
      }
      if (moveCount > 0) {
        confirmation = confirm("Do you want to exit the game?");
        if (confirmation) {
          $(".divTable").html('');
          moveCount = 0;
          $("#click_count").text(moveCount);
          $('#game_complete_animation').css({
            'display': 'none'
          });
          document.getElementById("num_btn01").innerHTML = "Start Game";
          resetStopWatch();
          $("#num_btn").css('display', 'block');
          $("#reset_game").css('display', 'none');

          setTimeout(function() {
            $("#arrange15_modal .close").trigger('click');
          }, 300);

          exit();
        } else {
          return;
        }
      } else {

      }
      resetGame();
      numbersArr = shuffle(numbersArr);
      updateCells(numbersArr);
      document.getElementById("num_btn01").innerHTML = "Exit";

      setTimeout(function() {
        timer = true;
        stopWatch();
      })

      $("#num_btn").css('display', 'none');
      $("#reset_game").css('display', 'block');

    }

    function updateCells(numArr) {
      cells = document.getElementsByClassName("cell");
      for (var i = 0; i < numArr.length; i++) {
        cells[i].innerText = numArr[i];
      }
    }

    $(document).ready(function() {
      $(document).on("click", '.cell', function() {



        clickedCell = $(this);
        clickedCellId = parseInt(clickedCell.attr("id").split("_")[1]);


        blankCellId = parseInt($("#" + blankCell).attr("id").split("_")[1]);


        if (arrAdjacentCells(clickedCellId, blankCellId)) {

          var clickedCellValue = clickedCell.text();
          var blankCellValue = $("#" + blankCell).text();

          clickedCell.text(blankCellValue);

          $("#" + blankCell).text(clickedCellValue);

          blankCell = "cell_" + clickedCellId;

          moveCount++;

          $("#click_count").text(moveCount);
          
          if (check_success() == true) {
            stopTimer();
            $('#game_complete_animation').css({
              'display': 'block'
            });
          } else {

          }
        }
      });
 

      $(".color_box").on("click", function() {
        colorId = $(this).attr("id");

        bgColor = "";
        borderCol = "";

        if (colorId == "selCol1") {
          bgColor = "#06790a";
          borderCol = "#046a07";

          $(".cell").css({
            "background-color": bgColor,
            "border-color": borderCol,
          });

          $(".num_btn").css({
            "border-color": borderCol,
          });

          $(".num_btn")
            .mouseover(function() {
              $(this).css({
                "background-color": bgColor,
              });
            })
            .mouseout(function() {
              $(this).css({
                "background-color": "#fff",
              });
            });
        } else if (colorId == "selCol2") {
          bgColor = "#064d79";
          borderCol = "#063c5e";

          $(".cell").css({
            "background-color": bgColor,
            "border-color": borderCol,
          });

          $(".num_btn").css({
            "border-color": borderCol,
          });

          $(".num_btn")
            .mouseover(function() {
              $(this).css({
                "background-color": bgColor,
              });
            })
            .mouseout(function() {
              $(this).css({
                "background-color": "#fff",
              });
            });
        } else if (colorId == "selCol3") {
          bgColor = "#794B06FF";
          borderCol = "#563505";

          $(".cell").css({
            "background-color": bgColor,
            "border-color": borderCol,
          });

          $(".num_btn").css({
            "border-color": borderCol,
          });

          $(".num_btn")
            .mouseover(function() {
              $(this).css({
                "background-color": bgColor,
              });
            })
            .mouseout(function() {
              $(this).css({
                "background-color": "#fff",
              });
            });
        } else if (colorId == "selCol4") {
          bgColor = "#790625";
          borderCol = "#59051c";

          $(".cell").css({
            "background-color": bgColor,
            "border-color": borderCol,
          });

          $(".num_btn").css({
            "border-color": borderCol,
          });

          $(".num_btn")
            .mouseover(function() {
              $(this).css({
                "background-color": bgColor,
              });
            })
            .mouseout(function() {
              $(this).css({
                "background-color": "#fff",
              });
            });
        }
      });
      updateCoins();
    });


    function updateCoins() {
        $("#coins_count").text(coins);
      }


      

      function sendUpdatedDataToServer() {

        
       
        data = {
            user_id: 84,
            game_time: spendTime,
            move_count: moveCount,
            game_id:game_id,
            update_game:1,
          };

          $.ajax({
            type: "POST",
            url: 'arrrange15_ajax.php',
            data: data,
            dataType: 'JSON',
            success: function(data) {
              console.log(data);
              console.log(data['msg']);
              
            }
          });


          
      }

      function myStopFunction() {
        clearInterval(updateGameData);
      }
    function arrAdjacentCells(clCell, blCell) {

      var adjacentCells = calculateAdjacentCells(blCell);
      if (adjacentCells.indexOf(clCell) != -1) {
        return true;
      } else {
        return false;
      }
    }


    /*
    This function checks to see if all of the numbers in the cells with the class "cell" are in ascending order. It does this by iterating through the cells and checking if the current number is equal to i + 1. If it is not, then the function sets success to false and breaks out of the loop. If the function reaches the end of the loop without setting success to false, then it returns true.



    */

    function check_success() {
      cells = document.getElementsByClassName("cell");
      success = true;

      for (var i = 0; i < cells.length - 1; i++) {
        currentNum = parseInt(cells[i].innerText);

        if (currentNum !== i + 1) {
          success = false;
          break;
        }
      }
      return success;
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
      cells = document.getElementsByClassName("cell");
      // blankCell = "cell_16";
      for (var i = 0; i < cells.length; i++) {
        cells[i].innerText = "";

      }

      moveCount = 0;
      $("#click_count").text(moveCount);
      resetStopWatch();


      $("#num_btn").css('display', 'block');
      $("#reset_game").css('display', 'none');

      setTimeout(function() {
        $("#arrange15_modal .close").trigger('click');
      }, 300);
    }


    function createGameGrid(size) {
      $(".divTable").html('');
      var grid = [];
      for (var i = 1; i <= size; i++) {
        htmlString = '<div id="cell_' + i + '" class="cell"></div>';
        $(".divTable").append(htmlString);

        gridType = Math.sqrt(size);

        if (gridType == 3) {
          $(".cell").css({
            'width': '80px',
            'height': '80px',
          })
          moveCount = 0;
          totalCells = 9;
          numbersArr = [1, 2, 3, 4, 5, 6, 7, 8];
          blankCell = "cell_9";
          $('#game_complete_animation').css({
            'display': 'none'
          });

        } else if (gridType == 4) {
          $(".cell").css({
            'width': '50px',
            'height': '50px',
          })
          moveCount = 0;
          totalCells = 16;
          numbersArr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
          blankCell = "cell_16";
          $('#game_complete_animation').css({
            'display': 'none'
          });

        } else if (gridType == 5) {
          $(".cell").css({
            'width': '32px',
            'height': '32px',
          })
          moveCount = 0;
          totalCells = 25;
          numbersArr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];
          blankCell = "cell_25";
          $('#game_complete_animation').css({
            'display': 'none'
          });

        }

      }
      moveCount = 0;
      $("#click_count").text(moveCount);
      resetStopWatch();
      document.getElementById("num_btn01").innerHTML = "Start Game";

    }


    function calculateAdjacentCells(cellId) {

      row = Math.floor((cellId - 1) / Math.sqrt(totalCells)) + 1;
      column = (cellId - 1) % Math.sqrt(totalCells) + 1;

      adjacentCells = [];


      if (row > 1) adjacentCells.push(cellId - Math.sqrt(totalCells));
      if (row < Math.sqrt(totalCells)) adjacentCells.push(cellId + Math.sqrt(totalCells));
      if (column > 1) adjacentCells.push(cellId - 1);
      if (column < Math.sqrt(totalCells)) adjacentCells.push(cellId + 1);

      return adjacentCells;

    }
    document.onkeydown = function(event) {
      event = (event || window.event);
      if (event.keyCode === 123 || event.key === "F12") {
        return false;
      }
    }
    $(document).ready(function() {
      $(document).bind("contextmenu", function(e) {
        return false;
      });
    });
  </script>
</head>

<body oncontextmenu="return false;">
  <div class="game_area">
    <div class="num-time">
      Timer: <span id="num_time">00:00:00</span>
    </div>
    <div id="count" class="count">
      Click count: <span id="click_count">0</span>
    </div>
    <div id="coins" class="coins">
      Coins: <span id="coins_count">0</span>
    </div>
    <div class="color_div">
      <span id="selCol1" class="color_box"></span>
      <span id="selCol2" class="color_box"></span>
      <span id="selCol3" class="color_box"></span>
      <span id="selCol4" class="color_box"></span>
    </div>
    <div id="grid-container">
      <button id="btn_div_01" class="btn_div" onclick="createGameGrid(9)">3x3</button>
      <button id="btn_div_02" class="btn_div" onclick="createGameGrid(16)">4x4</button>
      <button id="btn_div_03" class="btn_div" onclick="createGameGrid(25)">5x5</button>
    </div>
    <div id="game_complete_animation">
      <h2>Congratulations!</h2>
      <p>You completed the game!</p>
    </div>
    <div class="divTable">

    </div>
    <div class="button_area">
      <button id="num_btn01" class="num_btn" onclick="startGame()">
        Start Game
      </button>
    </div>
  </div>

</body>

</html>