<?php

class Utils {

  public static function getLink($page) {
    return "index.php?page=$page";
  }

  public static function redirect($page = 'post/index') {
    header("Location: " . "index.php?page=$page");
    exit;
  }

  public static function isRequestPost() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      return true;
    }
    return FALSE;
  }

  public static function isRequestGet() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      return true;
    }
    return FALSE;
  }

  public static function isRequestAjax() {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      return true;
    }
    return FALSE;
  }

  public static function makeLinksClickable($text) {
    return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1" target="_blank">$1</a>', $text);
  }

}
