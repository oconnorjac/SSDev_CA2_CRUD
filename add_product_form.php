<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */

echo 'Congratulations! You are logged in!';

require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1 class="pageTitle">Add Product</h1>
        <form action="add_product.php" method="post" enctype="multipart/form-data"
              id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
                <option value="" disabled selected>Choose Category</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>" required>
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            
            <br>
            <label>Name:</label>
            <input type="input" name="name" id="name" placeholder="Product Name" pattern="^[a-zA-Z0-9-\s\&]{0,50}$" required onkeypress="name_validation();">
            <span id="name_message"></span>
            <br>

            <label>Price:</label>
            <input type="input" name="price" id="price" placeholder="Price" min=1 pattern="[0-9]*[.]?[0-9]+" required onkeypress="price_valdation();">
            <span id="price_message"></span>
            <br>   
            
            <label>Stock:</label>
            <input type="number" min=0 name="stock" id="num" placeholder="Available Stock" required onkeypress="number_valdation();">
            <span id="num_message"></span>
            <br> 
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" required />
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Product">
            <br>
        </form>
    <?php
include('includes/footer.php');
?>