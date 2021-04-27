import 'granim/dist/granim.min'

$(document).ready(function(){
    var x = document.getElementById("color-select");
    var colors = JSON.parse(document.getElementById('colors').value);

    var granimInstance1 = new Granim({
        element: '#granim-canvas',
        direction: 'left-right',
        opacity: [0.8, 1],
        states : {
            "default-state": {
                gradients: [
                    colors
                ]
            }
        }
    });

    $('#btnAdd').click(function(){
        if (colors.find(item => item === x.value)) {
            $("#color-error").show(1000);
            setTimeout(function () {
                $("#color-error").hide(1000);
            }, 4000);
        }else if (colors.length > 4) {
            $("#color-error-count").show(1000);
            setTimeout(function () {
                $("#color-error-count").hide(1000);
            }, 4000);
        } else {
            colors.push(x.value);
        }

        var granimInstance2 = new Granim({
            element: '#granim-canvas',
            direction: 'left-right',
            opacity: [0.8, 1],
            states : {
                "default-state": {
                    gradients: [
                        colors
                    ]
                }
            }
        });

        $('.del').click(function(){
            granimInstance1.destroy();
            granimInstance2.destroy();
            document.getElementById('colors').value = null ;
            colors.splice([0]);
        });
        document.getElementById('colors').value = JSON.stringify(colors) ;
    });
    $('.del').click(function(){
        granimInstance1.destroy();
        document.getElementById('colors').value = null ;
        colors.splice([0]);
    });
});
