
<?php
/**
*
* Costum API Page By FreeDDNS API
* Last Update : 17 Oktober 2018
* @version v2.0
* @author Muhammad Rifky Abimayu
* 
*/

$str 				= file_get_contents('dist/lib/package.json');
$json 				= json_decode($str, true);
$base_url           		= $json['base_url'];
$judul_title  			= $json['title_site'];
$navbar_judul 			= $json['name_site'];
$icon_favicon 			= $json['icon_favicon'];
$g_sitekey	  		= $json['data']['recaptcha_data-sitekey'];
$copyright	  		= $json['footer_copyright'];
$meta_keywords 			= $json['meta_site']['keywords'];
$meta_description 		= $json['meta_site']['description'];
$meta_type 			= $json['meta_site']['type'];
$meta_title 			= $json['meta_site']['title'];
$meta_image			= $json['meta_site']['image'];
include "dist/lib/host_conf.php";
$res                		= @file_get_contents($api_url);
$json_api 			= json_decode(trim($res), TRUE);

?>
<?php
if($base_url == $actual_link){
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width">
		<title><?php echo $judul_title; ?></title>
		<meta name="keywords" content="<?php echo $meta_keywords; ?>">
		<meta name="description" content="<?php echo $meta_description; ?>"/>
		<meta property="og:type" content="<?php echo $meta_type; ?>"/>
		<meta property="og:title" content="<?php echo $meta_title; ?>"/>
		<meta property="og:description" content="<?php echo $meta_description; ?>"/>
		<meta property="og:image" content="<?php echo $meta_image; ?>"/>
		<meta property="og:image:alt" content="<?php echo $meta_image; ?>"/>
		<link rel="shortcut icon" href="dist/img/favicon.png">
		<link href="dist/img/favicon.png" rel="icon" type="image/x-icon"/>

		<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="dist/css/styles.css">
		<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
		<script src="//www.google.com/recaptcha/api.js" async defer></script>

<style type="text/css">
.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: #fff;
}
.preloader .loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  font: 14px arial;
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
  $(".preloader").fadeOut();
})
</script>
<script type="text/javascript">
  
</script>
</head>
<body>
<div class="preloader">
  <div class="loading">
    <i class="fa fa-spinner fa-spin" style="font-size:70px"></i>
  </div>
</div>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><i class="<?php echo $icon_favicon; ?>" ></i> <?php echo $navbar_judul; ?> <small> 
      <?php if($json_api['success'] == true){
      echo "<span class='badge badge-primary ml-1 mr-auto '>Verified</span></small></a>";
      } else {
       echo "<span class='badge badge-primary ml-1 mr-auto bg-green'>Unverified</span></small></a>";   
      }
      ?>
     
    </div>
    <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="//github.com/FreeDDNS/api-pagev2"><i class="fab fa-github"></i> Github</a></li>
      </ul>	
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12" role="main">
      <div class="panel panel-default">
        <div class="panel-heading">
         <i class="fas fa-bolt"></i> Fast Resolve DNS Cache !
        </div>
        <div class="panel-body">
          
          <form action="dist/lib/proses.php"  method="POST" autocomplete="off" id="indexForm" name="indexForm">
          	<label> Select Domain * :</label>
          	<div class="form-group" >
          		<select  name='domain' class='form-control select2' style='width: 100%;' required>
                   <option selected='selected' disabled='disable'>Please Insert Domain</option>
                   <option value='mikrotikindo.tech'>mikrotikindo.tech</option>
                   <option value='venc.me'>venc.me</option>
                   <option value='vpslinux.tech'>vpslinux.tech</option>
                   <option value='weblinux.tech'>weblinux.tech</option>
                   <option value='youweb.blog'>youweb.blog</option>
                   <option value='fosslinux.xyz'>fosslinux.xyz</option>
                   <option value='blogs.web.id'>blogs.web.id</option>
                   <option value='dnsnet.pw'>dnsnet.pw</option>                  
                </select>
          	</div>
          	<label> Select DNS Type * :</label>
          	<div class="form-group" >
          		<select  name='service' class='form-control select2' style='width: 100%;' required>
                  <option selected='selected' disabled='disable'>Please Insert DNS</option>
                  <option value='A'>A Records</option>
                  <option value='CNAME'>CNAME Records</option>
                  <option value='NS'>NS Records</option>                  
                </select>
          	</div>
            <div class="form-group">
              <label for="code">Subdomain :</label>
              <input type="text" class="form-control" id="code" name="subdomain" required>
            </div>
            <div class="form-group">
              <label for="code">Content :</label>
              <input type="text" class="form-control" id="sebagai" name="content" required>
            </div>
             <div class="form-group">
              <div class="g-recaptcha" data-sitekey="<?php echo $g_sitekey; ?>"></div>
            </div>
            
            <button type="submit" class="btn btn-info" id="btn-cust"><i class="fas fa-paper-plane" name="submit"></i> Submit</button>
          </form>
          <br>
          
          <?php
            
            if (isset($_SERVER['HTTP_REFERER'])){
            if (isset($_GET['status'])){
                $pesan = $_GET['status'];
                $isi = $_GET['message'];
            if ($pesan == 1){
                 echo " <div class='alert alert-danger alert-dismissible'><a class='close' data-dismiss='alert'>×</a> <strong><i class='fa fa-ban'></i> Gagal : </strong> $isi.</div>"; }
            if ($pesan == 2){
                echo "<div class='alert alert-success alert-dismissible'><a class='close' data-dismiss='alert'>×</a><strong> <i class='fa fa-check'></i> Berhasil !</strong> $isi.</div>"; } } }
                                        ?>
		</div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<div class="footers">
	<div class="pull-right">
            Made with <i class="fa fa-heart text-danger"></i> by <b> FreeDDNS</b>
        </div>
	<div>
         © 2018 <strong><?php echo $copyright; ?></strong>
        </div>
</div>
</body>
</html>
<?php
} else {
    echo "base_url is Not set or not same. Please check package.json";
}
