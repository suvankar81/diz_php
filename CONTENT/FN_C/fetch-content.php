<?php
function newsP($LANG='BN',$CATEGORY='',$ORDER='id', $LIMIT='30')
{  //include('CONN.php');
   if($CATEGORY=='')$CATEGORY='';else $CATEGORY="AND `N_CATEGORY` LIKE '%".$CATEGORY."%'";
   $coni = new mysqli($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['db']);
    if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
    $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        // mysqli_set_charset($conn,"utf8");
        $qq="SELECT * FROM `".$GLOBALS['table1']."` WHERE `LANG`='$LANG' $CATEGORY ORDER BY `id` DESC LIMIT 0 ,$LIMIT ";
    $query = $coni->query($qq);
    //echo $qq;
    while($row = $query->fetch_assoc()){
        $content = $row['N_CONTENT'];
        $output =implode(' ', array_slice(explode(' ', $content), 0, 30));
      echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
        <div class="mdl-card__media">
            <img class="article-image" src="/CONTENT/UPLOAD/NEWS/'.$row['PICS'].'" border="0" alt="">
        </div>
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">'.$row['N_TITLE'].'</h2>
        </div>
        <div class="mdl-card__supporting-text"> <div style="height:100px;overflow:hidden;"> '.$content.' </div> </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="./'.$row['N_LINK'].'">Read more</a>
        </div>
    </div>';
     }  $coni->close();
}


function newsD($lnk='')
{
 //include('CONN.php');
 $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 $coni = new mysqli($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['db']);
  if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
  $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
      // mysqli_set_charset($conn,"utf8");
  $query = $coni->query("SELECT * FROM `".$GLOBALS['table1']."` WHERE `N_LINK`='$lnk' ");
  while($row = $query->fetch_assoc()){
      $N_CATEGORY = $row['N_CATEGORY'];$N_DATE = $row['N_DATE'];$content = $row['N_CONTENT'];$imj='/SITE-CONTENT/UPLOAD/'.$row['PICS'];$title=$row['N_TITLE'];
    }
   echo '
  <div class="mdl-cell mdl-cell--6-col">
      <img class="article-image" src="'.$imj.'" border="0" alt="">
  </div>
  <div class="mdl-cell mdl-cell--6-col mdl-card__supporting-text no-padding ">
      <p>
      <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">'.$title.'</h3>

              <div class="mdl-card__supporting-text padding-top">
                  <span>Posted on: '.$N_DATE.'</span>
                  <div id="tt1" class=" icon material-icons portfolio-share-btn">share</div>
                  <div class="mdl-tooltip" for="tt1">
                      Share via social media
                  </div>
              </div>
              <span>Category: '.$N_CATEGORY.'</span> <br>
              <a href="whatsapp://send?text=Check out the news!" data-action="'.$actual_link.'">Share via Whatsapp</a>


              <div id="fb-root"></div>
              <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, '."'script', 'facebook-jssdk'".'));</script>

              <div class="fb-share-button" data-href="'.$actual_link.'" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>

      </p>
  </div>

  <div class="mdl-card__supporting-text">
  <p>'.$content.'</p>
  </div>
  ';
  $coni->close();

}
 ?>
