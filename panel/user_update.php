<?php
	$db = new SQLite3('./api/.db.db');
    $db->exec("CREATE TABLE IF NOT EXISTS host_urls(id INTEGER PRIMARY KEY NOT NULL, name VARCHAR(50), url VARCHAR(50))");
    $db->exec("CREATE TABLE IF NOT EXISTS addons(id INTEGER PRIMARY KEY NOT NULL,
        added_date VARCHAR(50), description VARCHAR(50), icon VARCHAR(50), app_id VARCHAR(50), name VARCHAR(50), url VARCHAR(50), version VARCHAR(50), version_code VARCHAR(50))");
    $db->exec("CREATE TABLE IF NOT EXISTS store(id INTEGER PRIMARY KEY NOT NULL,
        added_date VARCHAR(50), description VARCHAR(50), icon VARCHAR(50), app_id VARCHAR(50), name VARCHAR(50), url VARCHAR(50), version VARCHAR(50), version_code VARCHAR(50))");
    $db->exec("CREATE TABLE IF NOT EXISTS rss(id INTEGER PRIMARY KEY NOT NULL, title VARCHAR(50), description VARCHAR(500))");
    $db->exec("CREATE TABLE IF NOT EXISTS laf(id INTEGER PRIMARY KEY NOT NULL, use_theme VARCHAR(250), theme VARCHAR(250), live VARCHAR(250), logo VARCHAR(250), banner VARCHAR(250), banner2 VARCHAR(250), banner3 VARCHAR(250), banner4 VARCHAR(250), banner5 VARCHAR(250), catchup VARCHAR(250), movie VARCHAR(250), series VARCHAR(250), settings VARCHAR(250), background VARCHAR(250), netflix VARCHAR(250), youtube VARCHAR(250), playstore VARCHAR(250), settings2 VARCHAR(250), appdrawer VARCHAR(250))");
    $db->exec("CREATE TABLE IF NOT EXISTS control(id INTEGER PRIMARY KEY NOT NULL,
        status VARCHAR(50), backgroundColor VARCHAR(50), version VARCHAR(50), host VARCHAR(50), hosts_name VARCHAR(50), hosts_url VARCHAR(50), hosts2_name VARCHAR(50), hosts2_url VARCHAR(50), hosts3_name VARCHAR(50), hosts3_url VARCHAR(50))");

	$res = $db->query("SELECT * FROM users WHERE id='1'");
	$row = $res->fetchArray();

	if (isset($_POST['submit']))
	{
	    $db->exec("UPDATE users SET	username='" . $_POST['username'] . "', password='" . $_POST['password'] . "' WHERE id='1' ");
	    session_start();
	    session_regenerate_id();
	    $_SESSION['loggedin'] = true;
	    $_SESSION['name'] = $_POST['username'];
	    header("Location: user_update.php?");
	}
	$user = $row['username'];
	$pass = $row['password'];

	$lurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER["PHP_SELF"]) . '/apk/';

	include ('includes/header.php');
?>

<div class="has-sidebar-left has-sidebar-tabs">
    <div class="container-fluid relative animatedParent animateOnce p-lg-5">
    	<div class="col-md-8 mx-auto">
			<div class="card-body">
				<div class="card bg-primary text-white">
					<div class="card-header card-header-warning">
                        <center>
                            <h2><i class="icon icon-user"></i> Update Credentials</h2>
                        </center>
                    </div>
					<div class="alert alert-info alert-dismissible" role="alert">
						<center>
							<h3 style="color:black!important">Do <strong style="color:black!important">not</strong> use <em>admin</em> for username or password!</h3>
							Secure your shit.
						</center>
					</div>

					<div class="card-body">
						<form  method="post">

							<div class="form-group">
								<div class="form-group form-float form-group-lg">
                                    <div class="form-line">
                                        <label class="form-label">Username</label>
										<input type="text" class="form-control" name="username" value="<?php echo $user ?>">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="form-group form-float form-group-lg">
                                    <div class="form-line">
                                        <label class="form-label">Password</label>
										<input type="text" class="form-control" name="password" value="<?php echo $pass ?>">
									</div>
								</div>
							</div>

							<hr>

							<center>
								<button type="submit" name="submit" class="btn btn-info">
									<i class="icon icon-check"></i>Update Credentials
								</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include ('includes/footer.php'); ?>

</body>
</html>