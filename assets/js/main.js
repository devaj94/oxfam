window.addEventListener('load', ()=>{
    document.querySelectorAll('body.home header:not(.landing-header), body.home footer').forEach(elem=>elem.remove());
    const swiper = new Swiper('#b2c-slider .swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});