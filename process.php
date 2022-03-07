<?php
    include "database.php";
    session_start();

    $user_choice_id = $_POST["answer"];
    $question_id = $_POST["question"];

    $correct_choice = $db->query("SELECT * FROM answers WHERE question_id = $question_id AND is_true = 1");
    $correct_choice_id = $correct_choice->fetch_assoc()["id"];


    if($user_choice_id == $correct_choice_id)
    {
        $_SESSION["user_score"]++;
    }

    $question_id++;
    if($_SESSION["question_number"] >= $question_id)
    {
        header("Location: question.php?q=$question_id");
    }
    else
    {
        header("Location: final.php");
    }
?>