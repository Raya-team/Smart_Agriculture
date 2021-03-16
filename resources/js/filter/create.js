$(document).ready(function(){
    var colors = [];
    $('#btnAdd').click(function(){
        var x = $('#color-select').val();
        var y = $('#color-select').find(':selected').data('color');
        var fnCell = $('<td class="del1"><div  style="background-color:' +x+ ';width: 18px;height: 18px; border-radius: 100%; margin-top: 2px"></div></td>');
        // var opCell = $('<td><i class="fa fa-fw fa-trash del"></i></td>');
        colors.push($('#color-select').find(':selected').data('color'));

        var row = $('<tr></tr>');
        row.append(fnCell);
        $("#persons").append(row);
        $('.del').click(function(){
            $('.del1').closest('tr').remove();
            document.getElementById('colors').value = null ;
            colors.splice([0]);
        });


        document.getElementById('colors').value = JSON.stringify(colors) ;
    });

});