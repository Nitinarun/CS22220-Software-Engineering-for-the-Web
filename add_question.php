<!--Coded by arb30-->
<?php

include_once( "Quiz.php" );

$quiz = new Quiz();

$quiz->if_user_not_auth_redirect_to_login();
$conn = $quiz->db_connect();

$quiz->page_header( "Log In" );

?>
    <!--- This is the Welcome Text--->
    <div class="WelcomeTitle">
        <h1>PLEASE ENTER YOUR QUESTIONS AND ANSWERS</h1>
        <h3>You will only be able to save the quiz once you add two or more questions</h3>
        <h3>Once you added your answers, use the checkbox to select the correct answer(s)</h3>
    </div>

<?php

//$quiz->add_question( $conn );

$quiz->page_footer();
