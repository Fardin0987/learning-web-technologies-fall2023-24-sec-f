<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $searchValue = $_GET['search'];

    $sql = "SELECT * FROM employees WHERE employee_name LIKE '%$searchValue%' OR contact_no LIKE '%$searchValue%' OR username LIKE '%$searchValue%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Username</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['employee_name']."</td>
                    <td>".$row['contact_no']."</td>
                    <td>".$row['username']."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No results found";
    }
} else {
    echo "Invalid request";
}
?>
