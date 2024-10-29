<?php include 'templates/header.php'; ?>

<?php
include 'db.php';

// Check if ID is set and fetch the existing record
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>Record not found.</p>";
        exit();
    }
}

// Handle form submission for updating the record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $mobile_number = $_POST['mobile_number'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];

    $sql = "UPDATE users SET first_name='$first_name', second_name='$second_name', mobile_number='$mobile_number', country='$country', gender='$gender' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Record updated successfully</p>";
        header("Location: read.php"); // Redirect to display page after updating
        exit();
    } else {
        echo "<p>Error updating record: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>

<div class="form-box">
    <div class="login-container">
        <header>Update Record</header>
        <form action="" method="post">
            <div class="input-box">
                <input type="text" name="first_name" class="input-field" value="<?php echo $row['first_name']; ?>" placeholder="First Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="second_name" class="input-field" value="<?php echo $row['second_name']; ?>" placeholder="Second Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="mobile_number" class="input-field" value="<?php echo $row['mobile_number']; ?>" placeholder="Mobile Number" required>
            </div>
            <div class="input-box">
                <input type="text" name="country" class="input-field" value="<?php echo $row['country']; ?>" placeholder="Country" required>
            </div>
            <div class="input-box" style="margin-top: 15px;">
                <label style="color: #fff; font-size: 1em; padding-right: 10px;">Gender:</label>
                <input type="radio" id="male" name="gender" value="Male" <?php if ($row['gender'] == 'Male') echo 'checked'; ?>>
                <label for="male" style="color: #fff; padding-right: 10px;">Male</label>
                <input type="radio" id="female" name="gender" value="Female" <?php if ($row['gender'] == 'Female') echo 'checked'; ?>>
                <label for="female" style="color: #fff; padding-right: 10px;">Female</label>
                <input type="radio" id="other" name="gender" value="Other" <?php if ($row['gender'] == 'Other') echo 'checked'; ?>>
                <label for="other" style="color: #fff;">Other</label>
            </div>
            <div style="margin-top: 20px;">
                <input type="submit" value="Update" class="submit">
            </div>
        </form>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
