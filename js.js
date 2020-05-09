// var current_val;
// $(".map-item").on('click', function(){
//     current_val = $(this).text();
// });
document.addEventListener('keydown', function(event) {
    if (event.code == 'KeyA') {
        $.ajax({
            url:"controller.php",
            type:"POST",
            async: true,
            data:{
                'direction': 'left',
            },
            success:function(data){
                if (data == 'over'){
                    let im = "<img src='over.jpg'>";
                    $('#map').html(im);
                }
                else {
                    $('#map').html(data);
                    colors();
                }

            }
        });
    }
    if (event.code == 'KeyW') {
        $.ajax({
            url:"controller.php",
            type:"POST",
            async: false,
            data:{
                'direction': 'up',
            },
            success:function(data){
                if (data == 'over'){
                    let im = "<img src='over.jpg'>";
                    $('#map').html(im);
                }
                else {
                    $('#map').html(data);
                    colors();
                }
            }
        });
    }
    if (event.code == 'KeyD') {
        $.ajax({
            url:"controller.php",
            type:"POST",
            async: true,
            data:{
                'direction': 'right',
            },
            success:function(data){
                if (data == 'over'){
                    let im = "<img src='over.jpg'>";
                    $('#map').html(im);
                }
                else {
                    $('#map').html(data);
                    colors();
                }
            }
        });
    }
    if (event.code == 'KeyS') {
        $.ajax({
            url:"controller.php",
            type:"POST",
            async: true,
            data:{
                'direction': 'down',
            },
            success:function(data){
                if (data == 'over'){
                    let im = "<img src='over.jpg'>";
                    $('#map').html(im);
                }
                else {
                    $('#map').html(data);
                    colors();
                }
            }
        });
    }
});

$('#start').on('click', function () {
    $.ajax({
        url:"controller.php",
        type:"POST",
        async: true,
        data:{
            'start': 'go',
        },
        success:function(data){
            $('#map').html(data);
            colors();
        }
    });
});

function colors(){
    let elements = document.getElementsByClassName('map-item');
    for(let i=0; i<elements.length; i++){
        setColor(document.getElementsByClassName('map-item')[i])
    }

}


function setColor(el) {
    let value = el.innerText;
    switch (value) {
        case ('2'):
            el.style.background = '#FFF8DC';
            break;
        case ('4'):
            el.style.background = '#FFEBCD';
            break;
        case ('8'):
            el.style.background = '#FFE4C4';
            break;
        case ('16'):
            el.style.background = '#FFDEAD';
            break;
        case ('32'):
            el.style.background = '#F5DEB3';
            break;
        case ('64'):
            el.style.background = '#DEB887';
            break;
        case ('128'):
            el.style.background = '#D2B48C';
            break;
        case ('256'):
            el.style.background = '#BC8F8F';
            break;
        case ('512'):
            el.style.background = '#F4A460';
            break;
    }

}
