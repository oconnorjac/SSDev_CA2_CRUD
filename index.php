<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(
        INPUT_GET,
        'category_id',
        FILTER_VALIDATE_INT
    );
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get products for selected category
$queryProducts = "SELECT * FROM products
WHERE categoryID = :category_id
ORDER BY productID";
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1 class="pageTitle">Our Products</h1>

    <aside>
        <!-- display a list of categories -->
        <h2></h2>
        <nav>
            <ul>
            <li><a href="add_product_form.php">Add Product</a></li>
                <?php foreach ($categories as $category) : ?>
                    <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li><a href="category_list.php">Categories</a></li>
                <li><a href="register_customer_form.php">Register</a></li>
                <li><a href="view_orders.php">Orders</a></li>
            </ul>
        </nav>
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>DateAdded</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><img src="image_uploads/<?php echo $product['image']; ?>" width="100px" height="100px" /></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['stock']; ?></td>
                    <td><?php echo $product['dateAdded']; ?></td>
                    <td>
                        <form action="delete_product.php" method="post" id="delete_product_form">
                            <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="edit_product_form.php" method="post" id="delete_product_form">
                            <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <?php
    include('includes/footer.php');
    ?>