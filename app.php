<?php
include("inc/config.inc.php");
include("inc/FileUtility.class.php");
include("inc/OrderList.class.php");
include("inc/Order.class.php");
include("inc/Page.class.php");
include("inc/Validate.class.php");

// define some variables, if needed
FileUtility::initialize(FILENAME);
$orderList = new OrderList();

// handle the form
if(isset($_POST["submit"])){
  $orderList->parseWrite();
  FileUtility::write($orderData->addQuery);
}


$content = FileUtility::read();
$orderList->parseRead($content);

// display the page
Page::header();
Page::form();
Page::statistics();
Page::main($orderList->readQuery);
Page::footer();
