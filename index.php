<!--Coded by arb30-->
<?php

include_once( "Quiz.php" );
$menu_item = "index";
$quiz      = new Quiz();
$conn      = $quiz->db_connect();

$quiz->page_header( $menu_item );

?>
    <!--- This is the Welcome Text--->
    <div class="WelcomeTitle">
        <h1>WELCOME TO QUIZ CAFE</h1>
        <h2>YOUR NUMBER ONE STOP FOR QUIZZES</h2>
    </div>

    <div class="boxes">
        <!---This is the Create a Quiz box--->
        <div class="createaquiz">
            <h3 class="title">Create a Quiz</h3>
            <img src="images/createaquiz.png">
            <!---This is the Create Button--->
            <a href="create_quiz.php">
                <button id="showcreatebutton">Create</button>
            </a>
            <p>Create, Edit or Delete<br>a quiz</p>
        </div>

        <!---This is the Join a Quiz box--->
        <div class="createaquiz">
            <h3 class="title">Join a Quiz</h3>
            <img src="images/joinaquiz.png">
            <!---This is the Join Button--->
            <a href="join.php">
                <button id="showjoinbutton">Join</button>
            </a>
            <p>Join a quiz with a pre<br>generated link</p>
        </div>

        <!---This is the Run a Quiz box--->
        <div class="createaquiz">
            <h3 class="title">Run a Quiz</h3>
            <img src="images/runaquiz.png">
            <!---This is the Run Button--->
            <a href="static_html/Runaquiz.html">
                <button id="showrunbutton">Run</button>
            </a>
            <p>Run a quiz for your<br>students</p>
        </div>
    </div>

<?php
$quiz->page_footer();