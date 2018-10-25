<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>UltraMarkt</title>
  <link rel="stylesheet" href="component/main.css">
  <link rel="icon" href="img/markt.png"> 
</head>
<body>
<?php
session_start();

//grab special svg font characters 
require("svg.php");

//display errors
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//iniate connection to db
require('component/con_db.php');

//initiate reference arrays
$alphaNumericChars = str_split("abcdefghijklmnopqrstuvwxyzABCDEFGHIJVKLMNOPQRSTUVWXYZ1234567890");
?>