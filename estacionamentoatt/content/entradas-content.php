<style>
    /* Personalize as cores e o estilo da tabela */
    .table {
      background-color: #fff;
      border-radius: 10px;
    }
    
    .table thead th {
      background-color: #f44336;
      color: #fff;
      border: none;
      font-weight: 500;
    }
    
    .table tbody tr:nth-child(odd) {
      background-color: #f5f5f5;
    }
    
    .table tbody tr:hover {
      background-color: #e0e0e0;
    }
    
    .table td {
      border: none;
    }
    
  </style>
  
<table id="entradas-table">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Cor</th>
                <th>marca</th>
                <th>cpf</th>
                <th>modelo</th>
                <th>Ano</th>
                <th>Entrada </th>
                <th>
                  <button data-toggle="modal" data-target="#modalAdicionarEntrada" style="width: 7em; height:2.5em;" class="btn btn-success nova-entrada" data-idcarro="' + data + '">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Adiconar
                  </button>
                </th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {

          function salvarnovaentradaajax(dadosNovaEntrada){
            $.ajax({
              url: 'controllers/entradas.php?funcao=novaentrada', // O arquivo PHP que vai receber os dados
              method: 'POST', // Método POST
              dataType: 'json',
              data: { // Dados que você quer enviar ao servidor
                dadosEntrada: dadosNovaEntrada
              },
              success: function(response) {
                // Aqui você pode tratar a resposta do servidor, se necessário
                if(response == true){
                  alert('Entrada registrada!')
                  location.reload();
                }else{
                  console.log("erro")
                }
              },
              error: function(xhr, status, error) {
                // Tratamento de erros, se ocorrer algum problema na requisição
                console.log("Ocorreu um erro na requisição: " + status + ", " + error);
              }
            });
          }

          function salvarnovasaidaajax(dadosNovaSaida) {
            $.ajax({
              url: 'controllers/saidas.php?funcao=salvarnovasaida', // O arquivo PHP que vai receber os dados
              method: 'POST', // Método POST
              dataType: 'json',
              data: { // Dados que você quer enviar ao servidor
                dadosSaida: dadosNovaSaida
              },
              success: function(response) {
                // Aqui você pode tratar a resposta do servidor, se necessário
                if(response == true){
                  alert('Saida registrada!')
                  location.reload();
                }else{
                  console.log('erro')
                }
              },
              error: function(xhr, status, error) {
                // Tratamento de erros, se ocorrer algum problema na requisição
                console.log("Ocorreu um erro na requisição: " + status + ", " + error);
              }
            });

          }


          function validarPlaca(placa) {
            // Expressão regular para verificar o formato das placas
            var regexPlaca = /^[A-Z]{3}\d{4}$|^[A-Z]{2}\d{5}$|^[A-Z]{3}\d[A-Z]\d{2}$/;

            // Verifica se a placa corresponde ao formato das placas antigas ou do Mercosul
            if (placa.match(regexPlaca)) {
              return true; // Placa válida
            } else {
              return false; // Placa inválida
            }
          }
          
          $("#placaNovaEntrada").on("input", function() {
            $(this).val($(this).val().toUpperCase());
            var placa = $(this).val();
            if(validarPlaca(placa)){
              buscaCarroPorPlaca(placa);
            }
          });
          function buscaCarroPorPlaca(placa) {
              $.ajax({
                url: 'controllers/carros.php?funcao=buscacarroporplaca', // O arquivo PHP que vai receber os dados
                method: 'POST', // Método POST
                dataType: 'json',
                data: { // Dados que você quer enviar ao servidor
                  placa: placa
                },
                success: function(response) {
                  // Aqui você pode tratar a resposta do servidor, se necessário
                  $("#idCarroNovaEntrada").val(response[0].id)
                  $("#modeloNovaEntrada").val(response[0].modelo)
                  $("#anoNovaEntrada").val(response[0].ano)
                  $("#corNovaEntrada").val(response[0].cor)
                  $("#marcaNovaEntrada").val(response[0].marca)

                },
                error: function(xhr, status, error) {
                  // Tratamento de erros, se ocorrer algum problema na requisição
                  console.log("Ocorreu um erro na requisição: " + status + ", " + error);
                }
              });
          }
          function salvaredicaoentradaajax(dadosEntrada) {
              $.ajax({
                url: 'controllers/entradas.php?funcao=editaentrada', // O arquivo PHP que vai receber os dados
                method: 'POST', // Método POST
                dataType: 'json',
                data: { // Dados que você quer enviar ao servidor
                  dadosEntrada: dadosEntrada
                },
                success: function(response) {
                  // Aqui você pode tratar a resposta do servidor, se necessário
                  if(response == true){
                    alert('Entrada atualizada!')
                    location.reload();
                  }else{
                    console.log("erro")
                  }
                },
                error: function(xhr, status, error) {
                  // Tratamento de erros, se ocorrer algum problema na requisição
                  console.log("Ocorreu um erro na requisição: " + status + ", " + error);
                }
              });
            }
          
          function confirmaexcluirentrada(idEntrada) {
            excluirentradaajax(idEntrada);
          }
          
          function excluirentradaajax(idEntrada) {
            $.ajax({
              url: 'controllers/entradas.php?funcao=excluirentrada&entrada='+idEntrada,
              method: 'GET',
              dataType: 'json',
              success: function(response) {
                console.log(response == 'true')
                console.log(response)
                if(response == 'true'){
                  alert('Entrada excluida!')
                  location.reload();
                }
              }
            });
          }

            function editarentradaajax(idEntrada) {
              $.ajax({
                url: 'controllers/entradas.php?funcao=buscaentrada&entrada='+idEntrada,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                  $("#idEntradaEntrada").val(response[0].id)
                  $("#idEntradaSaida").val(response[0].id)
                  $("#cpfCorreto").val(response[0].cpf)
                  $("#modeloEntrada").val(response[0].modelo)
                  $("#idCarroEntrada").val(response[0].idCarro)
                  $("#placaEntrada").val(response[0].placa)
                  $("#corEntrada").val(response[0].cor)
                  $("#marcaEntrada").val(response[0].marca)
                  $("#anoEntrada").val(response[0].ano)
                  $("#dataHoraEntradaEntrada").val(response[0].entrada)
                }
              });
            }
              var data = '';
              $.ajax({
                url: 'controllers/entradas.php?funcao=',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                  data = response;
                  $('#entradas-table').DataTable({
                    data: data,
                    columns: [
                      { data: 'placa' },
                      { data: 'cor' },
                      { data: 'marca' },
                      { data: 'cpf'},
                      { data: 'modelo' },
                      { data: 'ano' },
                      { data: 'entrada' },
                      {
                        data: "id",
                        render: function(data, type, row) {
                          var botoes = '';
                          botoes += '<button data-toggle="modal" data-target="#modalEditarEntrada" style="width: 5em; height:2.5em; margin-bottom: 0.5em" class="btn btn-primary editar-entrada" data-identrada="' + data + '">Editar</button><br>';
                          botoes += '<button data-toggle="modal" data-target="#modalConfirmaExcluirEntrada" class="btn btn-danger excluir-entrada" style="width: 5em; height:2.5em;" data-identrada="' + data + '">Excluir</button>';
                          botoes += '<button data-toggle="modal" data-target="#modalAdicionarSaida" class="btn btn-dark editar-entrada" style="width: 5em; height:2.5em; margin-left:0.5em" data-identrada="' + data + '">Saída</button>';
                          return botoes;
                        }
                      }
                    ]
                  });
                },
                error: function(error) {
                  console.log(error); // Aqui você pode lidar com erros de requisição
                }
              });
              
            $(document).on("click", ".editar-entrada", function() {
              var idEntrada = $(this).data("identrada");
              editarentradaajax(idEntrada);
            });
            
            $(document).on("click", ".excluir-entrada", function() {
              var idEntrada = $(this).data("identrada");
              $('.id-entrada-confirmacao').html(idEntrada)
              $('.btn-confirma-exclusao-entrada').attr('data-identrada', idEntrada)
              // confirmaexcluirentrada(idEntrada)
            });

            $(document).on("click", ".btn-confirma-exclusao-entrada", function() {
              var idEntrada = $(this).data("identrada");
              excluirentradaajax(idEntrada);
            });

            $(document).on("click", ".btn-salvar-edicao-entrada", function() {
              var dadosEntrada = {
                'id': $("#idEntradaEntrada").val(),
                'idcarro': $("#idCarroEntrada").val(),
                'datahoraentrada': $("#dataHoraEntradaEntrada").val()
              };

              console.log(dadosEntrada);
              salvaredicaoentradaajax(dadosEntrada);
            });

            $(document).on("click", ".btn-salvar-nova-entrada", function() {
              var dadosNovaEntrada = {
                'idcarro': $("#idCarroNovaEntrada").val(),
                'datahoraentrada': $("#dataHoraNovaEntrada").val()
              };
              salvarnovaentradaajax(dadosNovaEntrada);
            });

            $(document).on("click", ".btn-salvar-nova-saida", function() {
              var cpfCorreto = $("#cpfCorreto").val();
              var cpfInformado = $("#cpfInformado").val();

              if (cpfInformado != cpfCorreto){
                alert("CPF incorreto");
              } 

              else {
                var tzoffset = (new Date()).getTimezoneOffset() * 60000;
                var now = (new Date(Date.now() - tzoffset)).toISOString().slice(0, 19).replace('T', ' ');
                console.log(now);
                var dadosNovaSaida = {
                  'identrada': $("#idEntradaSaida").val(),
                  'valor': 10,
                  'datahorasaida': now,
                };
                salvarnovasaidaajax(dadosNovaSaida);
              }
            });
        });
    </script>