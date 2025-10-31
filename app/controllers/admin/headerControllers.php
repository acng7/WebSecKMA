<?php
if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php?type=home");
}
include_once("app/views/admin/header.views.php");
