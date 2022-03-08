<!DOCTYPE html>
<html lang="pt-br">
<head>



   <!-- custom css file link  -->
    <link rel="stylesheet" href="{{url('css/front.css')}}">
      <!-- font awesome brands file link  -->

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- font awesome file link  -->



    <title>Sisges</title>
</head>
<body>

    <header class="header">
        <a href="#" class="logo"> <i class="fas fa-home fa-fw"></i> Sisges</a>
        <div class="fas fa-bars"></div>

        <nav class="navbar">
          <ul>
            <li><a href="#home">Página Inicial</a></li>
            <li><a href="#about">Sobre</a></li>
            <li><a href="#service">Serviços</a></li>
            <li><a href="#team">Equipa</a></li>
            <li><a href="#contact">Contacto</a></li>
            <li><a href="#faq">FAQ</a></li>
            <li><a href="{{route('login')}}"><button class="btn" id="lg">Login</button></a></li>
          </ul>
        </nav>

    </header>
    <!-- header section ends -->

    <!-- home section starts  -->
    <section id="home" class="home">
       <h1 class="banner">Sisges O seu sistema de pedidos </h1>
      <h3 class="slogan">Agora pode fazer pedidos de certificados e declarações de forma simplificada</h3>

      @foreach ($profiles as $profile)
      <a href="{{route('proUser',$profile->id)}}"><button>Registrar-se</button></a>
      @endforeach

      <div class="wave wave1"></div>
      <div class="wave wave2"></div>
      <div class="wave wave3"></div>

      <div class="fas fa-cog nut1"></div>
      <div class="fas fa-cog nut2"></div>
    </section>

    <!-- A seccao home termina aqui -->

    <!-- A seccao sobre comeca aqui -->

    <section id="about" class="about">
    <h1 class="heading">Sobre Nós</h1>

      <div class="row">

        <div class="content">
          <h3>O Sisges vai a maneira de fazer pedidos</h3>
          <p>
              O SISGES pretende a maneira de fazer pedidos
              De forma descomplicada e rápida terá acesso a tudo<br>
              o que precisa para fazer pedidos, reclamações
          </p>
          <a href="{{route('login')}}"><button class="btn">Começar agora</button></a>
        </div>

        <div class="image">
          <img src="{{url('imges/pic1.svg')}}" alt="sobre nos" >
        </div>
      </div>


    </section>

    <!-- Fim da seccao de SOBRE -->

    <!-- Inicio da seccao service -->

    <section id="service" class="service">
      <h1 class="heading">O que é possível fazer no SISGES</h1>

      <div class="row">
        <div class="image">
          <img src="{{url('imges/pic2.svg')}}" alt="O que é possivel fazer no SISGES" srcset="">
        </div>
        <div class="content">
          <h3>Faça a Gestão dos seus ativos</h3>
          <p>Um painel administrativo intuitivo<br>
             que vai lhe permitir ter todos <br>
             os recursos do sistema de forma rápida e confortável
        </p>
          <a href="{{route('login')}}"><button class="btn">Começar agora</button></a>

        </div>
      </div>

      <div class="row">

        <div class="content">
          <h3>Pode fazer Reclamações</h3>
          <p>No sisges poderá fazer reclamções
              que vão diretamente para o administrador do sistema
          </p>
          <a href="{{route('login')}}"><button class="btn">Começar agora</button></a>
        </div>
        <div class="image">
          <img src="{{url('imges/pic3.svg')}}" alt="">
        </div>


      </div>


      <div class="row">


        <div class="image">
          <img src="{{url('imges/pic4.svg')}}" alt="">
        </div>
        <div class="content">
          <h3>Pode fazer pedidos de declarações e certificados</h3>
          <p>
              Faça o pedido de de declarações de
              forma rápida e descomplicada<br>
              O sistema vai gerar um documento em pdf
              que deverá apresentar quando fizer o
              levantamente junto do DAAC
          </p>
          <a href="{{route('login')}}"><button class="btn">Começar agora</button></a>
        </div>
      </div>

      <div class="row">

        <div class="content">
          <h3>Verificar o estado do seu pedido ou reclamação</h3>
          <p>Verifique em tempo real o estado do seu pedido<br>
            caso tiver alguma envie mensagem para o nosso<br>
            suporte
          </p>
          <a href="#"><button class="btn">Começar agora</button></a>
        </div>
        <div class="image">
          <img src="{{url('imges/pic5.svg')}}" alt="">
        </div>



      </div>

      <div class="row">


        <div class="image">
          <img src="{{url('imges/pic6.svg')}}" alt="">
        </div>
        <div class="content">
          <h3>Em suma pode fazer tudo online de forma rápida e descomplicada</h3>
          <p>
              Faça tudo online, de forma descomplicada<br>
              a partir de qualquer lugar do mundo
          </p>
          <a href="{{route('login')}}"><button class="btn">Começar agora</button></a>
        </div>

      </div>
    </section>
