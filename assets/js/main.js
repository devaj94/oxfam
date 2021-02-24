document.addEventListener('DOMContentLoaded', function(){
    if(document.querySelector('.homepages-dropdown') !== null){
        let activeHomepage = document.querySelector('.homepages-dropdown li.current-menu-item');
        if( activeHomepage !== null ){
            document.querySelector('.activeHomeWrap #activeHome > span').innerHTML = activeHomepage.textContent;
            activeHomepage.remove();
        }
        else{
            document.querySelector('.activeHomeWrap #activeHome > span').innerHTML = document.querySelector('.homepages-dropdown li').textContent;
        }
    }    
    function indexInParent(node) {
        var children = node.parentNode.childNodes;
        var num = 0;
        for (var i=0; i<children.length; i++) {
             if (children[i]==node) return num;
             if (children[i].nodeType==1) num++;
        }
        return -1;
    }

    function initAcc(elem, option){
        document.addEventListener('click', function (e) {
            if (!e.target.matches(elem+' .accordion--heading')) return;
            else{
                if(!e.target.parentElement.classList.contains('active')){
                    if(option==true){
                        var elementList = document.querySelectorAll(elem+' .accordion--panel');
                        Array.prototype.forEach.call(elementList, function (e) {
                            e.classList.remove('active');
                        });
                    }            
                    e.target.parentElement.classList.add('active');
                }else{
                    e.target.parentElement.classList.remove('active');
                }
            }
        });
    }
    initAcc('.product--accordion', false);  
    let sideCartButton = document.querySelector('.site-header .icon-button.cart');
    if(sideCartButton !== null){
        sideCartButton.addEventListener('click', function(e){
            e.preventDefault();
            let sideCartModal = document.querySelector('.xoo-wsc-modal');
            if(sideCartModal !== null){
                sideCartModal.classList.toggle('xoo-wsc-cart-active');
            }
        });
    }
    // Increment/Decrement Quantity in Single Product Page
    let wooCartQtyCtrl = jQuery('.input-qty-control');
    if( wooCartQtyCtrl !== null ){
        wooCartQtyCtrl.on('click', function(elem){
            if(jQuery(this).hasClass('decrement')){
                let input = jQuery(this).next('input');
                if( input.val() > 0 ){
                    input.val(input.val() - 1);
                }
            }
            if(jQuery(this).hasClass('increment')){
                let input = jQuery(this).prev('input');
                input.val(parseInt(input.val()) + 1);
            }
        });
    }

    // Contact Form Custom Checkbox
    let privacyCheckbox = jQuery('.privacy--check input[type="checkbox"]');
    if(privacyCheckbox !== null){
        jQuery(privacyCheckbox).after('<span class="site--checkbox"></span>');
    }

    jQuery('.woocommerce .quantity input').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    function debounce(cb, interval, immediate) {
        var timeout;
      
        return function() {
          var context = this, args = arguments;
          var later = function() {
            timeout = null;
            if (!immediate) cb.apply(context, args);
          };          
      
          var callNow = immediate && !timeout;
      
          clearTimeout(timeout);
          timeout = setTimeout(later, interval);
      
          if (callNow) cb.apply(context, args);
        };
    }
    var updateCartAjax = debounce(function() {
        jQuery("[name='update_cart']").trigger('click');
    }, 300);
    jQuery('div.woocommerce').on( 'change', 'input.qty', updateCartAjax);
});

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