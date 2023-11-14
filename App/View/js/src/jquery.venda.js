lista_produtos = Array();
var valor_total = 0;
var last_id_venda = false;
var venda_inserida = false;
var produtos_relacionados = false;

/*
  Requisição para inserir a venda
*/
function inserirVenda(data_venda, id, id_pet = null) {
  if (data_venda !== "") {
    $.ajax({
      type: "POST",
      url: "/venda/save",
      async: false,
      data: {
        id: id,
        data_venda: data_venda,
        id_pet: id_pet
      },
      dataType: "json",
      success: async function (result) {
        console.log(result)
        await relacionarProdutoVenda(result.response_data.id, lista_produtos);
        last_id_venda = result.response_data.id;
      },
      error: function (result) {
        console.log(result)
        swal({
          title: "Erro!",
          text: "Erro interno ao adicionar a venda. Tente Novamente",
          icon: "error",
          button: "OK",
        });
      },
    });
  } else {
    swal({
      title: "Erro!",
      text: "Preencha todos os campos! Tente Novamente",
      icon: "error",
      button: "OK",
    });
  }
}

/*
  Requisição para insert na tabela assoc de produto_venda
*/

function relacionarProdutoVenda(id_venda, lista_produtos) {
  if (id_venda != false && lista_produtos != null) {
    $.ajax({
      type: "POST",
      url: "/item/save",
      data: {
        id_venda: id_venda,
        lista_produtos: JSON.stringify(lista_produtos),
      },
      dataType: "json",
      success: function (result) {
        adicionarMovimentacao(last_id_venda, valor_total, $('#data_venda').val(), "ENTRADA", "Recebimento de Venda")
      },
      error: function (result) {
        console.log(result);
        swal({
          title: "Erro!",
          text: "Erro interno ao adicionar o produto na venda. Tente Novamente",
          icon: "error",
          button: "OK",
        });
      },
    });
  } else
    swal({
      title: "Erro!",
      text: "Preencha todos os campos! Tente Novamente",
      icon: "error",
      button: "OK",
    });
}

/**
 *  Requisição para insert na tabela de Movimentacao
 */

function adicionarMovimentacao(id_venda, valor_total, data_movimentacao, tipo, descricao, id = null) {
  if (id_venda != false && valor_total != false && data_movimentacao != false) {
    $.ajax({
      type: "POST",
      url: "/movimentacao/save",
      data: {
        id_venda: id_venda,
        valor_total: valor_total,
        data_movimentacao: data_movimentacao,
        descricao: descricao,
        tipo: tipo,
        id: id
      },
      dataType: "json",
      success: function (result) {
        swal({
          title: "Sucesso!",
          text: "Venda inserida com sucesso!",
          icon: "success",
          button: "OK",
        });
        
      },
      error: function (result) {
        swal({
          title: "Erro!",
          text: "Ocorreu um erro ao adicionar pagamento da venda! Tente Novamente",
          icon: "error",
          button: "OK",
        });
        console.log(result);
      },
    });
  } else {
    swal({
      title: "Erro!",
      text: "Preencha todos os campos! Tente Novamente",
      icon: "error",
      button: "OK",
    });
  }
}

/**
 * Requisição para adicionar os produtos na tabela
 */

function reloadTableProduct() {
  $.ajax({
    type: "GET",
    url: "/produto/get-by-id?id=" + $("#id_produto").val(),
    dataType: "json",
    success: function (result) {
      valor_total += $("#quantidade").val() * result.response_data.preco;
      lista_produtos.push({
        id_produto: result.response_data.id,
        quantidade: $("#quantidade").val(),
        valor_unit: result.response_data.preco,
      });

      $("#tableProduto").append(`<tr> 
            <td> ${result.response_data.descricao} </td> 
            <td> ${Intl.NumberFormat("pt-BR", {
              style: "currency",
              currency: "BRL",
            }).format(result.response_data.preco.toString())} </td>
            <td> ${$("#quantidade").val()} </td>             
            <td> ${result.response_data.categoria} </td> 
            <td class="actions-list-venda d-flex justify-content-center">                
                <box-icon name="trash" color="red" id="${
                  result.response_data.id
                }" class="btn-icon btn-delete-list"></box-icon>
            </td>
           </tr>`);

      updateTotalValue();

      // Função que retira os produtos da lista de compras
      $(".btn-delete-list").click(function () {
        lista_produtos.splice(
          lista_produtos.findIndex(
            (produto) => produto.id_produto == result.response_data.id
          ),
          1
        );
        $(this).closest("tr").remove(); // Removendo linha do elemento da tabela
      });
    },
    error: function (result) {
      swal({
        title: "Erro!",
        text: "Ocorreu um erro ao adicionar produto na venda! Tente Novamente",
        icon: "error",
        button: "OK",
      });
    },
  });
}

/**
 * Funções para atualizar os valores na modal de pagamento
 */

function updateTotalValue() {
  $("#valor_total").val(valor_total);
}

/* 
  Função Inicial da Página
*/

$(document).ready(function () {
  /* 
    Funções dos botões da tabela
  */

  $("#adicionarProduto").click(function () {
    reloadTableProduct();
  });

  /* 
    Função que chama todas as requisições necessárias para inserir uma venda completa

  */
  $("#finalizarVenda").click(async () => {
    await inserirVenda($("#data_venda").val(), $("#id").val(), $("#id_pet").val());

    setInterval(5000);
  });
});
