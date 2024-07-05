(function() {

   const sidebarMenu = document.querySelector('#sidebar')
   if(sidebarMenu) {

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