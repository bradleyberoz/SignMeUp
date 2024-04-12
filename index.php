<?php session_start(); ?>
<?php
	//handle error codes
	//err=rights -> user rights issue
	if(isset($_GET['err']) && $_GET['err']=="rights")
		echo "<script>alert('You do not have rights to see that page.  Either log in or contact your system admin.');</script>";
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <?php include("includes/head.php"); ?>
        
        <!-- Local Styles -->
        <style>
          
            
            .anchor{
                display: block;
                height: 60px; /*same height as header*/
                margin-top: -60px; /*same height as header*/
                visibility: hidden;
            }
            
        </style>

        <title>SignMeUp - Event Management</title>
    </head>
    <body>
        <?php include("includes/nav.php"); ?>
        <main class='container'>
            <!-- Landing -->
            <section name='top' style='text-align:center'>
        		<h1 class='text-primary'><img src='images/signMeUp_logo_transparent.png'  style='height:48px' /> <span>SignMeUp</span></h1>
        		<p  style='font-style:italic'>An event management company</p>
        		<img src='images/events3.png' class='img-fluid' />
        	</section>
	        <hr/>
	        
	        <!-- About -->
        	<a name='about' class='anchor'></a>
        	<section name='about' style='text-align:center'>
        		<h3 class='text-primary'>About</h3>
        		<div class='row justify-content-center'>
        			<div class='col-12 col-md-8 lead text-start'>
        				We’re on a mission to make event marketing and registration seamless for non-profit organizations.  Out platform is designed to market events, manage event registrations, publish event agendas, collect papers, collect payments and publish event mobile app for audience engagement.
        				<br/><br/>
        				Our team maintains an open culture and believe that everyone is a contributor and has something to bring to the table. That’s why we hire people who are smart and able to let them do their job.
        				<br/><br/>
        				Founded in 2017 and powering more than 200 event websites around the world with over 10,000 event registrations processed.
        			</div>
        			<div class='col-12 col-md-4'>
        				<img src='images/about.png' class='img-fluid'>
        			</div>
        		</div>
        	</section>
	        <hr/>
	        
	        <!-- Services -->
        	<a name='services' class='anchor'></a>
        	<section name='services' style='text-align:center'>
        		<h3 class='text-primary'>Services</h3>
        		<div class='row justify-content-center'>
        			<div class='card col-10 col-md-5 col-xl-3 mx-auto my-3'>
        				
        				<div class='card-body'>
        				    <i class='bi bi-people-fill icon-lg text-primary icon'></i>
        					<h5 class='card-title'>Register</h5>
        					<p class='card-text'>Register event participants with professional easy to use online forms</p>
        				</div>
        			</div>
        			
        			<div class='card col-10 col-md-5 col-xl-3 mx-auto my-3'>
        				
        				<div class='card-body'>
        					<i class='bi bi-credit-card-fill icon-lg text-primary icon'></i>
        					<h5 class='card-title'>Collect</h5>
        					<p class='card-text'>Payments are processed securely and sent to your payment processing account immediately. No waiting till the event date.</p>
        				</div>
        			</div>
        			
        			<div class='card col-10 col-md-5 col-xl-3 mx-auto my-3'>
        				
        				<div class='card-body'>
        					<i class='bi bi-chat-dots-fill icon-lg text-primary icon'></i>
        					<h5 class='card-title'>Promote</h5>
        					<p class='card-text'>Create offers that are delivered during registration.</p>
        				</div>
        			</div>
        			<!-- Force next columns to break to new line at md breakpoint and up -->
        			<div class="w-100 d-none d-xl-block"></div>
        			<div class='card col-10 col-md-5 col-xl-3 mx-auto my-3'>
        				
        				<div class='card-body'>
        					<i class='bi bi-coin icon-lg text-primary icon'></i>
        					<h5 class='card-title'>Fundraise</h5>
        					<p class='card-text'>Fundraising software to help with collecting donations and automate everything from payment reminders to attendee notifications.</p>
        				</div>
        			</div>
        			<div class='card col-10 col-md-5 col-xl-3 mx-auto my-3'>
        				
        				<div class='card-body'>
        					<i class='bi bi-clipboard2-check-fill icon-lg text-primary icon'></i>
        					<h5 class='card-title'>Manage</h5>
        					<p class='card-text'>Automatic reminders sent to your attendees with event details to reduce no shows for your event.</p>
        				</div>
        			</div>
        			<div class='card col-10 col-md-5 col-xl-3 mx-auto my-3'>
        				
        				<div class='card-body'>
        					<i class='bi bi-file-earmark-text-fill icon-lg text-primary icon'></i>
        					<h5 class='card-title'>Report</h5>
        					<p class='card-text'>Easily download & print attendee details in CSV or PDF. See insights on real-time traffic, ticket sales and revenues for each event.</p>
        				</div>
        			</div>
        		</div>
        	</section>
        	<hr/>
        	
        	<!-- Support -->
        	<a name='support' class='anchor'></a>
        	<section name='support' style='text-align:center'>
        		<h3 class='text-primary'>Support</h3>
        		<div class='row justify-content-center'>
                    <div class="col-lg-6">
        			  <div class="footer-links">
        				<h4>Contact Us</h4>
        				<p>
        				  A619 St. Michael Street <br>
        				  Philadelphia, PA 11223<br>
        				  United States <br>
        				  <strong>Phone:</strong> 215.142.6120<br>
        				  <strong>Email:</strong> <a href="mailto:info@signmeup.org">info@signmeup.org</a><br>
        				</p>
        			  </div>
        
        			  <div class="social-links">
        				<a href="#" class="twitter"><i class="bi bi-twitter icon-md"></i></a>
        				<a href="#" class="facebook"><i class="bi bi-facebook icon-md"></i></a>
        				<a href="#" class="instagram"><i class="bi bi-instagram icon-md"></i></a>
        				<a href="#" class="linkedin"><i class="bi bi-linkedin icon-md"></i></a>
        			  </div>
        
        			</div>
    
                    <div class="col-lg-6">
             
                      <h4>Send us a message</h4>
                      <form>
                          <div class="mb-3">
                            <input type="text" class="form-control" id="form-name"  placeholder='Your Name'>
                          </div>
                          <div class="mb-3">
                            <input type="email" class="form-control" id="form-email"  placeholder='Your Name'>
                          </div>
                          <div class="mb-3">
                            <input type="text" class="form-control" id="form-subject"  placeholder='Subject'>
                          </div>
                          <div class="mb-3">
                            <textarea class='form-control' placeholder='Message' rows='10'></textarea>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">Send Message</button>
                      </form>
                    </div>
                </div>
        	</section>
        </main><!-- /.container -->

        <?php include("includes/footer.php"); ?>
        <?php include("includes/signinModal.php"); ?>
    
    </body>
</html>


