<?php
header("Content-Type: text/html; charset=utf8", true); 
require ('class.phpmailer.php');
require ('class.smtp.php');
$nome = $_POST['nome'];
$razaoSocial = $_POST['razaoSocial'];
$nomeFantasia = $_POST['nomeFantasia'];
$inscricaoEstadual = $_POST['inscricaoEstadual'];
$cnpj = $_POST['cnpj'];

$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

$emailComercial = $_POST['emailComercial'];
$emailCobranca = $_POST['emailCobranca'];
$emailNotaFiscal = $_POST['emailNotaFiscal'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$whatsApp = $_POST['whatsApp'];
$responsavelCompras = $_POST['responsavelCompras'];
$responsavelEmpresa = $_POST['responsavelEmpresa'];

$regimeTributacao = $_POST['regimeTributacao'];

$referenciasComerciais = $_POST['referenciasComerciais'];

$customRadioInline1 = $_POST['customRadioInline1'];
$arquivo = $_FILES['arquivo'];

if($nome == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo NOME.');window.location='index.html'</script>";exit;}
if($razaoSocial == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo RAZÃO SOCIAL.');window.location='index.html'</script>";exit;}
if($nomeFantasia == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo NOME FANTASIA.');window.location='index.html'</script>";exit;}
if($inscricaoEstadual == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo INSCRIÇÃO ESTADUAL.');window.location='index.html'</script>";exit;}
if($cnpj == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo CNPJ.');window.location='index.html'</script>";exit;}

if($cep == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo CEP.');window.location='index.html'</script>";exit;}
if($rua == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo RUA.');window.location='index.html'</script>";exit;}
if($numero == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo NUMERO.');window.location='index.html'</script>";exit;}
if($bairro == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo BAIRRO.');window.location='index.html'</script>";exit;}
if($cidade == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo CIDADE.');window.location='index.html'</script>";exit;}
if($uf == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo UF.');window.location='index.html'</script>";exit;}

if($emailComercial == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo E-MAIL COMERCIAL.');window.location='index.html'</script>";exit;}
if($emailCobranca == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo E-MAIL COBRANÇA.');window.location='index.html'</script>";exit;}
if($emailNotaFiscal == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo E-MAIL NOTA FISCAL.');window.location='index.html'</script>";exit;}
if($telefone == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo TELEFONE.');window.location='index.html'</script>";exit;}
if($celular == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo CELULAR.');window.location='index.html'</script>";exit;}
if($whatsApp == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo WHATSAPP.');window.location='index.html'</script>";exit;}
if($responsavelCompras == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo RESPONSÁVEL POR COMPRAS.');window.location='index.html'</script>";exit;}
if($responsavelEmpresa == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo RESPONSÁVEL PELA EMPRESA.');window.location='index.html'</script>";exit;}

if($regimeTributacao == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo RESPONSÁVEL PELA EMPRESA.');window.location='index.html'</script>";exit;}
if($responsavelEmpresa == ""){echo "<script>alert('ATENÇÃO: Você esqueceu de preencher o campo RESPONSÁVEL PELA EMPRESA.');window.location='index.html'</script>";exit;}

 
$corpo = "<html style=\"font-family:Arial, Helvetica, sans-serif; font-size:14px;\"><body>";
$corpo .= "<h2>Cadastro para clientes</h2>";
$corpo .= "<b>Nome:</b> $nome <br>";
$corpo .= "<b>Razão Social:</b> $razaoSocial <br>";
$corpo .= "<b>Nome Fantasia:</b> $nomeFantasia <br>";
$corpo .= "<b>Inscrição Estadual:</b> $inscricaoEstadual <br>";
$corpo .= "<b>CNPJ:</b> $cnpj <br>";
$corpo .= "<b>CEP:</b> $cep <br>";
$corpo .= "<b>Rua:</b> $rua <br>";
$corpo .= "<b>Número:</b> $numero <br>";
$corpo .= "<b>Complemento:</b> $complemento <br>";
$corpo .= "<b>Bairro:</b> $bairro <br>";
$corpo .= "<b>Cidade:</b> $cidade <br>";
$corpo .= "<b>UF:</b> $uf <br><br>";

$corpo .= "<b>E-mail Comercial:</b> $emailComercial <br>";
$corpo .= "<b>E-mail Cobrança:</b> $emailCobranca <br>";
$corpo .= "<b>E-mail Nota Fiscal:</b> $emailNotaFiscal <br>";
$corpo .= "<b>Telefone:</b> $telefone <br>";
$corpo .= "<b>Celular:</b> $celular <br>";
$corpo .= "<b>WhatsApp:</b> $whatsApp <br>";
$corpo .= "<b>Responsável por Compras:</b> $responsavelCompras <br>";
$corpo .= "<b>Responsável pela Empresa:</b> $responsavelEmpresa <br><br>";

$corpo .= "<b>Regime de tributação:</b> $regimeTributacao <br>";
$corpo .= "<b>Possui algum regime especial de recolhimento de substituição tributária? </b> $customRadioInline1 <br><br>";

foreach($referenciasComerciais as $key => $valor){
$corpo .= "<b>Referência comercial:</b> $referenciasComerciais[$key] <br>";	
}
$corpo .= "</body></html>";

$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->Port = 000; 
$mail->Host = 'smtp.xxxxx.com'; 
$mail->SMTPAuth = true; 
$mail->Username = 'xxxxx@xxxxx.com.br'; 
$mail->Password = 'xxxxx';
$mail->From = 'xxxxx@xxxxx.com.br'; 
$mail->FromName = 'Formulário de cadastro';
$mail->AddAddress('xxxxx@xxxxx.com.br', 'Nome');
$mail->IsHTML(true); 
$mail->CharSet = 'utf-8'; 
$mail->Subject  = 'Formulário de cadastro';
$mail->Body = $corpo;
$mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']);

$enviado = $mail->Send();
if ($enviado) {
	$msg = "Fomulário enviado com sucesso. Obrigado.";
	echo "<script>alert('$msg');window.location.assign('index.html');</script>";
	} else
	{
	$msg = "ATENÇÃO: Não foi possível realizar o envio, verifique as informações e tente novamente.";
	echo "<script>alert('$msg');window.location.assign('index.html');</script>";
	}
}
?>	