<?php include 'templates/header.php'; ?>

<div class="form-box">
    <div class="login-container">
        <header><center>Create New Record</center></header><br>
        <form action="create.php" method="post">
            <div class="input-box">
                <input type="text" name="first_name" class="input-field" placeholder="First Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="second_name" class="input-field" placeholder="Last Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="mobile_number" class="input-field" placeholder="Mobile Number" required>
            </div>
            <div class="input-box">
                <input type="text" name="country" class="input-field" placeholder="Country" required>
            </div>
            <div class="input-box" style="margin-top: 15px;">
                <label style="color: #fff; font-size: 1em; padding-right: 10px;">Gender:</label>
                <input type="radio" id="male" name="gender" value="Male" required>
                <label for="male" style="color: #fff; padding-right: 10px;">Male</label>
                <input type="radio" id="female" name="gender" value="Female">
                <label for="female" style="color: #fff; padding-right: 10px;">Female</label>
                <input type="radio" id="other" name="gender" value="Other">
                <label for="other" style="color: #fff;">Other</label>
            </div>
            <div style="margin-top: 20px;">
                <input type="submit" value="Create" class="submit">
            </div>
        </form>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';

    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $mobile_number = $_POST['mobile_number'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO users (first_name, second_name, mobile_number, country, gender) VALUES ('$first_name', '$second_name', '$mobile_number', '$country', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: #fff; text-align: center;'>Record created successfully</p>";
    } else {
        echo "<p style='color: #fff; text-align: center;'>Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>

<?php include 'templates/footer.php'; ?>
