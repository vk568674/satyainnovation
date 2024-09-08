<!DOCTYPE html>
<html>
<head>
    <title>Fetch Information</title>
    <style>
        table { 
            font-family: sans-serif;
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            
        }
 
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Fetch Information</h2>

    <?php
    // Database connection settings
    $host = 'localhost';
    $username = 'u362815274_root'; // Change this to your MySQL username
    $password = 'Yash@281307'; // Change this to your MySQL password    /// password is Yash@281307
    $db = 'u362815274_my'; // Change this to your MySQL database name

    // Create connection
    $conn = mysqli_connect($host, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Select data from the database
    $sql = "SELECT * FROM messages";
    $result = mysqli_query($conn, $sql);

    // Check if there are any records
    if (mysqli_num_rows($result) > 0) {
        // Output table header
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found";
    }

    // Close connection
    mysqli_close($conn);
    ?>
</body>
</html>
