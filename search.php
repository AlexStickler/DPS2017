<!DOCTYPE HTML>
<html lang="en">
  <meta charset="utf-8">
<head>
  <title>Hayes Funeral Home Ledgers</title>
  <!-- Link to the search page stylesheet -->
  <link type="text/css" media="all" rel="stylesheet" href="index.css" />
</head>

<body>
  <header>
    <div id="banner">
      <!-- Header that you'll see on every page -->
      <h1>HAYES FUNERAL HOME LEDGERS</h1>
      <h3>(1902) - (1950)</h3>
    </div>
    <nav id="navbar">
    <!-- Navigation bar that you'll see on every page -->
    <!-- Note which link is given the class "active" -->
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a class="active" href="search.html">Search</a></li>
        <li><a href="browse.html">Browse</a></li>
        <li><a href="#">Explore</a></li>
        <li><a href="#">Map</a></li>
      </ul>
    </nav>
  </header>

  <br><br><br><br><br><br><br><br><br>

    <?php

    $name_first=$_GET['name_first'];
    $name_middle=$_GET['name_middle'];
    $name_last=$_GET['name_last'];
    $interment_at=$_GET['interment_at'];
    $cause_of_death=$_GET['cause_of_death'];
    $age_years=$_GET['age_years'];
    $occupation=$_GET['occupation'];
    $certifying_physician=$_GET['certifying_physician'];
    $marriage_status=$_GET['marriage_status'];
    $date_of_death=$_GET['date_of_death'];
    $date_of_funeral=$_GET['date_of_funeral'];
    $place_of_death=$_GET['place_of_death'];
    $total_footing_of_bill=$_GET['total_footing_of_bill'];
    $charge_to=$_GET['charge_to'];

    $servername = "localhost";
    $username = "ernest";
    $password = "xroads66";
    $dbname = "hayesLedgers";

    //Creating connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Checking connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Create sql query to get results based on input ordered by age lowest to highest
    $sql = "SELECT * FROM l1 WHERE name_first LIKE '%$name_first%' AND name_middle LIKE
        '%$name_middle%' AND name_last LIKE '%$name_last%' AND interment_at LIKE '%$interment_at%'
        AND cause_of_death LIKE '%$cause_of_death%' AND age_years LIKE '%$age_years%' AND occupation LIKE
        '%$occupation%' AND certifying_physician LIKE '%$certifying_physician%' AND marriage_status LIKE
        '%$marriage_status%' AND date_of_death LIKE '%$date_of_death%' AND date_of_funeral LIKE
        '%$date_of_funeral%' AND place_of_death LIKE '%$place_of_death%' AND total_footing_of_bill LIKE
        '%$total_footing_of_bill%' AND charge_to LIKE '%$charge_to%' ORDER BY age_years ASC";

    //result = connection to the database w/ query as input
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        //Print out table, with headers of each searchable category
        echo "<table>
                 <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Cemetery</th>
                    <th>Cause Of Death</th>
                    <th>Age</th>
                    <th>Occupation</th>
                    <th>Name Of Physician</th>
                    <th>Marital Status</th>
                    <th>Date Of Death</th>
                    <th>Date Of Funeral</th>
                    <th>Location Of Death</th>
                    <th>Total Cost</th>
                    <th><Charged To</th>
                 </tr>";

        while($row = $result->fetch_assoc()) {
            echo
                "<tr>
                    <td>".$row["name_first"]."</td>
                    <td>".$row["name_middle"]."</td>
                    <td>".$row["name_last"]."</td>
                    <td>".$row["interment_at"]."</td>
                    <td>".$row["cause_of_death"]."</td>
                    <td>".$row["age_years"]."</td>
                    <td>".$row["occupation"]."</td>
                    <td>".$row["certifying_physician"]."</td>
                    <td>".$row["marriage_status"]."</td>
                    <td>".$row["date_of_death"]."</td>
                    <td>".$row["date_of_funeral"]."</td>
                    <td>".$row["place_of_death"]."</td>
                    <td>".$row["total_footing_of_bill"]."</td>
                    <td>".$row["charge_to"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</body>
</html>
