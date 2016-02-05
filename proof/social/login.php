
			<?php
				
				include_once("/facebook_login_with_php/includes/functions.php");
				require_once('/facebook_login_with_php/utente.php');
				require_once('/facebook_login_with_php/admin.php');
				
				$email=$_POST['email'];
				$password=$_POST['password'];
				
				$controllo = checkadmin($email, $password);
				
				if($controllo){
					
					$admin = new admin();
					session_start();
					$_SESSION['id'] = $admin->getId($email);
					
					header("location: http://localhost/proof/social/admin");
				}else{
					
					header("location: index.php?err=1");
				}
				
			?>