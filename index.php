<?php
require_once ("module/model/koneksi/koneksi.php");
include "module/controller/login/login.php";
?>
<!DOCTYPE html>
<html class="backend">
    <head>
        <?php include "module/model/head/head.php"; ?>
        <style type="text/css">
            html {
              background-color: #293E63;
            }

            body {
              height: 100vh;
            }

            h2 {
              text-align: center;
              font-size: 16px;
              font-weight: 600;
              text-transform: uppercase;
              display:inline-block;
              margin: 40px 8px 10px 8px; 
              color: #cccccc;
            }

            /* STRUCTURE */
            .wrapper {
              display: flex;
              align-items: center;
              flex-direction: column; 
              justify-content: center;
              width: 100%;
              min-height: 100%;
              padding: 20px;
            }

            #formContent {
              -webkit-border-radius: 10px;
              border-radius: 10px;
              background: #fff;
              padding: 30px;
              width: 100%;
              max-width: 450px;
              position: relative;
              padding: 20px;
              -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.8);
              box-shadow: 0 30px 60px 0 rgba(0,0,0,0.8);
              text-align: center;
            }

            #formFooter {
              background-color: #f6f6f6;
              border-top: 1px solid #dce8f1;
              padding: 25px;
              text-align: center;
              -webkit-border-radius: 0 0 10px 10px;
              border-radius: 0 0 10px 10px;
            }

            /* TABS */

            h2.inactive {
              color: #cccccc;
            }

            h2.active {
              color: #0d0d0d;
              border-bottom: 2px solid #5fbae9;
            }

            /* FORM TYPOGRAPHY*/
            input[type=button], input[type=submit], input[type=reset]  {
              background-color: #1d448a;
              border: none;
              color: white;
              font-weight: bold;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              text-transform: uppercase;
              font-size: 16px;
              margin: 5px;
              width: 85%;
              -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
              box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
              -webkit-border-radius: 5px 5px 5px 5px;
              border-radius: 5px 5px 5px 5px;
              -webkit-transition: all 0.3s ease-in-out;
              -moz-transition: all 0.3s ease-in-out;
              -ms-transition: all 0.3s ease-in-out;
              -o-transition: all 0.3s ease-in-out;
              transition: all 0.3s ease-in-out;
            }

            input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
              background-color: #0B1A36;
            }

            input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
              -moz-transform: scale(0.95);
              -webkit-transform: scale(0.95);
              -o-transform: scale(0.95);
              -ms-transform: scale(0.95);
              transform: scale(0.95);
            }

            input[type=text], input[type=password] {
              background-color: #f6f6f6;
              border: 1px solid black;
              color: #0d0d0d;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 5px;
              width: 85%;
              border: 1px solid #0B1A36;
              -webkit-transition: all 0.5s ease-in-out;
              -moz-transition: all 0.5s ease-in-out;
              -ms-transition: all 0.5s ease-in-out;
              -o-transition: all 0.5s ease-in-out;
              transition: all 0.2s ease-in-out;
              -webkit-border-radius: 5px 5px 5px 5px;
              border-radius: 5px 5px 5px 5px;
            }

            input[type=text]:focus,input[type=password]:focus {
              background-color: #dae4f5;
              /*border-bottom: 2px solid #5fbae9;*/
            }

            input[type=text]:hover,input[type=password]:hover {
              background-color: #dae4f5;
              /*border-bottom: 2px solid #5fbae9;*/
            }

            input[type=text]:placeholder,input[type=password]:placeholder {
              color: #cccccc;
            }

            /* ANIMATIONS */
            /* Simple CSS3 Fade-in-down Animation */
            .fadeInDown {
              -webkit-animation-name: fadeInDown;
              animation-name: fadeInDown;
              -webkit-animation-duration: 1s;
              animation-duration: 1s;
              -webkit-animation-fill-mode: both;
              animation-fill-mode: both;
            }

            @-webkit-keyframes fadeInDown {
              0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
              }
              100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
              }
            }

            @keyframes fadeInDown {
              0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
              }
              100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
              }
            }

            /* Simple CSS3 Fade-in Animation */
            @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
            @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
            @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

            .fadeIn {
              opacity:0;
              -webkit-animation:fadeIn ease-in 1;
              -moz-animation:fadeIn ease-in 1;
              animation:fadeIn ease-in 1;

              -webkit-animation-fill-mode:forwards;
              -moz-animation-fill-mode:forwards;
              animation-fill-mode:forwards;

              -webkit-animation-duration:1s;
              -moz-animation-duration:1s;
              animation-duration:1s;
            }

            .fadeIn.first {
              -webkit-animation-delay: 0.4s;
              -moz-animation-delay: 0.4s;
              animation-delay: 0.4s;
            }

            .fadeIn.second {
              -webkit-animation-delay: 0.6s;
              -moz-animation-delay: 0.6s;
              animation-delay: 0.6s;
            }

            .fadeIn.third {
              -webkit-animation-delay: 0.8s;
              -moz-animation-delay: 0.8s;
              animation-delay: 0.8s;
            }

            .fadeIn.fourth {
              -webkit-animation-delay: 1s;
              -moz-animation-delay: 1s;
              animation-delay: 1s;
            }

            /* Simple CSS3 Fade-in Animation */
            .underlineHover:after {
              display: block;
              left: 0;
              bottom: -10px;
              width: 0;
              height: 2px;
              background-color: #56baed;
              content: "";
              transition: width 0.2s;
            }

            .underlineHover:hover {
              color: #0d0d0d;
            }

            .underlineHover:hover:after{
              width: 100%;
            }

            /* OTHERS */
            *:focus {
                outline: none;
            } 

            * {
              box-sizing: border-box;
            }
        </style>
    </head>
    <body style="background-color:#293e63">
      <script type="text/javascript">
          $(window).on('load', function() {
              $('#myModal').modal('show');
          });
      </script>
      <!-- PENGUMUMAN -->
        <!-- <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header text-center" style="background-color:#ED5466;">
                <h4 class="semibold modal-title" style="color:white"><span class="fa fa-exclamation-triangle fa-lg"></span> IMPORTANT !</h4>
              </div>
              <div class="modal-body">
                <div class="container-fluid text-center">
                    <h4>Dear all, <br>Dihimbau untuk melakukan edit semua PTK aktif yang sudah anda buat, <br>dan menginput / mengubah bagian <b>JAM KERJA</b> karena ada perubahan format.</h4><br><hr>
                    <img src="assets\image\images\important.jpg" width="800px">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div> -->
        <!-- PENGUMUMAN -->

        <div class="wrapper fadeInDown">
            <a class="btn btn-danger" href="manual book/WHAT-NEWS.pdf" target="_blank"><span class="icon"><i class="ico-info"></i></span> Klik disini untuk melihat apa yang baru pada PTK Online</a><br>
            <div id="formContent"><br>
                <h1 class="active"> <strong>PTK Online</strong> </h1>
                <div class="fadeIn first">
                  <img src="assets/image/images/mmp.png" width="40%">
                </div><br>
                <form method="post">
                  <input type="text" id="username" name="username" class="fadeIn second" placeholder="U S E R N A M E">
                  <input type="password" id="password" name="password" class="fadeIn third" placeholder="P A S S W O R D">
                  <input type="submit" name="login" class="fadeIn fourth" value="L o g i n">
                </form>
                <div id="formFooter">
                  <p>&copy; PT. Mega Marine Pride</p>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="assets/javascript/vendor.js"></script>
        <script type="text/javascript" src="assets/javascript/core.js"></script>
        <script type="text/javascript" src="assets/javascript/backend/app.js"></script>
        <script type="text/javascript" src="assets/javascript/pace.min.js"></script>
        <script type="text/javascript" src="assets/plugins/parsley/js/parsley.js"></script>
        <script type="text/javascript" src="assets/javascript/backend/pages/login.js"></script>
    </body>
</html>