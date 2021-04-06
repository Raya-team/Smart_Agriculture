// import 'jquery-confirm/dist/jquery-confirm.min'
//
// $.alert({
//     title: 'Alert!',
//     content: 'Simple alert!',
// });

$(document).ready(function(){
    var colors = [];
    $('#btnAdd').click(function(){
        // var x = $('#color-select').val();
        var y = $('#color-select').find(':selected').data('color');
        var fnCell = $('<td class="del1"><div  style="background-color:' +y+ ';width: 20px;height: 20px; border-radius: 100%; margin-top: 2px; margin-right: auto; margin-left: auto;"></div></td>');
        var row = $('<tr></tr>');

        if (colors.find(item => item === y)){
            $("#color-error").show(2000);
            setTimeout(function(){
                $("#color-error").hide(2000);
                }, 3000);
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