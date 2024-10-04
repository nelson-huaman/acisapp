(function() {

   const sidebar = document.querySelector('#sidebar');
   if(sidebar) {

      const openMenuMobil = document.querySelector('.header__open-mobil');
      const openMenuPC = document.querySelector('.header__open-pc');
      const closeMenu = document.querySelector('.sidebar__close');
      const closeDiv = document.querySelector('.sidebar__div');
      const expandir = document.querySelector('.expandir');
      const showMenu = 'sidebar__show';
      const toogle = 'sidebar__toogle';
      const noTransition = 'no-transition';
      let resize;

      openMenuMobil.addEventListener('click', () => sidebar.classList.add(showMenu) );
      openMenuPC.addEventListener('click', () => sidebar.classList.toggle(toogle) );
      closeMenu.addEventListener('click', () => sidebar.classList.remove(showMenu) );
      closeDiv.addEventListener('click', () => sidebar.classList.remove(showMenu) );
      expandir.addEventListener('click', () => document.documentElement.requestFullscreen() );
 
      window.addEventListener('resize', () => {
         sidebar.querySelectorAll('*').forEach( item => item.classList.add(noTransition));
         clearInterval(resize)
         resize = setTimeout(resizingComplete, 500)
      })

      function resizingComplete() {
         sidebar.querySelectorAll('*').forEach( item => item.classList.remove(noTransition));
      }

      const menuItems = document.querySelectorAll('.menu__item');
      menuItems.forEach(item => {
         item.addEventListener('click', () => {
            menuItems.forEach( item => item.classList.remove('menu__activo') );
            if(item.querySelector('.menu__submenu')) {
               item.classList.add('menu__activo');
               
            }
         });
      });
   }
   
})();