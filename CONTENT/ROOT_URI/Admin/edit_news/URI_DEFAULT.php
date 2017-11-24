<?php
//include("Diz/THEME/ADMIN_HOME.php");
 include("Diz/THEME/ADMIN_HEADER.php");
//include("Diz/THEME/ADMIN_HOME.php");
// if(file_exists("Diz/THEME/".$lnk.".php"))  include("Diz/THEME/".$lnk.".php");
// else include("Diz/THEME/404.php");
// include("Diz/THEME/ADMIN_FOOTER.php");
?>

<!--<script type="text/javascript" src="/asset/ckeditor/ckeditor.js"></script>-->
<link type="text/css" rel="stylesheet" href="http://barta-india.in/asset/jQuery-TE/jquery-te-1.4.0.css">
<!--<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>-->
<script type="text/javascript" src="http://barta-india.in/asset/jQuery-TE/jquery-te-1.4.0.min.js" charset="utf-8"></script>

<div class="container">
<h1> Edit news</h1>
<hr>
<div class="row">
  <div class="col-lg-10">
  <?php if(isset($_POST['upd'])){
    $nname = $_POST['nname'];
    $nbody = $_POST['nbody'];
    $date = $_POST['date'];
    $ids = $_POST['ids'];
    $nlink  = $_POST['nlink'];

    $coni = new mysqli($host,$user,$pass,$db);
                if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

    #######################file upload##########################
    #######################hit Database##########################
    $stmt= $coni->prepare("UPDATE `news` SET `N_TITLE`=?,`N_LINK`=?,`N_CONTENT`=?,`N_DATE`=? WHERE `id`=?");
    $stmt->bind_param("ssssi",$nname,$nlink,$nbody,$date,$ids);
    $responce = $stmt->execute();
    if($responce===true && mysqli_affected_rows($coni)>0 ){
    echo '<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Yes!</strong> News Updated
  </div>';
}else{
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oh sorry!</strong> Unable to update News...
</div>';
}


  }

  ?>

  </div>
</div>

<div class="row">
   <div class="col-lg-10">
   <?php
   	  			$coni = new mysqli($host,$user,$pass,$db);
                if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                $ids=$lnk;
                $qq = $coni->query("SELECT * FROM `news` WHERE `id`='$ids'");
                $items = $qq->fetch_assoc();
   ?>

   <form method="post" action="" enctype="multipart/form-data">
   <input type="hidden" name="ids" value="<?php echo $items['id'];?>">

     <div class="form-group">
      <label for="usr">Date:</label>
      <input type="text" class="form-control" name="date" id="date" value="<?php echo $items['N_DATE'];?>">
    </div>

    <div class="form-group">
      <label for="usr">News Title:</label>
      <input type="text" class="form-control" name="nname" value="<?php echo$items['N_TITLE'];?>"  required="">
    </div>
    <div class="form-group">
      <label for="link">News Link: <span style="color: red;">Insert Link Only In English &amp; Ommit Space</span></label>
      <input type="text" class="form-control" name="nlink" readonly="" value="<?php echo $items['N_LINK'];?>"  required="">
    </div>
      <div class="form-group">
      <label for="usr">News Body:</label>
      <textarea class="form-control jqte-test"  rows="5" name="nbody"  required=""><?php echo $items['N_CONTENT'];?></textarea>
    </div>
      <div class="form-group">
       <input type="submit" class="form-control btn btn-primary" name="upd" value="Update News">
    </div>


   </form>
   </div>
   </div>
</div>

<script>
	$('.jqte-test').jqte();

	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
</script>
