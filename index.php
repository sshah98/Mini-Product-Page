<?php 

session_start();
$connection = mysqli_connect("localhost", "suraj", "", "miniproject");

//code will execute if the add to cart button is pressed
if (isset($_POST["addCart"])) {
  $quan = $_POST["quantity"];
  $name = $_POST["name"];
  
  //query to remove an item from the stock because it was added to the cart
  $query = "UPDATE productStock SET productStock.amount=productStock.amount - '$quan' WHERE productStock.name = '$name'";
  
  mysqli_query($connection, $query);
  
  
  //creates a new session shopping cart
  if (isset($_SESSION["productCart"])) {
    
    //gets the items in the shopping cart by ID and puts it in an array
    //two values, one creates a session, the other gets the data from the column I want - ids
    $itemArrayID = array($_SESSION["productCart"], "itemID");
    if (!in_array($_GET["id"], $itemArrayID)) {
      //keeps a count and then sets each value in the database to a variable in an array
      $count = count($_SESSION["productCart"]);
      $itemArray = array('id'=>$_GET["id"], 'name'=>$_POST["name"], 'price'=>$_POST["price"], 'category'=>$_POST["category"], 'quantity'=>$_POST["quantity"]);
      //keeps an indexed count in this session to keep track of how many items were added to cart
      $_SESSION["productCart"][$count] = $itemArray;
    }
  } else {
    //if there's no data, then the else block will execute
    $itemArray = array('id'=>$_GET["id"], 'name'=>$_POST["name"], 'price'=>$_POST["price"], 'category'=>$_POST["category"], 'quantity'=>$_POST["quantity"]);
    //store all the data into the itemArray array
    $_SESSION["productCart"][0] = $itemArray;
  }
}

//this action is used when the remove button is clicked
if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    //foreach sets a key to each value - that way it can iterate through all the products
    foreach ($_SESSION["productCart"] as $keys=>$values) {
      if ($values["id"] == $_GET["id"]) {
        $quan = $_GET["quantity"];
        $name = $_GET["name"];
        // updates the database and adds the quantity with the amount
        $sql = "UPDATE productStock SET productStock.amount=productStock.amount + '$quan' WHERE productStock.name = '$name'";
        mysqli_query($connection, $sql);
        
        
        if (mysqli_query($connection, $sql)) {
          echo "Records were updated successfully.";
        } else {
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        //unset removes the current item from the cart
        unset($_SESSION["productCart"][$keys]);
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
  
  <h1 align="center">Suraj's PHP Shopping Cart</h1>
  
  <h4> Using this store: Add an item to cart. When you add more than one of the same item, it will show up again. However, if you remove, it will remove all of them, because you are removing all quantity of that item. 
    <p>
      Reset stock resets the database with origal stock - 50 of each item
    </p>
    Enjoy Shopping!
  </h4>

  <h2>Current Items</h2>
  <table>
    
    <tr>
      <th colspan="3">Item</th>
      <th>Quantity</th>
      <th colspan="6">Price</th>
      <th>Category</th>
      <th colspan="9">Action</th>
    </tr>
    
    <?php
    //check if shopping cart is not empty
    if (!empty($_SESSION["productCart"])) {
      $total = 0;
      foreach ($_SESSION["productCart"] as $keys=>$values) {
        ?>
        <tr>
          <td align="center" colspan="3"><?php echo $values["name"]; ?> </td>
          <td align="center"><?php echo $values["quantity"]; ?> </td>
          <td align="center" colspan="6">$ <?php echo $values["price"]; ?> </td>
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
  
  <br/>
  <br/>
  <br/>
  
  <h2 align="center">Products</h2>

  
  <form action="" method="post">
    <input type="submit" name="reset" value="Reset Stock" />  
  </form>
  
  <?php
  if (isset($_POST["reset"])) {
    $sql = "UPDATE productStock SET amount=50";
    mysqli_query($connection, $sql);
  }
  
  ?>
  <br/>
  
  Search for a category or item here. Please use uppercase when typing (ex: Apple, Banana) or category: (technology, clothes, grocery)
  
  To show all items, please click search again.
  
  
  <!-- search action in html -->
  <form action="" method="post"> 
    <input type="text" id="search" name="search"> 
    <input type="submit" value="search"> 
  </form>
  
  
  
  
  <?php
  
  //two original queries - the if else conditional changes the query such that when search is matched, the new query is implemented
  
  $query = "SELECT * FROM productInfo ORDER BY id ASC";
  $query2 = "SELECT * FROM productStock ORDER BY id ASC";
  
  $search = $_POST["search"];
  
  //searching works by changing the orignal query to a new query, depending on
  if ($search == 'grocery' or $search == 'technology' or $search == 'clothes') {
    $query = "SELECT * FROM productInfo WHERE category LIKE '%$search%'";
  } elseif ($search == "Apple" or $search=="Banana" or $search=="Bread" or $search=="Chips" or $search== "Juice" or $search=="Milk" or $search == "Tomato" or $search == "Camera" or $search == "Headphones" or $search == "Laptop" or $search == "Phone" or $search == "Printer" or $search == "Speakers" or $search == "TV" or $search == "Hoodie" or $search == "Jacket" or $search == "Jeans" or $search == "Shirt" or $search == "Shoes" or $search == "Shorts" or $search == "Sunglasses") {
    $query = "SELECT * FROM productInfo WHERE name LIKE '%$search%'";
  } else {
    $query = "SELECT * FROM productInfo ORDER BY id ASC";
  }
  
  // get queries from both tables (one with info and one with stock amount)
  $result = mysqli_query($connection, $query);
  $result2 = mysqli_query($connection, $query2);
  
  
  //fetch all the data of the database
  while ($row = mysqli_fetch_array($result) and $row2 = mysqli_fetch_array($result2)) {
    ?>
    
    <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
      <h3>Item: <?php echo $row["name"]; ?> </h3>
      <h3>Price: $<?php echo $row["price"]; ?> </h3>
      <h3>Stock: <?php echo $row2["amount"]; ?> </h3>
      <h3>Category: <?php echo $row["category"]; ?> </h3>
      <input type="number" name="quantity" value="1" min="1" max="50"/>  
      <input type="hidden" name="category" value="<?php echo $row["category"]; ?>" />
      <!-- values are hidden because it prevents user input with category or name or price -->
      <input type="hidden" name="name" value="<?php echo $row["name"]; ?>" />  
      <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />  
      
      <input type="submit" name="addCart" value="Add to Cart" />  
      <br />
    </form>
    
    <?php
  }
  ?>     
  
  <br />
  
</body>
</html>