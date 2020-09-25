<?php
    include_once './includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Darkyne | Home</title>
    </head>

    <body>
        <p>Pulls the latest 3 entries in database in descending order</p>
        <ul class="flex-list">
            <?php 
                $sql = "SELECT * FROM projects ORDER BY idProjects DESC LIMIT 3;";
                $result = mysqli_query($connection, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<li class='flex-item'>";
                        echo "<h2>" . $row['ProjectName'] . "</h2>";
                        echo "<a target='_blank' href='" . $row['ProjectURL'] . "'>Github/" . $row['ProjectName'] . "</a>";
                        echo "<p class='flex-bottom'>" . "created on " . $row['CreatedOn'] . "</p>";
                        echo "</li>";
                    }
                }
            ?>
        </ul>

        <?php include_once './components/navigation/navigation.php' ?>
    </body>
</html>