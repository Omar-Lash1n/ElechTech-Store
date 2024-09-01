<?php
session_start();

$username = "";
$email = "";
$mobile = "";
$errors = array();


$db = mysqli_connect('localhost', 'root', '', 'project');



if (isset($_POST['signupbutton'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    if (empty($username)) {
        array_push($errors, "USERNAME is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($mobile)) {
        array_push($errors, "Mobile is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }


    $userCheckQuery = "SELECT * FROM signup WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($db, $userCheckQuery);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "USERNAME is already exist");
        }
        if ($user['email'] === $email) {
            array_push($errors, "Email is already exist");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "INSERT INTO signup(username,email,password,mobile) VALUES('$username','$email','$password','$mobile')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You Are Logged in";
        header('Location: login.php');
    }
}

// Check if the form is submitted
if (isset($_POST['submit_review'])) {
    // Get the form data
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $opinion = mysqli_real_escape_string($db, $_POST['opinion']);
    $rating = mysqli_real_escape_string($db, $_POST['rating']);

    // Insert the data into the database
    $query = "INSERT INTO reviews (name, opinon, rating) VALUES ('$name', '$opinion', '$rating')";
    mysqli_query($db, $query);

    // Redirect to the same page to see the new review
    header('location: review.php');
}

//LOGIN USER

// if (isset($_POST['loginbutton'])) {
//     $username = mysqli_real_escape_string($db, $_POST['username']);
//     $password = mysqli_real_escape_string($db, $_POST['password']);

//     if (empty($username)) {
//         array_push($errors, "USERNAME is required");
//     }

//     if (empty($password)) {
//         array_push($errors, "Password is required");
//     }

//     if (count($errors) == 0) {
//         $password = md5($password);
//         $query = "SELECT * FROM signup WHERE username = '$username' AND password='$password'";
//         $result = mysqli_query($db, $query);
//         if ($result) {
//         if (mysqli_num_rows($result) == 1) {
//             $user = mysqli_fetch_assoc($result);
//             // if (password_verify($password, $user['password'])) {
//             //     $_SESSION['username'] = $username;
//             //     header('Location: ../HTML/Home.html');
//             // } 

//             $_SESSION['username'] = $username;
//                 header('Location: ../HTML/Home.html');
//                 exit();
//             }
//             else {
//                 array_push($errors, "Wrong username or password");
//             }
//         } 
//         else {
//             array_push($errors, "Wrong username or password");
//         }
//     }


// }

// LOGIN USER
if (isset($_POST['loginbutton'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // التحقق من إدخال اسم المستخدم وكلمة المرور
    if (empty($username)) {
        array_push($errors, "USERNAME is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // إذا لم تكن هناك أخطاء
    if (count($errors) == 0) {
        $password = md5($password); // تأكد أن التشفير يتطابق مع التشفير عند التسجيل
        $query = "SELECT * FROM signup WHERE username = '$username' AND password='$password'";
        $result = mysqli_query($db, $query);


        if (mysqli_num_rows($result) == 1) {
            $user = $result->fetch_assoc();
            $_SESSION['username'] = $username;
            header('Location: ../HTML/Home.html');
        } else {
            array_push($errors, "Wrong username or password");
        }
    } else {
        array_push($errors, "Database query failed: " . mysqli_error($db));
    }
}
