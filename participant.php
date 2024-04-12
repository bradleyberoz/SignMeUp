<?php session_start(); ?>
<?php
	//secure the page to only Admins and Organizers and Users
	if(!isset($_SESSION['userType']) || ($_SESSION['userType']!="Admin" && $_SESSION['userType']!="Organizer" && $_SESSION['userType']!="User")){
		echo "<script>location.href='index.php?err=rights';</script>";
	}
		
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SignMeUp - Event Management - Participant Home</title>
    
    	<?php include("includes/head.php"); ?>
    	<?php include("includes/connect.php"); ?>
    
    </head>
    <body>
        <header>
           <?php include("includes/nav.php"); ?>
        </header>
        <main role="main" class="container" >
            <!--
        	    On the participant page show a list of all the events the user 
        		is signed up for in chronological order.  Include the event name, 
        		location, date and time.  
        	-->
    	    <h3>Participant Home</h3>
            <?php
        		if(isset($_SESSION['id'])){
        			$userid=$_SESSION['id'];
        			$sql="select events.id, events.name, events.time, events.location, events.date, participants.event from participants, events where participants.user=$userid AND participants.event=events.id order by events.date, events.time";
        			$result=$smeConn->query($sql);
        			while($row=$result->fetch_assoc()){
        				echo "<h4 class='row'>";
        				echo "<div class='col-4'>".$row['name']."</div>";
        				echo "<div class='col-4'>".date("m/d/Y", strtotime($row['date'])).", ".date("h:m a", strtotime($row['time']))."</div>";
        				echo "<div class='col-4'>".$row['location']."</div>";
        				echo "</h4>";
        			
        
        			}
        		
        		}//end get if
        		
        	?>
    	
    	
    
        </main><!-- /.container -->
        <?php include("includes/footer.php"); ?>
    </body>
</html>
