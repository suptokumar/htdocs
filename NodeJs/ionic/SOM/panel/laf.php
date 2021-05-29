<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	$db = new SQLite3('./api/.db.db');
	$rows = $db->query("SELECT COUNT(*) as count FROM laf");
    $row = $rows->fetchArray();
	$numRows = $row['count'];
    if ($numRows == 0)
    {
        $db->exec("INSERT INTO laf(id,use_theme,theme,live,logo,banner,banner2,banner3,banner4,banner5,catchup,movie,series,settings,background,netflix,youtube,playstore,settings2,appdrawer) VALUES('1','false','none','','','','','','','','','','','','','','','','','')");
    }

    $res = $db->query('SELECT * FROM laf');
	if(isset($_POST['laf']))
	{
		$db->exec("UPDATE laf SET use_theme='false',
								  theme='none',
								  live='".$_POST["live"]."',
								  logo='".$_POST["logo"]."',
								  banner='".$_POST["banner"]."',
								  banner2='".$_POST["banner2"]."',
								  banner3='".$_POST["banner3"]."',
								  banner4='".$_POST["banner4"]."',
								  banner5='".$_POST["banner5"]."',
								  catchup='".$_POST["catchup"]."',
								  movie='".$_POST["movie"]."',
								  series='".$_POST["series"]."',
								  settings='".$_POST["settings"]."',
								  background='".$_POST["background"]."',
								  netflix='".$_POST["netflix"]."',
								  youtube='".$_POST["youtube"]."',
								  playstore='".$_POST["playstore"]."',
								  settings2='".$_POST["settings2"]."',
								  appdrawer='".$_POST["appdrawer"]."',
								  account='".$_POST["account"]."',
								  catchup2='".$_POST["catchup2"]."',
								  parental='".$_POST["parental"]."',
								  store='".$_POST["store"]."',
								  record='".$_POST["record"]."',
								  options='".$_POST["options"]."',
								  multiscreen='".$_POST["multiscreen"]."',
								  vpn='".$_POST["vpn"]."',
								  zipcode='".$_POST["zipcode"]."',
								  liveview='".$_POST["liveview"]."',
								  speedtest='".$_POST["speedtest"]."',
								  layout='".$_POST["layout"]."' 
								  WHERE id='1'");
		header("Location: laf.php");
	}

	include ('includes/header.php');
?>

<div class="has-sidebar-left has-sidebar-tabs">
    <div class="container-fluid relative animatedParent animateOnce p-lg-5">
        <div class="col-lg mx-auto">
            <div class="card-body">
                <div class="card bg-primary text-white">
                    <div class="card-header card-header-warning">
                        <center>
                            <h2><i class="icon icon-laf"></i>Manage Look and Feel</h2>
                        </center>
                    </div>
                    <?php while ($row = $res->fetchArray()) {?>
                    <div class="card-body">
                        <div class="col-12">
                        	<form method="post"> 

								<div class="form-group">
									<label class="form-label">Custom Logo</label>
									<input class="form-control" id="logo" name="logo" value="<?=$row['logo'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Background</label>
									<input class="form-control" id="background" name="background" value="<?=$row['background'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom App Drawer</label>
									<input class="form-control" id="appdrawer" name="appdrawer" value="<?=$row['appdrawer'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Live</label>
									<input class="form-control" id="live" name="live" value="<?=$row['live'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Catch-up</label>
									<input class="form-control" id="catchup" name="catchup" value="<?=$row['catchup'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Movies</label>
									<input class="form-control" id="movie" name="movie" value="<?=$row['movie'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Series</label>
									<input class="form-control" id="series" name="series" value="<?=$row['series'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Settings</label>
									<input class="form-control" id="settings" name="settings" value="<?=$row['settings'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Extras</label>
									<input class="form-control" id="settings2" name="settings2" value="<?=$row['settings2'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Netflix</label>
									<input class="form-control" id="netflix" name="netflix" value="<?=$row['netflix'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom YouTube</label>
									<input class="form-control" id="youtube" name="youtube" value="<?=$row['youtube'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Playstore</label>
									<input class="form-control" id="playstore" name="playstore" value="<?=$row['playstore'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Ad Banner #1</label>
									<input class="form-control" id="banner" name="banner" value="<?=$row['banner'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Ad Banner #2</label>
									<input class="form-control" id="banner2" name="banner2" value="<?=$row['banner2'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Ad Banner #3</label>
									<input class="form-control" id="banner3" name="banner3" value="<?=$row['banner3'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Ad Banner #4</label>
									<input class="form-control" id="banner4" name="banner4" value="<?=$row['banner4'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Custom Ad Banner #5</label>
									<input class="form-control" id="banner5" name="banner5" value="<?=$row['banner5'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Account</label>
									<input class="form-control" id="account" name="account" value="<?=$row['account'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Catchup2</label>
									<input class="form-control" id="catchup2" name="catchup2" value="<?=$row['catchup2'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Parental</label>
									<input class="form-control" id="parental" name="parental" value="<?=$row['parental'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Store</label>
									<input class="form-control" id="store" name="store" value="<?=$row['store'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Record</label>
									<input class="form-control" id="record" name="record" value="<?=$row['record'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Options</label>
									<input class="form-control" id="options" name="options" value="<?=$row['options'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">MultiScreen</label>
									<input class="form-control" id="multiscreen" name="multiscreen" value="<?=$row['multiscreen'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">VPN</label>
									<input class="form-control" id="vpn" name="vpn" value="<?=$row['vpn'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">ZipCode</label>
									<input class="form-control" id="zipcode" name="zipcode" value="<?=$row['zipcode'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Liveview</label>
									<input class="form-control" id="liveview" name="liveview" value="<?=$row['liveview'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Speed Test</label>
									<input class="form-control" id="speedtest" name="speedtest" value="<?=$row['speedtest'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Layout</label>
									<input class="form-control" id="layout" name="layout" value="<?=$row['layout'] ?>" type="text" >
								</div>

								<hr>

								<center>
									<button type="submit" name="laf" class="btn btn-info">
										<i class="icon icon-check"></i>Save
									</button>
								</center>
							</form>
    					</div>
    					<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include ('includes/footer.php');?>

</body>
</html>