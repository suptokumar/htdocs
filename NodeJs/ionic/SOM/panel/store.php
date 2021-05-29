<?php 

    $db = new SQLite3('./api/.db.db');
    $res = $db->query('SELECT * FROM store');
	if(isset($_GET['delete']))
	{
		$db->exec("DELETE FROM store WHERE id=".$_GET['delete']);
		header("Location: store.php");
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
                            <h2><i class="icon icon-window-restore"></i>Manage App Store</h2>
                        </center>
                    </div>

                    <div class="card-body">
                        <div class="col-12">
                        	<center>
	        					<a id="button" href="./add_store.php" class="btn btn-info">Add apps</a>
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
							<? while ($row = $res->fetchArray()) {?>
							<tbody>
								<tr>
								<td><img src="<?=$row['icon'] ?>" style="height:75px;width:auto!important;"></td>
								<td><?=$row['name'] ?></td>
								<td><?=$row['description'] ?></td>
								<td><?=$row['url'] ?></td>
								<td align='right'><a class="btn btn-danger btn-ok" href="#" data-href="./store.php?delete=<?=$row['id'] ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-fw fa-chart-area"></i>Remove</a></td>
								</tr>
							</tbody>
							<? }?>
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