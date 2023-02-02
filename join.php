<!--Coded by arb30-->
<?php

include_once( "Quiz.php" );
$menu_item = "index";
$game      = new Quiz();
$conn      = $game->db_connect();

//list($user_name, $theme, , $game_level) = $game->get_player_data($conn);

$game->page_header( "Sign Up" );

?>
    <!--- This is the Welcome Text--->
    <div class="WelcomeTitle">
        <h1>LOOKING TO JOIN A QUIZ ?</h1>
        <h3>Please enter your generated link</h3>
    </div>

    <div class="accessing-container">
        <form action="">
            <div class="form-group">
                <label class="LinkTitle" for="">Name</label>
                <input type="text" class="form-control" placeholder="Name">
            </div>
            <input type="submit" href="joinname.html" class="SUbtn" value="Join">
        </form>
    </div>

<?php
$game->page_footer();