<?php session_start(); ?>
<?php
	//secure the page to only Admins
	if(!isset($_SESSION['userType']) || $_SESSION['userType']!="Admin"){
		echo "<script>location.href='index.php?err=rights';</script>";
	}
		
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SignMeUp - Event Management - Admin Home</title>
    
    	<?php include("includes/head.php"); ?>
    	<?php include("includes/connect.php"); ?>
    	<?php include("includes/participantsClass.php"); ?>
    	<?php include("includes/eventsClass.php"); ?>
    	<style>
    	    .eventsList ol{
    	        display:none;
    	    }
    	    
    	    #previousEvents{
    	        display: none;
    	    }
    	    #upcomingEvents{
    	        display:none;
    	    }
    	</style>
    
    </head>
    <body>
        <header>
           <?php include("includes/nav.php"); ?>
        </header>
        <main role="main" class="container" >
    	    <h3>Admin Home - Event Management</h3>
    	    
    	    <div id="filterOptions">
    	        <form id="filterForm">
                    <input class="displayAll" type="radio" name="filter" value="all" checked> All
                    <input class="displayPrevious" type="radio" name="filter" value="previous"> Previous
                    <input class="displayUpcoming" type="radio" name="filter" value="upcoming"> Upcoming
                </form>
            </div>
            
            
            
            <div id="eventContainer">
                <?php $date = "2022-04-12"; ?>
                <div id="allEvents">
                    <br><h4>All Events</h4>
                    <?php 
                    // ALL EVENTS
                    
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);
                    
                    $sql = "SELECT * FROM events ORDER BY date, time";
                    $result = $smeConn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $event = createEventFromDB($row['id']);
                            
                            echo "<section class='eventsList'>";
                            echo $event->getBSRow();
    
                            $participants = createPartFromDB($row['id']);
                            echo "<ol>";
                            foreach ($participants as $participant) {
                                echo "<li class='row'>";
                                echo $participant->getBSRow();
                                echo "</li>";
                            }
                                
                            echo "</ol>";
                            echo "</section>";
    
                        }
                    } else {
                        echo "No events found.";
                    }
                    ?>
                </div>
                <div id="previousEvents">
                    <br><h4>Previous Events</h4>
                    <?php
                    // PREVIOUS EVENTS
                    
                    $sql = "SELECT * FROM events WHERE date < '$date' ORDER BY date, time";
                    $result = $smeConn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $event = createEventFromDB($row['id']);
                            
                            echo "<section class='eventsList'>";
                            echo $event->getBSRow();
    
                            $participants = createPartFromDB($row['id']);
                            echo "<ol>";
                            foreach ($participants as $participant) {
                                echo "<li class='row'>";
                                echo $participant->getBSRow();
                                echo "</li>";
                            }
                                
                            echo "</ol>";
                            echo "</section>";
    
                        }
                    } else {
                        echo "No events found.";
                    }
                    ?>
                </div>
                <div id="upcomingEvents">
                    <br><h4>Upcoming Events</h4>
                    <?php
                    //UPCOMING EVENTS
                    
                    $sql = "SELECT * FROM events WHERE date >= '$date' ORDER BY date, time";
                    $result = $smeConn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $event = createEventFromDB($row['id']);
                            
                            echo "<section class='eventsList'>";
                            echo $event->getBSRow();
    
                            $participants = createPartFromDB($row['id']);
                            echo "<ol>";
                            foreach ($participants as $participant) {
                                echo "<li class='row'>";
                                echo $participant->getBSRow();
                                echo "</li>";
                            }
                                
                            echo "</ol>";
                            echo "</section>";
    
                        }
                    } else {
                        echo "No events found.";
                    }
                    
                    ?>
                </div>
            </div>
    	
    	
    
        </main><!-- /.container -->
        <?php include("includes/footer.php"); ?>
        <script>
            $(document).ready(function(){
                
                $("input[name='filter']").change(function(){
                    $("#allEvents, #previousEvents, #upcomingEvents").hide();
                    $("#" + $(this).val() + "Events").show();
                });

                
                $(".eventsList").click(function(){
                    $(this).find('ol').slideToggle();
                });//end h4 click
            });//end ready
        </script>
    </body>
</html>
