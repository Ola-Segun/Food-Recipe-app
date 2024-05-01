import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const burger = document.querySelector('#burger')
const menu = document.querySelector('#menu')
const nav = document.querySelector('.nav')


burger.addEventListener('click', () => {
    if (menu.classList.contains('show')){
        menu.classList.remove('show');
        // menu.classList.remove('hidden');
        menu.classList.add('hide');
    } else{
        // menu.classList.add('hidden');
        menu.classList.remove('hide')
        menu.classList.add('show');
    }
})


window.addEventListener('resize', () => {
    const screenWidth = window.innerWidth
    
    if(screenWidth > 768){
        menu.classList.add('show');
    }

    if(screenWidth <= 767){
        document.addEventListener('click', (event) => {
            if (!event.target.closest('#burger' || '.nav')) {
                if (menu.classList.contains('show')){
                    menu.classList.remove('show');
                    menu.classList.add('hide');
                }
            }
            // else if (!event.target.closest('.nav')) {
            //     if (menu.classList.contains('show')){
            //         menu.classList.remove('show');
            //         menu.classList.add('hide');
            //     }
            // }
        });
    }
});


