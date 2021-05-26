<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	$db = new SQLite3('./api/.db.db');
	$rows = $db->query("SELECT COUNT(*) as count FROM control");
    $row = $rows->fetchArray();
	$numRows = $row['count'];
    if ($numRows == 0)
    {
        $db->exec("INSERT INTO control(id,status,backgroundColor,version,host,hosts_name,hosts_url,hosts2_name,hosts2_url,hosts3_name,hosts3_url) VALUES('1','active','#400000','1.4','','','','','','','')");
    }

    $res = $db->query('SELECT * FROM control');
	if(isset($_POST['control']))
	{
		$db->exec("UPDATE control SET status='active',backgroundColor='".$_POST["backgroundColor"]."',version='".$_POST["version"]."',host='".$_POST["host"]."',hosts_name='".$_POST["hosts_name"]."',hosts_url='".$_POST["hosts_url"]."',hosts2_name='".$_POST["hosts2_name"]."',hosts2_url='".$_POST["hosts2_url"]."',hosts3_name='".$_POST["hosts3_name"]."',hosts3_url='".$_POST["hosts3_url"]."' WHERE id='1'");
		header("Location: control.php");
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
                            <h2><i class="icon icon-control"></i>Manage General Settings</h2>
                        </center>
                    </div>
                    <?php while ($row = $res->fetchArray()) { ?>
                    <div class="card-body">
                        <div class="col-12">
                        	<form method="post"> 

								<div class="form-group">
									<label class="form-label">Portal #1 Name</label>
									<input class="form-control" id="hosts_name" name="hosts_name" value="<?=$row['hosts_name'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Portal #1 URL</label>
									<input class="form-control" id="hosts_url" name="hosts_url" value="<?=$row['hosts_url'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Portal #2 Name</label>
									<input class="form-control" id="hosts2_name" name="hosts2_name" value="<?=$row['hosts2_name'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Portal #2 URL</label>
									<input class="form-control" id="hosts2_url" name="hosts2_url" value="<?=$row['hosts2_url'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Portal #3 Name</label>
									<input class="form-control" id="hosts3_name" name="hosts3_name" value="<?=$row['hosts3_name'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Portal #3 URL</label>
									<input class="form-control" id="hosts3_url" name="hosts3_url" value="<?=$row['hosts3_url'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Host</label>
									<input class="form-control" id="host" name="host" value="<?=$row['host'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">App Version</label>
									<input class="form-control" id="version" name="version" value="<?=$row['version'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">Background COlor</label>
									<input class="form-control" id="backgroundColor" name="backgroundColor" value="<?=$row['backgroundColor'] ?>" type="text" >
								</div>

								<hr>

								<center>
									<button type="submit" name="control" class="btn btn-info">
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