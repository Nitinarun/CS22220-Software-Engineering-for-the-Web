<!--Coded by arb30-->
<?php

include_once( "Quiz.php" );
$menu_item = "index";
$game = new Quiz();
$conn = $game->db_connect();

$game->page_header( $menu_item );

?>
    <!--- This is the Welcome Text--->
    <div class="WelcomeTitle">
        <h1>WELCOME TO YOUR USER DASHBOARD</h1>
        <h3>Please Select what you would like to do next</h3>
    </div>

    <div class="boxes dashboard-boxes">

        <!---This is the Create a New Quiz box--->
        <div class="createanewquiz">
            <img src="images/10.png">
            <br>
            <h3 class="newquiztitle">Create a Quiz</h3>
            <p class="newquizdef">Click the button below to create<br>a new quiz</p>
            <br>
            <!---This is the Create Button--->
            <a href="create_quiz.php">
                <button id="showcreatebutton">New Quiz</button>
            </a>
        </div>

        <!---This is the See Existing Quiz box--->
        <div class="createanewquiz">
            <img src="images/23.png">
            <br>
            <h3 class="newquiztitle">See Existing Quizzes</h3>
            <p class="newquizdef">Click the button below to edit or<br>delete existing quizzes</p>
            <br>
            <!---This is the Create Button--->
            <a href="static_html/seeexistingquizes.html">
                <button id="showcreatebutton">Existing Quizzes</button>
            </a>
        </div>

        <!---This is the Run Existing Quiz box--->
        <div class="createanewquiz">
            <img src="images/04.png">
            <br>
            <h3 class="newquiztitle">Run Existing Quizzes</h3>
            <p class="newquizdef">Click the button below to run an<br>existing quizzes</p>
            <br>
            <!---This is the Create Button--->
            <a href="static_html/runaquiz.html">
                <button id="showcreatebutton">Run a Quiz</button>
            </a>
        </div>
    </div>

<?php
$game->page_footer();