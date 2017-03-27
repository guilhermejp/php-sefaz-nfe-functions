<?php
/*
 * Programa de exemplo como chamar a classe ConverteNFe
 * 
 * @name exemplo.php
 * @author Guilherme Silva <guilherme@gcoder.com.br>
 * @version 0.1
 * @access public
*/
require_once("ConversorNFe.php");

$c = new ConversorNFe();
/*
 * Setar variáveis para o ConverteNFe
 */

$c->version = "3.0";
$c->ide['cUF'] = "11";
$c->ide['cNF'] = "00000001";
$c->ide['natOp'] = "venda";
$c->ide['indPag'] = "0";
$c->ide['mod'] = "55";
$c->ide['serie'] = "001";
$c->ide['nNF'] = "000000001";
$c->ide['dhEmi'] = "2017-03-09";
$c->ide['dhSaiEnt'] = "2017-03-09";
$c->ide['tpNF'] = "1";
$c->ide['idDest'] = "";
$c->ide['cMunFG'] = "11";
$c->ide['tpImp'] = "1";
$c->ide['tpEmis'] = "1";
$c->ide['cDV'] = "0";
$c->ide['tpAmb'] = "2";
$c->ide['finNFe'] = "1";
$c->ide['indFinal'] = "";
$c->ide['indPres'] = "";
$c->ide['procEmi'] = "";
$c->ide['verProc'] = "";
$c->ide['dhCont'] = "";
$c->ide['xJust'] = "";

$c->emit['emitNome'] = "EMPRESA EMITENTE TESTE LTDA";
$c->emit['emitFantasia'] = "TESTE";
$c->emit['emitIE'] = "102030";
$c->emit['emitIEST'] = "102000";
$c->emit['emitIM'] = "304050";
$c->emit['emitCNAE'] = "2411";
$c->emit['emitCRT'] = "";
$c->emit['emitCPF'] = "";
$c->emit['emitCNPJ'] = "12345678901234";

$c->enderEmit['emitLogradouro'] = "RUA X";
$c->enderEmit['emitNro'] = "1234";
$c->enderEmit['emitComplemento'] = "";
$c->enderEmit['emitBairro'] = "BAIRRO X";
$c->enderEmit['emitCodMunicipio'] = "10432";
$c->enderEmit['emitNomeMunicipio'] = "Municipio X";
$c->enderEmit['emitUF'] = "SP";
$c->enderEmit['emitCEP'] = "80000000";
$c->enderEmit['emitCodPais'] = "076";
$c->enderEmit['emitNomePais'] = "Brasil";
$c->enderEmit['emitFone'] = "+5511999999999";

$c->dest['destNome'] = "Nome Destinatario";
$c->dest['destIndIEDest'] = "";
$c->dest['destIE'] = "102030";
$c->dest['destISUF'] = "102030";
$c->dest['destEmail'] = "email@destinatario.com.br";
$c->dest['destCPF'] = "";
$c->dest['destCNPJ'] = "12345678901234";
$c->dest['destIdEstrangeiro'] = "";

$c->enderDest['destLogradouro'] = "RUA X";
$c->enderDest['destNro'] = "1234";
$c->enderDest['destComplemento'] = "";
$c->enderDest['destBairro'] = "BAIRRO X";
$c->enderDest['destCodMunicipio'] = "10432";
$c->enderDest['destNomeMunicipio'] = "Municipio X";
$c->enderDest['destUF'] = "SP";
$c->enderDest['destCEP'] = "80000000";
$c->enderDest['destCodPais'] = "076";
$c->enderDest['destNomePais'] = "Brasil";
$c->enderDest['destFone'] = "+5511999999999";

$c->entrega['xLgr'] = "RUA X";
$c->entrega['nro'] = "1234";
$c->entrega['xCpl'] = "";
$c->entrega['xBairro'] = "BAIRRO X";
$c->entrega['cMun'] = "10432";
$c->entrega['xMun'] = "Municipio X";
$c->entrega['UF'] = "SP";
$c->entrega['CPF'] = "12345678901";
$c->entrega['CNPJ'] = "";

