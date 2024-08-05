<aside class="sidebar" id="sidebar">
   <nav class="sidebar__nav">
      <ul class="menu">
         <li class="menu__header">
            <img src="/build/img/logo-acis-blanco.webp" alt="Logo Acis" class="menu__logo">
            <button class="menu__close">
               <i class="fa-solid fa-xmark"></i>
            </button>
         </li>
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
         <li class="menu__footer">
            <nav class="menu-redes">
               <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://acis.edu.pe/">
                  <span class="menu-redes__ocultar">Sitio Web</span>
               </a>
               <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://acis.pe/">
                  <span class="menu-redes__ocultar">Aula Virtual</span>
               </a>
               <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://www.facebook.com/acisespecializacion/">
                  <span class="menu-redes__ocultar">Facebook</span>
               </a>
               <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://www.youtube.com/@ACISESPECIALIZACION">
                  <span class="menu-redes__ocultar">YouTube</span>
               </a>
               <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://www.instagram.com/acis_especializacion/">
                  <span class="menu-redes__ocultar">Instagram</span>
               </a>
               <a class="menu-redes__enlace" rel="noopener noreferrer" target="_blank" href="https://www.tiktok.com/@acis.especializacion">
                  <span class="menu-redes__ocultar">Tiktok</span>
               </a>
            </nav>
         </li>
      </ul>
   </nav>
</aside>