<?php
include("data_connection.php");

if(isset($_POST["Submission"]))
{
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone"];
    $message = $_POST["message"];

    $info = "INSERT INTO contact_personal_details (first_name, last_name, phone_num, email, message)
            values ('$first_name', '$last_name', '$phone_number', '$email', '$message')";

    if ($result = mysqli_query($conn, $info))
    {
        ?>
        <script type="text/javascript">
            alert("Thank You " + "<?php echo $first_name?>" + " for responding!");
        </script>
        <?php
    }
}
?>