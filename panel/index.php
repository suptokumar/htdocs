<?php
    session_start();

    if (isset($_SESSION['loggedin']) == TRUE)
    {
        header("location:" . "user_update.php");
    }

    $db = new SQLite3('./api/.db.db');
    $db->exec("CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY,username TEXT ,password TEXT)");

    $rows = $db->query("SELECT COUNT(*) as count FROM users");
    $row = $rows->fetchArray();
    $numRows = $row['count'];
    if ($numRows == 0)
    {
        $db->exec("INSERT INTO users(id ,username, password) VALUES('1' ,'admin', 'admin')");
    }

    if (isset($_POST["login"]))
    {
        if (!$db)
        {
            echo $db->lastErrorMsg();
        }
        else
        {
            //
        }
        $sql = 'SELECT * from users where username="' . $_POST["username"] . '";';
        $ret = $db->query($sql);
        while ($row = $ret->fetchArray())
        {
            $id = $row['id'];
            $username = $row['username'];
            $password = $row['password'];
        }
        if ($id != "")
        {
            if ($password == $_POST["password"])
            {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                header('Location: user_update.php');
            }
            else
            {
                header('Location: ./api/index.php');
            }
        }
        else
        {
            header('Location: ./api/index.php');
        }
        $db->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="KeepUP">
    <title>KeepUP BOX PANEL</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body class="theme-dark">
<main style="background:url(./img/bg.jpg);background-repeat:no-repeat;background-attachment:fixed;background-size:cover;">
    <div id="primary" class="p-t-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img src="./img/logo.png" alt="">
                    </div>

                    <br>
                    <br>
                    <br>

                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg"
                                   placeholder="Username" name="username" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg"
                                   placeholder="Password" name="password" required>
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In" name="login">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include ('./includes/footer.php'); ?>

</main>
<br><br>
<p class="float-right">By <a href="http://t.me/KeepUP">KeepUP</a>&emsp;</p>
<p class="float-right">Version <a href="http://t.me/KeepUP">1.0 (~1.4)</a>&emsp;</p>
</body>
</html>