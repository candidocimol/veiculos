<?php

session_start();

if(isset($_SESSION['user']))
    unset($_SSESSION['user']);

header("Location:login.php");