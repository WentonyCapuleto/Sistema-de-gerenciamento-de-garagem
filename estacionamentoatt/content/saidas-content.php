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
<table id="carros-table">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Cor</th>
                <th>marca</th>
                <th>cpf</th>
                <th>modelo</th>
                <th>Ano</th>
                <th>Entrada </th>
                <th>Saída </th>
                <th>Valor (R$)</th>
                <th>Ações </th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
          
          function confirmaexcluirsaida(idSaida) {
            excluirsaidaajax(idSaida);
          }
            
          function excluirsaidaajax(idSaida) {
            console.log(idSaida)
            $.ajax({
              url: 'controllers/saidas.php?funcao=excluirsaida&saida='+idSaida,
              method: 'GET',
              dataType: 'json',
              success: function(response) {
                console.log(response == 'true')
                console.log(response)
                if(response == 'true'){
                  alert('Saída excluida!')
                  location.reload();
                }
              }
            });
          }
          function salvaredicaosaidaajax(dadosSaida) {
              console.log(dadosSaida)
              $.ajax({
                url: 'controllers/saidas.php?funcao=editasaida', // O arquivo PHP que vai receber os dados
                method: 'POST', // Método POST
                dataType: 'json',
                data: { // Dados que você quer enviar ao servidor
                  dadosSaida: dadosSaida
                },
                success: function(response) {
                  // Aqui você pode tratar a resposta do servidor, se necessário
                  if(response == true){
                    alert('Saida atualizada!')
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
          
          
            $.ajax({
                url: 'controllers/saidas.php?funcao=',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    data = response; // Atribua o valor de response a data
                    $('#carros-table').DataTable({
                        data: data,
                        columns: [
                            { data: 'placa' },
                            { data: 'cor' },
                            { data: 'marca' },
                            { data: 'cpf'},
                            { data: 'modelo' },
                            { data: 'ano' },
                            { data: 'entrada' },
                            { data: 'saida' },
                            { data: 'valor' } ,
                            {
                                data: "idSaida",
                                render: function(data, type, row) {
                                  var botoes = '';
                                  botoes += '<button data-toggle="modal" data-target="#modalEditarSaida" style="width: 5em; height:2.5em;" class="btn btn-primary editar-saida" data-idsaida="'+data+'" onclick="abremodaleditar("'+data+'")">Editar</button><br>';
                                  botoes += '<button data-toggle="modal" data-target="#modalConfirmaExcluirSaida" class="btn btn-danger excluir-saida" style="width: 5em; height:2.5em;" data-idsaida="'+data+'">Excluír</button>';
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
            
            function editarsaidaajax(idSaida) {
              $.ajax({
                url: 'controllers/saidas.php?funcao=buscasaida&saida='+idSaida,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                  $("#idSaidaSaida").val(response[0].id_saida)
                  $("#idCarroSaida").val(response[0].id_carro)
                  $("#modeloSaida").val(response[0].modelo)
                  $("#anoSaida").val(response[0].ano)
                  $("#placaSaida").val(response[0].placa)
                  $("#dataHoraEntradaSaida").val(response[0].data_hora_entrada)
                  $("#corSaida").val(response[0].cor)
                  $("#dataHorasaida").val(response[0].data_hora_saida)
                  $("#marcaSaida").val(response[0].marca)
                  $("#dataHoraValor").val(response[0].valor)
                }
              });
            }
            
            $(document).on("click", ".editar-saida", function() {
              var idSaida = $(this).data("idsaida");
              editarsaidaajax(idSaida);
            });

            $(document).on("click", ".btn-salvar-edicao-saida", function() {
              var dadosSaida = {
                'id': $("#idSaidaSaida").val(),
                'datahorasaida': $("#dataHorasaida").val()
              };
              salvaredicaosaidaajax(dadosSaida);
            });
            
            $(document).on("click", ".excluir-saida", function() {
              var idSaida = $(this).data("idsaida");
              $('.id-saida-confirmacao').html(idSaida)
              $('.btn-confirma-exclusao-saida').attr('data-idsaida', idSaida)
              // confirmaexcluirsaida(idSaida)
            });

            $(document).on("click", ".btn-confirma-exclusao-saida", function() {
              var idSaida = $(this).data("idsaida");
              confirmaexcluirsaida(idSaida);
            });

        });
    </script>