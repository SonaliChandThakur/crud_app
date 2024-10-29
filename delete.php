<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record
    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Re-sequence IDs
        $conn->query("SET @count = 0;");
        $conn->query("UPDATE users SET id = @count:= @count + 1;");
        $conn->query("ALTER TABLE users AUTO_INCREMENT = 1;"); // Reset AUTO_INCREMENT to max + 1

        echo "<p>Record deleted and IDs re-sequenced successfully.</p>";
        header("Location: read.php"); // Redirect to the read page
        exit();
    } else {
        echo "<p>Error deleting record: " . $conn->error . "</p>";
    }

    $conn->close();
} else {
    echo "<p>No ID provided</p>";
}
?>

