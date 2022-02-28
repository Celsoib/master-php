<!-- BARRA LATERAL  -->
<aside id="lateral">
  <div class="block_aside" id="login">

    <?php if(!isset($_SESSION['identity'])): ?>

      <h3>Entrar a la web</h3>
      <form action="<?=base_url?>usuario/login" method="POST">
        <p>
          <label for="email">Email</label>
          <input type="email" name="email">
        </p>
        <p>
          <label for="password">Contraseña</label>
          <input type="password" name="password">
        </p>
        <input type="submit" value="Enviar">
      </form>

    <?php else: ?>
      <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
    <?php endif; ?>
  </div>
  <ul>
    <li><a href="#">Mis pedidos</a></li>
    <li><a href="#">Gestionar pedidos</a></li>
    <li><a href="#">Gestionar categorías</a></li>
  </ul>

</aside>

<!-- CONTENIDO CENTRAL  -->
<div id="central">