<main class="login">
   <div class="login__logo">ACIS</div>
   <h2 class="login__nombre"><?php echo $titulo; ?></h2>

   <?php require_once __DIR__ . '/../templates/alertas.php'; ?>
   
   <form action="/" method="post" class="formulario">
      <div class="formulario__campo">
         <label for="email" class="formulario__label">Correo</label>
         <input
            type="text"
            name="email"
            id="email"
            placeholder="Tu Correo"
            class="formulario__input"
         >
      </div>
      <div class="formulario__campo">
         <label for="password" class="formulario__label">Contraseña</label>
         <input
            type="password"
            name="password"
            id="password"
            placeholder="Tu Contraseña"
            class="formulario__input"
         >
      </div>
      <input type="submit" value="Iniciar Sesión" class="formulario__submit">
   </form>
</main>