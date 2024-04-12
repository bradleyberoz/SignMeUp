        <footer class='bg-primary text-light'>
        	<div class='lead py-3' style='text-align:center'> &copy; <script>var today=new Date(); document.write(today.getFullYear());</script>  - SignMeUp.org</div>
        </footer>
        <!-- JQuery Library -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Bootstrap Bundle with Popper -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
        

        <?php include("signinModal.php"); ?>
        <script>
        	//log out code	
        	$(document).ready(function(){
        		$("#logout").click(function(){
        			$.ajax({
        				type:"POST",
        				url:"scripts/logoutScript.php",
        				success:function(response){
        					location.href='index.php';
        				},
        				error:function(){
        					alert("connection error.");
        				}
        			});//end ajax
        		});//end logout click
        	});//end ready
        </script>
