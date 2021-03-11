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

$query2 = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement2 = $db->prepare($query2);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

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
            <input type="input" name="name" pattern="^[a-zA-Z0-9-\s\&]{0,50}$" required onkeypress="name_validation();"
                   value="<?php echo $products['name']; ?>">
            <span id="name_message"></span>       
            <br>

            <label>Price:</label>
            <input type="input" name="price" min=1 pattern="[0-9]*[.]?[0-9]+" required onkeypress="price_valdation();"
                   value="<?php echo $products['price']; ?>">
            <span id="price_message"></span>       
            <br>

            <label>Stock:</label>
            <input type="number" min=0 name="stock" min=0 required onkeypress="number_valdation();"
                   value="<?php echo $products['stock']; ?>">
            <span id="num_message"></span>       
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
    <?php
include('includes/backToHome.php');
include('includes/footer.php');
?>