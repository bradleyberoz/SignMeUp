         <?php
        	//determine user type for nav items and access
        	if(isset($_GET['ut'])){
        		//by defining the $userType variable conditionally, we can use isset later in the code to 
        		//ensure that a user has been registered
        		if($_GET['ut']==3) $userType="Admin";
        		if($_GET['ut']==2) $userType="Organizer";
        		if($_GET['ut']==1) $userType="Participant";
        	}
         ?>     
       
        <nav class='navbar navbar-expand-lg navbar-dark bg-primary fixed-top' aria-label='signMeUpNav'>
            <div class='container-fluid'>
              <a class='navbar-brand' href='index.php#top'><img src='images/signMeUp_logo_white.png' id='navLogo' alt='signMeUp logo' />SignMeUp</a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSMU' aria-controls='navbarSMU' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
            
              <div class='collapse navbar-collapse' id='navbarSMU'>
                <ul class='navbar-nav ms-auto mb-2 mb-lg-0  '>
                  <li class='nav-item'>
                    <a class='nav-link' aria-current='page' href='#about'>About</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='#services'>Services</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='#support'>Support</a>
                  </li>
        
                  
                  
                  
                  <?php
            		//ADMIN CONDITIONAL NAV
            		//by checking for $_SESSION['userType'] to be set first, we can utilize short circuiting
            		//to avoid checking the second item and possibly creating an error or warning
            		if(isset($_SESSION['userType']) && $_SESSION['userType']=="Admin"){
            	  ?>
            	  <li class="nav-item">
                    <a class="nav-link" href="eventManagement.php">Event Management</a>
                  </li>	  
            	  <?php
            			}//end admin if
            	  ?>
            	  
            	  <?php
            			//ORGANIZER CONDITIONAL NAV
            			if(isset($_SESSION['userType']) && $_SESSION['userType']=="Organizer"){
            	  ?>
            	  <li class="nav-item">
                    <a class="nav-link" href="organizer.php">My Events</a>
                  </li>
            	  <?php
            			}//end organizer if
            	  ?>
            	  
            	  <?php
            			//PARTICIPANT CONDITIONAL NAV
            			if(isset($_SESSION['userType']) && ($_SESSION['userType']=="User" || $_SESSION['userType']=="Organizer")){
            	  ?>
            	  <li class="nav-item">
                    <a class="nav-link" href="participant.php">My Schedule</a>
                  </li>
            	  <?php
            			}//end participant if
            	  ?>
                
                <!-- LOGIN ITEM -->
                <li class="nav-item login">
                    <?php
            			if(isset($_SESSION['userType'])){
            				echo "<li class='nav-link'>Welcome, ".$_SESSION['first']."</li>";
            			    echo "<a class='nav-link' id='logout'>Sign Out</a>";
            			}
            			else{
                    ?>
                            <a class='nav-link' id='signInLink' data-bs-toggle="modal" data-bs-target="#signInModal"><i class='bi bi-person-fill'></i>Sign In</a>
                    <?php
                        } //end else
                    ?>
                </li>
        
            
                </ul>
              </div>
            </div>
        </nav>
