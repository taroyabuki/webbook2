<?php
 
//セッションを破棄して転送
session_start();
session_destroy();
header('Location: login.php');

