<?php if(isset($product)): ?>
  <h1><?=$product->nombre?></h1>

  <?php if($product->imagen != null): ?>
    <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="Foto camiseta">
  <?php else: ?>
    <img src="<?=base_url?>assets/img/camiseta.png" alt="Foto camiseta">
  <?php endif; ?>

  <p><?=$product->descripcion?></p>
  <p><?=$product->precio?></p>
  <a href="#" class="button">Comprar</a>

<?php else: ?>
  <h1>El producto no existe</h1>
<?php endif; ?>