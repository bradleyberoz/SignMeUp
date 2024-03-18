<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SignMeUp - Event Management - Organizer Home</title>
    
    	<?php include("includes/head.php"); ?>
    
    </head>
    <body>
        <header>
           <?php include("includes/nav.php"); ?>
        </header>
        <main role="main" class="container" >
    	    <h3>Organizer Home</h3>
    	    
    	    <?php 
            if (isset($_GET['organizer_id'])) {
                // Sanitize the organizer ID to prevent SQL injection
                $organizer_id = $_GET['organizer_id'];
        
                // Database connection
                $usersDB = new mysqli("localhost", "beroz_admin", "121094Geffie002@@", "beroz_SignMeUp");
                if(mysqli_connect_errno()){
                    echo "User Connection Error:".mysqli_connect_errno();
                }
        
                $sql = "SELECT Events.id AS event_id, Events.name AS event_name, Events.location AS event_location, Events.date AS event_date, Events.time AS event_time
                    FROM Events
                    WHERE Events.organizer = $organizer_id
                    ORDER BY Events.date, Events.time";
        
                $result = $usersDB->query($sql);
                
                if($result->num_rows == 0) {
                    echo "<p>This organizer currently has no events.</p>";
                }
        
                while ($row = $result->fetch_assoc()) {
                    echo "<h4>{$row['event_name']}</h4>";
                    echo "<p><strong>Date:</strong> {$row['event_date']}</p>";
                    echo "<p><strong>Location:</strong> {$row['event_location']}</p>";
    
                    $participants_sql = "SELECT Users.first AS user_first, Users.last AS user_last
                                        FROM Participants
                                        INNER JOIN Users ON Participants.user = Users.id
                                        WHERE Participants.event = {$row['event_id']}
                                        ORDER BY Users.last, Users.first";
    
                    $participants_result = $usersDB->query($participants_sql);
    
                    echo "<p><strong>Participants:</strong></p>";
                    echo "<ul>";
                    while ($participant_row = $participants_result->fetch_assoc()) {
                        echo "<li>{$participant_row['user_last']}, {$participant_row['user_first']}</li>";
                    }
                    echo "</ul>";
                }
        
            } else {
                echo "<p>Enter an Organizer ID to check their events.</p>";
            }
        
            ?>
    
    	
    	
    
        </main><!-- /.container -->
        <?php include("includes/footer.php"); ?>
    </body>
</html>