window.addEventListener('load', function(){
    document.querySelectorAll('body.home header:not(.landing-header), body.home footer').forEach(elem=>elem.remove());
    let slider = document.querySelector('.common--slider .swiper-container');
    if(slider !== null){
        const swiper = new Swiper('.common--slider .swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    let aboutNewsSlider = document.querySelector('.news--insights .swiper-container');
    if(aboutNewsSlider !== null){
        const swiper = new Swiper(aboutNewsSlider, {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 3
        });
    }    
});