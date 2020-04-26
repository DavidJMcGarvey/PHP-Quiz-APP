<?php
// session_start(); // Start the session
// Include questions from the questions.php file
include 'inc/questions.php';
// Make a variable to hold the total number of questions to ask
$totalQuestions = count($questions);
$awesomes = 0;
$bummers = 0;
// Make a variable to hold the toast message and set it to an empty string
$toast = '';
// Make a variable to determine if the score will be shown or not. Set it to false.
$showScore = false;
// Make a variable to hold a random index. Assign null to it.
$random = null;
// Make a variable to hold the current question. Assign null to it.
$currentQuestion = null;

/*
    If the server request was of type POST
        Check if the user's answer was equal to the correct answer.
        If it was correct:
            1. Assign a congratulutory string to the toast variable
            2. Ancrement the session variable that holds the total number correct by one.
        Otherwise:
            1. Assign a bummer message to the toast variable.
*/
// var_dump($_POST['answer']);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($_POST['answer'] === $questions[0]['correctAnswer']) {
        $toast = 'Awesome!';
        $awesomes += 1;
    } else {
        $toast = 'Bummer!';
        $bummers += 1;
    }
}
/*
    Check if a session variable has ever been set/created to hold the indexes of questions already asked.
    If it has NOT: 
        1. Create a session variable to hold used indexes and initialize it to an empty array.
        2. Set the show score variable to false.
*/
for ($i = 1; $i <= count($questions); $i++) {
    if (isset($_SESSION[$i]['answer'])) {
        echo '<h1>' . $_POST[$i]['answer'] . '</h1>';
    }
}


// the getRandomQuestion function
function getRandomQuestion($arr) {
    global $questions;
    $questionsCount = count($arr) - 1;
    $random = rand(0, $questionsCount);
    return $questions[$random];
  }
// Create the printQuote funtion and name it printQuote
function printQuestion() {
    global $questions;
    $question = getRandomQuestion($questions);
    $leftAdder = $question['leftAdder'];
    $rightAdder = $question['rightAdder'];
    $correctAnswer = $question['correctAnswer'];
    $firstIncorrectAnswer = $question['firstIncorrectAnswer'];
    $secondIncorrectAnswer = $question['secondIncorrectAnswer'];
  
    echo '<p class="breadcrumbs">Question #1 of #' . $totalQuestions . '</p>';
    echo '<p class="quiz">What is ' . $leftAdder . ' + ' . $rightAdder . '?</p>';
    echo '<form action="index.php" method="post">';
        echo '<input type="hidden" name="id" value="0" />';
        echo '<input type="submit" class="btn" name="answer" value="' . $firstIncorrectAnswer . '" />';
        echo '<input type="submit" class="btn" name="answer" value="' . $correctAnswer . '" />';
        echo '<input type="submit" class="btn" name="answer" value="' . $secondIncorrectAnswer . '" />';
    echo '</form>';

  }

/*
  If the number of used indexes in our session variable is equal to the total number of questions
  to be asked:
        1.  Reset the session variable for used indexes to an empty array 
        2.  Set the show score variable to true.

  Else:
    1. Set the show score variable to false 
    2. If it's the first question of the round:
        a. Set a session variable that holds the total correct to 0. 
        b. Set the toast variable to an empty string.
        c. Assign a random number to a variable to hold an index. Continue doing this
            for as long as the number generated is found in the session variable that holds used indexes.
        d. Add the random number generated to the used indexes session variable.      
        e. Set the individual question variable to be a question from the questions array and use the index
            stored in the variable in step c as the index.
        f. Create a variable to hold the number of items in the session variable that holds used indexes
        g. Create a new variable that holds an array. The array should contain the correctAnswer,
            firstIncorrectAnswer, and secondIncorrect answer from the variable in step e.
        h. Shuffle the array from step g.
*/