<!-- Final da secção Serviço -->

 <!-- inicio da secção equipa -->

 <section id="team" class="team">

  <h1 class="heading">Nossa equipe</h1>

  <div class="row">



  <div class="card">
    <div class="image">
      <img src="{{url('imges/Guilherme.jpg')}}" alt="">
    </div>
    <div class="info">
      <h3>Guilherme</h3>
      <span>Desenvolvedor Fullstack Sénior</span>
      <div class="icons">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="image">
      <img src="{{url('imges/Guilherme.png')}}" alt="">
    </div>
    <div class="info">
      <h3>Messias</h3>
      <span>Desenvolvedor Sénior Back-end</span>
      <div class="icons">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
      </div>
    </div>
  </div>

  </div>


  </section>

<!-- secao Equipa termina -->

<!-- Secao contato comeca  -->

<section id="contact" class="contact">

  <h1 class="heading">Fale conosco</h1>


  <div class="row">

    <div class="image">
      <img src="{{url('imges/pic6.svg')}}" alt="">
    </div>

    <div class="form-container">
      <form action="#">

        <div class="inputBox">
          <input type="text" placeholder="primeiro nome">
          <input type="text" placeholder="Sobrenome">
        </div>

        <input type="email" placeholder="email">
        <textarea name="" id="" cols="30" rows="10" placeholder="Mensagem"></textarea>
        <input type="submit" value="send">

      </form>
    </div>

  </div>

  </section>



  <!-- Fim da secao contacto -->

<!-- FAQ inicia aqui  -->

<section id="faq" class="faq">

  <h1 class="heading">FAQ</h1>

  <div class="row">

  <div class="image">
    <img src="imges/pic4.svg" alt="">
  </div>

  <div class="accordion-container">

    <div class="accordion">
      <div class="accordion-header">
        <span>+</span>
        <h3>Quem detém os direitos desse sistema?</h3>
      </div>
      <div class="accordion-body">
        <p>
            Os estudantes Alberto Airosa e António Messia
            São os detentores do sistema
        </p>
      </div>
    </div>

    <div class="accordion">
      <div class="accordion-header">
        <span>+</span>
        <h3>Quem atende aos pedidos?</h3>
      </div>
      <div class="accordion-body">
        <p>
            Os pedidos ou solicitações são atendidos pelos
            funcionários do DAAC quando já não estiver em modo sandbox
        </p>
      </div>
    </div>

    <div class="accordion">
      <div class="accordion-header">
        <span>+</span>
        <h3>Posso fazer pagamentos diretamente nos SISGES?</h3>
      </div>
      <div class="accordion-body">
        <p>
            Por enquanto os pagamentos são feitos ao estado
            e no SISGES pode inserir o número gerado pelo ATM ou outra
             plataforma usada para gerar o REUP
        </p>
      </div>
    </div>

    <div class="accordion">
      <div class="accordion-header">
        <span>+</span>
        <h3>Quem tem acesso aos meus dados?</h3>
      </div>
      <div class="accordion-body">
        <p>
            Todos os funcionários do DAAC
            E os desenvolvedores
        </p>
      </div>
    </div>

    <div class="accordion">
      <div class="accordion-header">
        <span>+</span>
        <h3>Posso me cadastrar no sistema se não for estudante
          do ISCED-HUILA
        </h3>
      </div>
      <div class="accordion-body">
        <p>
            Pode enquanto estiver em modo sandbox, no entanto não terá nenhum pedido
             será atendido
        </p>
      </div>
    </div>

  </div>

  </div>


  </section>


  <!-- FAQ section ends -->


<!-- footer section starts  -->

<section class="footer">



  <h1>António Messia & Alberto Airosa | Todos os direitos reservados.</h1>

  <div class="icons">
    <a href="#" class="fab fa-facebook-f"></a>
    <a href="#" class="fab fa-twitter"></a>
    <a href="#" class="fab fa-instagram"></a>
  </div>

  </section>


  <!-- footer section ends -->



    <script src="{{url('js/jquery.min.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="{{url('js/main.js')}}"></script>
</body>
</html>
