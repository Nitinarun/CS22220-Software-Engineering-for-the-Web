<!--Coded by arb30-->
<?php

class Quiz {

    public function page_header( $menu_item ) {
        $this->header( $menu_item );
        $this->logo();
    }

    public function db_connect() {
        //$conn = pg_connect( "host=127.0.0.1 port=5432 dbname=postgres user=postgres" );
        $conn = pg_connect("host=db.dcs.aber.ac.uk port=5432 dbname=cs27020_21_22_arb30
        user=arb30 password=ILoveMyMom404!!");

        if ( ! $conn ) {
            die( 'Could not connect: ' . pg_error() );
        }

        return $conn;
    }

    public function set_cookie( $name, $role ) {
        setcookie( "UserName", $name, time() + 3600 );
        setcookie( "UserRole", $role, time() + 3600 );
    }

    public function register_quiz( $conn ) {

        $result_message = "";

        if ( isset( $_POST['submit'] ) && ! empty( $_POST['submit'] ) ) {

            $quiz_name = ( array_key_exists( "quizname", $_POST )
                ? $_POST['quizname']
                : '' );

            $quiz_desc = ( array_key_exists( "quizdesc", $_POST )
                ? $_POST['quizdesc']
                : '' );

            if ( ! $this->is_quiz_in_db( $conn, $quiz_name ) ) {
                $result_message = "New Quiz created";
                $this->add_quiz_data_in_db( $conn, $quiz_name, $quiz_desc );

                switch ( $_POST['submit'] ) {
                    case "SAVE & ADD QUESTION":
                        $new_url = 'add_question.php';
                        break;
                    case "Add Photo":
                        $new_url = 'dashboard.php';
                        break;
                    case "Save & Exit":
                        $new_url = 'dashboard.php';
                        break;
                }

                if ( $new_url != '' ) {
                    header( 'Location: ' . $new_url );
                }

            } else {
                $result_message = "Please enter other Quiz Name -- such name has already been";
            }

        }
        $this->form_create_quiz( $quiz_name, $quiz_desc, $result_message );
    }

    public function register( $conn ) {

        $result_message = "";

        if ( isset( $_POST['submit'] ) && ! empty( $_POST['submit'] ) ) {

            $user_name = ( array_key_exists( "username", $_POST )
                ? $_POST['username']
                : '' );

            $password = ( array_key_exists( "password", $_POST )
                ? $_POST['password']
                : '' );

            $role = ( array_key_exists( "role", $_POST )
                ? $_POST['role']
                : 2 );

            if ( ! $this->is_user_in_db( $conn, $user_name ) ) {
                $result_message = "User's data added to DB";
                $this->add_user_data_in_db( $conn, $user_name, $password, $role );
                $this->set_cookie( $user_name, $role );

                $new_url = 'dashboard.php';
                header( 'Location: ' . $new_url );

            } else {
                $result_message = "Please enter other Name -- such name has already been";
            }

        }
        $this->form_signup( $user_name, $result_message, "Sign Up" );
    }

    private function if_user_auth() {
        return isset( $_COOKIE["UserName"] );
    }

    public function if_user_not_auth_redirect_to_login() {
        if ( ! $this->if_user_auth() ) {
            $new_url = 'login.php';
            header( 'Location: ' . $new_url );
        }
    }

    public function login( $conn ) {

        $result_message = "";

        if ( isset( $_POST['submit'] ) && ! empty( $_POST['submit'] ) ) {

            $user_name = ( array_key_exists( "username", $_POST )
                ? $_POST['username']
                : '' );

            $password = ( array_key_exists( "password", $_POST )
                ? $_POST['password']
                : '' );

            $role = ( array_key_exists( "role", $_POST )
                ? $_POST['role']
                : 2 );

            $user = $this->get_user_from_db( $conn, $user_name, $password );

            if ( count( $user ) > 0 ) {
                $this->set_cookie( $user['name'], $user['role'] );

                $new_url = 'dashboard.php';
                header( 'Location: ' . $new_url );

            } else {
                $result_message = "Try again ...";
            }

        }
        $this->form_signup( $user_name, $result_message, "Log In" );
    }

    private function is_quiz_in_db( $conn, $quiz_name ) {
        try {
            $query = "SELECT * FROM quizes where name = '" . $quiz_name . "' ";
            $res   = pg_query( $conn, $query );

            if ( pg_num_rows( $res ) > 0 ) {
                return true;
            } else {
                return false;
            }
        } catch ( Exception $e ) {
            echo 'Something wrong with DB <br>';
        }
    }

    private function is_user_in_db( $conn, $user_name ) {
        try {
            $query = "SELECT * FROM users where name = '" . $user_name . "' ";
            $res   = pg_query( $conn, $query );

            if ( pg_num_rows( $res ) > 0 ) {
                return true;
            } else {
                return false;
            }
        } catch ( Exception $e ) {
            echo 'Something wrong with DB <br>';
        }
    }

    private function form_create_quiz( $quiz_name, $quiz_desc, $result_message ) {
        ?>
        <!---This is the Creating a Quiz Form [Re-used code to reduce duplication]--->
        <div class="creatingaquizcontainer">
            <div class="status">
                <?php echo $result_message; ?>
            </div>

            <form action="" method="post">
                <div class="form-group">
                    <label class="Quizname" for="">Quiz Name</label>
                    <input type="text" class="QuizNameform-control" placeholder="Quiz Name" name="quizname"
                           value="<?= $quiz_name; ?>" required>
                </div>
                <div class="form-group">
                    <label class="QuizDescription" for="">Quiz Description</label>
                    <input type="text" class="QuizDescform-control" placeholder="Quiz Description" name="quizdesc"
                           value="<?= $quiz_desc; ?>" required>
                </div>
                <div class="btns">
                    <input type="submit" class="AddPhotobtn" name="submit" value="SAVE & ADD QUESTION">
                    <input type="submit" class="Nextbtn" name="submit" value="Add Photo">
                    <input type="submit" class="Nextbtn" name="submit" value="Save & Exit">
                </div>
            </form>
        </div>
        <?php
    }

    private function form_signup( $user_name, $result_message, $button_name ) {
        ?>
        <!---This is the Signup Form--->
        <div class="container">
            <div class="status">
                <?php echo $result_message; ?>
            </div>

            <form action="" method="post">
                <div class="form-group">
                    <label class="Emailtitle" for="">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username"
                           value="<?= $user_name; ?>" required>
                </div>
                <div class="form-group">
                    <label class="Passwordtitle" for="">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <input type="submit" class="LIbtn" name="submit" value="<?= $button_name ?>">
                </div>
                <input hidden type="text" name="role" value="1">
            </form>
        </div>
        <?php
    }

    private function add_user_data_in_db( $conn, $user_name, $password, $role ) {
        try {
            $query = "INSERT INTO users (name, password, role)
                        VALUES ('" . $user_name . "', '" . md5( $password ) . "', '" . $role . "');";
            $res   = pg_query( $conn, $query );
        } catch ( Exception $e ) {
            echo 'Something wrong with DB <br>';
        }
    }

    private function add_quiz_data_in_db( $conn, $quiz_name, $quiz_desc ) {
        try {
            $query = "INSERT INTO quizes (name, description)
                        VALUES ('" . $quiz_name . "', '" . $quiz_desc . "');";
            $res   = pg_query( $conn, $query );
        } catch ( Exception $e ) {
            echo 'Something wrong with DB <br>';
        }
    }

    private function get_user_from_db( $conn, $user_name, $password = '' ) {
        try {
            $query = "SELECT * FROM users where name = '" . $user_name . "' AND password = '" . md5( $password ) . "' ";
            $res   = pg_query( $conn, $query );

            if ( pg_num_rows( $res ) > 0 ) {
                $row = pg_fetch_assoc( $res );

                return [ 'name' => $row['name'], 'role' => $row['role'] ];
            } else {
                return [];
            }
        } catch ( Exception $e ) {
            echo 'Something wrong with DB <br>';
        }
    }

    private function header( $menu_item ) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=content-width, initial-scale=1.0">
            <title><?php echo $menu_item; ?></title>
            <link rel="stylesheet" type="text/css" href="css/style.css">
        </head>

        <body>
        <?php
    }

