<?php 

 
// define variables and set to empty values
$nameErr = $emailErr = $telErr = $cityErr = "";
$error=$good=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  session_start();

$name = htmlspecialchars($_POST["nameFF"]);
$city =htmlspecialchars($_POST["cityFF"]);
$tel =htmlspecialchars($_POST["messageFF"]);
$email = htmlspecialchars($_POST["contactFF"]);
$number = htmlspecialchars($_POST["number"]);
    
$_SESSION["EMAIL"]=$email;
  $_SESSION["NAME"]=$name;
     $_SESSION["CITY"]=$city;
     $_SESSION["TEL"]=$tel;
     $_SESSION["NUMBER"]=$number;
     
    
  if (empty($_POST["nameFF"])) {
    $nameErr = "������ ������� �����������!";
      $error=true;
  } else {
    $name = test_input($_POST["nameFF"]);
    // check if name only contains letters and whitespace
  if (!preg_match("/^[�-��-�a-zA-Z ]{2}+[�-��-�a-zA-Z\/\\\\ ]+$/",$name)) {
      $nameErr = "������ ������� �����������!"; 
       $error=true;
    }
  }

  if (!empty($_POST["contactFF"])) {

  
    $email = test_input($_POST["contactFF"]);
    // check if e-mail address is well-formed
      //preg_match('/[^(\w)|(\@)|)(\.)|(\-)]/',$email)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "������ ������� �����������!"; 
         $error=true;
    }
  }
     
if (empty($_POST["cityFF"])) {
    $cityErr = "������ ������� �����������!";
     $error=true;
  } else {
    $city = test_input($_POST["cityFF"]);
    // check if name only contains letters and whitespace
  if (!preg_match("/^[�-��-�a-zA-Z ]{2}+[�-��-�a-zA-Z\-\ ]+$/",$city)) {
      $cityErr = "������ ������� �����������!"; 
       $error=true;
    }
}

    if (!empty($_POST["number"])) {
  
 
    $number = test_input($_POST["number"]);
    // check if name only contains letters and whitespace
  if (!preg_match("/^[0-9]{0}+[0-9]+$/",$number)) {
      $numberErr = "������ ������� �����������!"; 
       $error=true;
    }
}
  if (empty($_POST["messageFF"])) {
    $telErr = "������ ������� �����������!";
       $error=true;
  } else {
    $tel = test_input($_POST["messageFF"]);
      $phone ="+7(495) 123-25-52";
      $pattern ="#^\+[0-9]{1,2}\s?\([0-9]{3}\)\s?[0-9]+\-[0-9]+\-[0-9]+$#";
      $pattern1='/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/';
      if(!preg_match($pattern1, $tel))  {
            $telErr = "������ ������� �����������!";  
           $error=true;
      }
    
  }
   
if($error!=true && !empty($_POST["nameFF"])){
 

 
// �������� �� ����� ������ ���� ������� ������ �������� ������� �� ��������� �������� ������ 10 ��
    include('contacts.php');
    if($good==true){
    echo"<script>alert(\"�������, ��� ������ ��������!� ��������� ����� � ���� �������� ��� ����������.\");</script>";
          $name = $city = $email =$tel=$number ="";
     $_SESSION["EMAIL"]=$email;
      $_SESSION["NAME"]=$name;
     $_SESSION["CITY"]=$comp;
     $_SESSION["TEL"]=$tel;
       $_SESSION["NUMBER"]=$number;
  
      session_destroy();
      $_POST["nameFF"]="";
         $error = false; 
    }
    if($good==false){
        echo"<script>alert(\"��������, ������ �� ����������. ������ ���� ������ ��������� 10 ��.\");</script>";
       
    }
  
}
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!doctype html>
<html lang="ru">
<head>
	<!-- Define Charset -->
	<!---<meta charset="UTF-8">
---->
	<!-- Page Title -->
	<title>����������� - ������������ ������, ����� ��������</title>

	<!-- Responsive Metatag --> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
       <link rel="shortcut icon" href="img/favicon.png">   
	<!-- Stylesheet
	===================================================================================================  -->
	<link rel="stylesheet" href="font/fontello.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/media-queries.css">
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-T63VH4');</script>
	<!-- End Google Tag Manager -->
</head>


