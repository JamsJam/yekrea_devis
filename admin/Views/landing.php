<?php

include_once('header.php');

?>
<style>
    
    #Adminlanding__container{
        width: 80vw;
        min-width: 300px;
        max-width: 1500px;
        min-height: 70vh;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        /* border: 1px solid black; */
        align-items: stretch;
    }
    #Adminlanding__title{
        text-align: center;
    }
    #Adminlanding__BtnContainer{
        /* background: tan; */
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        align-items: center;
        margin-top: 50px;
    }
    .Adminlanding__Btn{
        border-radius: 10px;
        width: 250px;
        height: 250px;
        margin: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        text-decoration: none;
        background-color: blue;
        color:#fff;
        font-size: 20px;
        font-weight: 500;
        
    }

</style>

<div id="Adminlanding">
    <div id="Adminlanding__container">
        <h1 id="Adminlanding__title" >Bienvenue  Admin </h1>
        <div id="Adminlanding__BtnContainer" >
            <a class="Adminlanding__Btn" id="Adminlanding__BtnPreinscription" href="index.php?useCase=preinscription">Acceder aux formulaires de preinscription</a>
            <a class="Adminlanding__Btn" id="Adminlanding__BtnFormulaire" href="index.php?useCase=dash">Voir tous les formulaires</a>
            
        </div>
    </div>
</div>

<?php
include_once('footer.php');
?>