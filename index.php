<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
            <?php

                include 'inc/questions.php';
                include 'inc/quiz.php';
                // echo $toast;
                echo '<p class="breadcrumbs">Question #1 of #' . $totalQuestions . '</p>';
                echo '<p class="quiz">What is ' . $questions[0]['leftAdder'] . ' + ' . $questions[0]['rightAdder'] . '?</p>';
                echo '<form action="index.php" method="post">';
                    echo '<input type="hidden" name="id" value="0" />';
                    echo '<input type="submit" class="btn" name="answer" value="' . $questions[0]['firstIncorrectAnswer'] . '" />';
                    echo '<input type="submit" class="btn" name="answer" value="' . $questions[0]['correctAnswer'] . '" />';
                    echo '<input type="submit" class="btn" name="answer" value="' . $questions[0]['secondIncorrectAnswer'] . '" />';
                echo '</form>';
            ?>
        </div>
    </div>
</body>
</html>