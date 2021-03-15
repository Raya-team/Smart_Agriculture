$(document).ready(function(){
    $('#btnAdd').click(function(){
        var fnCell = $('<td>'+$('#color').find(':selected').data('color')+'</td>');
        var opCell = $('<td><i class="fa fa-fw fa-trash del"></i></td>');
        var colors =[];
        colors.push(fnCell.value);
        console.log(colors);

        var row = $('<tr></tr>');
        row.append(fnCell , opCell);
        $("#persons").append(row);
        $('.del').click(function(){
            $(this).closest('tr').remove()
        })
    });
});