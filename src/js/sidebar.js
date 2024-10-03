(function() {

   const sidebar = document.querySelector('#sidebar')
   if(sidebar) {

      const openMenuMobil = document.querySelector(".header__open-mobil")
      const openMenuPC = document.querySelector(".header__open-pc")
      const closeMenu = document.querySelector(".sidebar__close")
      const showMenu = "sidebar__show"
      const noTransition = "no-transition"
      let resize

      openMenuMobil.addEventListener("click", () => sidebar.classList.add(showMenu) );
      openMenuPC.addEventListener("click", () => sidebar.classList.toggle('sidebar__toogle') );
      closeMenu.addEventListener("click", () => sidebar.classList.remove(showMenu) );
 
      window.addEventListener("resize", () => {
         sidebar.querySelectorAll("*").forEach(function(el) {
            el.classList.add(noTransition)
         })
         clearInterval(resize)
         resize = setTimeout(resizingComplete, 500)
      })

      function resizingComplete() {
         sidebar.querySelectorAll("*").forEach(function(el) {
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