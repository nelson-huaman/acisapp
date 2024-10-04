<aside class="sidebar" id="sidebar">
   <div class="sidebar__div"></div>
   <div class="sidebar__nav">
      <div class="sidebar__header">
         <div class="sidebar__head">
            <a href="#">
               <img class="sidebar__logo" src="/build/img/logo-acis-blanco.webp" alt="Logo Acis">
            </a>
            <button class="sidebar__close"><i class="fa-solid fa-xmark"></i></button>
         </div>
         <div class="sidebar__user">
            <div class="sidebar__user--avatar">
               NH
            </div>
            <div class="sidebar__user--nombre">
               <?php echo $_SESSION['nombre']; ?>
               <span><?php echo $_SESSION['rol']->nombre; ?></span>
            </div>
         </div>
      </div>
      <div class="sidebar__menu">
         <?php include __DIR__ . '/menu-admin.php'; ?>
      </div>
      <div class="sidebar__footer">
         <a href="#" class="sidebar__enlace"><i class="fa-solid fa-share-from-square"></i> Web</a>
         <form action="/logout" method="post">
            <button class="sidebar__enlace" type="submit">Salir <i class="fa-solid fa-right-from-bracket"></i></button>
         </form>
      </div>
   </div>
</aside>