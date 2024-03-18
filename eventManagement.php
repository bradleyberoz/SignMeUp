<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SignMeUp - Event Management - Admin Home</title>
    
    	<?php include("includes/head.php"); ?>
    	<style>
    	    ol {
    	        margin: 0;
    	        padding: 0;
    	    }
    	    ol li {
    	        margin-left: 25px;
    	    }
    	</style>
    
    </head>
    <body>
        <header>
           <?php include("includes/nav.php"); ?>
        </header>
        <main role="main" class="container" >
    	    <h3>Admin Home - Event Management</h3>
    	    
    	    <?php
            
            $usersDB = new mysqli("localhost", "beroz_admin", "121094Geffie002@@", "beroz_SignMeUp");
            if(mysqli_connect_errno()){
                echo "User Connection Error:".mysqli_connect_errno();
            } 
            
            $sql = "SELECT Events.id AS event_id, Events.name AS event_name, Events.location AS event_location, Events.date AS event_date, Events.time AS event_time, Participants.id AS participant_id, Users.first AS user_first, Users.last AS user_last, Users.email AS user_email, Users.phone AS user_phone
                FROM Events
                LEFT JOIN Participants ON Events.id = Participants.event
                LEFT JOIN Users ON Participants.user = Users.id
                ORDER BY Events.date, Events.time, Users.last";
            
            $result = $usersDB->query($sql);
            
            $currEvent = null;
            while ($row = $result->fetch_assoc()) {
                // If it's a new event, output event details
                if ($currEvent !== $row["event_id"]) {
                    $currEvent = $row["event_id"];
                    echo "<br>";
                    echo "<hr>";
                    echo "<div>";
                    echo "<h2>{$row['event_name']}</h2>";
                    echo "<p><strong>Scheduled:</strong> {$row['event_date']} @ {$row['event_time']}</p>";
                    echo "<p><strong>Location:</strong> {$row['event_location']}</p>";
                    echo "<ol><strong>Participants:</strong> ";
                }
        
                // Output participant details
                echo "<li>{$row['user_last']}, {$row['user_first']} - <a href='mailto:{$row['user_email']}'>{$row['user_email']}</a> | {$row['user_phone']}</li>";
            }
            echo "</ol>";
            echo "</div>";

            
            ?>

        </main><!-- /.container -->
        <?php include("includes/footer.php"); ?>
    </body>
</html>