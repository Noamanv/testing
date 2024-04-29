<?php
// Database connection details
$host = 'your_database_host';
$username = 'your_database_username';
$password = 'your_database_password';
$database = 'your_database_name';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch records from the "sample" table
$sql = "SELECT name, originalName FROM sample";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Records</title>
</head>
<body>

<h2>Records from Sample Table</h2>

<?php if ($result->num_rows > 0): ?>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Original Name</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['originalName']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No records found in the "sample" table.</p>
<?php endif; ?>

</body>
</html>
