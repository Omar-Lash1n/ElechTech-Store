<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="../CSS/Reviews.css">
    <title>Customers Reviews</title>
</head>

<body>

    <div class="header-pict">
        <header>
            <nav class="nav-elements">
                <a href="../HTML/Home.html">Home</a>
                <a href="../HTML/about.html">About</a>
                <a href="../HTML/products.html">Products</a>
                <a href="review.php">Reviews</a>
                <a href="contactus.php">ContactUs</a>
                <a href="login.php">Logout</a>

                <label class="switch">
                    <input type="checkbox" id="mode-toggle">
                    <span class="slider"></span>
                </label>

            </nav>
        </header>
        <main>
        
        <h1>Give Us Your Opinion</h1>
            <br>
            <div class="line"></div>
            <br>
            <section class="submit-review">
                <form action="review.php" method="post">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" required><br><br>
                    <label for="opinion">Opinion:</label><br>
                    <textarea id="opinion" name="opinion" required></textarea><br><br>
                    <label for="rating">Rating:</label><br>
                    <select id="rating" name="rating" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br><br>
                    <input type="submit" name="submit_review" value="Submit">
                </form>
            </section>
            <h1>Customer Reviews</h1>
            <p id="header-paragraph">Our Customer's opinion about what we do ..</p>
            <br>
            <br>
            <div class="line"></div>
            <br>
            <section class="reviews-container">
                <div class="reviews">
                    <?php
                    $sql = "SELECT name, opinon, rating FROM reviews";
                    $result = mysqli_query($db, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="review">';
                            echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                            echo '<p>"' . htmlspecialchars($row['opinon']) . '"</p>';
                            echo '<div class="rating">';
                            for ($i = 0; $i < $row['rating']; $i++) {
                                echo '<span class="star">&#9733;</span>';
                            }
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No reviews found.</p>';
                    }
                    ?>
                </div>
            </section>
            <br>
            <div class="line"></div>
            <br>
            <p id="our-message">At ELECHTEC, we believe in providing our customers with the best possible experience.
                This includes offering top-quality electronics you can trust. However, we also understand that no product is
                perfect, and sometimes, real-world use can reveal unexpected details. That's why we value honest customer
                reviews. We encourage you to share your experiences, both positive and negative, to help others make
                informed decisions. After all, transparency builds trust and trust is what keeps us moving forward.</p>
        </main>

        <footer>
            <p>&copy; 2024 ElechTech. All rights reserved.</p>
        </footer>
        <button class="SCROLLbutton" id="scrollToTopBtn">
      <svg class="svgIcon" viewBox="0 0 384 512">
        <path
          d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
        ></path>
      </svg>
    </button>
    
        <script src="../JS/darkmode.js"></script>
</body>

</html>
