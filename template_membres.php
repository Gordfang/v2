<div class="list-group-item">
  <table class="table table-striped table-hover">
    <tr>
      <td width="10%">
        <p align="left"><img src="http://fr.gravatar.com/avatar/<?php echo $gravatar; ?>?s=100" alt="" class="img-rounded img-responsive"></p>
      </td>
      <td width="20%">
        <h3 align="left"><?php echo $pseudo; ?></h3>
        <h5 align="left"><?php echo $prenom."&nbsp;".$nom ; ?></h5>
        <h5><?php echo $naissance; ?></h5>
      </td>
      <td width="70%">
        <div class="None" align="right">
          <?php echo $url; ?>
        </div>
      </td>
    </tr>
  </table>
  <table class="table table-striped table-hover">
    <tr>
      <td width="100%">
        <div class="expandable">
          <p>
            <?php echo $bio; ?>
            <br /><br />
            <?php echo $pony; ?>
          </p>
        </div>
      </td>	
    </tr>
  </table> 
</div>
<br />