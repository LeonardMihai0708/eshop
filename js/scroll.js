//Change navigation style on scroll
window.addEventListener('scroll', event => { 
    let nav = document.querySelector('.fa-level-up-alt'); 
    (window.scrollY >= 800) ? nav.classList.add('scroll') : nav.classList.remove('scroll');


    /*
    if(!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|iOS/i.test(navigator.userAgent))){
        let arrow = document.querySelector('.arrow'); 
        (window.scrollY >= 200) ? arrow.classList.add('scroll') : arrow.classList.remove('scroll'); 
        let arrow_2 = document.querySelector('.arrow_2'); 
        (window.scrollY >= 200) ? arrow_2.classList.add('scroll') : arrow_2.classList.remove('scroll'); 
        let arrow_3 = document.querySelector('.arrow_3'); 
        (window.scrollY >= 200) ? arrow_3.classList.add('scroll') : arrow_3.classList.remove('scroll'); 
        let arrow_4 = document.querySelector('.arrow_4'); 
        (window.scrollY >= 200) ? arrow_4.classList.add('scroll') : arrow_4.classList.remove('scroll'); 
    }
    */
});
