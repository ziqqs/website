<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'mysql.php';
        $con = $connection;
        //$con = mysqli_connect("localhost", "root", "", "simplegym");
        $result = mysqli_query($con, "SELECT * FROM tblProduct");
        echo "<h1>Shop</h1>";
        echo "<table>";
        echo "<th>Product Name</th><th>Product Image</th><th>Add to Basket</th>";
        while ($row = mysqli_fetch_array($result)){
            $pname = $row[0];
            $image = $row[1];
            echo "<tr><td>$pname</td>";
            echo "<td><img src=\"$image\" width=\"200\" height=\"150\" /></td>";
            echo "<td><form action=\"basket.php\" method=\"POST\">"
            . "<input type=\"submit\" name=\"$pname\" value=\"Add $pname to Basket\" />"
                    . "</form></td></tr>";
        }
        echo "</table>";
        mysqli_close($con);
        ?>
    </body>
</html>
