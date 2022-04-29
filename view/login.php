<?php include_once('head.php'); ?>


<style>

.form-control-feedback {
  
   pointer-events: auto;
  
}

.msk-set-color-tooltip + .tooltip > .tooltip-inner { 
  
     min-width:180px;
	 
}

.bg{
	width:100%;
	height:90%;
}

#loginFrom{
	color: #231123;
}


</style>
<body onLoad="login()">
	<img src="../uploads/bg3.jpg" class="bg" />
	
	
	<!--Success! - Insert-->
  	<div class="modal fade" id="loginFrom" tabindex="-1" role="dialog" aria-labelledby="loginFrom" aria-hidden="true">
    	<div class="modal-dialog">    
        	<div class="modal-content ">
        		<div class="modal-header bg-blue-gradient">
				<body>
				
				
					<center>
					
						<h1>
							Login...
							

						</h1> 
						<h4 >
						
						<p style="font-size:20px"face="verdana">
							<font color="yellow">You need login to system !!!</font>
						</p>
						</h4>
					</center>
				</body>
          			
        		</div>
        		<div class="modal-body bgColorWhite">
					
        			<form role="form" action="../index.php" method="post">                    
                  		<div class="box-body">
                    		<div class="form-group" id="divEmail">
								<h4>
                      				<label for="">Email</label>
                      				<input type="text" class="form-control" id="email" placeholder="Enter email address" name="email" autocomplete="off">
								</h4>
							</div>
                            <div class="form-group" id="divPassword">
								<h4>
								<label for="">Password</label>
								
                      			<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" autocomplete="off">
								</h4>
                    		</div>
                  		</div><!-- /.box-body -->
                  		<div class="box-footer">
                  			<input type="hidden" name="do" value="user_login" />
							<body>
								<center>
								
									<button type="submit" class="btn-block mt-3" id="btnSubmit" style="font-size:20px"face="verdana">
									<img src="../uploads/icon_login.jpg" alt="" width="40" height="40">
									LOGIN
									</button>
								
								</center>
							</body>

							<center>
								<h4>
									<button type="submit" class="btn btn-primary btn-block mt-3">
									<h5>
									<img src="https://assets.materialup.com/uploads/82eae29e-33b7-4ff7-be10-df432402b2b6/preview" alt="" width="40" height="40">
									Login with Google
									</h5>
									</button>
                                </a>
								</h4>
							</center>
							
                  		</div>
                	</form>
        		</div>
      		</div>      
		</div>
	</div><!--/.Modal--> 

<script>

function login(){
//document.ready(function{	
	
	$('#loginFrom').modal({
		backdrop: 'static',
		keyboard: false
	});
	$('#loginFrom').modal('show');
};

$("form").submit(function (e) {
//MSK-000098-form submit	

	var uname = $('#email').val();
	var password = $('#password').val();
	
	if(uname == ''){
		//MSK-00099-name
		$("#btnSubmit").attr("disabled", true);
		$('#divEmail').addClass('has-error has-feedback');	
		$('#divEmail').append('<span id="spanEmail" class="glyphicon glyphicon-remove form-control-feedback msk-set-color-tooltip" data-toggle="tooltip"    title="The user name is required" ></span>');	
			
		$("#email").keydown(function() {
			//MSK-00100-name
			$("#btnSubmit").attr("disabled", false);	
			$('#divEmail').removeClass('has-error has-feedback');
			$('#spanEmail').remove();
			
		});	
		
	}
	
	if(password == ''){
		//MSK-00099-name
		$("#btnSubmit").attr("disabled", true);
		$('#divPassword').addClass('has-error has-feedback');	
		$('#divPassword').append('<span id="spanPassword" class="glyphicon glyphicon-remove form-control-feedback msk-set-color-tooltip" data-toggle="tooltip"    title="The password is required" ></span>');	
			
		$("#password").keydown(function() {
			//MSK-00100-name
			$("#btnSubmit").attr("disabled", false);	
			$('#divPassword').removeClass('has-error has-feedback');
			$('#spanPassword').remove();
			
		});	
		
	}
	
	
	if(uname == '' || password == ''){
		//MSK-000098- form validation failed
		$("#btnSubmit").attr("disabled", true);
		e.preventDefault();
		return false;
			
	}else{
		$("#btnSubmit").attr("disabled", false);
		
	}


});
</script>

<!--Warnning! - Email or Password is Incorrect-->
	<div class="modal fade" id="login_error" tabindex="-1" role="dialog" aria-labelledby="insert_alert1" aria-hidden="true">
    	<div class="modal-dialog">    
      		<div class="modal-content">
        		<div class="modal-header bg-red-active">
          			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          			<h4>Information...!</h4>
        		</div>
        		<div class="modal-body bgColorWhite">
        			<strong style="color:red; font-size:14px">Warnning!</strong> Email or Password is Incorrect.
        		</div>
			</div>
		</div>
	</div><!--/.Modal-->


<?php
if(isset($_GET["do"])&&($_GET["do"]=="login_error")){
//MSK-000143-6-PHP-JS-INSERT
 
	$msg=$_GET['msg'];
	
	if($msg==1){
		echo"
			<script>
			
			var myModal = $('#login_error');
			myModal.modal('show');
			
    		myModal.data('hideInterval', setTimeout(function(){
    			myModal.modal('hide');
    		}, 3000));
						
			</script>
		";
	
	}
	
}
?>

<!--redirect your own url when clicking browser back button -->
<script>
(function(window, location) {
history.replaceState(null, document.title, location.pathname+"#!/history");
history.pushState(null, document.title, location.pathname);

window.addEventListener("popstate", function() {
  if(location.hash === "#!/history") {
    history.replaceState(null, document.title, location.pathname);
    setTimeout(function(){
      location.replace("../index.php");//path to when click back button
    },0);
  }
}, false);
}(window, location));
</script>
</body>