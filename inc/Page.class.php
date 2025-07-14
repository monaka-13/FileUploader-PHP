<?php

class Page
{
  static $title = TITLE;
  static $author = AUTHOR;

  static $statistics = [];

  static $notifications = [];

  // This function displays the header
  static function header()
  { ?>

    <head>
      <title><?= TITLE ?></title>
      <meta charset="utf-8">
      <meta name=<?= AUTHOR ?> content="">
      <link href="css/styles.css" rel="stylesheet">
    </head>

    <body>
      <header>
        <h1><?= TITLE . " by " . AUTHOR ?> </h1>
      </header>
      <article>
      <?php }

    // This function displays the footer
    static function footer()
    { ?>
      </article>
    </body>

    </html>
  <?php }

    // This function displays the add new entry form
    static function form()
    { ?>
    <section class="form_entry">
      <h2>Add a new order</h2>
      <form method="post">
        <div>
          <label for="customerID">
            Customer ID
          </label>
          <input type="text" name="customerID" id="customerID" placeholder="CNNN{X|Y} with N=digit">
        </div>
        <div>
          <label for="membership">
            Membership
          </label>
          <select name="membership" id="membership">
            <option value="">Select one option</option>
            <option value="None">None</option>
            <option value="Regular">Regular</option>
            <option value="Gold">Gold</option>
          </select>
        </div>
        <div>
          <label for="amount">
            Amount
          </label>
          <input type="text" name="amount" id="amount" placeholder="1 to 30">
        </div>
        <div>
          <input type="submit" name="submit" value="Add Order">
        </div>
      </form>
    </section>
  <?php }

    // This function displays the page's statistics
    static function statistics($dataList)
    {
      $orderNumber = count($dataList);
      $totalAmount = 0;
      $totalSales = 0;
      foreach ($dataList as $data) {
        $totalAmount += $data->amount;
        $totalSales += self::calculateSales($data);
      }
  ?>
    <section class="statistics">
      <h2>Statistics</h2>
      <table>
        <tbody>
          <tr>
            <th>Number of Orders</th>
            <td><?php echo $orderNumber; ?></td>
          </tr>
        </tbody>
        <tbody>
          <tr>
            <th>Total Amount</th>
            <td><?php echo $totalAmount; ?></td>
          </tr>
        </tbody>
        <tbody>
          <tr>
            <th>Average Amount</th>
            <td><?php echo number_format($totalAmount / $orderNumber, 2); ?></td>
          </tr>
        </tbody>
        <tbody>
          <tr>
            <th>Total Sales</th>
            <td><?php echo $totalSales; ?></td>
          </tr>
        </tbody>
        <tbody>
          <tr>
            <th>Average Sales</th>
            <td><?php echo number_format($totalSales / $orderNumber, 2); ?></td>
          </tr>
        </tbody>
      </table>
    </section>
  <?php }

    // This function displays the main section containing
    // the notification and the table
    static function main($dataList, $notifications)
    // static function main($data, $discounts)
    {
      self::$notifications = $notifications;
  ?>
    <section class="main">
      <?php
      if (!empty(self::$notifications)) {
        self::notification();
      }
      ?>
      <h2>Current Order Data</h2>
      <table>
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Membership</th>
            <th>Amount</th>
            <th>Sales</th>
          </tr>
        </thead>
        <?php
        $i = 0;
        foreach ($dataList as $data) {
          echo "<tbody class=";
          echo $i % 2 == 1 ? "oddRow" : "evenRow";
          echo "><tr><td>";
          echo ++$i;
          echo "</td><td>";
          echo $data->customerID;
          echo "</td><td>";
          echo $data->member;
          echo "</td><td>";
          echo $data->amount;
          echo "</td><td>$";
          echo (number_format(self::calculateSales($data), 2));
          echo "</td></tr></tbody>";;
        }
        ?>
      </table>
    </section>
  <?php }
    static function calculateSales($data)
    {
      $sales = $data->amount * ITEM_COST;
      // if the membership is Gold
      if ($data->member == "Gold") {
        $sales *= (1 - DISCOUNT_INFO["goldDiscount"]);
      }
      return $sales;
    }

    // This function displays the notifications
    static function notification()
    { ?>
    <div class="error" style="display: block;">
      <h4>Notification</h4>
      <ul>
        <?php
        foreach (self::$notifications as $n) {
          echo "<li>";
          echo $n;
          echo "</li>";
        }
        ?>
      </ul>
    </div>
<?php }
  }
?>