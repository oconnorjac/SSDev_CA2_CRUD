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
            <input type="input" name="name" placeholder="Product Name" required">
            <br>

            <label>Price:</label>
            <input type="input" name="price" placeholder="Price" min=1 pattern="[0-9]*[.]?[0-9]+" required>
            <br>   
            
            <label>Stock:</label>
            <input type="number" min=0 name="stock" placeholder="Available Stock" required>
            <br> 
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" required />
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Product">
            <br>
        </form>
    <?php
include('includes/backToHome.php');
include('includes/footer.php');
?>