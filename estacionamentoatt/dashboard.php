<!DOCTYPE html>
<html>
   <title>Estacionamento</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <?php
      session_start();
      
      // Verifica se o usuário está autenticado
      if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
          header('Location: index.php'); // Redireciona para a tela de login
          exit;
      }else{
        if(!isset($content)){
          $currentPage = str_replace(".php", "", basename($_SERVER['PHP_SELF']));
      
          switch ($currentPage) {
              case 'carros':
                  // Código para a página "carros"
                  $content = 'content/carros-content.php';
                  break;
      
              case 'entradas':
                  // Código para a página "entradas"
                  $content = 'content/entradas-content.php';
                  break;
      
              case 'saidas':
                  // Código para a página "saidas"
                  $content = 'content/saidas-content.php';
                  break;
      
              default:
                  // Código para outras páginas
                  $content = 'content/entradas-content.php';
                  break;
          }
        }
      }
      ?>
   <style>
      body {font-family: "Roboto", sans-serif}
      .w3-bar-block .w3-bar-item {
      padding: 16px;
      font-weight: bold;
      }
      table.dataTable tr.odd {
      background-color: #E2E4FF;
      }
      table.dataTable tr.even {
      background-color: white;
      }
      .btn-verde {
      width: 50px;
      display: inline-block;
      padding: 1px 10px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
      }
      .btn-verde:hover {
      background-color: #45a049;
      }
      .btn-vermelho {
      width: 50px;
      display: inline-block;
      padding: 1px 10px;
      background-color: #dc3545;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
      }
      .btn-vermelho:hover {
      background-color: #9d2631;
      }
   </style>
   <body>
      <?php include('modals.php');?>
      <nav class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" style="z-index:3;width:250px;" id="mySidebar">
         <a class="w3-bar-item w3-button w3-border-bottom w3-large" href="#"><img src="https://www.urbanparkgru.com.br/dicas-de-viagem/wp-content/uploads/2017/03/saiba-escolher-o-estacionamento-certo-para-deixar-seu-carro.jpg" style="width:80%;"></a>
         <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
         <a class="w3-bar-item w3-button btn-entradas" href="entradas.php">Entradas</a>
         <a class="w3-bar-item w3-button btn-saidas" href="saidas.php">Saídas</a>
         <a class="w3-bar-item w3-button btn-carros" href="carros.php">Cadastro</a> <!--Carros-->
         <a class="w3-bar-item w3-button btn-logout" href="logout.php">Logout  <i class="fa fa-sign-out" aria-hidden="true"></i>
         </a>
      </nav>
      <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
      <div class="w3-main" style="margin-left:250px;">
         <header class="w3-container w3-theme" style="padding:64px 32px">
            <h1 class="w3-xxxlarge">Sistema de Entrada e Saida</h1>
         </header>
         <!-- Aqui será incluído o conteúdo específico de cada página -->
         <?php include($content); ?>
         <footer class="w3-container w3-theme" style="padding:32px">
            <p>Todos direitos reservados: Sites WO</p>
         </footer>
      </div>
      <script>
         $( document ).ready(function() {
           let paginaatual = document.location.href.match(/[^\/]+$/)[0].slice(0,-4);
             // w3-teal
             switch (paginaatual) {
               case 'entradas':
                 $( ".btn-entradas" ).addClass( "w3-teal" );
                 break;
               case 'saidas':
                 $( ".btn-saidas" ).addClass( "w3-teal" );
                 break;
               case 'carros':
                 $( ".btn-carros" ).addClass( "w3-teal" );
                 break;
               default:
                 console.log('falha direcionar');
             }
         });
          // Open and close the sidebar on medium and small screens
          function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
          }
          
          function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
          }
          
          // Change style of top container on scroll
          window.onscroll = function() {myFunction()};
          function myFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
              document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
              document.getElementById("myIntro").classList.add("w3-show-inline-block");
            } else {
              document.getElementById("myIntro").classList.remove("w3-show-inline-block");
              document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
            }
          }
          // Accordions
          function myAccordion(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
              x.className += " w3-show";
              x.previousElementSibling.className += " w3-theme";
            } else { 
              x.className = x.className.replace("w3-show", "");
              x.previousElementSibling.className = 
              x.previousElementSibling.className.replace(" w3-theme", "");
            }
          }

      </script>
   </body>
</html>