
        <div class="row" id="corps">
          <div class="col-sm-6 col-lg-8" id="tableau">
            <p>
              <h2>Liste des batailles recencés entre les colonies et l'empire des Vespides</h2>
            </p>
          </div>
        </div><br />

        <div class="col-sm-12">

        </div>
          <table border='5' bgcolor='#d0ff00' text-align='center'>
            <TR border='10' bgcolor='#a4c2f4' width='1500'>
              <TH width="100">nom de la bataille</TH>
              <TH width="100">Nom du vaisseau</TH>
              <TH width="1000">Rapport de bataille</TH>
              <TH width="100">Date début engagement dans la bataille</TH>
              <TH width="100">Date de désengagement du vaisseau</TH>
            </TR>
            <br />
            <?php
            foreach ($participe as $row)
            {
              echo "<TR border='10' bgcolor='#a4c2f4' width='1500'>\n";
              echo "<TD width='100' text-align='center'>".$row->id_bataille."</TD>\n";
              echo "<TD width='100' text-align='center'>".$row->nom_vaisseau."</TD>\n";
              echo "<TD width='1000' text-align='center' id='texte' classe='texte'>".$row->Rapport."</TD>\n";
              echo "<TD width='100' text-align='center'>".$row->date_participation."</TD>\n";
              echo "<TD width='100' text-align='center'>".$row->date_repli."</TD>\n";
              echo "</TR>";
            } ?>
          </table>
        </div>
