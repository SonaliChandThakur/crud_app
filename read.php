<?php include 'templates/header.php'; ?>

<div class="form-box">
    <div class="login-container">
        <header>View Records</header>
        <?php
        include 'db.php';

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table style='width: 100%; margin-top: 20px; color: #fff;'>";
            echo "<tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Second Name</th>
                    <th>Mobile Number</th>
                    <th>Country</th>
                    <th>Gender</th>
                    <th>Actions</th>
                  </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['second_name']}</td>
                        <td>{$row['mobile_number']}</td>
                        <td>{$row['country']}</td>
                        <td>{$row['gender']}</td>
                        <td>
                            <a href='update.php?id={$row['id']}' style='color: #00f;'>Edit</a> |
                            <a href='delete.php?id={$row['id']}' style='color: #f00;' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align: center; color: #fff;'>No records found.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
