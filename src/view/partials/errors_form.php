            <?php if(isset($_SESSION['errors'])){ ?>

                 <div class="container">
                  	   <div class="row">
                  	   	     <div class="col-xs-6 col-xs-offset-2 alert alert-danger alert-dismissable"><?php
                                     foreach($_SESSION['errors'] as $errors =>$error){
                                     	echo '<p>'.$error.'</p>';
                                     }
                  	   	     	?>
                  	   	     </div>
                  	   </div>
                  </div>
             <?php } unset($_SESSION['errors']);?>
