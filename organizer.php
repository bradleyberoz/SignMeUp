<?php session_start(); ?>
<?php
	//secure the page to only Admins and Organizers
	if(!isset($_SESSION['userType']) || ($_SESSION['userType']!="Admin" && $_SESSION['userType']!="Organizer")){
		echo "<script>location.href='index.php?err=rights';</script>";
	}
		
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SignMeUp - Event Management - Organizer Home</title>
    
    	<?php include("includes/head.php"); ?>
    	<?php include("includes/connect.php"); ?>
    
    </head>
    <body>
        <header>
           <?php include("includes/nav.php"); ?>
        </header>
        <main role="main" class="container" >
    	    <h3>Organizer Home</h3>
        	<!--
        		On the organizer page show a list of all the events that the 
        		person is organizing with a list of participants in alphabetical 
        		order.   
        	-->
    	    <?php
        		if(isset($_SESSION['id'])){
        			$userid=$_SESSION['id'];
        			$sql="select * from events where organizer=$userid order by date, time";
        			$result=$smeConn->query($sql);
        			while($row=$result->fetch_assoc()){
        				echo "<div class='row'>";
        				echo "<div class='col-4'>".date("m/d/Y", strtotime($row['date'])).", ".date("h:m a", strtotime($row['time']))."</div>";
        				echo "<div class='col-4'>".$row['name']."</div>";
        				echo "<div class='col-4'>".$row['location']."</div>";
        				echo "</div>";
        				
        				$eventid=$row['id'];				
        				$partSql="select participants.user, users.last, users.first from participants, users where participants.event=$eventid and users.id=participants.user order by users.last, users.first";
        				$partRes=$smeConn->query($partSql);
        				echo "<ol>";
        				while($partRow=$partRes->fetch_assoc()){
        					echo "<li class='row'>";
        					echo "<span class='col-12'>".$partRow['last'].", ".$partRow['first']."</span>";
        					echo "</li>";
        				}
        				echo "</ol>";
        			}
    		    }//end get if
        	?>
    
        </main><!-- /.container -->
        <?php include("includes/footer.php"); ?>
    </body>
</html>
