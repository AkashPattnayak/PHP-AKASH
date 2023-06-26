<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Arrange 15 Game</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
        width: 150px;
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
      }
      .grid_div{
        float: left;
        width: 200px;
       

      }
      .btn_div{
        width: 35px;
        height: 35px;
        margin: 0 5px;
        cursor: pointer;
        display: inline-block;
      }
     #btn_div_01{
      background-color: #0000002f;
     }
     #btn_div_02{
      background-color: #0000002f;
     }
     #btn_div_03{
      background-color: #0000002f;
     }

      #click_count {
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
    </style>
    <script>
      move = 0;
      moveCount = 0;
      blankCell= '';

      function startGame() {
        if (moveCount > 0) {
          confirmation = confirm("Do you want to exit the game?");
          if (confirmation) {

            $.ajax({
                url: "save_game_data.php",
                method: "POST",
                data: {
                game_time: game_time,
                move_count: moveCount
                },
                success: function (response) {
                console.log("Game data saved successfully.");
                },
                error: function (xhr, status, error) {
                console.error("Error saving game data:", error);
                }
            });
            resetGame();
            document.getElementById("num_btn01").innerHTML = "Start Game";
            exit();
          } else {
            return;
          }
        }else{

        }
        resetGame();
        numbersArr = shuffle(numbersArr);
        updateCells(numbersArr);
      }

      function updateCells(numArr) {
        cells = document.getElementsByClassName("cell");
        for (var i = 0; i < numArr.length; i++) {
          cells[i].innerText = numArr[i];
        }
      }

      $(document).ready(function () {
        $(document).on("click", '.cell', function () {

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
              alert("Congratulations! Game finished!");
            }
          }
        });


        $(".color_box").on("click", function () {
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
              .mouseover(function () {
                $(this).css({
                  "background-color": bgColor,
                });
              })
              .mouseout(function () {
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
              .mouseover(function () {
                $(this).css({
                  "background-color": bgColor,
                });
              })
              .mouseout(function () {
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
              .mouseover(function () {
                $(this).css({
                  "background-color": bgColor,
                });
              })
              .mouseout(function () {
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
              .mouseover(function () {
                $(this).css({
                  "background-color": bgColor,
                });
              })
              .mouseout(function () {
                $(this).css({
                  "background-color": "#fff",
                });
              });
          }
        });
      });

     function arrAdjacentCells(clCell, blCell) {
      
          var adjacentCells = calculateAdjacentCells(blCell);
          if (adjacentCells.indexOf(clCell)!= -1) {
            return true;
          } else {
            return false;
          }
      }

     
      function check_success() {
      cells = document.getElementsByClassName("cell");
      success = true;

      for (var i = 0; i < cells.length - 1; i++) {
        currentNum = parseInt(cells[i].innerText);
       
        nextNum = parseInt(cells[i + 1].innerText);
        
        if (currentNum === totalCells) {
          
          continue;
        }
        if (currentNum > nextNum) {
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
        cells = document.getElementsByClassName("cell");
       // blankCell = "cell_16";
        for (var i = 0; i < cells.length; i++) {
          cells[i].innerText = "";
        }
        moveCount = 0;
        $("#click_count").text(moveCount);
      }
     

      function createGameGrid(size){
        $(".divTable").html('');
        var grid = [];
        for (var i = 1; i <= size; i++) {
          htmlString = '<div id="cell_' + i +'" class="cell"></div>';
          $(".divTable").append(htmlString);

          gridType = Math.sqrt(size);

          if(gridType == 3){
            $(".cell").css({
              'width':'80px',
              'height':'80px',
            })
            moveCount=0;
            totalCells = 9;
            numbersArr = [1, 2, 3, 4, 5, 6, 7, 8];
            blankCell = "cell_9";            
           
          }else if(gridType == 4){
            $(".cell").css({
              'width':'50px',
              'height':'50px',
            })
            moveCount=0;
            totalCells = 16;
            numbersArr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
            blankCell = "cell_16";
            
          }else if(gridType == 5){
            $(".cell").css({
              'width':'32px',
              'height':'32px',
            })
            moveCount=0;
            totalCells = 25;
            numbersArr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];
            blankCell = "cell_25";
            
          }
          
        }
        moveCount = 0;
        $("#click_count").text(moveCount);
        
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
      

     
    </script>
  </head>
  <body>
    <div class="game_area">
      <div id="count" class="count">
        Click count: <span id="click_count">0</span>
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
