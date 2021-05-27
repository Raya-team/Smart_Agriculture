import 'granim/dist/granim.min'

$(document).ready(function(){
    var x = document.getElementById("color-select");
    // convert hex to rgb
    // function hexToRgb(hex) {
    //     var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    //     return result ? {
    //         r: parseInt(result[1], 16),
    //         g: parseInt(result[2], 16),
    //         b: parseInt(result[3], 16)
    //     } : null;
    // }
    var colors = [];
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
            // colors.push(hexToRgb(x.value));
            colors.push(x.value);
        }

        var granimInstance = new Granim({
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
            granimInstance.destroy();
            document.getElementById('colors').value = null ;
            // colors.splice([0]);
            colors.splice([0]);
        });
        document.getElementById('colors').value = JSON.stringify(colors) ;
    });

});