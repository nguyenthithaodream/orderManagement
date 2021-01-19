<?php
    session_start();
    if(!isset($_SESSION['ten'])){
        header('location: dangNhap.php');
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="lolkittens" />
    <script type="text/javascript" src="../javascript/abc.js"></script>
    <script type="text/javascript" src="../javascript/jquery-3.4.1.min.js"></script>
    
	<title>Quản lý giao hàng</title>
    <link type="text/css" href="../css/def.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
</head>

<body>
    <div class="wrapper">
        <?php
            include('./header.php');
            include('./body.php');
        ?>
    </div>
</body>
</html>
