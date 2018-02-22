<?php 

session_start();
$connection = mysqli_connect("localhost", "suraj", "", "miniproject");

//code will execute if the add to cart button is pressed
if (isset($_POST["addCart"])) {
  
  //creates a new session shopping cart
  if (isset($_SESSION["shoppingCart"])) {
    
    //gets the items in the shopping cart by ID and puts it in an array
    //two values, one creates a session, the other gets the data from the column I want - ids
    $itemArrayID = array_column($_SESSION["shoppingCart"], "itemID");
    if (!in_array($_GET["id"], $itemArray)) {
      //keeps a count and then sets each value in the database to a variable in an array
      $count = count($_SESSION["shoppingCart"]);
      $itemArray = array(
        'id'=>$_GET["id"],
        'name'=>$_POST["name"],
        'price'=>$_POST["price"],
        'category'=>$_POST["category"],
        'quantity'=>$_POST["quantity"]
      );
      //keeps an indexed count in this session to keep track of how many items were added to cart
      $_SESSION["shoppingCart"][$count] = $itemArray;
    } 

  } 
  else {
    //if there's no data, then the else block will execute
    $itemArray = array(
      'id'=>$_GET["id"],
      'name'=>$_POST["hidden_name"],
      'price'=>$_POST["hidden_price"],
      'category'=>$_POST["hidden_category"],
      'quantity'=>$_POST["quantity"]
    );
    //store all the data into the itemArray array
    $_SESSION["shoppingCart"][0] = $itemArray;
  }
}


if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["shoppingCart"] as $keys=>$values) {
      if ($values["id"] == $_GET["id"]) {
        unset($_SESSION["shoppingCart"][$keys]);
      }
    }
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Suraj's Products</title>
  
</head>
<body>
  
  
  <h2 align="center">Suraj's PHP Shopping Cart</h2>
  
  <br/>
  
  <div class="container" style="width:700px;">  
    
    
    <?php 
    
    
    $sql = "SELECT category FROM productInfo GROUP BY category";
    $result = mysqli_query($connection, $sql);
    
    echo "<select name='category'>";
    while ($row = mysqli_fetch_array($result)) {
      echo "<option value='" . $row['category'] ."'>" . $row['category'] ."</option>";
    }
    echo "</select>";
    ?>
    
    
    <h3 align="center">Products</h3>
    <?php 
    
    // get queries from both tables (one with info and one with pictures)
    $query = "SELECT * FROM productInfo ORDER BY id ASC";
    $result = mysqli_query($connection, $query);
    
    $query2 = "SELECT * FROM productStock ORDER BY id ASC";
    $result2 = mysqli_query($connection, $query2);
    
    //fetch all the data of the database
    while ($row = mysqli_fetch_array($result) and $row2 = mysqli_fetch_array($result2)) {
      ?>
      
      <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
        <h4><?php echo $row["name"]; ?> </h4>
        <h4>$<?php echo $row["price"]; ?> </h4>
        <h4>Stock: <?php echo $row2["amount"];
        $row2["amount"] = "UPDATE amount FROM productInfo WHERE";

         ?> </h4>
        <h4>Category: <?php echo $row["category"]; ?> </h4>
        <input type="number" name="quantity" class="form-control" value="1" min="1"/>  
        <input type="hidden" name="category" value="<?php echo $row["category"]; ?>" />
        <input type="hidden" name="name" value="<?php echo $row["name"]; ?>" />  
        <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />  
        <br />
        <input type="submit" name="addCart" value="Add to Cart" />  
        <br />
      </form>
    </div>
    
    <?php
  }
  ?>     
  
  <br />
  
  <h3>Current Items</h3>
  <table>
    
    <thead>
      <tr>
        <th colspan="3">Name</th>
        <th>Quantity</th>
        <th colspan="3">Price</th>
        <th>Category</th>
        <th colspan="10">Action</th>
      </tr>
    </thead>
    
    <?php
    //check if shopping cart is not empty
    if (!empty($_SESSION["shoppingCart"])) {
      $total = 0;
      foreach ($_SESSION["shoppingCart"] as $keys=>$values) {
        ?>
        <tr>
          <td align="center" colspan="3"><?php echo $values["name"]; ?> </td>
          <td align="center"><?php echo $values["quantity"]; ?> </td>
          <td align="center" colspan="3">$ <?php echo $values["price"]; ?> </td>
          <td align="center" colspan="3"> <?php echo $values["category"]; ?></td>
          <td align="center" colspan="3"><a href="index.php?action=delete&id=<?php echo $values["id"]; ?>"><span class="text-danger">Remove</span></a></td>  
          
        </tr>
        <?php 
        //gets the total price of all items
        $total += $values["quantity"] * $values["price"];
      } ?>  
      
      <tr>
        <td align="center"><strong>Total</strong></td>  
        <td align="center"><strong>$ <?php echo $total; ?></strong></td>  
        <td></td>  
        
      </tr>
      <?php
    }
    ?>
    
  </table>
  
  
  
  
  
  
  
  
  
</body>
</html>