$(function () {

    $('button').on('click', function () {
        var nome = $('#nome').val();

        $.ajax({
            url: 'http://localhost/phpZeroAoProfissional/ajaxNoMVC/ajax',
            type: 'POST',
            data: { nome: nome },
            dataType: 'json',
            success: function (res) {
                console.log(res);
                $('.borda').html('<h1>' + res.frase + '</h1>');
            }
        })

    })

})