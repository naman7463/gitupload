<script src="dist/js/jquery-1.9.1.js"></script>
<script>
// login user login
$(document).ready(function (e) {
	alert("hello");
                $("#form_users").on('submit',(function(e) {                     
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
						url: '<?php base_url(); ?>code/login.php',
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function (data) {
							   
			   
							},
							error: function(error)
							{
								 document.getElementById('msg_users').innerHTML = error;
							}
                        	        
                    });

                }));
            });
// end			


</script>