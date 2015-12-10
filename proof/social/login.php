
			<?php
				
				include_once("/facebook_login_with_php/includes/functions.php");
				require_once('/facebook_login_with_php/utente.php');
				
				$email=$_POST['email'];
				$password=$_POST['password'];
				
				$controllo = checkadmin($email, $password);
				
				if($controllo){
					
					$utente = new utente();
					session_start();
					/* $_SESSION['email'] = $email; 
					$_SESSION['password'] = $password; */
					$_SESSION['id'] = $utente->getId($email);
					
					header("location: http://localhost/proof/social/admin");
				}else{
					
					header("location: index.php?err=1");
				}
				
			?>