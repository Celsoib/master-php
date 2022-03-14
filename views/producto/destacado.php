<h1>Algunos de nuestros productos</h1>
<?php while($product = $productos->fetch_object()): ?>
  <div class="product">
    <?php if($product->imagen != null): ?>
      <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="Foto camiseta">
    <?php else: ?>
        <img src="assets/img/camiseta.png" alt="Foto camiseta">
    <?php endif; ?>
    <h2><?=$product->nombre?></h2>
    <p><?=$product->precio?></p>
    <a href="#" class="button">Comprar</a>
  </div>
<?php endwhile; ?>
