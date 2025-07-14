<?php

class OrderList
{

  // The array of Order objects used for reading
  public $readQuery = [];

  // The string of Order used for writing
  public $addQuery = '';

  // The function below sets the array of Order objects
  // The fileContent is obtained from FileUtility's read()
  function parseRead($fileContent)
  {
    $lines = explode("\n", $fileContent);
    foreach ($lines as $val) {
      $col = explode(",", $val);
      $order = new Order(trim($col[0]), trim($col[1]), trim($col[2]));
      $this->readQuery[] = $order;
    }
    array_shift($this->readQuery);
  }

  // The function below sets the string to be used for writing
  function parseWrite($data)
  {
    $this->addQuery = "\n" . $data["customerID"] . ", " . $data["membership"] . ", " . $data["amount"];
    echo $this->addQuery;
  }
}
