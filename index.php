<?php

@session_start();
auth();

$act = $_GET['act'] ?? '';

switch ($act) {
  case 'home':
    home();
    break;
  case 'login':
    login();
    break;
  default:
    sign();
    break;
}

function auth() {
  if (!isset($_SESSION['auth'])) {

    if (isset($_SERVER['HTTP_USER_AGENT'])) {
      $http_user_agent = $_SERVER['HTTP_USER_AGENT'];
      if (preg_match('/Word|Excel|PowerPoint|ms-office/i', $http_user_agent)) {
        die();
      }
    }

    header('Location: /');
    exit();
  }
}

function home() {
  echo '<h1>HOME</h1>';
}

function login() {
  $_SESSION['auth'] = "1";
}

function sign() {
  echo '<h1>SIGN</h1>';
}

function dd() {
  echo '<pre>';
  var_dump($_SERVER);
  echo '</pre>';
  die();
}