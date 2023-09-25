function addCategoria(id, descricao) {
    if (descricao !== "") {
        $.ajax({
            type: "POST",
            url: "/categoria/save",
            data: {
                id: id,
                descricao: descricao,
               
            },
            dataType: 'json',
            success: function (result) {
                swal({
                    icon: 'success',
                    text: 'Categoria registrada com sucesso!'
                })
            },
            error: function (result) {
                swal({
                    icon: 'error',
                    text: 'Erro interno ao registrar Categoria!'
                })
            }
        });
    } else {
        swal({
            icon: 'error',
            text: 'Preencha todos os campos!'
        })
    }
}

function getCategoriaById(id) {
    $.ajax({
        type: "GET",
        url: `/categoria/get-by-id?id=${id}`,
        dataType: 'json',
        success: function (result) {
            $('#id').val(result.response_data.id);
            $('#descricao').val(result.response_data.descricao);         
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deleteCategoria(id) {
    $.ajax({
        type: "GET",
        url: `/categoria/delete?id=${id}`,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTableCategoria() {
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
}

$(document).ready(function () {
    loadTableCategoria();

    $('.btn-edit').click(function (event) {
        getCategoriaById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deleteCategoria(event.target.id);

        window.location.reload(true);
    })

    $('#adicionarCategoria').click(() => {
        addCategoria($('#id').val(),  $('#descricao').val())
    })


})