  var galleryThumbs1 = new Swiper('.gallery-thumbs1', {
            slidesPerView: 10,
              autoplay: {
                delay: 2970,
                disableOnInteraction: false
            },

        });
       
        var swiper1 = new Swiper('.swiper-container-main1'
      //  ,'data-swiper-parallax:122px'
        , {
             // parallax: true,
           spaceBetween: 1000,
            pagination: {
                el: '.swiper-pagination1',
                clickable: true,
            },
       
             effect: 'flip' ,
               //flipEffect: {
                //slideShadows: false
                //,transformEl:'.jumbotron'
             //},
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs1
            },
            autoplay: {
                delay: 2800,
                // disableOnInteraction:false //for not disabled when click swiper or any interactions
            },
           // freeMode: {
            //enabled: 'FreeModeOptions',
            //sticky: true,
            //},
            
            // grid: {
              //rows: 3
              //},
              
              on: {
            init: function () {
                parallax:true;
                console.log('swiper initialized'); },
            }

        });
        swiper1.on('slideChange', function () {
        console.log('slide changed');
        });
         swiper1.on('click', function () {
        console.log('slide clicked');
        });
      
        // swiper1.changeDirection('vertical', false);
        //swiper1.translateTo('200px', '30s', true, true)
        window.setInterval(function() {

            var randomColor = '#' + ('000000' + Math.floor(Math.random() * 76777215).toString(16)).slice(-
                6);
            // $('.container1Info1').css({
            //     'background-image': `linear-gradient(180deg, randomColor 0%, rgb(222 171 171) 140%)`,
            // });

            $('.textBehindEachPhoto .jumbotron .btn-new').css({
                'background-color': randomColor,
            });
            $(".textBehindEachPhoto .jumbotron h5").css({
                'color': randomColor,
            });


        }, 4720);
