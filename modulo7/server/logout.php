
  <?php

	session_start();

  if (isset($_SESSION['username'])) 
    session_destroy();
    header('Location: http://localhost/modulo7/client/index.html'); 
	end(); 
?>