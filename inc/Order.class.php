<?php
class Order
{
  public $customerID = "";
  public $member = "";
  public $amount = 0;

  function __construct($customerID, $member, $amount)
  {
    $this->customerID = $customerID;
    $this->member = $member;
    $this->amount = $amount;
  }
}
