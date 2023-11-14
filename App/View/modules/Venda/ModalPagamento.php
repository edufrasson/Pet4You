<div class="modal fade" id="modalPagamento" tabindex="-1" role="dialog" aria-labelledby="modalProdutoTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Finalizar Venda
            </div>
            <form method="post">
                <input type="hidden" id="id">
                <div class="input-row">
                    <div class="input-container select-container">
                        <label for="id_pet">Pet:</label><br>
                        <select class="selectpicker bg-light" name="id_pet" id="id_pet" data-live-search="true">
                            <option value="">Cadastre um produto primeiro!</option>
                            <?php foreach ($model->arr_pets as $pet) : ?>
                                <option value="<?= $pet->id ?>"><?= $pet->nome ?> - <?= $pet->cliente ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="input-row p-5">
                    <div class="input-container">
                        <label for="txtDataVenda">Data da Venda: </label><br>
                        <input class="form-control" type="date" name="data_venda" id="data_venda">
                    </div>
                    <div class="input-container">
                        <label for="valor_total">Valor Total (R$): </label><br>
                        <input disabled class="form-control" type="number" name="valor_total" id="valor_total">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-pet" id="finalizarVenda">Salvar Registro</button>
                </div>
            </form>
        </div>
    </div>
</div>