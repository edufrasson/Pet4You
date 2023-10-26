<div class="modal fade" id="modalPagamento" tabindex="-1" role="dialog" aria-labelledby="modalProdutoTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="input-container">
                    
                        <label for="forma_pagamento">Forma de Pagamento</label><br>
                  
                    <select class="selectpicker" name="forma_pagamento" id="forma_pagamento">
                        <option value="">Escolha uma opção de pagamento!</option>
                        <option value="CREDITO">Cartão de Crédito</option>
                        <option value="DEBITO">Cartão de Débito</option>
                        <option value="BOLETO">Boleto Bancário</option>
                        <option value="DINHEIRO">Dinheiro</option>
                    </select>

                </div>
            </div>
            <form method="post">
                <input type="hidden" id="id">
                <!--
                    Modal do crédito
                -->
                <div class="modal-body modal-credito d-none" id="modal-credito">
                    <div class="input-row mb-3">
                        <div class="input-container">
                            <label for="id_taxa">Taxa do cartão:</label><br>
                            <select class="selectpicker select-taxa" name="taxa" id="select-taxa-credito">
                                <option value="">Cadastre uma taxa primeiro!</option>
                                <?php foreach ($model->arr_taxas as $taxa) : ?>
                                    <option value="<?= $taxa->valor ?>"><?= $taxa->codigo ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="qnt_parcelas">Quantidade de parcelas: </label><br>
                            <input class="form-control p-1 qnt_parcelas" type="number" name="qnt_parcelas" id="qnt_parcelas">
                        </div>
                    </div>
                    <div class="input-row d-flex justify-content-center">

                    </div>
                    <div class="input-row mb-3">
                        <div class="input-container">
                            <label for="valor_total">Valor total (R$): </label><br>
                            <input disabled class="form-control p-1 valor_total" type="number" name="valor_total" id="valor_total">
                        </div>
                        <div class="input-container pagamento-details ">
                            <label for="valor_taxa">Valor da Taxa (%): </label><br>
                            <input disabled class="form-control p-1 valor_taxa" type="number" name="valor_taxa" id="valor_taxa_credito">
                        </div>

                    </div>
                    <hr class="hr">
                        <div class="d-flex justify-content-center">
                            Parcelas
                        </div>
                    <hr class="hr">
                    <div class="input-row mb-3">
                        <div class="input-container pagamento-details">
                            <label for="valor_bruto_parcela">Valor Bruto (R$): </label><br>
                            <input disabled class="form-control p-1 valor_bruto_parcela" type="number" name="valor_bruto_parcela" id="valor_bruto_parcela">
                        </div>
                        <div class="input-container pagamento-details">
                            <label for="valor_liquido_parcela">Valor Líquido (R$): </label><br>
                            <input disabled class="form-control p-1 valor_liquido_parcela" type="number" name="valor_liquido_parcela" id="valor_liquido_parcela_credito">
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="input-row mb-3 d-flex justify-content-center">
                        <div class="input-container pagamento-details ">
                            <label for="valor_liquido">Valor Líquido: </label><br>
                            <input disabled class="form-control p-1" type="number" name="valor_liquido" id="valor_liquido_credito">
                        </div>
                    </div>

                </div>
                <!--
                    Modal do débito
                -->
                <div class="modal-body modal-debito d-none" id="modal-debito">
                    <div class="input-row mb-3">
                        <div class="input-container">
                            <label for="id_taxa">Taxa do cartão:</label><br>
                            <select class="selectpicker select-taxa" name="taxa" id="select-taxa-debito">
                                <option value="">Cadastre uma taxa primeiro!</option>
                                <?php foreach ($model->arr_taxas as $taxa) : ?>
                                    <option value="<?= $taxa->valor ?>"><?= $taxa->codigo ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-container">
                            <label for="valor_total">Valor total (R$): </label><br>
                            <input disabled class="form-control p-1 valor_total" type="number" name="valor_total" id="valor_total">
                        </div>
                    </div>
                    <div class="input-row mb-3">
                        <div class="input-container pagamento-details ">
                            <label for="valor_taxa">Valor da Taxa: </label><br>
                            <input disabled class="form-control p-1 valor_taxa" type="number" name="valor_taxa" id="valor_taxa_debito">
                        </div>
                        <div class="input-container pagamento-details ">
                            <label for="valor_liquido">Valor Líquido: </label><br>
                            <input disabled class="form-control p-1" type="number" name="valor_liquido" id="valor_liquido_debito">
                        </div>
                    </div>
                </div>
                <!--
                    Modal do boleto
                -->
                <div class="modal-body modal-boleto d-none" id="modal-boleto">
                    <div class="input-row input-container-value">
                        <div class="input-container mb-3">
                            <label for="taxa_boleto">Valor da Taxa (R$):</label><br>
                            <input class="form-control p-1" type="number" id="taxa-boleto" required default="0">
                        </div>
                        <div class="input-container">
                            <label for="qnt_parcelas">Quantidade de parcelas: </label><br>
                            <input class="form-control p-1" type="number" name="qnt_parcelas" id="qnt_parcelas_boleto">
                        </div>
                    </div>
                   
                    <hr class="hr">
                        <div class="d-flex justify-content-center">
                            Parcelas
                        </div>
                    <hr class="hr">
                    <div class="input-row mb-3">
                        <div class="input-container pagamento-details mb-3">
                            <label for="valor_bruto_parcela">Valor Bruto (R$): </label><br>
                            <input disabled class="form-control p-1 valor_bruto_parcela" type="number" name="valor_bruto_parcela" id="valor_bruto_parcela_boleto">
                        </div>
                        <div class="input-container pagamento-details">
                            <label for="valor_liquido_parcela">Valor Líquido (R$): </label><br>
                            <input disabled class="form-control p-1 valor_liquido_parcela" type="number" name="valor_liquido_parcela" id="valor_liquido_parcela_boleto">
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="input-row mb-3">
                        <div class="input-container">
                            <label for="valor_total">Valor total (R$): </label><br>
                            <input disabled class="form-control p-1 valor_total" type="number" name="valor_total" id="valor_total">
                        </div>
                        <div class="input-container pagamento-details ">
                            <label for="valor_liquido">Valor Líquido (R$): </label><br>
                            <input disabled class="form-control p-1 valor_liquido" type="number" name="valor_liquido" id="valor_liquido_boleto">
                        </div>
                    </div>
                </div>
                <!--
                    Modal do dinheiro
                -->
                <div class="modal-body modal-dinheiro d-none" id="modal-dinheiro">
                    <div class="input-row mb-3">
                        <div class="input-container">
                            <label for="valor_total">Valor total (R$): </label><br>
                            <input disabled class="form-control p-1 valor_total" type="number" name="valor_total" id="valor_total">
                        </div>
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