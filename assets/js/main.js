window.addEventListener('load', function(){
    document.querySelectorAll('body.home header:not(.landing-header), body.home footer').forEach(elem=>elem.remove());
    let slider = document.querySelector('.common--slider .swiper-container');
    if(slider !== null && slider.length > 0){
        const swiper = new Swiper('.common--slider .swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }    
});