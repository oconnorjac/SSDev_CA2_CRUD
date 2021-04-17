<!-- the head section -->
<head>
    <title>WackyBone</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>

    <script>
        $(function() {
            var current = location.pathname;
            $('#nav div a').each(function() {
                var $this = $(this);
                // if the current path is like this link, make it active
                if ($this.attr('href').indexOf(current) !== -1) {
                    $this.addClass('active');
                }
            })
        })
    </script>

</head>

<!-- the body section -->

<body>
    <header>
        <h1><a href="index.php">WackyBone<img src=".\images\paw.png" alt="paw logo" width="100" height="100"></a></h1>

        <nav>
            <div class="topnav">
                <?php

                if (isset($_SESSION['logged_in'])) {
                    $message = "Hi " . $_SESSION['user_id'];
                } else {
                    $message = "";
                    echo "<a class=\"active\" href=\"login.php\">Login</a>";
                }

                if (isset($_SESSION['logged_in'])) {
                    echo "<a class=\"active\" href=\"logout.php\">Logout</a>";
                }

                echo "<a href=\"index.php\">Home</a>";

                if (isset($_SESSION['level']) && $_SESSION['level'] > 0 ) {
                    echo "<a href=\"add_order_form.php\">Add Order</a>";
                    echo "<a href=\"add_product_form.php\">Add Product</a>";
                    echo "<a href=\"manage_products.php\">Manage Products</a>";
                    echo "<a href=\"category_list.php\">Manage Categories</a>";
                    echo "<a href=\"view_orders.php\">Manage Orders</a>";
                }
                
                if(isset($_SESSION['logged_in']) && $_SESSION['level'] == 0)
                {
                    echo "<a href=\"edit_customer_form.php\">My Details</a>";
                    echo "<a href=\"make_an_order.php\">Order</a>";
                }

                if (!isset($_SESSION['logged_in'])) {
                    echo "<a href=\"register.php\">Register</a>";
                }

                if(!(isset($_SESSION['level']) && $_SESSION['level'] > 0 ))
                {
                    echo "<a href=\"contact.php\">Contact</a>";
                }
                ?>
            </div>
        </nav>
        <?php
        echo "<span> $message </span>";
        ##print_r($_SESSION);
        ?>
    </header>