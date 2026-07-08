<div class="modal fade" id="modalAdicionarEntrada" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarEntradaLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalAdicionarEntradaLabel">Novo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                  <form>
                     <div class="form-group">
                        <label for="placaNovaEntrada">Placa</label>
                        <input type="text" class="form-control" id="placaNovaEntrada" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="modeloNovaEntrada">Modelo</label>
                            <input type="text" disabled class="form-control" id="modeloNovaEntrada" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="corNovaEntrada">Cor</label>
                            <input type="text" disabled class="form-control" id="corNovaEntrada" placeholder="">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                            <label for="idCarroNovaEntrada">ID Carro</label>
                            <input type="text" class="form-control" id="idCarroNovaEntrada" placeholder="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="anoNovaEntrada">Ano</label>
                            <select disabled class="form-control" id="anoNovaEntrada">
                            <option value="">Selecione o ano</option>
                            <?php
                                $currentYear = date('Y');
                                for ($i = $currentYear; $i >= 1970; $i--) {
                                    echo "<option value='$i'>$i</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="marcaNovaEntrada">Marca</label>
                            <select disabled class="form-control" id="marcaNovaEntrada">
                            <option value="">Selecione uma marca</option>
                            <option value="Audi">Audi</option>
                            <option value="BMW">BMW</option>
                            <option value="Chevrolet">Chevrolet</option>
                            <option value="Ford">Ford</option>
                            <option value="Honda">Honda</option>
                            <option value="Hyundai">Hyundai</option>
                            <option value="Kia">Kia</option>
                            <option value="Mercedes-Benz">Mercedes-Benz</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Peugeot">Peugeot</option>
                            <option value="Renault">Renault</option>
                            <option value="Subaru">Subaru</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Volkswagen">Volkswagen</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dataHoraNovaEntrada">Data e hora da entrada</label>
                            <input type="datetime-local" class="form-control" id="dataHoraNovaEntrada" placeholder="">
                        </div>
                    </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-success btn-salvar-nova-entrada">Salvar</button>
            
            </div>
         </div>
      </div>

   </div>
</div>
<div class="modal fade" id="modalEditarEntrada" tabindex="-1" role="dialog" aria-labelledby="modalEditarEntradaLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalEditarEntradaLabel">Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <form>
                        <div class="form-group">
                            <label for="idEntradaEntrada">ID Entrada</label>
                            <input type="text" class="form-control" id="idEntradaEntrada" placeholder="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="modeloEntrada">Modelo</label>
                            <input type="text" disabled class="form-control" id="modeloEntrada" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="placaEntrada">Placa</label>
                            <input type="text" disabled class="form-control" id="placaEntrada" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="corEntrada">Cor</label>
                            <input type="text" disabled class="form-control" id="corEntrada" placeholder="">
                        </div>
                </div>
                <div class="col-sm-6">
                        <div class="form-group">
                            <label for="idCarroEntrada">ID Carro</label>
                            <input type="text" class="form-control" id="idCarroEntrada" placeholder="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="anoEntrada">Ano</label>
                            <select disabled class="form-control" id="anoEntrada">
                            <option value="">Selecione o ano</option>
                            <?php
                                $currentYear = date('Y');
                                for ($i = $currentYear; $i >= 1970; $i--) {
                                    echo "<option value='$i'>$i</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="marcaEntrada">Marca</label>
                            <select disabled class="form-control" id="marcaEntrada">
                            <option value="">Selecione uma marca</option>
                            <option value="Audi">Audi</option>
                            <option value="BMW">BMW</option>
                            <option value="Chevrolet">Chevrolet</option>
                            <option value="Ford">Ford</option>
                            <option value="Honda">Honda</option>
                            <option value="Hyundai">Hyundai</option>
                            <option value="Kia">Kia</option>
                            <option value="Mercedes-Benz">Mercedes-Benz</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Peugeot">Peugeot</option>
                            <option value="Renault">Renault</option>
                            <option value="Subaru">Subaru</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Volkswagen">Volkswagen</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dataHoraEntradaEntrada">Data e hora da entrada</label>
                            <input type="datetime-local" class="form-control" id="dataHoraEntradaEntrada" placeholder="">
                        </div>
                    </div>
                </form>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-success btn-salvar-edicao-entrada">Salvar</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modalConfirmaExcluirEntrada" tabindex="-1" role="dialog" aria-labelledby="modalConfirmaExcluirEntradaLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalConfirmaExcluirEntradaLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <h1>Tem certeza que deseja excluír a entrada <font class="id-entrada-confirmacao" data-identrada=""></font>?</h1>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-confirma-exclusao-entrada" data-identrada="">Excluir</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
         </div>
      </div>
   </div>
</div>


<div class="modal fade" id="modalEditarSaida" tabindex="-1" role="dialog" aria-labelledby="modalEditarSaidaLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalEditarSaidaLabel">Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
         <div class="row">
   <div class="col-md-6">
      <form>
         <div class="form-group">
            <label for="idEntradaSaida">ID Saida</label>
            <input type="text" class="form-control" id="idSaidaSaida" placeholder="" disabled>
         </div>
         <div class="form-group">
            <label for="modeloSaida">Modelo</label>
            <input type="text" class="form-control" id="modeloSaida" placeholder="" disabled>
         </div>
         <div class="form-group">
            <label for="placaSaida">Placa</label>
            <input type="text" class="form-control" id="placaSaida" placeholder="" disabled>
         </div>
         <div class="form-group">
            <label for="corSaida">Cor</label>
            <input type="text" class="form-control" id="corSaida" placeholder="" disabled>
         </div>
         <div class="form-group">
            <label for="marcaSaida">Marca</label>
            <select class="form-control" id="marcaSaida"  disabled>
               <option value="">Selecione uma marca</option>
               <option value="Audi">Audi</option>
               <option value="BMW">BMW</option>
               <option value="Chevrolet">Chevrolet</option>
               <option value="Ford">Ford</option>
               <option value="Honda">Honda</option>
               <option value="Hyundai">Hyundai</option>
               <option value="Kia">Kia</option>
               <option value="Mercedes-Benz">Mercedes-Benz</option>
               <option value="Nissan">Nissan</option>
               <option value="Peugeot">Peugeot</option>
               <option value="Renault">Renault</option>
               <option value="Subaru">Subaru</option>
               <option value="Toyota">Toyota</option>
               <option value="Volkswagen">Volkswagen</option>
            </select>
         </div>
   </div>
   <div class="col-md-6">
    <div class="form-group">
        <label for="idCarroSaida">ID Carro</label>
        <input type="text" class="form-control" id="idCarroSaida" placeholder="" disabled>
    </div>
    <div class="form-group">
        <label for="anoSaida">Ano</label>
        <select class="form-control" id="anoSaida"  disabled>
            <option value="">Selecione o ano</option>
            <?php
                $currentYear = date('Y');
                for ($i = $currentYear; $i >= 1970; $i--) {
                echo "<option value='$i'>$i</option>";
                }
                ?>
        </select>
    </div>
    <div class="form-group">
        <label for="dataHoraEntradaSaida" >Data e hora da entrada</label>
        <input type="datetime-local" class="form-control" id="dataHoraEntradaSaida" placeholder=""  disabled>
    </div>
    <div class="form-group">
        <label for="dataHorasaida">Data e hora da saída</label>
        <input type="datetime-local" class="form-control" id="dataHorasaida" placeholder="">
    </div>
    <div class="form-group">
        <label for="dataHoraValor">Valor</label>
        <input type="number" class="form-control" id="dataHoraValor" placeholder="">
    </div>
    </div>
   </form>
   </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-success btn-salvar-edicao-saida">Salvar</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modalConfirmaExcluirSaida" tabindex="-1" role="dialog" aria-labelledby="modalConfirmaExcluirSaidaLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalConfirmaExcluirSaidaLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <h1>Tem certeza que deseja excluír a saida <font class="id-saida-confirmacao" data-idsaida=""></font>?</h1>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-confirma-exclusao-saida" data-idsaida="1">Excluir</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
         </div>
      </div>
   </div>
</div>


<div class="modal fade" id="modalEditarCarros" tabindex="-1" role="dialog" aria-labelledby="modalEditarCarrosLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalEditarCarrosLabel">Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                    <form>
                        <div class="form-group">
                        <label for="idCarroCarros">ID Carro</label>
                        <input type="text" class="form-control" id="idCarroCarros" placeholder="" disabled>
                        </div>
                        <div class="form-group">
                        <label for="placaCarros">Placa</label>
                        <input type="text" class="form-control" id="placaCarros" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="corCarros">Cor</label>
                        <input type="text" class="form-control" id="corCarros" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="modeloCarros">Modelo</label>
                        <input type="text" class="form-control" id="modeloCarros" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="anoCarros">Ano</label>
                        <select class="form-control" id="anoCarros">
                            <option value="">Selecione o ano</option> <?php
                                $currentYear = date('Y');
                                for ($i = $currentYear; $i >= 1970; $i--) {
                                    echo "
                                        <option value='$i'>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="marcaCarros">Marca</label>
                            <select class="form-control" id="marcaCarros">
                                <option value="">Selecione uma marca</option>
                                <option value="Audi">Audi</option>
                                <option value="BMW">BMW</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Ford">Ford</option>
                                <option value="Honda">Honda</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Kia">Kia</option>
                                <option value="Mercedes-Benz">Mercedes-Benz</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Peugeot">Peugeot</option>
                                <option value="Renault">Renault</option>
                                <option value="Subaru">Subaru</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Volkswagen">Volkswagen</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="cpfNovoCarro">CPF</label>
                        <input type="text" class="form-control" id="cpfCarros" placeholder="">
                     </div>
                    </div>
                    </form>
                </div>
            </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="button" data-idcarro='' data-modelo='' data-placa='' data-ano='' data-cor='' data-marca='' data-cpf='' class="btn btn-success btn-salvar-edicao-carro" data->Salvar</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modalAdicionarCarro" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarCarroLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalAdicionarCarrosLabel">Novo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                    <form>
                        <div class="form-group">
                            <label for="marcaNovoCarro">Marca</label>
                            <select class="form-control" id="marcaNovoCarro">
                                <option value="">Selecione uma marca</option>
                                <option value="Audi">Audi</option>
                                <option value="BMW">BMW</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Ford">Ford</option>
                                <option value="Honda">Honda</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Kia">Kia</option>
                                <option value="Mercedes-Benz">Mercedes-Benz</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Peugeot">Peugeot</option>
                                <option value="Renault">Renault</option>
                                <option value="Subaru">Subaru</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Volkswagen">Volkswagen</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="placaNovoCarro">Placa</label>
                        <input type="text" class="form-control" id="placaNovoCarro" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="corNovoCarro">Cor</label>
                        <input type="text" class="form-control" id="corNovoCarro" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="modeloNovoCarro">Modelo</label>
                        <input type="text" class="form-control" id="modeloNovoCarro" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="anoNovoCarro">Ano</label>
                        <select class="form-control" id="anoNovoCarro">
                            <option value="">Selecione o ano</option> <?php
                                $currentYear = date('Y');
                                for ($i = $currentYear; $i >= 1970; $i--) {
                                    echo "
                                        <option value='$i'>$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cpfNovoCarro">CPF</label>
                        <input type="text" class="form-control" id="cpfNovoCarro" placeholder="">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="button" data-idcarro='' data-modelo='' data-placa='' data-ano='' data-cor='' data-marca='' data-cpf='' class="btn btn-success btn-salvar-novo-carro" data->Salvar</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modalConfirmaExcluirCarro" tabindex="-1" role="dialog" aria-labelledby="modalConfirmaExcluirCarroLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalConfirmaExcluirCarroLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <h1>Tem certeza que deseja excluír o carro <font class="id-carro-confirmacao" data-idcarro="'"></font>?</h1>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-confirma-exclusao-carro" data-idcarro="">Excluir</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modalAdicionarSaida" tabindex="-1" role="dialog" aria-labelledby="modalAdicionarSaidaLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalAdicionarSaidaLabel">Confirmar CPF</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <form>
                    <div class="form-group">
                            <input type="hidden" class="form-control" id="cpfCorreto" placeholder="" disabled>
                        </div>
                    <div class="form-group">
                            <input type="hidden" class="form-control" id="idEntradaSaida" placeholder="" disabled>
                        </div>
                    <div class="form-group">
                        <label for="cpfNovoCarro">CPF</label>
                        <input type="text" class="form-control" id="cpfInformado" placeholder="">
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-6">
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-success btn-salvar-nova-saida">Salvar</button>
         </div>
         </div>
         
      </div>
   </div>
</div>
