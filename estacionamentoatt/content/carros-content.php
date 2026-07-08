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
                <th>ID</th>
                <th>Placa</th>
                <th>Cor</th>
                <th>marca</th>
                <th>cpf</th>
                <th>modelo</th>
                <th>Ano</th>
                <th>
                  <button data-toggle="modal" data-target="#modalAdicionarCarro" style="width: 7em; height:2.5em;" class="btn btn-success novo-carro" data-idcarro="' + data + '">
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
            function salvanovocarroajax(dadosCarro) {
              console.log(dadosCarro)
              $.ajax({
                url: 'controllers/carros.php?funcao=salvarnovocarro', // O arquivo PHP que vai receber os dados
                method: 'POST', // Método POST
                dataType: 'json',
                data: { // Dados que você quer enviar ao servidor
                  dadosCarro: dadosCarro
                },
                success: function(response) {
                  // Aqui você pode tratar a resposta do servidor, se necessário
                  if(response == true){
                    alert('Carro registrado!')
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
            function salvaredicaocarroajax(dadosCarro) {
              $.ajax({
                url: 'controllers/carros.php?funcao=editacarro', // O arquivo PHP que vai receber os dados
                method: 'POST', // Método POST
                dataType: 'json',
                data: { // Dados que você quer enviar ao servidor
                  dadosCarro: dadosCarro
                },
                success: function(response) {
                  // Aqui você pode tratar a resposta do servidor, se necessário
                  if(response == true){
                    alert('Carro atualizado!')
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
            
            function confirmaexcluircarro(idCarro) {
              excluircarroajax(idCarro);
            }
            function editarcarroajax(idCarro) {
              $.ajax({
                url: 'controllers/carros.php?funcao=buscacarro&carro='+idCarro,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                  $("#idCarroCarros").val(response[0].id)
                  $("#modeloCarros").val(response[0].modelo)
                  $("#placaCarros").val(response[0].placa)
                  $("#corCarros").val(response[0].cor)
                  $("#marcaCarros").val(response[0].marca)
                  $("#cpfCarros").val(response[0].cpf)
                  $("#anoCarros").val(response[0].ano)
                  $(".btn-salvar-edicao-carro").attr('data-idcarro', response[0].id)
                }
              });
            }
            function excluircarroajax(idCarro) {
              $.ajax({
                url: 'controllers/carros.php?funcao=excluircarro&carro='+idCarro,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                  if(response == 'true'){
                    alert('Carro excluido!')
                    location.reload();
                  }
                }
              });
            }

            var data = '';
            $.ajax({
              url: 'controllers/carros.php?funcao=',
              method: 'GET',
              dataType: 'json',
              success: function(response) {
                data = response;
                $('#carros-table').DataTable({
                  data: data,
                  columns: [
                    { data: 'id' },
                    { data: 'placa' },
                    { data: 'cor' },
                    { data: 'marca' },
                    { data: 'cpf' },
                    { data: 'modelo' },
                    { data: 'ano' },
                    {
                      data: "id",
                      render: function(data, type, row) {
                        var botoes = '';
                        botoes += '<button data-toggle="modal" data-target="#modalEditarCarros" style="width: 5em; height:2.5em;" class="btn btn-primary editar-carro" data-idcarro="' + data + '">Editar</button><br>';
                        botoes += '<button data-toggle="modal" data-target="#modalConfirmaExcluirCarro" class="btn btn-danger excluir-carro" style="width: 5em; height:2.5em;" data-idcarro="' + data + '">Excluir</button>';
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

            $(document).on("click", ".editar-carro", function() {
              var idCarro = $(this).data("idcarro");
              editarcarroajax(idCarro);
            });

            $(document).on("click", ".excluir-carro", function() {
              var idCarro = $(this).data("idcarro");
              $('.id-carro-confirmacao').html(idCarro)
              $('.btn-confirma-exclusao-carro').attr('data-idcarro', idCarro)
              // confirmaexcluircarro(idCarro)
            });

            $(document).on("click", ".btn-confirma-exclusao-carro", function() {
              var idCarro = $(this).data("idcarro");
              excluircarroajax(idCarro);
            });

            $(document).on("click", ".btn-salvar-edicao-carro", function() {
              var dadosCarro = {
                'id': $("#idCarroCarros").val(),
                'modelo': $("#modeloCarros").val(),
                'placa': $("#placaCarros").val(),
                'ano': $("#anoCarros").val(),
                'cor': $("#corCarros").val(),
                'marca': $("#marcaCarros").val(),
                'cpf': $("#cpfCarros").val()
              };
              salvaredicaocarroajax(dadosCarro);
            });

            $(document).on("click", ".btn-salvar-novo-carro", function() {
              var dadosCarro = {
                'marca': $("#marcaNovoCarro").val(),
                'modelo': $("#modeloNovoCarro").val(),
                'placa': $("#placaNovoCarro").val(),
                'ano': $("#anoNovoCarro").val(),
                'cor': $("#corNovoCarro").val(),
                'cpf': $("#cpfNovoCarro").val()
              };
              salvanovocarroajax(dadosCarro);
            });
          });

    </script>