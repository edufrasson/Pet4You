/*function addProduto(id, descricao, preco, id_categoria) {
    if (descricao !== "") {
        $.ajax({
            type: "POST",
            url: "/produto/save",
            data: {
                id: id,
                descricao: descricao,
                preco: preco,
                id_categoria: id_categoria
               
            },
            dataType: 'json',
            success: function (result) {
                swal({
                    icon: 'success',
                    text: 'Produto registrada com sucesso!'
                })
            },
            error: function (result) {
                swal({
                    icon: 'error',
                    text: 'Erro interno ao registrar Produto!'
                })
            }
        });
    } else {
        swal({
            icon: 'error',
            text: 'Preencha todos os campos!'
        })
    }
}*/

function getProdutoById(id) {
    $.ajax({
        type: "GET",
        url: `/produto/get-by-id?id=${id}`,
        dataType: 'json',
        success: function (result) {
            $('#id').val(result.response_data.id);
            $('#descricao').val(result.response_data.descricao);         
            $('#preco').val(result.response_data.preco);         
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function deleteProduto(id) {
    $.ajax({
        type: "GET",
        url: `/produto/delete?id=${id}`,
        dataType: 'json',
        success: function (result) {
            console.log(result)
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTableProduto() {
    $('.spinner-border').delay(1000).hide();
    $('.table-style').delay(1000).removeClass("off");
}

$(document).ready(function () {
    loadTableProduto();

    $('.btn-edit').click(function (event) {
        getProdutoById(event.target.id);
    })

    $('.btn-delete').click(function (event) {
        deleteProduto(event.target.id);

        window.location.reload(true);
    })

    $('#adicionarProduto').click(() => {
        addProduto($('#id').val(),  $('#descricao').val(), $("#preco").val(), $("#id_categoria").val())
    })


})