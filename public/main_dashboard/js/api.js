



function init() {

    var url = 'https://api.coinmarketcap.com/v1/ticker/?limit=8';

    postData();
        // runOWL();

    //Call API get Data

    function postData() {
        "use strict";
        var response = [{name:'GOLDUD'},{name:'AUDUSD'},{name:'EURUSD'},{name:'GBPUSD'},{name:'NZDUSD'},{name:'USDCAD'},{name:'USDCHF'},{name:'USDJPY'},{name:'EURJPY'},{name:'GBPJPY'}];
        getDataRoot(response);
    }

}

//Graph header crypto value

const app = document.getElementById('root');
var cryptoValue = 0;

function getDataRoot(data) {
    "use strict";

    cryptoValue = data;

    const container = document.createElement('div');
    container.setAttribute('id', 'container');
    container.setAttribute('class', 'container');

    
    const row = document.createElement('div');
    row.setAttribute('class', 'row');

    app.appendChild(container);
    container.appendChild(row);

    const content = document.createElement('div');
    content.setAttribute('class', 'owl-carousel owl-theme top-crypto-carousel');
    row.appendChild(content);


    data.forEach(resp => {

        const card = document.createElement('div');
        card.setAttribute('class', 'item box-crypto');

        // Create an h1 and set the text content to the price title
        const h1 = document.createElement('h1');
 

        h1.textContent = resp.name;

        content.appendChild(card);
        card.appendChild(h1);
    });
  

        $('.owl-carousel.top-crypto-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            navText: ["", ""],
            rewindNav: false,
            nav: false,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1100: {
                    items: 3,
                },
                1300: {
                    items: 4,
                },
                1400: {
                    items: 5,
                }
            }
        });
        $('.play').on('click',function(){
            owl.trigger('play.owl.autoplay',[9000])
        })
        $('.stop').on('click',function(){
            owl.trigger('stop.owl.autoplay')
        })
   

}


function runOWL() {
    "use strict";

        $('.owl-carousel.top-crypto-carousel').owlCarousel({
            loop: true,
            margin: 1,
            responsiveClass: true,
            navText: ["", ""],
            rewindNav: false,
            nav: false,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:false,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                1100: {
                    items: 5,
                },
                1300: {
                    items: 6,
                },
                1400: {
                    items: 8,
                }
            }
        });
        $('.play').on('click',function(){
            owl.trigger('play.owl.autoplay',[90000])
        })
        $('.stop').on('click',function(){
            owl.trigger('stop.owl.autoplay')
        })

}

setInterval(function () {

    var myContainer = document.getElementById("container");
 

    init();

}, 300000);

clearInterval();

init();
