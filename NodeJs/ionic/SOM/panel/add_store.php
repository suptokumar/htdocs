<?php

    $db = new SQLite3('./api/.db.db');
    
    if (isset($_POST['store']))
    {
        $db->exec("INSERT INTO store(added_date,description,icon,app_id,name,url,version,version_code) VALUES('1607627132','".$_POST['description']."','".$_POST['icon']."','".$_POST['app_id']."','".$_POST['name']."','".$_POST['url']."','".$_POST['version']."','".$_POST['version_code']."')");
        header("Location: store.php");
    }

    include ('includes/header.php');
?>

<div class="has-sidebar-left has-sidebar-tabs">
    <div class="container-fluid relative animatedParent animateOnce p-lg-5">
        <div class="col-md-8 mx-auto">
            <div class="card-body">
                <div class="card bg-primary text-white">
                    <div class="card-header card-header-warning">
                        <center>
                            <h2><i class="icon icon-window-restore"></i> Add Store Config</h2>
                        </center>
                    </div>

                    <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label class="form-label " for="name" >Name</label>
                                    <input class="form-control" id="name" name="name" value="" type="text"/>
                                </div>

                                <div class="form-group">
                                    <label class="form-label " for="description" >Description</label>
                                    <input class="form-control" id="description" name="description" value="" type="text"/>
                                </div>

                                <div class="form-group">
                                    <label class="form-label " for="icon" >Icon</label>
                                    <input class="form-control" id="icon" name="icon" value="" type="text"/>
                                </div>             

                                <div class="form-group">
                                    <label class="form-label " for="url" >URL</label>
                                    <input class="form-control" id="url" name="url" value="" type="text"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label " for="app_id" >Package Name</label>
                                    <input class="form-control" id="app_id" name="app_id" value="" type="text"/>
                                </div>

                                <div class="form-group">
                                    <label class="form-label " for="version" >Version</label>
                                    <input class="form-control" id="version" name="version" value="1.0" type="text"/>
                                </div>   

                                <div class="form-group">
                                    <label class="form-label " for="version_code" >Version Code</label>
                                    <input class="form-control" id="version_code" name="version_code" value="100" type="text"/>
                                </div>       

                                <div class="form-group">
                                    <center>
                                        <button class="btn btn-info " name="store" type="submit">
                                            <i class="icon icon-check"></i> Submit
                                        </button>
                                    </center>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('includes/footer.php');?>

</body>
</html>