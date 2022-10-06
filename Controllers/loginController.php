<?php
require_once('Models/loginModel.php');
// Si les champs ont bien ete remplis
if ($_REQUEST['id'] != null && $_REQUEST['password'] != null) 
{
    
    // test echapement de caractere speciaux pour plus de securité
    $id = htmlentities($_REQUEST['id'],ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5,"UTF-8");
    $password = htmlentities($_REQUEST['password'],ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5,"UTF-8");
    // getLogin verifie si id et password sont bien dans la table
    //loginModel l.4
    $admin = getLogin($id,$password);

    
    if($admin == true)
    {
        
        $_SESSION['admin'] = "admin";
        header('Location: index.php?useCase=admin');
        //redirection section admin
    }
    else
    {
        header('Location: index.php?useCase=login&loginfail=2');
        
    }
}
else
{
    header('Location: index.php?useCase=login&loginfail=1');
    
}
