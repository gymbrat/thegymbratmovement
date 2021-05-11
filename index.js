$(document).ready(function(){

    // current navigation link
    var parts = location.pathname.split('/');
    var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash
    $(".navbar a[href*='" + lastSegment + "']").addClass("current");

    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    // top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive : {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000 : {
                items: 5
            }
        }
    });
        // top sale owl carousel
    $("#about .owl-carousel").owlCarousel({
        items : 2,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,1],
        itemsMobile : [600,1],
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:2,
                nav:false
            }
        },
        navigation:true,
        arrows: true,
        navigationText:["","<i class='fa fa-chevron-right'></i>"],
        pagination:true,
        autoplay:true
    }); 

    // isotope filter
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',
        isFitWidth: true,
        resizable: false,
        layoutMode: 'fitRows',
        gutter: 60
    });

    // filter items on button click
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue});
    })


    // new phones owl carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000 : {
                items: 5
            }
        }
    });

    // blogs owl carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            }
        }
    })

    // product qty section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $("#deal-price");
    // let $input = $(".qty .qty_input");

    // click on qty up button
    $qty_up.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({url: "template/ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(result){
                let obj = JSON.parse(result);
                let item_price = obj[0]['item_price'];

                if($input.val() >= 1 && $input.val() <= 9){
                    $input.val(function(i, oldval){
                        return ++oldval;
                    });

                    // increase price of the product
                    $price.text(parseInt(item_price * $input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                    $deal_price.text(subtotal.toFixed(2));
                }

            }}); // closing ajax request
    }); // closing qty up button

    // click on qty down button
    $qty_down.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({url: "template/ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(result){
                let obj = JSON.parse(result);
                let item_price = obj[0]['item_price'];

                if($input.val() > 1 && $input.val() <= 10){
                    $input.val(function(i, oldval){
                        return --oldval;
                    });


                    // increase price of the product
                    $price.text(parseInt(item_price * $input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                    $deal_price.text(subtotal.toFixed(2));
                }

            }}); // closing ajax request
    }); // closing qty down button

});

console.clear();
document.querySelector(".side-menu").addEventListener("click", animateIt);
const tl = gsap.timeline();
const tl2 = gsap.timeline();
const tl3 = gsap.timeline();

tl.to(".side-menu", {
    width: '30%',
    backgroundImage:'none',
    backgroundColor:'black',
    borderRight:"10px #FFFF solid",
    ease:"slow(0.3, 2, true)"
});
tl.to(".workout-plans", {
    x:-50,
    opacity: 1,
    stagger: 0.1,
    ease:"slow(0.3, 2, true)"
});

tl2.to("#side-text", {
    opacity: 0,
    timeScale:1
});

tl3.to(".side-menu img", {
  css: {position: "absolute",right: "3em"} 
});


tl.reversed(true);
tl.duration(1);
tl2.reversed(true);
tl2.duration(.1);
tl3.reversed(true);
tl3.duration(1);

function animateIt() {
    tl.reversed(!tl.reversed());
    tl2.reversed(!tl2.reversed());
    tl3.reversed(!tl3.reversed());
}

gsap.from('.hero-image', 1, {y:30, opacity: 0, delay: .5});
//gsap.from('.nav-item a', .5, {opacity: 0, stagger: 0.2});
gsap.from('.rightside img', 1, {opacity: 0, delay: 1.2});


// let tl = gsap.timeline({
//                 scrollTrigger: {
//                     trigger: '.about-me',
//                     start: 'top 80%'
//                 }
//         })
// tl.from(".aboutme-image", {y:-200, opacity: 0, duration: 1.5})
// .from(".left p:nth-child(1), .left p:nth-child(2)", {y: -50, opacity: 0, duration: 1}, "-=1")
// .from(".left p:nth-child(3)", {y: 50, opacity: 0, duration: 1}, "-=.9")