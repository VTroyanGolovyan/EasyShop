<?php
     ini_set('error_reporting', E_ALL);
     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);

     session_start();
     require('db/db.php'); // connect with db
     require('classes/image_worker.php');  // class for working with images
     $host = 'shop';

     function refresh($url){
       print '<script>';
       print 'location.href="'.$url.'";';
       print '</script>';
       exit;
     }
     $LIST['reg'] = 'reg.php';
     $LIST['login'] = 'login.php';
     if (isset($_SESSION[$host]['access'])){
         /* scripts for users who are authorized */
         $LIST['update_avatar'] = 'update_avatar.php';
         $LIST['buy'] = 'buy.php';
         $LIST['logout'] = 'logout.php';
         $LIST['addcoment'] = 'addcoment.php';
         $LIST['editprofile'] = 'editprofile.php';
         if ($_SESSION[$host]['access'] == 255){
           /* admin scripts */
           $LIST['addproduct'] = 'addproduct.php';
           $LIST['edit'] = 'edit.php';
         }
   }
   if (isset($_GET['cmd']))
     if (isset($LIST[$_GET['cmd']]))
        include_once 'cmd/'.$LIST[$_GET['cmd']];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "css/imgresizer.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src = 'js/imgbox.js'></script>
  </head>
  <body>
    <?php
      include_once 'panels/header.php';
      $SLIST['reg'] = 'reg.php';
      $SLIST['login'] = 'login.php';
      $SLIST['main'] = 'main.php';
      $SLIST['product'] = 'product.php';
      $SLIST['profile'] = 'profile.php';
      $SLIST['about'] = 'about.php';
      $SLIST['search'] = 'search.php';
      if (isset($_SESSION[$host]['access'])){

          if ($_SESSION[$host]['access'] == 255){
              $SLIST['addproduct'] = 'addproduct.php';
              $SLIST['edit'] = 'edit.php';
              $SLIST['orders'] = 'orders.php';
          }
      }
      print '<div class = "content_area">';
      include_once('panels/nav.php');
      if (isset($_GET['service'])){
        if (isset($SLIST[$_GET['service']]))
           include_once 'service/'.$SLIST[$_GET['service']];
      }else  include_once 'service/main.php';
      print '</div>';
      include_once 'panels/footer.php';
    ?>
    <!-- Block for scale images -->
    <div class="imgResizer" id="imgBig">
      <div id="imgResizerContainer" class="imgResizerContainer">
         <img id="imgResizerImage" src="http://vh.biz.ua/vh/server/avatars/VH1fb54a4d197860d8ca470cff20c8c3976vGS1jQtu5.jpg" alt="Пусто" style="margin: 0px 292px;" width="716" height="670">
      </div>
      <div onclick="openbox('imgBig')" class="imgBoxCtrlClose">
        Закрыть
      </div>
    </div>
  </body>
</html>
