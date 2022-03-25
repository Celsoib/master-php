<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
  <h1>Tu pedido se ha confirmado</h1>

  <p>
    Tu pedido ha sido guardodo con éxito, una vez que realices la transferencia
    bancaria a la cuenta 321321 con el coste del pedido, será procesado y enviado.
  </p>

  <h3>Datos del pedido:</h3>


<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
  <h1>Tu pedido NO se ha podido procesar</h1>
<?php endif; ?>