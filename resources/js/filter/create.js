$(document).ready(function(){
    var x = document.getElementById("color-select");
    var y = document.getElementById("btnAdd");
    var z = x.value;
    // convert hex to rgb
    function hexToRgb(hex) {
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    }

    var colors = [];
    var colors2 = [];
    $('#btnAdd').click(function(){
        var fnCell = $('<td class="del1"><div  style="background-color:' + x.value + ';width: 20px;height: 20px; border-radius: 100%; margin-top: 2px; margin-right: auto; margin-left: auto;"></div></td>');
        var row = $('<tr></tr>');
        console.log(colors);
        console.log(hexToRgb(x.value));
        if (colors2.find(item => item === x.value)){
            $("#color-error").show(1000);
            setTimeout(function(){
                $("#color-error").hide(1000);
            }, 4000);
        } else {
            colors.push(hexToRgb(x.value));
            colors2.push(x.value);
            row.append(fnCell);
        }

        $("#persons").append(row);
        $('.del').click(function(){
            $('.del1').closest('tr').remove();
            document.getElementById('colors').value = null ;
            colors.splice([0]);
            colors2.splice([0]);
        });
        document.getElementById('colors').value = JSON.stringify(colors) ;
    });

});