<?php
session_start();
$game = $_SESSION['game'];
$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array

    if (empty($_GET['answer']))
        $errors['answer'] = 'a response is required.';
// return a response ===========================================================
    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {
        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
        // if there are no errors process our form, then return a message
        // DO ALL YOUR FORM PROCESSING HERE
        // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)
        // show a message of success and provide a true success variable
        $data['success'] = true;
        
    }
    $con = mysqli_connect('localhost','root','','readplay');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    $q = intval($_GET['id']);
    mysqli_select_db($con,"readplay");
    $sql="SELECT answer FROM questions WHERE id = '".$q."'";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)) {
        if($row['answer'] == $_GET['answer']){
            updateScore($q);
            $data['message'] = 'Correct';
        }else{
            $data['message'] = 'Incorrect!';
        }
    }
    $sql1="SELECT * FROM game WHERE id = $game";
    $result1 = mysqli_query($con,$sql1);
    while($row = mysqli_fetch_array($result1)) {
        $data['score'] = $row['score'];
    }
    // return all our data to an AJAX call
    echo json_encode($data);

    function updateScore($user){
        $game = $_SESSION['game'];
        $con = mysqli_connect('localhost','root','','readplay');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        $sql="SELECT * FROM game WHERE id = $game";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            $sql="UPDATE game SET score = score + 2 WHERE id = $game";
            $result = mysqli_query($con,$sql);
            return true;
        }else{
            $sql="INSERT INTO game(user_id, score) VALUES($user, 1)";
            $result = mysqli_query($con,$sql);
        }
    }