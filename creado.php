<?php if(isset($_SESSION['tp']))
{
  if($_SESSION['tp'] == 1)
  {
    ?>
    <div class="alert alert-dismissible alert-success encima">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <h4 class="alert-heading">Clave cambiada con éxito!</h4>
    </div>
    <?php
  }elseif($_SESSION['tp'] == 2)
  {
    ?>
    <div class="alert alert-dismissible alert-success encima">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <h4 class="alert-heading">Clave borrada con éxito!</h4>
    </div>
    <?php
  }else{
    ?>
    <div class="alert alert-dismissible alert-success encima">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <h4 class="alert-heading">Clave creada con éxito!</h4>
    </div>
    <?php
  }

}
  ?>
