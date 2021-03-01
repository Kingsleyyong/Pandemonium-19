<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu | Pandemonium-19</title>
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .admincolbg {
            background-color: #8369C2;
        }
        .admincolbg:hover {
            background-color: #5C35BC;
        }
        h2 {
            color: #e4d9ff !important; 
            font-size: 40px;
            margin-top: 15px;
            text-decoration: none;
        }
    </style>

    <!-- NAV UI Import here -->
    <?php require("adminNav.php"); ?> 
</head>
<body class="bg-dark text-light">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col rounded admincolbg m-4 p-3">
                <a href="user_management.php">
                    <div class="container">
                        <img src="../assets/admin/users.png" height="150px" class="mx-auto d-block" alt="">
                        <h2>Manage User</h2>
                    </div>
                </a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col rounded admincolbg m-4 p-3">
                <a href="manageProduct.php">
                    <div class="container">
                        <img src="../assets/admin/testimonials.png" height="150px" class="mx-auto d-block" alt="">
                        <h2>Manage Product</h2>
                    </div>
                </a>
            </div>
            <div class="col rounded admincolbg m-4 p-3">
                <a href="manage testimonial.php">
                    <div class="container">
                        <img src="../assets/admin/feedback.png" height="150px" class="mx-auto d-block" alt="">
                        <h2>Manage Testimonial</h2>
                    </div>
                </a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col rounded admincolbg m-4 p-3">
                <a href="Contact List.php">
                    <div class="container">
                        <img src="../assets/admin/testimonials.png" height="150px" class="mx-auto d-block" alt="">
                        <h2>Contact Us List</h2>
                    </div>
                </a>
            </div>
            <div class="col rounded admincolbg m-4 p-3">
                <a href="feedback(admin).php">
                    <div class="container">
                        <img src="../assets/admin/feedback.png" height="150px" class="mx-auto d-block" alt="">
                        <h2>Print Feedback</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>