<?php

//Setting up Database Connection

$serverName = "ADITYA-PC";
$connectionOptions = array(
    "Database" => "COMPANY_PraKan",
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

//Checking Connection

if ($conn === false) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true));
}

//Handling GET Request

if (isset($_GET['last_name']) && !empty($_GET['last_name'])) {

 //Sanitize the Input

    $last_name = htmlspecialchars($_GET['last_name'], ENT_QUOTES, 'UTF-8');
    $last_name = str_replace("'", "''", $last_name);

//Execution the SQL Query

    $sql = "SELECT e.FNAME, e.LNAME, e.SEX, d.DNAME 
            FROM EMPLOYEE e 
            INNER JOIN DEPARTMENT d ON e.DNO = d.DNUMBER 
            WHERE e.LNAME LIKE '%$last_name%'";

    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die("Query execution error: " . print_r(sqlsrv_errors(), true));
    }

//Checking and Displaying the Query Results

    if (sqlsrv_has_rows($stmt)) {
        echo "<h2 style='text-align: center;'>Employee details with the given Last Name:</h2>";
        echo "<table style='margin: 0 auto; border-collapse: collapse; text-align: center; width: 70%;' border='1'>";
        echo "<tr style='background-color: #f2f2f2;'><th>First Name</th><th>Last Name</th><th>Sex</th><th>Department</th></tr>";
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['FNAME'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row['LNAME'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row['SEX'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row['DNAME'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>No results found.</p>";
    }

//Freeing the Resources

    sqlsrv_free_stmt($stmt);
    
//Calling the JavaScript Function to Go back

    echo "<div style='text-align: center; margin-top: 20px;'>";
    echo "<button onclick='goBack()' style='padding: 10px 20px; font-size: 16px;'>Back</button>";
    echo "</div>";
}

//Closing the Connection

sqlsrv_close($conn);
?>

<script>
    function goBack() {
        window.history.back();
    }
</script>
