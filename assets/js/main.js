window.addEventListener('load', ()=>{
    document.querySelectorAll('body.home header:not(.landing-header), body.home footer').forEach(elem=>elem.remove());
});