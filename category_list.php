<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
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
    <h2>Category List</h2>
    <table class="cat_table">
        <tr>
            <th>Category</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="delete_category.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" value="Delete" class="deleteButton">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h3>Add Category</h3>
    <form action="add_category.php" method="post"
          id="add_product_form">
        <input type="input" name="name" id="category" pattern="^[a-zA-Z-\s\&]{0,15}$" onkeypress="addCat_validation();">
        <span id="cat_message"></span>
        <input id="add_category_button" type="submit" value="Add">
    </form>
    <br>

    <?php
include('includes/backToHome.php');
include('includes/footer.php');
?>