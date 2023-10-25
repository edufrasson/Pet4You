
function getPetById(id) {
    $.ajax({
        type: "GET",
        url: `/pet/get-by-id?id=${id}`,
        dataType: 'json',
        success: function (result) {
            $('#id').val(result.response_data.id);
            $('#nome').val(result.response_data.nome);         
            $('#raca').val(result.response_data.raca);         
            $('#cliente').val(result.response_data.cliente);         
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deletePet(id) {
    $.ajax({
        type: "GET",
        url: `/pet/delete?id=${id}`,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTablePet() {
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
}

$(document).ready(function () {
    loadTablePet();

    $('.btn-edit').click(function (event) {
        getPetById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deletePet(event.target.id);

        window.location.reload(true);
    })

    $('#adicionarPet').click(() => {
        addPet($('#id').val(),  $('#descricao').val())
    })


})