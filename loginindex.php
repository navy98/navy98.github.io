<?php 

session_start();
include 'conn.php';

?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Login with Qrcode</title>
	<style>
		.sidebar{ width: 350px; margin:auto; padding: 10px }
		.camera{ width: 610px; margin:auto; }
	</style>
	<script src="js/jquery-3.4.1.min.js"></script>
<!-- scanner -->
<script src="scanner/vendor/modernizr/modernizr.js"></script>
<script src="scanner/vendor/vue/vue.min.js"></script>
</head>
<body>

	  <!-- scan -->
  <div id="app" class="row box">
    <div class="col-md-4 col-md-offset-4 sidebar">
      <ul>
        <li v-if="cameras.length === 0" class="empty">No cameras found yosias navy muskita</li>
        <li v-for="camera in cameras">
          <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active"><input type="radio" class="align-middle mr-1" checked> {{ formatName(camera.name) }}</span>
          <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
            <a @click.stop="selectCamera(camera)"> <input type="radio" class="align-middle mr-1">@{{ formatName(camera.name) }}</a>
          </span>
        </li>
      </ul>
      <div class="clearfix"></div>
      <!-- form scan -->
      <form action="" method="POST" id="myForm">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border"> Form Scan </legend>
            <input type="text" name="qrcode" id="code" autofocus>
          </fieldset>
        </form>

<?php 

if(!empty($_POST['qrcode'])){
  $qrcode = $_POST['qrcode'];
  $arr = explode('|', $qrcode);



  $username = $arr[1];
  $password = $arr[2];

   $q = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
   $row = mysqli_fetch_array ($q);

  if (mysqli_num_rows($q) > 0 ){
    $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['fullname'] = $row['fullname'];
      $_SESSION['gambar'] = $row['gambar'];	
    $_SESSION['username'] = $result['username'];
    $_SESSION['IsActive'] = TRUE;

    header("location:admin/index.php");

  }
}


?>



    </div>
    <div class="col-xs-12 preview-container camera">
        <video id="preview" class="thumbnail"></video>
    </div>
   </div>
   <!-- scanner -->
<script src="scanner/js/app.js"></script>
<script src="scanner/vendor/instascan/instascan.min.js"></script>
<script src="scanner/js/scanner.js"></script>
 </body>
 </html>