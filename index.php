<?php
/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
/*if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}*/

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

    <aside>
        <nav>
            <ul>
                <li>Browse By Category</li>
                <ul>
                    <?php foreach ($categories as $category) : ?>
                        <li><a href="?category_id=<?php echo $category['categoryID']; ?>">
                                <?php echo $category['categoryName']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </ul>
        </nav>
    </aside>

    <section>
        <!-- display a table of products -->
        <h2 class="pageTitle"><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>DateAdded</th>
                <th>Buy</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><img src="image_uploads/<?php echo $product['image']; ?>" width="100px" height="100px" /></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['stock']; ?></td>
                    <td><?php echo $product['dateAdded']; ?></td>
                    <td>
                        <form action="buy_product.php" method="post" id="delete_product_form">
                            <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>">
                            <input type="checkbox" value="checkbox">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <?php
    include('includes/footer.php');
    ?>