<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T63VH4"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div id="loader">

		<section class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 social-media">
						<a href="http://linkedin.com/groups/8468035" data-toggle="tooltip" class="tooltips" data-placement="bottom" title="Linkedin"><i class="icon-linkedin"></i></a>
						<a href="https://vk.com/club114134836" data-toggle="tooltip" class="tooltips" data-placement="bottom" title="Vkontakte"><i class="icon-vkontakte"></i></a>
						<a href="https://www.youtube.com/channel/UC-ko5jR2CulIA4qOyWQlOFQ" data-toggle="tooltip" class="tooltips" data-placement="bottom" title="Youtube"><i class="icon-play"></i></a>						
						<a href="https://www.facebook.com/groups/1553699498275598/" data-toggle="tooltip" class="tooltips" data-placement="bottom" title="Facebook"><i class="icon-facebook"></i></a>						
					</div>
					<div class="col-sm-6 data-info">
						<p><i class="icon-mail"></i><a href="mailto:sales@rupal.su"> sales@rupal.su</a>?</p>
						<p><i class="icon-mobile"></i><a href="tel:8 (800) 7777 017">8 (800) 77-77-017</a>
<!-- <a href="tel:(812)332 23 32">(812) 332-23-32</a> --></p>
					</div>
				</div>
			</div>
		</section>

	 	<header>
		    <div class="navbar navbar-default" role="navigation">
		      <div class="container">
		        <div class="navbar-header" style="float: left;">
		          <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo brand"></a>
		        </div>
		        <div class="navbar-collapse collapse">
		          <ul class="nav navbar-nav navbar-right">
					<h2>����������� <span style="color: #f47a20;">����������</span> �������� <br><center>������������ ��������</center></h2>
				  </ul>
		        </div>
		      </div>
		    </div>
	    </header>

		<section class="slider" id="menu-slider">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h3 style="margin-top: -4px;">������ �������!</h3>
						<h2>����� �������� ������ �� ����!</h2>
						<h4>�� � ���������� ���������� �������������� ������</h4>
					</div>
					<div class="col-sm-6">
						<form enctype="multipart/form-data" method="post" id="feedback-form"  class="row suscribe">
						<div class="col-sm-12">
                            
							<input type="text" name="nameFF" value="<?=$_SESSION["NAME"]?>" id="nameFF" placeholder="���� ��� / �������� ��������*" x-autocompletetype="name" class="form-control">
                             <span class="error"><?php echo $nameErr;?></span><br>
                            
							<input type="text" name="cityFF" value="<?=$_SESSION["CITY"]?>"id="cityFF" placeholder="��� �����*" class="form-control">
                             <span class="error"> <?php echo $cityErr;?></span><br>
                            
							<input name="messageFF"value="<?=$_SESSION["TEL"]?>" id="messageFF" placeholder="��� ���������� ������� ��� �����*" class="form-control">
                              <span class="error"> <?php echo $telErr;?></span><br>
                            
							<input  name="contactFF" value="<?=$_SESSION["EMAIL"]?>"id="contactFF"  placeholder="��� email ��� �����*" class="form-control">
                             <span class="error"><?php echo $emailErr;?> </span><br>
                            
							<input type="text" name="number" value="<?=$_SESSION["NUMBER"]?>" placeholder="���������� ����� ��������, ��." class="form-control">
                            <span class="error"><?php echo $numberErr;?> </span><br>
                            
							<span style="color: #FEFEFE;">����� ����� �������? &nbsp;&nbsp;</span><p class="popup" data-popup="��� ������������� ��������" style="color: #FEFEFE;" ><input type="checkbox" name="a" id="a"value="�����"></p>
							<p style="color: #FEFEFE;"><label>���� ������������ ��� �� �� �������</label>
							<input type="file" name="fileFF[]" multiple id="fileFF" class="w100"></p>
						</div>
						<div class="text-center">
								<button type="submit" id="submitFF" class="btn btn-default text-center">�������� ����� �������</button>
						</div>
						</form>
					</div>
					
				</div>
			</div>
		</section>				
	</div>

		<section class="upcoming generic">
			<div class="container">
				<div class="row title">
					<div class="col-sm-12">
						<h3>��������� <span style="color: #f47a20;">��������!</span></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="panel-body">
							�� ������������ ���������� ������ 
							��������� ������������ ��������, � ������ ����������� 
							��� ���������� �������� ���������. ��������� �����.
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel-body">
						    ����������� ����������� ������ ������� 
							������������ � ����� ��������, ��� ������������ 
							������� ��������� �����������, ��������� �������, ��������, � ��������������� � � ������������� ����������.
						</div>					
					</div>
				</div>
				<div class="row title">
					<div class="col-sm-12">
						<h3>������������ - <b><span style="color: #f47a20;">��������</span></b> ��������� ��������, �������������� ��������� Sedex � DUNS</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="panel-body">
								���� ������� ��������� � �������� ������������.<br>
						        ���������� �������� ����, ������������� ��������� �������, ��������, ��������, 
								� ����� ���������������� � ������ ������ � ��������� �� ���� <b><a style="color: #f47a20;" href="https://www.poddon.ru/products/poddony-derevyannye/1200x800-tipovoj">������� �������</a></b> ����������� �������� 1200�800��. 
								���� ������ ���� �������� �������� ����� 30% �� ��������� ���!
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel-body">
								����� ���������� ������� ������� 1200�1000, 1200�1200 ��  ��� ����� ������ ���������� ������� � ������������ �� ������ ��.
								<br><br>
							 	����� ������� �� ������������ � ��� ���������� ������������ ����� ���������. <b><a style="color: #f47a20; text-transform: uppercase;" href="/suhie-poddony.html ">������� ������ � ���, ����� ����� ����� �������!</a></b>
						</div>					
					</div>
				</div>
			</div>
		</section>

		<section class="teachers generic" id="menu-teachers">
			<div class="container">
		
			</div>
		</section>
		
		<section class="testimonials generic" id="menu-testimonials">
		
			<div class="container">
				<div class="row title">
					<div class="col-sm-12">
						<h3>������������ � ���������� ���������� <span style="color: #f47a20;">����������</span> <br>�������������� ������</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="panel-body">
						        ����� �������� ������ �� ����! 
								������������ ���������� � ������������� �������� ����� ������ �������� � ������ ������� ������!<br><br> 
								����� ���������������� �������� ���������� ������������ �  ����� 300 000 �������� ����������.<br><br>
								����������� ������������ � �� ����� ��������� ���������� ��������� �������������� ������������ 
								<b><a style="color: #f47a20;" href="/suhie-poddony.html ">��������� ������� ���������</a></b> ������, � ����� ��������� ��������� � ������������ � ������������ ISPM-15.
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel-body">     
						</div>					
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h3>������� �� ������������ ������ ��������� <br>� ������������ � ISO 8611</h3>
					</div>
					<div class="col-sm-6">
						<div class="panel-body">
						        �� ������ ���� ������� � ���������� � ������� �������� ����� ��������, 
								��� ��� �� �������� �� <b><a style="color: #f47a20;" href="https://www.youtube.com/watch?v=1_Z54ch019o&amp;t=4s">��������� � ������������ � ������������� ���������� ISO 8611</a></b>
								�� ���� ����������� �������� �����������.
								�� ������������ �������� ����� ��������� �� ������ ����� ������������. 
								���� ��������� ������������ ��� ��������������� �������� ���������.
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel-body">						     
						</div>					
					</div>
				</div>			
		</section>

		<section class="cta generic">
			<div class="container">
				<div class="row">
					<div class="col-sm-8" style="text-align: left;">
						<p style="font-size: 24px; margin-top: -12px; color: #fff;"><i class="icon-mail"></i><a href="mailto:sales@rupal.su">sales@rupal.su</a></p>
						<p style="font-size: 24px; color: #fff;"><i class="icon-phone"></i><a href="tel:8 (800) 7777 017">8 (800) 77-77-017</a>
