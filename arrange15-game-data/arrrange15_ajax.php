<?php
include('config.php');

$results = array(
  'error'=>false,
  'msg'=>'',
  'msg_duration'=>4000,
  'html'=>''
);


if(isset($_POST['start_game'])){
    $user_id = $_POST['user_id'];
    $game_time = $_POST['game_time'];
    $moveCount = $_POST['move_count'];
    $currentDateTime = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO game_data (`user_id`, `game_time`, `move_count`, `currentDateTime`) VALUES ('$user_id','$game_time','$moveCount','$currentDateTime')";

  
    //UPDATE `game_data` SET `id`='[value-1]',`user_id`='[value-2]',`game_time`='[value-3]',`move_count`='[value-4]',`currentDateTime`='[value-5]',`status`='[value-6]' WHERE 1
    
      
      //  $sql = "UPDATE `game_data` SET `game_time`='$game_time', `move_count`='$moveCount' WHERE 1";

      // if ($mysqli->query($sql) === TRUE) {
      //   return $final_time . ", " . $moveCount;
      // } else {
      //   return "Error updating database: " . $mysqli->error;
      // }
    
    
        
    if ($mysqli->query($sql)) {

      $last_row_id = $mysqli->insert_id;      

    $results['msg'] = 'Data is saved successfully.';
    $results['game_id'] = $last_row_id;
      
    } else {
    $results['error'] = true;
    $results['msg'] = 'Game data not saved.';
    }

    echo json_encode($results);

}elseif(isset($_POST['update_game'])){
    $user_id = $_POST['user_id'];
    $game_time = $_POST['game_time'];
    $moveCount = $_POST['move_count'];
    //$currentDateTime = date('Y-m-d H:i:s');

    $game_id = $_POST['game_id'];

    $sql = "UPDATE `game_data` SET `game_time`='$game_time', `move_count`='$moveCount' WHERE id = '$game_id'";


    if ($mysqli->query($sql)) {
      
      $results['msg'] = "Game data saved successfully.";
    } else {
    $results['error'] = true;
      $results['msg'] = "Game data not saved.";      
    }  

    echo json_encode($results);
}
 else {
  echo "Invalid request.";
}
?>
