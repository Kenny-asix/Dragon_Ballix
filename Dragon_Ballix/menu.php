<?php

session_start();

$user="Anonimo";
$role="";

if (isset($_SESSION['username'])) {
    
    $user=$SESSION['username'];
    
    if (isset($_SESSION['role']) && $_SESSION['role']=="admin") $role="admin";
    
    else $role="User";

    
} else if (isset($_COOKIE['DGUser'])){
    
    $_SESSION['username'] = $_COOKIE['DGUser'];
    
    if (isset($_COOKIE['DGRole'])) $_SESSION['role'] = $_COOKIE['DGRole'];
    
     if ($_SESSION['DGRole']=="user") $role="user"; else $role="Anonimo";
    
    $user=$_SESSION['username'];
  
    
}



$nomuser=$user.$role;

?>
<!DOCTYPE html>

<html>

<nav class="main-nav">
                
            <ul class="main-nav">
                
                <li class="li-a"><a class="ala" href="index.php">Página principal</a></li>
                
                
                <?php
    
                    if (isset($_SESSION['role']) && ($_SESSION['role']=="admin" || $_SESSION['role']=="user" )) {
                        
                        ?>
 
                <li class="li-a"><a class="ala" href="seriespelis.php">Series y películas</a></li>
                
                <li class="li-a"><a class="ala" href="index.php">Personajes</a></li>
                
                <li class="li-a"><a class="ala"  href="index.php">Juegos</a></li>
                
                <li class="li-a"><a class="ala"  href="index.php">Accede al foro</a></li>
                
                
             </ul> 
     
    <ul class="main-nav">
    
        <?php
    
                    if ($role=="admin") {
                        
                        ?>
            
             <li class="li-a"><a class="ala" href="administracion.php">Administracion</a></li>
                  
              </ul>
                
                <?php } ?>
 
    
            <?php } ?>
            
            </nav>

<br>

            <nav class="regist">

              <ul class="regist">
                  
            <?php if($user=="Anonimo"){ ?>
              
              <li class="li-a"><a class="ala" href="loginForm.php">Inicia sesión</a></li>
                  
                  <?php } else { ?>
                  
                  <li class="li-a"><a class="ala" href="logout.php">Cierra La sesión</a></li>
                  
                  <?php } ?>

              <li class="li-a"><a class="ala" href="registro.php">Registrate</a></li>
                  
                  <?php
    
                    if ($role=="(admin)") {
                        
                        ?>
            
            
                  
              </ul>
                
                <?php } ?>
                
                <li class="li-a"><a class="ala"><?php echo ($nomuser);?></a></li>
       
  
            </nav>
    
</html>