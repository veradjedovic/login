<?php

use app\models\Session as Session;

if(!Session::get("status")||Session::get("status")!=ADMIN){
	header("location: " . SITE_ROOT . "/login");
}

?>
          
<!DOCTYPE Html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Tab</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT; ?>/resources/css/site.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="tab">
    <div class="tab-nav">
        <a href="<?php echo SITE_ROOT; ?>/admin">Home</a>
        <a href="<?php echo SITE_ROOT; ?>/admin-users">List All Users</a>
        <a href="<?php echo SITE_ROOT; ?>/logout">Logout</a>
        <div class="spacer"></div>
    </div>
    <div id="tab1" class="tab-content">
        [VIEW]
    </div>
</div>
</body>
</html>
