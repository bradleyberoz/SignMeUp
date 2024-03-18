<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SignMeUp - Event Management - Participant Home</title>
    
    	<?php include("includes/head.php"); ?>
    
    </head>
    <body>
        <header>
           <?php include("includes/nav.php"); ?>
        </header>
        <main role="main" class="container" >
    	    <h3>Participant Home</h3>
    	    
            <?php
            
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
        
                $usersDB = new mysqli("localhost", "beroz_admin", "121094Geffie002@@", "beroz_SignMeUp");
                if(mysqli_connect_errno()){
                    echo "User Connection Error:".mysqli_connect_errno();
                }
        
                $sql = "SELECT Events.name AS event_name, Events.location AS event_location, Events.date AS event_date, Events.time AS event_time
                    FROM Events
                    INNER JOIN Participants ON Events.id = Participants.event
                    WHERE Participants.user = $user_id
                    ORDER BY Events.date, Events.time";
        
                $result = $usersDB->query($sql);
                
                
                if ($result->num_rows == 0) {
                    echo "<p>This user is not signed up for any events.</p>";
                }
                
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>{$row['event_name']} - {$row['event_location']} - Date: {$row['event_date']} Time: {$row['event_time']}</li>";
                }
                echo "</ul>";
            }
            
            ?>
    
    	
    	
    
        </main><!-- /.container -->
        <?php include("includes/footer.php"); ?>
    </body>
</html>