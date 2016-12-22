<?php

class ContatoController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array(
            'aviso' => ''
        );

        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            // recebendo dados do formulario
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $msg = addslashes($_POST['mensagem']);
            
            // envio do e-mail
            $para = "contato@paulofrancaweb.com.br";
            $assunto = "Dúvida do site";
            $mensagem = "Nome: ".$nome."<br>"
                    . "E-mail: ".$email."<br>"
                    . "Mensagem: ".$msg;
            
            $cabecalho = "From: contato@paulofrancaweb.com.br"."\r\n"
                    . "Reply-To: ".$email."\r\n"
                    . "X-Mailer: PHP/".  phpversion();
            
            mail($para, $assunto, $mensagem, $cabecalho);
            
            $dados['aviso'] = "E-mail enviado com sucesso!";
        }

        $this->loadTemplate('contato', $dados);
    }

}
