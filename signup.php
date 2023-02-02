// the first page of the website
<?php

include_once( "Quiz.php" );
$menu_item = "index";
$game      = new Quiz();
$conn      = $game->db_connect();

// TTT
//list($user_name, $theme, , $game_level) = $game->get_player_data($conn);

$game->page_header( "Sign Up" );

?>
    <!--- This is the Welcome Text--->
    <div class="WelcomeTitle">
        <h1>WELCOME TO QUIZ CAFE</h1>
        <h3>Please Sign Up Below</h3>
    </div>

    <?php
    $game->register( $conn );
    ?>

<?php
$game->page_footer();