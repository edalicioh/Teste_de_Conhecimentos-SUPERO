# Teste_de_Conhecimentos-SUPERO
Teste de Conhecimentos - SUPERO Pergunta Um Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima “Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos de ambos (3 e 5), imprima “FizzBuzz”.  Resposta: ./pergunta-um  
Pergunta Dois Refatore o código abaixo, fazendo as alterações que julgar necessário.  
  if (isset($_SESSION['loggedin']) &amp;&amp; $_SESSION['loggedin'] == true) {     
    header("Location: http://www.google.com");     
    exit(); 
  } elseif (isset($_COOKIE['Loggedin']) &amp;&amp; $_COOKIE['Loggedin'] == true) { 
    header("Location: http://www.google.com");     
    exit(); 
 } 
 Resposta: ./pergunta-dois  
  
Pergunta Três Refatore o código abaixo, fazendo as alterações que julgar necessário.  
class MyUserClass {      
  public function getUserList() {         
    $dbconn = new DatabaseConnection('localhost','user','password');         
    $results = $dbconn->query('select name from user');          
    sort($results);          
    return $results;     
    }  
 } 
Resposta: ./pergunta-tres  

Pergunta Quarto Desenvolva uma API Rest para um sistema gerenciador de tarefas (inclusão/alteração/exclusão). As tarefas consistem em título e descrição, ordenadas por prioridade.  Desenvolver utilizando:  Linguagem PHP ; Banco de dados MySQL; Diferenciais:  Criação de interface para visualização da lista de tarefas; Interface com drag and drop; Interface responsiva (desktop e mobile); Resposta: ./pergunta-quatro  Instalação - Pergunta Quarto Back-end # Ir para pastas da aplicação cd ./pergunta-quatro/api  # Instalar dependências composer install  # Configurar banco de dados no arquivo .env seguindo o .env.example # ./pergunta-quatro/api/.env  # Popular banco de dados php dbseed.php  # Serv inicia em 127.0.0.1:8000 php -S 127.0.0.1:8000 -t public Front-end # Ir para pastas da aplicação cd ./pergunta-quatro/client  # Instalar dependências npm install  # Client inicia em localhost:8080 npm run dev
