<?php

include_once('header.php');

?>
<style>

  #admin__dashTable,
  #admin__dashTable td,
  #admin__dashTable th
  {
    border: 1px solid black;

    text-align: center;
  }

  #admin__dashTable tr
  {
    height: 50px;
  }
 /*  Css Conditionnel */ 

    #admin__dashTable td.isDone{
      background: linear-gradient(
        90deg, 
        rgba(134,254,134,1) 0%,
        rgba(112,251,76,0.96) 10%, 
        rgba(47,237,7,0.75) 50%, 
        rgba(112,251,76,0.96) 90%, 
        rgba(134,254,134,1) 100%);
    }
    
    #admin__dashTable td.isNotDone{
      background: linear-gradient(
        90deg, 
        rgba(254,122,122,1) 0%, 
        rgba(251,76,76,0.96) 10%, 
        rgba(237,7,7,0.75) 50%, 
        rgba(251,76,76,0.96) 90%, 
        rgba(254,122,122,1) 100%);

    }
    
 /*  fin Css Conditionnel */
</style>
    <div>
        <div class="container">
      <h1>Formulaire  enregistré </h1>
      <div class="row">
        <table  class="col-12" id="admin__dashTable">
          <thead>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Formulaire n°</th>
            <th>Rempli</th>
            <th>Envoyé</th>
          </thead>
          <tbody>
            <?php
            // <!-- Debut du forEach -->
            
              foreach ($devis as  $element) {
            ?>
          
              <tr>
              
              <td><?php echo $element['nom'] ?></td>
              <td><?php echo $element['prenom'] ?></td>


              <td ><?php echo $element['num_devis'] ?></td>
              <td class=<?php echo ( $element['final'] ? "isDone" : "isNotDone") ; ?>>
                <?php 
                    if($element['final']){
                      echo "oui";
                    }
                    else
                    {
                      echo "non";
                    }
                  ?>
              </td>
              <td class=<?php echo ( $element['confirmation'] ? "isDone" : "isNotDone") ; ?>>
                <?php 
                    if($element['confirmation']){
                      echo "oui";
                    }
                    else
                    {
                      echo "non";
                    }
                  ?>
              </td>
            </tr>
            <?php
            
            }
            //<!-- fin du forEach -->
            ?>
          </tbody>
        </table>
      </div>
      

        </div>
    </div>

<?php
include_once('footer.php');
?>