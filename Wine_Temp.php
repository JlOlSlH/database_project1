<?php
/* Template Name: Wine_Temp */
get_header(); ?>

<div id="content">
    <div class="site-aligner">
        <section class="site-main content-left" id="sitemain">
            <?php
                // Listing of credentials for login below
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "wine_listing";

                // Create Connection to the database
                $con = new mysqli($servername, $username, $password, $dbname);

                // Check Connection to make sure it is solid
                if($con === false){
                    die("ERROR: Connection could not be made..." . mysqli_connect_error());
                }

                // Get data from database.
                // Database Query
                $sql = "SELECT * FROM wine_list";
                




                // Loop and conditionals for query
                if($result = mysqli_query($con, $sql)){

                    if(mysqli_num_rows($result) > 0){
                        echo "<table>";
                            echo "<tr>";
                                echo "<th><a hrefItem Number</th>";
                                echo "<th>Bin Number</th>";
                                echo "<th>Description</th>";
                                echo "<th>Size</th>";
                                echo "<th>Category</th>";
                                echo "<th>Subcategory</th>";
                            echo "</tr>";

                        // Outputs data of the rows
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td>" . $row['COL 1'] . "</td>";
                                echo "<td>" . $row['COL 2'] . "</td>";
                                echo "<td>" . $row['COL 3'] . "</td>";
                                echo "<td>" . $row['COL 4'] . "</td>";
                                echo "<td>" . $row['COL 5'] . "</td>";
                                echo "<td>" . $row['COL 6'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";

                        // Close the results
                        mysqli_free_result($result);
                    }

                    // No results in the table were found by the SQL query.
                    else {
                        echo "No results found";
                    }
                }

                // Error in executing the SQL statement above.
                else {
                    echo "ERROR: Could not execute $SQL ..." . mysqli_error($con);
                }

                mysqli_close($con);
                
            ?>
        </section>
        <div class="sidebar_right">
        <?php get_sidebar();?>
        </div><!-- sidebar_right -->
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
	
<?php get_footer(); ?>