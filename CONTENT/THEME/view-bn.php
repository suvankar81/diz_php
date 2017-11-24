	<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?php
				if (isset($_POST['del'])) {
					$ids = $_POST['ids'];
					$coni = new mysqli($host,$user,$pass,$db);

					$query = $coni->prepare("DELETE FROM `news` WHERE `id`=?");
					$query->bind_param("i",$ids);
					$responce = $query->execute();
					if($responce===true && mysqli_affected_rows($coni)>0 ){
						echo '<div class="alert alert-dismissible alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Yes!</strong> Article Deleted
					</div>';
				}else{
					echo '<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Oh sorry!</strong> Unable to Delete Article.
				</div>';
			}
		}

		if (isset($_POST['priupd'])) {
	 $coni = new mysqli($host,$user,$pass,$db);
                if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    $pri = $_POST['pri'];
    $ids = $_POST['ids'];
    #######################file upload##########################
    #######################hit Database##########################
    $stmt= $coni->prepare("UPDATE `news` SET `pri`=? WHERE `id`=?");
    $stmt->bind_param("ii",$pri,$ids);
    $responce = $stmt->execute();
    if($responce===true && mysqli_affected_rows($coni)>0 ){
    echo '<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Yes!</strong> Pri Updated
  </div>';
}else{
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oh sorry!</strong> Unable to update pri...
</div>';
}
}


if (isset($_POST['CATEGORY_UPDATE'])) {
		$coni = new mysqli($host,$user,$pass,$db);
		if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
		$coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
		$N_CATEGORY = $_POST['CATEGORY'];
		$ids = $_POST['ids'];
		#######################file upload##########################
		#######################hit Database##########################
		$stmt= $coni->prepare("UPDATE `news` SET `N_CATEGORY`=? WHERE `id`=?");
		$stmt->bind_param("si",$N_CATEGORY,$ids);
		$responce = $stmt->execute();
		if($responce===true && mysqli_affected_rows($coni)>0 ){
		echo '<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Yes!</strong> CATEGORY Updated
		</div>';
	}else{
		echo '<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Oh sorry!</strong> Unable to update CATEGORY...
		</div>';
		}
}
 ?>
		</div>
	</div>
		<div class="row">
			<div class="col-lg-12">
				<h1>All News In Bengali</h1><hr>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>News Title</th>
								<th>Publication Date</th>
								<th>Priority</th>
								<th></th>
								<th>Add Top30 Separated by a space for শীর্ষ বার্তা</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$counter=1;
							$coni = new mysqli($host,$user,$pass,$db);
							if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
							$coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
							$stmt  = $coni->query("SELECT * FROM `news` WHERE `LANG`='BN' ORDER BY `id` DESC");
							while($row = $stmt->fetch_assoc()){
								echo'<tr>
								<form action="" method="post">
								<input type="hidden" value="'.$row['id'].'" name="ids">
								<td>'.$row['id'].'</td>
								<td>'.$row['N_TITLE'].'</td>
								<td>'.$row['N_DATE'].'</td>
								<td><input type="number" name="pri" style="width:55px;" value="'.$row['pri'].'">
								<input type="submit" class="btn btn-success" value="Save" name="priupd"></td>
								<td><a href="./edit_news/'.$row['id'].'" class="btn btn-primary">Edit</a></td>
							</form>
							<form action="" method="post">
							<td><input type="hidden" value="'.$row['id'].'" name="ids"><input type="text" value="'.$row['N_CATEGORY'].'" name="CATEGORY"><input type="submit" class="btn btn-danger" value="Save" name="CATEGORY_UPDATE"></td>
							</form>
							<form action="" method="post">
								<input type="hidden" value="'.$row['id'].'" name="ids">
								<td><input type="submit" class="btn btn-danger" value="delete" name="del"></td>
							</form>
							</tr>';
							$counter++;
						}$coni->close();
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
