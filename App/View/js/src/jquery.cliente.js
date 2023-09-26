
function getClienteById(id) {
    $.ajax({
        type: "GET",
        url: `/cliente/get-by-id?id=${id}`,
        dataType: 'json',
        success: function (result) {
            $('#id').val(result.response_data.id);
            $('#descricao').val(result.response_data.descricao);         
            $('#cpf').val(result.response_data.cpf);         
            $('#data_nasc').val(result.response_data.data_nasc);         
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deleteCliente(id) {
    $.ajax({
        type: "GET",
        url: `/cliente/delete?id=${id}`,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTableCliente() {
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
}

$(document).ready(function () {
    loadTableCliente();

    $('.btn-edit').click(function (event) {
        getClienteById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deleteCliente(event.target.id);

        window.location.reload(true);
    })

    $('#adicionarCliente').click(() => {
        addCliente($('#id').val(),  $('#descricao').val())
    })


})