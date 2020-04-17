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
            include 'inc/quiz.php';
            echo '<p class="breadcrumbs">Question # of ' . $totalQuestions . '</p>';
            echo '<p class="quiz">What is 54 + 71?</p>';
            echo '<form action="index.php" method="post">';
                echo '<input type="hidden" name="id" value="0" />';
                echo '<input type="submit" class="btn" name="answer" value="135" />';
                echo '<input type="submit" class="btn" name="answer" value="125" />';
                echo '<input type="submit" class="btn" name="answer" value="115" />';
            echo '</form>';
            ?>
        </div>
    </div>
</body>
</html>