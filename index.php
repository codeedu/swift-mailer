<?php
require_once 'vendor/autoload.php';

//Criando a mensagem
$message = \Swift_Message::newInstance();

//Assunto da mensagem
$message->setSubject("Assunto da mensagem")
    //Quem está enviando
    ->setFrom(
        array(
            "fulano@schoolofnet.com" => 'Fulano da Silva'
        )
    )
    //Quem irá receber
    ->setTo(
        array(
            'josedasilva@schoolofnet.com'
        )
    )
    //Corpo da Mensagem
    ->setBody("Minha mensagem")
    //Inserindo anexos
    ->attach(\Swift_Attachment::fromPath('minha-imagem.jpg'));

//Criando o transporte
$transport = \Swift_SmtpTransport::newInstance();

//Servidor que enviará o e-mail
$transport->setHost('meuservidor.com.br')
    //porta SMTP
    ->setPort(465)//ou 587
    //usuário
    ->setUsername('fulano@schoolofnet.com')
    //senha
    ->setPassword('123456')
    //tipo de encriptação
    ->setEncryption('ssl')
    //método de autenticação
    ->setAuthMode('login');

//Criando o e-mail com o transporte
$mailer = \Swift_Mailer::newInstance($transport);
//Enviando e-mail
$mailer->send($message);



//Corpo da mensagem em HTML
$message->setBody("Minha mensagem","text/html");

//Criar instância da mensagem já com assunto
$message = \Swift_Message::newInstance("Meu assunto");

//Criar instância do transporte já com servidor e porta
$transport = \Swift_SmtpTransport::newInstance("meuservidor.com.br",587);