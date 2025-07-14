<?php

class Validate
{

  // The static $validStatus holds the validation status and message of the 
  // input form objects. All form inputs are required
  static $valid_status;
  static $form_value;
  static function validateInput()
  {

    // validate the customer id input
    if (empty($_POST['customerID'])) {
      self::$valid_status[] = "customerID is required.";
      error_log("customerID is required.");
    } else if (!filter_input(INPUT_POST, 'customerID', FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^C\d{3}(X|Y){1}$/"]])) {
      self::$valid_status[] = "input correct format: customerID.";
      error_log("input correct format: customerID");
    } else {
      self::$form_value["customerID"] = $_POST["customerID"];
    }

    // validate the amount input
    // $_POST['amount'];
    if (empty($_POST['amount'])) {
      self::$valid_status[] = "amount is required.";
      error_log("amount is required.");
    } else if (!filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 30]])) {
      self::$valid_status[] = "input correct format: amount.";
      error_log("input correct amount: 1-30");
    } else {
      self::$form_value["amount"] = $_POST["amount"];
    }

    // validate the membership select input
    if (empty($_POST['membership']) || $_POST['membership'] == "") {
      self::$valid_status[] = "membership is required.";
      error_log("membership is required.");
    } else {
      self::$form_value["membership"] = $_POST['membership'];
    }
    if (!empty(self::$valid_status)) {
      return false;
    }
    return true;
  }
}
