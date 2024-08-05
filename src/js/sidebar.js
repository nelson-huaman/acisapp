(function() {

   const sidebarMenu = document.querySelector('#sidebar')
   if(sidebarMenu) {

      const openMenu = document.querySelector(".header__open")
      const menu = document.querySelector(".header__menu")
      const closeMenu = document.querySelector(".menu__close")
      const navegacion = document.querySelector(".sidebar__nav")
      const usuario = document.querySelector(".header__usuario")
      const divUsuario = document.querySelector(".header__perfil")
      const showMenu = "sidebar__show"
      const noTransition = "no-transition"
      let resize

      openMenu.addEventListener("click", () => {
         navegacion.classList.add(showMenu)
      })

      closeMenu.addEventListener("click", () => {
         navegacion.classList.remove(showMenu)
      })

      menu.addEventListener("click", () => {
         sidebarMenu.classList.toggle('show')
      })

      usuario.addEventListener("click", () => {
         divUsuario.classList.toggle('header__show')
      })

      navegacion.addEventListener("click", () => {
         navegacion.classList.remove(showMenu)
      })

      window.addEventListener("resize", () => {
         header.querySelectorAll("*").forEach(function(el) {
            el.classList.add(noTransition)
         })
         clearInterval(resize)
         resize = setTimeout(resizingComplete, 500)
      })

      function resizingComplete() {
         header.querySelectorAll("*").forEach(function(el) {
            el.classList.remove(noTransition)
         })
      }

      const menuItems = document.querySelectorAll('.menu__item');
      menuItems.forEach(function(item) {
         item.addEventListener('click', function() {
            menuItems.forEach(function(item) {
               item.classList.remove('menu__activo')
            })
            if(item.querySelector('.menu__submenu')) {
               item.classList.add('menu__activo')
            }
         })
      })
      
   }
   
})();