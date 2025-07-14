<?php

define("TITLE", "FileUploader");
define("AUTHOR", "Kay Shigenaga");

define("FILENAME", "data/order.csv");



date_default_timezone_set("America/Vancouver");
ini_set("log_errors", true);
ini_set("error_log", "log/error_log.txt");

define("ITEM_COST", 50);
define("DISCOUNT_INFO", [
  "noneDiscount" => 0,
  "regularDiscount" => 0.05,
  "goldDiscount" => 0.15
]);
