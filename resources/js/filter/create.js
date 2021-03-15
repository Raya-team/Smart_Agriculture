$(document).ready(function(){
    var colors =[];
    $('#btnAdd').click(function(){
        var x = $('#color-select').val();
        // var y = $('#color-select').find(':selected').data('color');
        var fnCell = $('<td><div style="background-color:' +x+ ';width: 18px;height: 18px"></div></td>');
        var opCell = $('<td><i class="fa fa-fw fa-trash del"></i></td>');
        colors.push($('#color-select').val());

        var row = $('<tr></tr>');
        row.append(fnCell , opCell);
        $("#persons").append(row);
        $('.del').click(function(){
            var a = $(this).closest('tr');
            a.remove();
            var b =$(clo)
            // console.log(a);

        });

        document.getElementById('colors').value = JSON.stringify(colors) ;
    });

});