<!-- <a href="tel:(812)332 23 32">(812) 332-23-32</a> --></p>
					</div>	
					<div class="col-sm-4">
						<a href="#" class="btn btn-default">�������� ����� �������</a>
					</div>
					
				</div>
			</div>
		</section>

		<footer>
			<div class="container">
				<div class="row">
				<a style="color: rgb(51, 51, 51);">� 1996-2017 ����������� � ������������ � ������� ��������. </a>
				</div>
			</div>
		</footer>

		<a href="#" class="scrollup"><i class="icon-up-open"></i></a>      

	</div>
	
	<div id='siteLoader'> 
    </div> 
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter40525820 = new Ya.Metrika({
                    id:40525820,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    ecommerce:"dataLayer"
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/40525820" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
  <!-- ======================= JQuery libs =========================== -->
    <!-- jQuery -->
    <script src="js/jquery-1.9.1.min.js"></script>
    
<!-- MAsk -->
    <script src="js/jquery.maskedinput.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!--Scroll To-->         
    <script src="js/nav/jquery.scrollTo.js"></script> 
    <script src="js/nav/jquery.nav.js"></script> 

	<!-- Responsive Video -->
    <script src="js/jquery.fitvids.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>

	<!-- Fixed menu -->
    <script src="js/jquery-scrolltofixed.js"></script> 

	<!-- Video -->
    <script src="js/jquery.mb.YTPlayer.js"></script> 

	<!-- Custom -->
    <script src="js/script.js" type="text/javascript"></script>
	<!-- Custom2 --> 
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
  <!-- ======================= End JQuery libs ======================= -->
</body>
</html>