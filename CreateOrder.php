<?php
session_start();
require('Config.php');

// Get items
$stmt = $pdo->prepare('SELECT * FROM Item');
$stmt->execute();

// The customer clicks to add to cart
if (isset($_POST['ItemID'], $_POST['quantity']) && is_string($_POST['ItemID']) && is_numeric($_POST['quantity'])) {
  // Set the post variables so we easily identify them, also make sure they are integer
  $ItemID = (string)$_POST['ItemID'];
  $quantity = (int)$_POST['quantity'];
  // Prepare the SQL statement, checking if the item exists in the database
  $stmt = $pdo->prepare('SELECT * FROM Item WHERE ItemID = ?');
  $stmt->execute([$_POST['ItemID']]);
  // Fetch the item from the database and return the result
  $ItemName = $stmt->fetch(PDO::FETCH_ASSOC);
  // Check if the item exists (not empty)
  if ($ItemName && $quantity > 0) {
      // Item exists in database, create/update the session variable for the cart
      if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
          if (array_key_exists($ItemID, $_SESSION['cart'])) {
              // Item exists in cart so just update the quanity
              $_SESSION['cart'][$ItemID] += $quantity;
          } else {
              // Item is not in cart so add it
              $_SESSION['cart'][$ItemID] = $quantity;
          }
      } else {
          // There are no items in cart, this will add the first item to cart
          $_SESSION['cart'] = array($ItemID => $quantity);
      }
  }
}

?>

