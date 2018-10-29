<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>UltraMarkt</title>
  <link rel="stylesheet" href="includes/main.css">
  <link rel="icon" href="img/markt1.png"> 
</head>
<body>
<div id="bgimage"></div>
<?php
session_start();
if (!isset($_SESSION['success'])){
  $_SESSION['success'] = '';
}
if (!isset($_SESSION['warning'])){
  $_SESSION['warning'] = '';
}

//display errors
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//grab special svg font characters 
require("svg.php");

//iniate connection to db
require('includes/con_db_ultramarkt.php');

//initiate reference arrays
$alphaNumericChars = str_split("abcdefghijklmnopqrstuvwxyzABCDEFGHIJVKLMNOPQRSTUVWXYZ1234567890");