$(document).ready(function(){
    var colors =[];
    $('#btnAdd').click(function(){
        var fnCell = $('<td>'+$('#color-select').find(':selected').data('color')+'</td>');
        var opCell = $('<td><i class="fa fa-fw fa-trash del"></i></td>');
        colors.push($('#color-select').val());
        // console.log(colors.indexOf(fnCell));

        var row = $('<tr></tr>');
        row.append(fnCell , opCell);
        $("#persons").append(row);
        $('.del').click(function(){
            var a = $(this).closest('tr');
            // a.remove();
            console.log(a);

        });

        document.getElementById('colors').value = JSON.stringify(colors) ;
    });

});