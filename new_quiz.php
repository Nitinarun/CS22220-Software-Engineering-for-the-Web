<!--Coded by arb30-->
<?php
    include_once ("Quiz.php");
    $menu_item = "new_quiz";
    $game = new Quiz();
    $conn = $game->db_connect();

    $game->page_header($menu_item);
?>

<div class="text">
    <h2>Creating a New Quiz</h2>

    <?php
    $game->create_new_quiz($conn);
    ?>

</div>

<?php
    $game->page_footer();
?>

