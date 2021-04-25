$(document).ready(function(){

    var colors = [];
    var colorjson = document.getElementById('colors').value;
    var color = JSON.parse(colorjson);

    for (var i = 0; i < color.length; i++)
    {
        colors.push(color[i]);
        var fnCell = $('<td class="del1"><div  style="background-color:' +color[i]+ ';width: 20px;height: 20px; border-radius: 100%; margin-top: 2px; margin-right: auto; margin-left: auto;"></div></td>');
        var row = $('<tr></tr>');
        row.append(fnCell);
        $("#persons").append(row);
    }
    console.log(colors);

    $('.del').click(function(){
        $('.del1').closest('tr').remove();
        document.getElementById('colors').value = null ;
        colors.splice([0]);
    });

    $('#btnAdd').click(function(){
        var x = $('#color-select').val();
        var y = $('#color-select').find(':selected').data('color');
        var fnCell = $('<td class="del1"><div  style="background-color:' +x+ ';width: 20px;height: 20px; border-radius: 100%; margin-top: 2px; margin-right: auto; margin-left: auto;"></div></td>');
        var row = $('<tr></tr>');

        if (colors.find(item => item === y)){
            $.alert({
                title: 'Alert!',
                content: 'Simple alert!',
            });
        } else {
            colors.push(y);
            row.append(fnCell);
        }


        $("#persons").append(row);
        $('.del').click(function(){
            $('.del1').closest('tr').remove();
            document.getElementById('colors').value = null ;
            colors.splice([0]);
        });

        document.getElementById('colors').value = JSON.stringify(colors) ;
    });
});





