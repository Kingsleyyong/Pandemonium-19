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
            color: #e4d9ff;
            font-size: 40px;
            margin-top: 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container m-4">
        <div class="row">
            <div class="col rounded admincolbg m-4 p-3">
                <a href="">
                    <div class="container">
                        <img src="../assets/admin/buletin.png" height="150px" class="mx-auto d-block" alt="">
                        <h2>Manage Buletin</h2>
                    </div>
                </a>
            </div>
            <div class="col rounded admincolbg m-4 p-3">
                <a href="">
                    <div class="container">
                        <img src="../assets/admin/product.png" height="150px" class="mx-auto d-block" alt="">
                        <h2>Manage Products</h2>
                    </div>
                </a>
            </div>
            <div class="col rounded admincolbg m-4 p-3">
                <a href="">
                    <div class="container">
                        <img src="../assets/admin/sales-report.png" height="150px" class="mx-auto d-block" alt="">
                        <h2>Print Sales Report</h2>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col rounded admincolbg m-4 p-3">
                <a href="manage testimonial.php">
                    <div class="container">
                        <img src="../assets/admin/testimonials.png" height="150px" class="mx-auto d-block" alt="">
                        <h2>Manage Testimonials</h2>
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
            <div class="col rounded admincolbg m-4 p-3">
                <a href="user_management.php">
                    <div class="container">
                        <img src="../assets/admin/users.png" height="150px" class="mx-auto d-block" alt="">
                        <h2>Manage Users</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>