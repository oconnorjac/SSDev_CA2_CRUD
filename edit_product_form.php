<?php
require('database.php');

$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM products
          WHERE productID = :product_id';
$statement = $db->prepare($query);
$statement->bindValue(':product_id', $product_id);
$statement->execute();
$products = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Product</h1>
        <form action="edit_product.php" method="post" enctype="multipart/form-data"
              id="add_product_form">
            <input type="hidden" name="original_image" value="<?php echo $products['image']; ?>" />
            <input type="hidden" name="product_id"
                   value="<?php echo $products['productID']; ?>">

            <label>Category ID:</label>
            <input type="category_id" name="category_id"
                   value="<?php echo $products['categoryID']; ?>">
            <br>

            <label>Name:</label>
            <input type="input" name="name"
                   value="<?php echo $products['name']; ?>">
            <br>

            <label>Price:</label>
            <input type="input" name="price"
                   value="<?php echo $products['price']; ?>">
            <br>

            <label>Stock:</label>
            <input type="input" name="stock"
                   value="<?php echo $products['stock']; ?>">
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>            
            <?php if ($products['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $products['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>