<!--Coded by arb30-->
<?php

include_once( "Quiz.php" );

$game      = new Quiz();
$conn      = $game->db_connect();

$game->page_header( "Log In" );

?>
    <!--- This is the Welcome Text--->
    <div class="WelcomeTitle">
        <h1>WELCOME TO QUIZ CAFE</h1>
        <h3>Please Log In Below</h3>
    </div>

    <?php
    $game->login( $conn );
    ?>

<?php
$game->page_footer();