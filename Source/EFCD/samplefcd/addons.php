<?php 

	$db = new SQLite3('./api/.db.db');
	$rows = $db->query("SELECT COUNT(*) as count FROM addons");
    $row = $rows->fetchArray();
	$numRows = $row['count'];
	$lurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER["PHP_SELF"]) ;
    if ($numRows == 0)
    {
        $db->exec("INSERT INTO addons(id,added_date,description,icon,app_id,name,url,version,version_code) VALUES('1', '1607627132', 'FS OnOff', '".$lurl.'/img/fcdonoff.png'."', 'com.onoff.fos.settings', 'FS OnOff', '".$lurl.'/apk/fcdonoff.apk'."', '1.0', '100')");
        $db->exec("INSERT INTO addons(id,added_date,description,icon,app_id,name,url,version,version_code) VALUES('2', '1607627132', 'FS Settings', '".$lurl.'/img/fcdsettings.png'."', 'com.sett.fos.settings', 'FS Settings', '".$lurl.'/apk/fcdsettings.apk'."', '1.0', '100')");
        $db->exec("INSERT INTO addons(id,added_date,description,icon,app_id,name,url,version,version_code) VALUES('3', '1607627132', 'Aurora', '".$lurl.'/img/fcdaurora.png'."', 'com.aurora.store', 'Aurora', '".$lurl.'/apk/fcdaurora.apk'."', '3.2.9', '29')");
    }

    $res = $db->query('SELECT * FROM addons');
	if(isset($_GET['delete']))
	{
		$db->exec("DELETE FROM addons WHERE id=".$_GET['delete']);
		header("Location: addons.php");
	}

	

	include ('includes/header.php');
?>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Confirm</h2>
            </div>
            <div class="modal-body">
                Do you really want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
<div class="has-sidebar-left has-sidebar-tabs">
    <div class="container-fluid relative animatedParent animateOnce p-lg-5">
        <div class="col-lg mx-auto">
            <div class="card-body">
                <div class="card bg-primary text-white">
                    <div class="card-header card-header-warning">
                        <center>
                            <h2><i class="icon icon-puzzle-piece"></i>Manage Addons</h2>
                        </center>
                    </div>

                    <div class="card-body">
                        <div class="col-12">
                        	<center>
	        					<a id="button" href="./add_addon.php" class="btn btn-info">Add app</a>
	        				</center>
    					</div>

    					<hr>

						<div class="table-responsive">
							<table class="table table-striped table-sm">
							<thead style="color:white!important">
								<tr>
								<th>Icon</th>
								<th>Name</th>
								<th>Description</th>
								<th>URL</th>
								<th></th>
								</tr>
							</thead>
							<?php while ($row = $res->fetchArray()) {?>
							<tbody>
								<tr>
								<td><img src="<?=$row['icon'] ?>" style="height:75px;width:auto!important;"></td>
								<td><?=$row['name'] ?></td>
								<td><?=$row['description'] ?></td>
								<td><?=$row['url'] ?></td>
								<td align='right'><a class="btn btn-danger btn-ok" href="#" data-href="./addons.php?delete=<?=$row['id'] ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-fw fa-chart-area"></i>Remove</a></td>
								</tr>
							</tbody>
							<?php }?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include ('includes/footer.php');?>

<script>
	$('#confirm-delete').on('show.bs.modal', function(e) {
	    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
</script>

</body>
</html>