$c->total['vBC'] = "0.00";
$c->total['vICMS'] = "0.00";
$c->total['vICMSDeson'] = "0.00";
$c->total['vBCST'] = "0.00";
$c->total['vST'] = "0.00";
$c->total['vProd'] = "0.00";
$c->total['vFrete'] = "0.00";
$c->total['vSeg'] = "0.00";
$c->total['vDesc'] = "0.00";
$c->total['vII'] = "0.00";
$c->total['vIPI'] = "0.00";
$c->total['vPIS'] = "0.00";
$c->total['vCOFINS'] = "0.00";
$c->total['vOutro'] = "0.00";
$c->total['vNF'] = "100.00";
$c->total['vTotTrib'] = "10.00";

$c->modFrete = "1";

$c->det[1]['item'] = "1";
$c->det[1]['prod']['cProd'] = "41789";
$c->det[1]['prod']['cEAN'] = "7898357417892";
$c->det[1]['prod']['xProd'] = "Produto X";
$c->det[1]['prod']['NCM'] = "102030";
$c->det[1]['prod']['EXTIPI'] = "";
$c->det[1]['prod']['CFOP'] = "9999";
$c->det[1]['prod']['uCom'] = "";
$c->det[1]['prod']['qCom'] = "";
$c->det[1]['prod']['vUnCom'] = "100.00";
$c->det[1]['prod']['vProd'] = "100.00";
$c->det[1]['prod']['cEANTrib'] = "";
$c->det[1]['prod']['uTrib'] = "";
$c->det[1]['prod']['qTrib'] = "";
$c->det[1]['prod']['vUnTrib'] = "";
$c->det[1]['prod']['vFrete'] = "";
$c->det[1]['prod']['vSeg'] = "";
$c->det[1]['prod']['vDesc'] = "";
$c->det[1]['prod']['vOutro'] = "";
$c->det[1]['prod']['indTot'] = "";
$c->det[1]['prod']['xPed'] = "";
$c->det[1]['prod']['nItemPed'] = "";
$c->det[1]['prod']['nFCI'] = "";

$c->det[1]['prod']['imposto']['vTotTrib'] = "10.00";
$c->det[1]['prod']['imposto']['vTotTrib'] = "10.00";

$c->det[1]['prod']['imposto']['CST']['cod'] = "00";
$c->det[1]['prod']['imposto']['CST']['orig'] = "1";
$c->det[1]['prod']['imposto']['CST']['CST'] = "00";
$c->det[1]['prod']['imposto']['CST']['modBC'] = "3";
$c->det[1]['prod']['imposto']['CST']['vBC'] = "159.49";
$c->det[1]['prod']['imposto']['CST']['pICMS'] = "4.00";
$c->det[1]['prod']['imposto']['CST']['vICMS'] = "6.38";

$c->det[1]['prod']['imposto']['clEnq'] = "";
$c->det[1]['prod']['imposto']['CNPJProd'] = "72071541000200";
$c->det[1]['prod']['imposto']['cSelo'] = "";
$c->det[1]['prod']['imposto']['qSelo'] = "000000000000";
$c->det[1]['prod']['imposto']['cEnq'] = "137";

$c->det[1]['prod']['imposto']['IPINT']['CST'] = "53";

$c->det[1]['prod']['imposto']['PIS']['CST'] = "04";

$c->det[1]['prod']['imposto']['PIS']['COFINS'] = "04";

/*
 * Chamar o ConversorNFe
 */

$texto = $c->exportTXT();

echo "<pre>";

if(!$texto){
    echo $c->erroMsg;
}else{
    echo $texto;
}


/*
 * Gravar arquivo de retorno
 */
    $caminho = "";
    $arquivo = "NFESAIDA.txt"; // NFE<chave44>.txt
    file_put_contents($caminho.$arquivo, $texto);

?>