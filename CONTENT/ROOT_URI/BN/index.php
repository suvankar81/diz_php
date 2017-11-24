<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A portfolio template that uses Material Design Lite.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Barta India Official Site</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="/CONTENT/THEME/ASSETS/CSS/material.grey-pink.min.css" />
    <link rel="stylesheet" href="/CONTENT/THEME/ASSETS/CSS/styles2.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!--<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">-->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-52060848-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-52060848-4');
</script>

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
                    <a class="mdl-navigation__link <?php if($lnk=='') echo 'is-active';?>" href="/EN/" > Home </a>
                    <a class="mdl-navigation__link <?php if($lnk=='Top30') echo 'is-active';?>" href="/EN/Top30" > Top30 </a>
                    <a class="mdl-navigation__link <?php if($lnk=='World') echo 'is-active';?>" href="/EN/World" > World </a>
                    <a class="mdl-navigation__link <?php if($lnk=='National') echo 'is-active';?>" href="/EN/National" > National </a>
                    <a class="mdl-navigation__link <?php if($lnk=='Local') echo 'is-active';?>" href="/EN/Local" > Local </a>
                    <a class="mdl-navigation__link <?php if($lnk=='Editorial') echo 'is-active';?>" href="/EN/Editorial" > Editorial </a>
                    <a class="mdl-navigation__link <?php if($lnk=='Sports') echo 'is-active';?>" href="/EN/Sports" > Sports </a>
                    <a class="mdl-navigation__link <?php if($lnk=='Articles') echo 'is-active';?>" href="/EN/Articles" > Articles </a>

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
                <a class="mdl-navigation__link is-active" href="/EN/" > Home </a>
                <a class="mdl-navigation__link " href="/EN/Top30" > Top30 </a>
                <a class="mdl-navigation__link" href="/EN/World" > World </a>
                <a class="mdl-navigation__link" href="/EN/National" > National </a>
                <a class="mdl-navigation__link" href="/EN/Local" > Local </a>
                <a class="mdl-navigation__link" href="/EN/Editorial" > Editorial </a>
                <a class="mdl-navigation__link" href="/EN/Sports" > Sports </a>
                <a class="mdl-navigation__link" href="/EN/Articles" > Articles </a>

            </nav>
        </div>



        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
              <?php
                if($lnk==""){
                  newsP($LANG='EN',$CATEGORY='',$ORDER='id',$LIMIT='30');
                     }
                elseif($lnk=="Top30") {
                  newsP($LANG='EN',$CATEGORY='',$ORDER='pri',$LIMIT='30');
                   //echo "content of Top30";
                 }
                elseif($lnk=="World") {
                  newsP($LANG='EN',$CATEGORY='World',$ORDER='pri',$LIMIT='30');
                 }
                elseif($lnk=="National") {
                  newsP($LANG='EN',$CATEGORY='National',$ORDER='pri',$LIMIT='30');
                 }
    					  elseif($lnk=="Local") {
                  newsP($LANG='EN',$CATEGORY='Local',$ORDER='pri',$LIMIT='30');
                }
    					  elseif($lnk=="Editorial") {
                  newsP($LANG='EN',$CATEGORY='Editorial',$ORDER='pri',$LIMIT='30');
                }
    					  elseif($lnk=="Sports") {
                  newsP($LANG='EN',$CATEGORY='Sports',$ORDER='pri',$LIMIT='30');
                }
                else {
                  newsD($lnk);
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
    <script src="/CONTENT/THEME/JS/material-1.3.0.min.js"></script>
</body>

</html>
