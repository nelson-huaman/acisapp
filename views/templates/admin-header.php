<div class="header">
   <button class="header__menu">
      <i class="fa-solid fa-bars"></i>
   </button>
   <button class="header__usuario">
      <i class="fa-solid fa-circle-user"></i>
   </button>
   <div class="header__perfil">
      <div class="header__nombre">
         <?php echo $_SESSION['nombre']; ?>
         <span class="header__nombre--rol">Administrador</span>
      </div>
      <div class="header__nav">
         <a href="#" class="header__enlace">
            <i class="header__icon fa-solid fa-user"></i>
            <spna class="header__name">Perfil</spna>
         </a>
         <a href="#" class="header__enlace">
            <i class="header__icon fa-solid fa-gear"></i>
            <spna class="header__name">Configuración</spna>
         </a>
         <form action="/logout" method="post" class="header__enlace">
            <i class="header__icon fa-solid fa-right-from-bracket"></i>
            <input type="submit" value="Cerrar Sesión" class="header__submit header__submit--logout">
         </form>
      </div>
   </div>
   <button class="header__open">
      <i class="fa-solid fa-bars"></i>
   </button>
</div>