    private function logo() {
        ?>
        <header class="header">
            <div class="logo-title">
                <!---This is the Quiz Cafe Logo--->
                <a href="index.php">
                    <img src="images/Quiz Cafe Logo.png" class="logo">
                </a>

                <!---This is the Quiz Cafe Title--->
                <div class="title">
                    <h2>Quiz Cafe</h2>
                </div>
            </div>

            <!---This is the Nav bar--->
            <?php
            $this->auth_buttons();
            ?>
        </header>
        <?php
    }

    private function auth_buttons() {
        $user_name = ( isset( $_COOKIE["UserName"] ) ) ? $_COOKIE["UserName"] : "";
        ?>
        <!---This is the Nav bar--->
        <nav class="index-nav">
            <?php
            if ( strlen( $user_name ) == 0 ) {
                ?>
                <!---This is the Log in Button--->
                <div class="login main-btn">
                    <a href="login.php">
                        <button id="show-login">Log In</button>
                    </a>
                </div>

                <!---This is the Sign Up Button--->
                <div class="signup main-btn">
                    <a href="signup.php">
                        <button id="show-sign">Sign Up</button>
                    </a>
                </div>
                <?php
            } else {
                ?>
                <div class="welcome-header-div">
                    <h2 class="welcome-header-title">WELCOME TO THE QUIZ CAFE, <?= $user_name ?></h2>
                </div>

                <div class="login main-btn">
                    <a href="index.php">
                        <button id="show-login" onClick="javascript:document.cookie = 'UserName=; max-age=0';">Log Out
                        </button>
                    </a>
                </div>
                <?php
            } ?>
        </nav>
        <?php
    }

    public function page_footer() {
        ?>
        <div id="footer">
        </div>

        </body>
        </html>
        <?php
    }
}