<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A portfolio template that uses Material Design Lite.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Barta India Official Site</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="/Diz/THEME/CSS/material.grey-pink.min.css" />
    <link rel="stylesheet" href="/Diz/THEME/CSS/styles.css" />


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">



</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header mdl-layout__header--waterfall portfolio-header">
            <div class="mdl-layout__header-row portfolio-logo-row">
                <span class="mdl-layout__title">
                    <div class="portfolio-logo"></div>
                    <span class="mdl-layout__title">Pure News With Views</span>
                </span>
                <!--<div class="mdl-layout-spacer"></div>-->

                <a href="/BN/"><button class="mdl-button mdl-js-button mdl-button--accent" id="lang_sw">
                   Switch to Bangla
                </button></a>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon"
                       for="fixed-header-drawer-exp">
                  <i class="material-icons" style="color:white !important; ">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                  <input class="mdl-textfield__input" type="text" name="sample"
                         id="fixed-header-drawer-exp">
                </div>
              </div>

            </div>
            <div class="mdl-layout__header-row portfolio-navigation-row mdl-layout--large-screen-only" style="background: linear-gradient(to right, #BF0002, #440002);">
                <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font" >
                    <a class="mdl-navigation__link is-active" href="/EN/" > Home </a>
                    <a class="mdl-navigation__link " href="/EN/Top30" > Top30 </a>
                    <a class="mdl-navigation__link" href="/EN/World" > World </a>
                    <a class="mdl-navigation__link" href="/EN/National" > National </a>
                    <a class="mdl-navigation__link" href="/EN/Local" > Local </a>
                    <a class="mdl-navigation__link" href="/EN/Editorial" > Editorial </a>
                    <a class="mdl-navigation__link" href="/EN/Sports" > Sports </a>
                    <a class="mdl-navigation__link" href="/EN/Articles" > Articles </a>

                    <!--<button id="demo-menu-lower-left"
                            class="mdl-button mdl-js-button mdl-button--icon">
                      <i class="material-icons">more_vert</i>
                    </button>

                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect"
                        for="demo-menu-lower-left">
                      <li class="mdl-menu__item">Some Action</li>
                      <li class="mdl-menu__item mdl-menu__item--full-bleed-divider">Another Action</li>
                      <li disabled class="mdl-menu__item">Disabled Action</li>
                      <li class="mdl-menu__item">Yet Another Action</li>
                    </ul>-->

                </nav>
            </div>


        </header>
        <div class="mdl-layout__drawer mdl-layout--small-screen-only">
            <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font">
                <a class="mdl-navigation__link is-active" href="index.html">Portfolio</a>
                <a class="mdl-navigation__link" href="blog.html">Blog</a>
                <a class="mdl-navigation__link" href="about.html">About</a>
                <a class="mdl-navigation__link" href="contact.html">Contact</a>

            </nav>
        </div>



        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
              <?php
              if($lnk==""){
                   $coni = new mysqli($host,$user,$pass,$db);
                    if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                    $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                        // mysqli_set_charset($conn,"utf8");
                    $query = $coni->query("SELECT * FROM `news` WHERE `LANG`='EN' ORDER BY `id` DESC");
                    while($row = $query->fetch_assoc()){
                        $content = $row['N_CONTENT'];
                        $output =implode(' ', array_slice(explode(' ', $content), 0, 30));
                      echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                        <div class="mdl-card__media">
                            <img class="article-image" src="/SITE-CONTENT/UPLOAD/'.$row['PICS'].'" border="0" alt="">
                        </div>
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">'.$row['N_TITLE'].'</h2>
                        </div>
                        <div class="mdl-card__supporting-text">'.$output.'</div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="./'.$row['N_LINK'].'">Read more</a>
                        </div>
                    </div>';

                     }
                     $coni->close();

                  }
                  elseif($lnk=="Top30") {
                    $coni = new mysqli($host,$user,$pass,$db);
                      if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                      $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                          // mysqli_set_charset($conn,"utf8");
                      $query = $coni->query("SELECT * FROM `news` WHERE `LANG`='EN' AND `pri` BETWEEN 1 AND 30");
                      while($row = $query->fetch_assoc()){
                          $content = $row['N_CONTENT'];
                          $output =implode(' ', array_slice(explode(' ', $content), 0, 30));
                        echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                          <div class="mdl-card__media">
                              <img class="article-image" src="/SITE-CONTENT/UPLOAD/'.$row['PICS'].'" border="0" alt="">
                          </div>
                          <div class="mdl-card__title">
                              <h2 class="mdl-card__title-text">'.$row['N_TITLE'].'</h2>
                          </div>
                          <div class="mdl-card__supporting-text">'.$output.'</div>
                          <div class="mdl-card__actions mdl-card--border">
                              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="./'.$row['N_LINK'].'">Read more</a>
                          </div>
                      </div>';

                       }
                       $coni->close();
                    //echo "content of Top30";
                  }
                   elseif($lnk=="World") {
                       $coni = new mysqli($host,$user,$pass,$db);
                      if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                      $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                          // mysqli_set_charset($conn,"utf8");
                      $query = $coni->query("SELECT * FROM `news` WHERE `LANG`='EN' AND `N_CATEGORY`='World' ORDER BY `id` DESC");
                      while($row = $query->fetch_assoc()){
                          $content = $row['N_CONTENT'];
                          $output =implode(' ', array_slice(explode(' ', $content), 0, 30));
                        echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                          <div class="mdl-card__media">
                              <img class="article-image" src="/SITE-CONTENT/UPLOAD/'.$row['PICS'].'" border="0" alt="">
                          </div>
                          <div class="mdl-card__title">
                              <h2 class="mdl-card__title-text">'.$row['N_TITLE'].'</h2>
                          </div>
                          <div class="mdl-card__supporting-text">'.$output.'</div>
                          <div class="mdl-card__actions mdl-card--border">
                              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="./'.$row['N_LINK'].'">Read more</a>
                          </div>
                      </div>';

                       }
                       $coni->close();
                  }
                  elseif($lnk=="National") {
                     $coni = new mysqli($host,$user,$pass,$db);
                      if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                      $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                          // mysqli_set_charset($conn,"utf8");
                      $query = $coni->query("SELECT * FROM `news` WHERE `LANG`='EN' AND `N_CATEGORY`='National' ORDER BY `id` DESC");
                      while($row = $query->fetch_assoc()){
                          $content = $row['N_CONTENT'];
                          $output =implode(' ', array_slice(explode(' ', $content), 0, 30));
                        echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                          <div class="mdl-card__media">
                              <img class="article-image" src="/SITE-CONTENT/UPLOAD/'.$row['PICS'].'" border="0" alt="">
                          </div>
                          <div class="mdl-card__title">
                              <h2 class="mdl-card__title-text">'.$row['N_TITLE'].'</h2>
                          </div>
                          <div class="mdl-card__supporting-text">'.$output.'</div>
                          <div class="mdl-card__actions mdl-card--border">
                              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="./'.$row['N_LINK'].'">Read more</a>
                          </div>
                      </div>';

                       }
                       $coni->close();
                  }
				   elseif($lnk=="Local") {
                      $coni = new mysqli($host,$user,$pass,$db);
                      if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                      $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                          // mysqli_set_charset($conn,"utf8");
                      $query = $coni->query("SELECT * FROM `news` WHERE `LANG`='EN' AND `N_CATEGORY`='Local' ORDER BY `id` DESC");
                      while($row = $query->fetch_assoc()){
                          $content = $row['N_CONTENT'];
                          $output =implode(' ', array_slice(explode(' ', $content), 0, 30));
                        echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                          <div class="mdl-card__media">
                              <img class="article-image" src="/SITE-CONTENT/UPLOAD/'.$row['PICS'].'" border="0" alt="">
                          </div>
                          <div class="mdl-card__title">
                              <h2 class="mdl-card__title-text">'.$row['N_TITLE'].'</h2>
                          </div>
                          <div class="mdl-card__supporting-text">'.$output.'</div>
                          <div class="mdl-card__actions mdl-card--border">
                              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="./'.$row['N_LINK'].'">Read more</a>
                          </div>
                      </div>';

                       }
                       $coni->close();
                     }
					  elseif($lnk=="Editorial") {
                       $coni = new mysqli($host,$user,$pass,$db);
                      if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                      $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                          // mysqli_set_charset($conn,"utf8");
                      $query = $coni->query("SELECT * FROM `news` WHERE `LANG`='EN' AND `N_CATEGORY`='Editorial' ORDER BY `id` DESC");
                      while($row = $query->fetch_assoc()){
                          $content = $row['N_CONTENT'];
                          $output =implode(' ', array_slice(explode(' ', $content), 0, 30));
                        echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                          <div class="mdl-card__media">
                              <img class="article-image" src="/SITE-CONTENT/UPLOAD/'.$row['PICS'].'" border="0" alt="">
                          </div>
                          <div class="mdl-card__title">
                              <h2 class="mdl-card__title-text">'.$row['N_TITLE'].'</h2>
                          </div>
                          <div class="mdl-card__supporting-text">'.$output.'</div>
                          <div class="mdl-card__actions mdl-card--border">
                              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="./'.$row['N_LINK'].'">Read more</a>
                          </div>
                      </div>';

                       }
                       $coni->close();
                     }
					  elseif($lnk=="Sports") {
                      $coni = new mysqli($host,$user,$pass,$db);
                      if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                      $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                          // mysqli_set_charset($conn,"utf8");
                      $query = $coni->query("SELECT * FROM `news` WHERE `LANG`='EN' AND `N_CATEGORY`='Sports' ORDER BY `id` DESC");
                      while($row = $query->fetch_assoc()){
                          $content = $row['N_CONTENT'];
                          $output =implode(' ', array_slice(explode(' ', $content), 0, 30));
                        echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                          <div class="mdl-card__media">
                              <img class="article-image" src="/SITE-CONTENT/UPLOAD/'.$row['PICS'].'" border="0" alt="">
                          </div>
                          <div class="mdl-card__title">
                              <h2 class="mdl-card__title-text">'.$row['N_TITLE'].'</h2>
                          </div>
                          <div class="mdl-card__supporting-text">'.$output.'</div>
                          <div class="mdl-card__actions mdl-card--border">
                              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="./'.$row['N_LINK'].'">Read more</a>
                          </div>
                      </div>';

                       }
                       $coni->close();
                     }
					  elseif($lnk=="Articles") {
                      $coni = new mysqli($host,$user,$pass,$db);
                      if ($coni->connect_error) {die("Connection failed: " . $coni->connect_error);}
                      $coni->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                          // mysqli_set_charset($conn,"utf8");
                      $query = $coni->query("SELECT * FROM `news` WHERE `LANG`='EN' AND `N_CATEGORY`='Articles' ORDER BY `id` DESC");
                      while($row = $query->fetch_assoc()){
                          $content = $row['N_CONTENT'];
                          $output =implode(' ', array_slice(explode(' ', $content), 0, 30));
                        echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                          <div class="mdl-card__media">
                              <img class="article-image" src="/SITE-CONTENT/UPLOAD/'.$row['PICS'].'" border="0" alt="">
                          </div>
                          <div class="mdl-card__title">
                              <h2 class="mdl-card__title-text">'.$row['N_TITLE'].'</h2>
                          </div>
                          <div class="mdl-card__supporting-text">'.$output.'</div>
                          <div class="mdl-card__actions mdl-card--border">
                              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="./'.$row['N_LINK'].'">Read more</a>
                          </div>
                      </div>';

                       }
                       $coni->close();
                     }
                 ?>


            </div>
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo" id="logo_txt">Barta - india , Pure News With Views</div>
                </div>
                <div class="mdl-mini-footer__right-section">
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Privacy & Terms</a></li>
                    </ul>
                </div>
            </footer>
        </main>
    </div>
    <script src="<?php echo $JS;?>material-1.3.0.min.js"></script>
</body>

</html>
