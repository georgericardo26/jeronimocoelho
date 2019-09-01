$(function () {

    $('#search-icon').on('click', function () {
        this.elemen = $(this).next();
        if(this.elemen.width() === 0) {
            this.elemen.animate({"width": "180px", "margin-left": "4px"}, 100);
        }
    });

    $(window).on('click', function () {
        this.elemen = $(".input-search");
        if(this.elemen.width() > 0) {
            if ($(event.target).is(".input-search") === false && $(event.target).is("#search-icon") === false) {
                this.elemen.animate({"width": "0px", "margin-left": "0px"}, 100);
            }
        }
    });


    $(window).on('scroll', function () {
        let nav = $('#navbar-desktop');
        elem = nav.outerHeight();

        if ($(this).scrollTop() > elem){
            nav.removeClass("nav-bar-custom");
            nav.addClass("navbar-active");
        }
        else {
            nav.removeClass("navbar-active");
            nav.addClass("nav-bar-custom");
        }
    });
   $('.button-navbar-mobile').click(function () {
       let change = $(this).hasClass('change');
       if(change === false){
           $(this).toggleClass('change');
           $('.sidebar-mobile').animate({'marginLeft': '0px'}, 300);
       }
       else {
           $(this).toggleClass('change');
           $('.sidebar-mobile').animate({'marginLeft': '-300px'}, 300);
       }
   });

   $('.menu-item-dropdown .item-dropdown-menu').on('click', function () {
       let elem = $(this).closest('.menu-item-dropdown');
       let item = elem.find('.item-dropdown');
       if(elem.hasClass('opened') === false){
           item.show();
           elem.addClass('opened');
       }
       else {
           item.hide();
           elem.removeClass('opened');
       }
   });

    let photo = new SmartPhoto(".js-img-viwer");
    photo.on('change',function(){
        console.log('change');
    });
    photo.on('close',function(){
        console.log('close');
    });
    photo.on('swipestart',function(){
        console.log('swipestart');
    });
    photo.on('swipeend',function(){
        console.log('swipeend');
    });
    photo.on('loadall',function(){
        console.log('loadall');
    });
    photo.on('zoomin',function(){
        console.log('zoomin');
    });
    photo.on('zoomout',function(){
        console.log('zoomout');
    });
    photo.on('open',function(){
        console.log('open');
    });


    $('.like').click(function () {


       let current = parseInt($(this).next().text());
       let next = current + 1;
       let post = $(this).attr("data-post");
       $(this).next().text(next);

       $.ajax({
           method: "post",
           url: "/ajax/like",
           data: 'val='+next+'&post='+post
       }).then(function (sucess) {
          // console.log(sucess);
       }, function (error) {
           console.log(error);
       });
    });


});




