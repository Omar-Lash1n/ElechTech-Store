<?php
// Include database connection file
include('server.php');

// Initialize variables for form data and error messages
$name = $email = $phone = $message = "";
$successMsg = $errorMsg = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize it
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

    // Insert data into the contactus table
    $sql = "INSERT INTO contactus (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($db, $sql)) {
        $successMsg = "Message sent successfully!";
    } else {
        $errorMsg = "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    // Close the database connection
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="../CSS/ContactUs.css">
    <title>Contact Us</title>
</head>

<body>
    <!-- Main Header in all pages -->
    <div class="header-pict">
        <header>
            <nav class="nav-elements">
                <a href="../HTML/Home.html">Home</a>
                <a href="../HTML/about.html">About</a>
                <a href="../HTML/products.html">Products</a>
                <a href="review.php">Reviews</a>
                <a href="contactus.php">Contact Us</a>
                <a href="../php/login.php" class="Logoutlink">Logout</a>

                <label class="switch">
                    <input type="checkbox" id="mode-toggle">
                    <span class="slider"></span>
                </label>
            </nav>
        </header>
        <!-- End Header -->

        <!-- Start the contact us page -->
        <center>
            <h1 class="contactus-header">Contact Us</h1>
            <p class="header-paragraph">How we can help you?</p>
            <div class="line"></div>
            <br>
            <form class="Container-of-all-items" method="POST" action="ContactUs.php">
                <br><br>
                <?php if ($successMsg): ?>
                    <p class="success"><?php echo $successMsg; ?></p>
                <?php endif; ?>
                <?php if ($errorMsg): ?>
                    <p class="error"><?php echo $errorMsg; ?></p>
                <?php endif; ?>
                <div class="labels-and-textFields">
                    <label for="Name">Name:</label>
                    <input type="text" id="Name" placeholder="Enter your Name" required name="name">
                </div>
                <br>
                <div class="labels-and-textFields">
                    <label for="Email">Email:</label>
                    <input type="email" id="Email" placeholder="Enter your Email" required name="email">
                </div>
                <br>
                <div class="labels-and-textFields">
                    <label for="telephone">Phone:</label>
                    <input type="tel" id="telephone" placeholder="Enter your Phone" name="phone">
                </div>
                <br>
                <div>
                    <textarea name="message" id="textarea" cols="30" rows="10" placeholder="Write something here ..."></textarea>
                </div>
                <br>
                <div class="submit-button">
                    <input type="submit" value="SUBMIT">
                </div>
                <br>
                <div class="icons">
                    <img src="../Media/icons/facebook.png" alt="facebook" title="To facebook">
                    <img src="../Media/icons/instagram.png" alt="instagram" title="To instagram">
                    <img src="../Media/icons/twitter.png" alt="twitter" title="To twitter">
                    <img src="../Media/icons/youtube.png" alt="youtube" title="To youtube">
                </div>
                <br>
            </form>
            <br>
            <div class="line"></div>
            <br><br>
        </center>
        <!-- End of Form -->

        <!-- Footer -->
        <footer>
            <div class="footer">
                <div class="footer-header">
                    <h1>ElecTech</h1>
                    <p>Lorem ipsum dolor sit amet consectetur </p>
                </div>
                <div class="all-links-container">
                    <div class="navs1">
                        <h3 class="QuickLinks-header">Quick Links</h3>
                        <ul>
                            <li><a href="/HTML/Home.html">Home</a></li>
                            <li><a href="/HTML/products.html">Products</a></li>
                            <li><a href="/HTML/Reviews.html">Reviews</a></li>
                            <li><a href="/HTML/about.html">About</a></li>
                            <li><a href="/HTML/ContactUs.html">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="navs2">
                        <h3>Other Links</h3>
                        <ul>
                            <li><a href="#">Where we are?</a></li>
                            <li><a href="#">Video</a></li>
                            <li><a href="#">Our Features</a></li>
                            <li><a href="#">Cart</a></li>
                            <li><a href="#">Whilst</a></li>
                        </ul>
                    </div>
                    <div class="navs2">
                        <h3>Other Links</h3>
                        <ul>
                            <li><a href="#">Where we are?</a></li>
                            <li><a href="#">Video</a></li>
                            <li><a href="#">Our Features</a></li>
                            <li><a href="#">Cart</a></li>
                            <li><a href="#">Whilst</a></li>
                        </ul>
                    </div>
                    <div class="Others">
                        <h3>Others</h3>
                        <div class="icons2">
                            <img src="../Media/icons/location-pin.png" alt="">
                            <p>203 fake street. Mountain View,</p>
                            <p>Cairo, Sheikh-Zayed,</p>
                            <p>EGY</p>
                        </div>
                        <div class="icons2">
                            <img src="../Media/icons/phone-call (2).png" alt="">
                            <a href="#">+20 0100 654 2452</a>
                        </div>
                        <div class="icons2">
                            <img src="../Media/icons/email (1).png" alt="">
                            <a href="mailto:recipient@example.com">info@gmail.com</a>
                            <!-- <a href="#">info@gmail.com</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <p id="reserved">&copy; 2024 ELECHTECH. All rights reserved.</p>
        </footer>
        <button class="SCROLLbutton" id="scrollToTopBtn">
            <svg class="svgIcon" viewBox="0 0 384 512">
                <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"></path>
            </svg>
        </button>
        <script src="../JS/darkMode.js"></script>
    </div>
</body>

</html>