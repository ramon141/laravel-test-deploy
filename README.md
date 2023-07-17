Pro-disciplinas

Inicialização server:

    Após descompactação do zip executar comando: 
        ./vendor/bin/sail up
        
    Teste para verificar se server mysql está funcionando:
        ./vendor/bin/sail mysql
    
    Caso mysql não esteja funcionando executar:
        ./vendor/bin/sail down -v
        ./vendor/bin/sail up -d

    Executar migrate para criação das tabelas na DB:
        ./vendor/bin/sail artisan migrate
        
