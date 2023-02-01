(function(){



        const darkToogle = document.querySelector('.toggle-dark');
      
        darkToogle.addEventListener('click',(event) => {
          event.preventDefault();
          document.documentElement.classList.toggle('dark');
        });

})();

