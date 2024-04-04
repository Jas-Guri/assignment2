
<?php
require_once "config.php";

$page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal for A&W Database-Driven Web Application</title>
    <link rel="stylesheet" href="stylee.css">
</head>

<body>
    <header>
        <nav>
            <img src="download.jpeg" alt="A&W Logo">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#form_elements.html">Customize Your Order</a></li>
                <li><a href="#contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h1>Welcome to A&W's Online ordering platform.</h1>
            <p>Explore a wide range of products available for purchase on our platform. Discover exciting deals and order conveniently from the comfort of your home.</p>
        </section>

        <section id="Products">
            <h2>Our Menu </h2>
            <div class="container">
                <ul>
                    <li><a href="create.php">Add New items</a></li>
                </ul>
            </div>
            <?php
            $query = "SELECT * FROM products";
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0) :
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td>
                                    <a href="read.php?id=<?php echo $row['id']; ?>" title="View Product">View</a>
                                    <a href="update.php?id=<?php echo $row['id']; ?>" title="Update Product">Update</a>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" title="Delete Product">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No products found.</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>
