

<!--<script type="text/javascript" src="/asset/ckeditor/ckeditor.js"></script>-->
<link type="text/css" rel="stylesheet" href="http://barta-india.in/asset/jQuery-TE/jquery-te-1.4.0.css">
<!--<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>-->
<script type="text/javascript" src="http://barta-india.in/asset/jQuery-TE/jquery-te-1.4.0.min.js" charset="utf-8"></script>
<div class="container">
<h1>New EN News </h1>
<hr>
<div class="row">
	<div class="col-lg-10">
	<?php if(isset($_POST['add_entry'])){
		$nname = $_POST['nname'];
    $nbody = $_POST['nbody'];
		$date = date('Y-m-d H:i:s');
    $type = 'EN';
    $nlink  = $_POST['nlink'];$nlink=preg_replace('~[^a-zA-Z0-9]+~', '-', $nlink);
    $category = $_POST['category'];
    #######################file upload##########################
        $pics1 = $_FILES['pics']["name"];
        //$ext = end((explode(".", $pics1)));
        $ext = pathinfo($pics1, PATHINFO_EXTENSION);
        $temp_name = $_FILES["pics"]["tmp_name"];
        $uploadfilenme1 = rand(1000, 9999).time().'.'.$ext;
        $dir= 'SITE-CONTENT/UPLOAD/';
        $terget1 = $dir.$uploadfilenme1;
        $extension=array("jpeg","jpg","png");
        $file_upload=move_uploaded_file($file_tmp=$_FILES["pics"]["tmp_name"],$terget1);
        ############################file upload and hit database#####################
       if (in_array($ext, $extension)) {
        if ($file_upload) {
          $coni = new mysqli($host,$user,$pass,$db);
                if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    $stmt = $coni->prepare("INSERT INTO `news`(`N_TITLE`, `N_LINK`, `N_CONTENT`, `PICS`, `LANG`, `N_DATE`,`N_CATEGORY`) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss",$nname,$nlink,$nbody,$uploadfilenme1,$type,$date,$category);
    if($stmt->execute()){
      echo '<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Yes!</strong> Entry Saved successfully</a>
</div>';
    }else{
      echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> Unable to process db</div>';
    }
        }else{
      echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> Unable to process </div>';
    }
###################file extention mismatch
  }else{
    echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> File Format Mismatch </div>';
    }
  }
	?>

	</div>
</div>

<div class="row">
   <div class="col-lg-10">


   <form method="post" action="" enctype="multipart/form-data">
     <div class="form-group">
      <label for="usr">Date:</label>
      <input type="text" class="form-control" name="date" id="date" readonly="" value="<?php echo date('D-d-m-Y');?>">
    </div>
    <div class="form-group">
  <label for="sel1">News Category:</label>
  <select class="form-control" id="" name="category" required="">
    <option value="">Select Category</option>
    <option value="Top30">Top30</option>
    <option value="LOCAL">Local</option>
    <option value="WORLD">WORLD</option>
    <option value="NATIONAL">NATIONAL</option>
    <option value="EDITORIAL">EDITORIAL</option>
    <option value="SPORTS">SPORTS</option>
    <option value="ARTICLES">ARTICLES</option>

  </select>
</div>

    <div class="form-group">
      <label for="usr">News Title:</label>
      <input type="text" class="form-control" name="nname"  required="">
    </div>
    <div class="form-group">
      <label for="link">News Link: <span style="color: red;">Insert Link Only In English &amp; Ommit Space</span></label>
      <input type="text" class="form-control" name="nlink"  required="">
    </div>
    <div class="form-group">
      <label for="img">News Picture: <span style="color: red;">Only Png,Jpeg Image Allowed </span></label>
      <input type="file" class="form-control" name="pics" required="">
    </div>
		<div class="form-group">
		 <label for="usr">News Body:</label>
		 <textarea class="form-control jqte-test"  rows="5" name="nbody"  required=""></textarea>
	 </div>
     <!--<div class="form-group">
      <label for="usr">News Body:</label>
      <textarea class="form-control" id="ck" rows="5" name="nbody"  required=""></textarea>
    </div>-->

    <div class="form-group">

      <input type="submit" class="form-control btn btn-primary" name="add_entry" value="Save News">
    </div>
    <div class="form-group">

      <input type="reset" class="form-control btn btn-danger"  value="Clear All">
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
