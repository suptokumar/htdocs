<?php 

	$db = new SQLite3('./api/.db.db');
	$rows = $db->query("SELECT COUNT(*) as count FROM rss");
    $row = $rows->fetchArray();
	$numRows = $row['count'];
    if ($numRows == 0)
    {
        $db->exec("INSERT INTO rss(id,title,description) VALUES('1', 'Welcome to the FCD Box News Feed', 'FCD is in progress and will soon be the best of the best available, new home layout new functions and simple to use... ')");
    }
    $res = $db->query('SELECT * FROM rss');

	if(isset($_POST['rss']))
	{
		$db->exec("UPDATE rss SET title='".$_POST["title"]."',description='".$_POST["description"]."' WHERE id='1'");
		header("Location: rss.php");
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
                            <h2><i class="icon icon-rss"></i>Manage RSS Message</h2>
                        </center>
                    </div>
                    <? while ($row = $res->fetchArray()) {?>
                    <div class="card-body">
                        <div class="col-12">
                        	<form method="post"> 
								<div class="form-group">
									<label class="form-label">RSS Title</label>
									<input class="form-control" id="title" name="title" value="<?=$row['title'] ?>" type="text" >
								</div>

								<div class="form-group">
									<label class="form-label">RSS Message</label>
									<input class="form-control" id="description" name="description" value="<?=$row['description'] ?>" type="text" >
								</div>

								<hr>
								<center>
									<button type="submit" name="rss" class="btn btn-info">
										<i class="icon icon-check"></i>Save
									</button>
								</center>
							</form>
    					</div>
    					<? }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include ('includes/footer.php');?>

</body>
</html>