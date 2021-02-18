<?php
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
        <h1>Add Product</h1>
        <form action="add_product.php" method="post" enctype="multipart/form-data"
              id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Name:</label>
            <input type="input" name="name">
            <br>

            <label>List Price:</label>
            <input type="input" name="price">
            <br>   
            
            <label>Stock:</label>
            <input type="input" name="stock">
            <br> 
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Product">
            <br>
        </form>
        <p><a href="index.php">Back to home</a></p>
    <?php
include('includes/footer.php');
?>