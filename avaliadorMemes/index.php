<?php
//chama o database pra conectar
    require_once 'app/core/Database.php';

#Chama o MemeController para ele funcionar   
    require_once 'app/controllers/MemesController.php';

    require_once 'app/controllers/UsuariosController.php';

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); #pega a URI e coloca em uma var

    if ($uri === '/' || $uri === '/index.php') {
        $controller = new UsuariosController();# cria um obj do controller pra usar as funções
         $controller->loginController();

    } elseif($uri === '/user-off'){
        $controller = new UsuariosController();
        $controller->cadastroController();

    }
    elseif($uri === '/logout'){
        $controller = new UsuariosController();
        $controller->logoutController();
    }
    
    elseif ($uri === '/user-on'){ #checa se depois da barra tem algo
        $controller = new MemesController();
        $controller->index();

    } elseif ($uri === '/memes'){ 
        $controller = new MemesController();
        $controller->create(); # se for a URI memes chama a função create()

    }elseif ($uri === '/memes/store'){
        $controller = new MemesController();
        $controller->store();

    }elseif ($uri === '/show'){
        $controller = new MemesController();
        $controller->index();

    } elseif (preg_match('/^\/memes\/show\/(\d+)$/', $uri, $matches)) {
        $controller = new MemesController();
   
        // print_r($matches);
        $controller->show($matches[1]);
    }    
    /* Rota para avaliar*/     
    elseif (preg_match('/^\/memes\/show\/avaliar\/(\d+)$/', $uri, $matches)) {
        $controller = new MemesController();
    
        // print_r($matches);
        $controller->avaliar($matches[1]);
    
        $controller->index();
    }
    
    elseif (preg_match('/^\/memes\/delete\/(\d+)$/', $uri, $matches)) {
        
        $controller = new MemesController();
        $controller->delete($matches[1]); 
        

        $controller->index();

    }

?>
