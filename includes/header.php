<!-- the head section -->

<head>
    <title>My PHP CRUD App</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
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
                <a href="index.php">Home</a>
                <a href="add_product_form.php">AddProduct</a>
                <a href="manage_products.php">ManageProducts</a>
                <a href="category_list.php">EditCategories</a>
                <a href="view_orders.php">ViewOrders</a>
                <a href="add_order_form.php">OrderProduct</a>
                <a href="contact.php">Contact</a>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>