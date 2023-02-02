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
        <h1>CREATING A NEW QUIZ</h1>
        <h3>Please enter your Quiz Name, Description and Logo</h3>
    </div>

<?php

$quiz->register_quiz( $conn );

$quiz->page_footer();