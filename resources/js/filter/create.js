$(document).ready(function(){
    var colors = [];
    $('#btnAdd').click(function(){
        var x = $('#color-select').val();
        var y = $('#color-select').find(':selected').data('color');
        var fnCell = $('<td class="del1"><div  style="background-color:' +x+ ';width: 18px;height: 18px">'+y+'</div></td>');
        // var opCell = $('<td><i class="fa fa-fw fa-trash del"></i></td>');
        colors.push($('#color-select').find(':selected').data('color'));

        var row = $('<tr></tr>');
        row.append(fnCell);
        $("#persons").append(row);
        $('.del').click(function(){
            var a = $('.del1').closest('tr').remove();

        /*   var b = a[0].innerText;
           console.log(b);
           var c = colors.indexOf(b);
           var d = colors.splice(c,1);
           console.log(colors);*/
        });


        // document.getElementById('colors').value = JSON.stringify(colors) ;
    });

});