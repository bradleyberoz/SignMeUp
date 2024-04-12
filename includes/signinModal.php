<!-- Includes JQuery AJAX Code - INCLUDE BELOW JQuery Library -->
<!-- Sign in Modal -->
<!-- Modal -->
<div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signInModalLabel">Sign In</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <input type="email" class="form-control" id="signin-email"  placeholder='Email'>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="signin-password"  placeholder='Password'>
          </div>
          <div id='loginError' class='text-danger' style='font-style:italic; font-size:.7em'>
              
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id='login'>Sign In</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		$("#login").click(function(){
			//alert($("#signin-email").val());
			$.ajax({
				type:"POST",
				url:"scripts/loginScript.php",
				data:{
					user:$("#signin-email").val(),
					pass:$("#signin-password").val()
				},
				success:function(response){
					//alert(response);
					if(response!=0){
						//close modal
						$("#signInModal").modal("hide");		
						
						//redirect users based on level
						if(response=="Admin") window.location.href="index.php";
						else if(response=="Organizer") window.location.href="organizer.php";
						else window.location.href="participant.php";
					}
					else
						$("#loginError").text("Login Error.  Your email or password is not correct.");
				},
				error:function(){
					$("#loginError").text("Connection Error.  Please contact your system administrator.");
					
				}
			});//end ajax
		});//end login click
		
	});//end ready
</script>
