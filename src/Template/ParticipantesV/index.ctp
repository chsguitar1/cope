<div>
  <p> = <?= h($projeto) ?></p
  <p> = <?= h($participantesv) ?></p
<?php
  

 foreach ($projeto as $projeto) {?>
    <p> = <?= h($projeto->tituto_projeto) ?></p>
     
<?php } ?>
<?php
 foreach ($participantesv as $participantesv) {?>
    <p> = <?= h($participantesv->nome) ?></p>
     
<?php } ?>

        
</div>