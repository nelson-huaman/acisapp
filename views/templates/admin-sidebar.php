<aside class="sidebar" id="sidebar">
   <div class="sidebar__logo">
      <div class="sidebar__nombre-sitio">
         ACIS Sistema
      </div>
   </div>
   <ul class="menu">
      <li class="menu__item <?php echo paginaActual('dashboard') ? 'menu__activo' : ''; ?>">
         <a href="/admin/dashboard" class="menu__enlace">
            <i class="fa-solid fa-house"></i>
            <span class="menu__nombre">Escritorio</span>
         </a>
      </li>
      <li class="menu__item <?php echo paginaActual('clientes') ? 'menu__activo' : ''; ?>">
         <div class="menu__enlace menu__icono">
            <i class="fa-solid fa-user-group"></i>
            <span class="menu__nombre">Cliente</span>
         </div>
         <ul class="menu__submenu">
            <li class="menu__item--sub">
               <a href="/admin/clientes" class="menu__enlace">
                  <i class="fa-solid fa-caret-right"></i>
                  <span class="menu__nombre">Clientes</span>
               </a>
            </li>
            <li class="menu__item--sub">
               <a href="/admin/clientes/profesiones" class="menu__enlace">
                  <i class="fa-solid fa-caret-right"></i>
                  <span class="menu__nombre">Profesiones</span>
               </a>
            </li>
            <li class="menu__item--sub">
               <a href="/admin/clientes/grados" class="menu__enlace">
                  <i class="fa-solid fa-caret-right"></i>
                  <span class="menu__nombre">Grados Académicos</span>
               </a>
            </li>
         </ul>
      </li>
      <li class="menu__item <?php echo paginaActual('asesores') ? 'menu__activo' : ''; ?>">
         <div class="menu__enlace menu__icono">
            <i class="fa-solid fa-user-tie"></i>
            <span class="menu__nombre">Asesor</span>
         </div>
         <ul class="menu__submenu">
            <li class="menu__item--sub">
               <a href="/admin/asesores" class="menu__enlace">
                  <i class="fa-solid fa-caret-right"></i>
                  <span class="menu__nombre">Asesores</span>
               </a>
            </li>
            <li class="menu__item--sub">
               <a href="/admin/asesores/roles" class="menu__enlace">
                  <i class="fa-solid fa-caret-right"></i>
                  <span class="menu__nombre">Roles</span>
               </a>
            </li>
            <li class="menu__item--sub">
               <a href="/admin/asesores/sedes" class="menu__enlace">
                  <i class="fa-solid fa-caret-right"></i>
                  <span class="menu__nombre">Sedes</span>
               </a>
            </li>
         </ul>
      </li>
      <li class="menu__item <?php echo paginaActual('servicios') ? 'menu__activo' : ''; ?>">
         <div class="menu__enlace menu__icono">
            <i class="fa-solid fa-user-tie"></i>
            <span class="menu__nombre">Servicio</span>
         </div>
         <ul class="menu__submenu">
            <li class="menu__item--sub">
               <a href="/admin/servicios" class="menu__enlace">
                  <i class="fa-solid fa-caret-right"></i>
                  <span class="menu__nombre">Programas</span>
               </a>
            </li>
            <li class="menu__item--sub">
               <a href="/admin/servicios/categorias" class="menu__enlace">
                  <i class="fa-solid fa-caret-right"></i>
                  <span class="menu__nombre">Categorias</span>
               </a>
            </li>
            <li class="menu__item--sub">
               <a href="/admin/servicios/modalidades" class="menu__enlace">
                  <i class="fa-solid fa-caret-right"></i>
                  <span class="menu__nombre">Modalidades</span>
               </a>
            </li>
            <li class="menu__item--sub">
               <a href="/admin/servicios/promociones" class="menu__enlace">
                  <i class="fa-solid fa-caret-right"></i>
                  <span class="menu__nombre">Promociones</span>
               </a>
            </li>
         </ul>
      </li>
      <li class="menu__item">
         <a href="/admin/dashboard" class="menu__enlace">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="menu__nombre">Otros</span>
         </a>
      </li>
      <li class="menu__item">
         <a href="/admin/dashboard" class="menu__enlace">
            <i class="fa-solid fa-house"></i>
            <span class="menu__nombre">Documentación</span>
         </a>
      </li>
   </ul>
</aside>