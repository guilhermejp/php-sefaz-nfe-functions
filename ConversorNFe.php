<?php

/**
 * Classe responsável por transformar o Objeto NFe (variáveis) em TXT
 * Esta classe atende aos critérios estabelecidos no
 * Manual de Importação/Exportação TXT Notas Fiscais eletrônicas versão 2.0.0
 *
 * @name        ConversorNFe
 * @version     0.1
 * @author      Guilherme Silva <guilherme@gcoder.com.br>
 * @access public
 */

class ConversorNFe
{
    /**
     * Atribuitos da NFe
     */

    /**
     * errMsg
     * Mensagens de erro da Classe
     * @var string
     */
    public $erroMsg = '';
    
    public $id = null;
    public $version = null;
    public $ide = null;
    public $nfeReferencia = null;
    public $emit = null;
    public $enderEmit = null;
    public $dest = null;
    public $enderDest = null;
    public $retirada = null;
    public $entrega = null;
    public $entregaAut = null;
    public $total = null;
    public $ISSQNtot = null;
    public $retTrib = null;
    public $modFrete = null;
    public $transportadora = null;
    public $retTransp = null;
    public $veicTransp = null;
    public $reboque = null;
    public $valor = null;
    public $vol = null;
    public $fat = null;
    public $dup = null;
    public $infAdic = null;
    public $obsCont = null;
    public $obsFisco = null;
    public $procRef = null;
    public $exporta = null;
    public $compra = null;
    public $cana = null;
    public $forDia = null;
    public $deduc = null;
    
    public $det = null;
    
    /*
     * Forma de carregamento das variáveis
     *
$this->id
$this->version
$this->ide['cUF']
$this->ide['cNF']
$this->ide['natOp']
$this->ide['indPag']
$this->ide['mod']
$this->ide['serie']
$this->ide['nNF']
$this->ide['dhEmi']
$this->ide['dhSaiEnt']
$this->ide['tpNF']
$this->ide['idDest']
$this->ide['cMunFG']
$this->ide['tpImp']
$this->ide['tpEmis']
$this->ide['cDV']
$this->ide['tpAmb']
$this->ide['finNFe']
$this->ide['indFinal']
$this->ide['indPres']
$this->ide['procEmi']
$this->ide['verProc']
$this->ide['dhCont']
$this->ide['xJust']
				
$this->nfeReferencia[''] = numero 02 || 03 || 10 || 20
                        ['refNFe']
                        ['cUF']
                        ['AAMM']
                        ['CNPJ']
                        ['mod']
                        ['serie']
                        ['nNF']
                        ['cUF']
                        ['AAMM']
                        ['IE']
                        ['mod']
                        ['serie']
                        ['nNF']
                        ['refCTe']
                        ['CNPJ']
                        ['CPF']
                        ['mod']
                        ['nECF']
                        ['nCOO']

$this->emit['emitNome']
$this->emit['emitFantasia']
$this->emit['emitIE']
$this->emit['emitIEST']
$this->emit['emitIM']
$this->emit['emitCNAE']
$this->emit['emitCRT']
$this->emit['emitCPF']
$this->emit['emitCNPJ']

$this->enderEmit['emitLogradouro']
$this->enderEmit['emitNro']
$this->enderEmit['emitComplemento']
$this->enderEmit['emitBairro']
$this->enderEmit['emitCodMunicipio']
$this->enderEmit['emitNomeMunicipio']
$this->enderEmit['emitUF']
$this->enderEmit['emitCEP']
$this->enderEmit['emitCodPais']
$this->enderEmit['emitNomePais']
$this->enderEmit['emitFone']

$this->dest['destNome']
$this->dest['destIndIEDest']
$this->dest['destIE']
$this->dest['destISUF']
$this->dest['destEmail']
$this->dest['destCPF']
$this->dest['destCNPJ']
$this->dest['destIdEstrangeiro']

$this->enderDest['destLogradouro']
$this->enderDest['destNro']
$this->enderDest['destComplemento']
$this->enderDest['destBairro']
$this->enderDest['destCodMunicipio']
$this->enderDest['destNomeMunicipio']
$this->enderDest['destUF']
$this->enderDest['destCEP']
$this->enderDest['destCodPais']
$this->enderDest['destNomePais']
$this->enderDest['destFone']

$this->retirada['retLogradouro']
$this->retirada['retNro']
$this->retirada['retComplemento']
$this->retirada['retBairro']
$this->retirada['retCodMunicipio']
$this->retirada['retNomeMunicipio']
$this->retirada['retUF']
$this->retirada['retCPF']
$this->retirada['retCNPJ']

$this->entrega['xLgr']
$this->entrega['nro']
$this->entrega['xCpl']
$this->entrega['xBairro']
$this->entrega['cMun']
$this->entrega['xMun']
$this->entrega['UF']
$this->entrega['CPF']
$this->entrega['CNPJ']

$this->entregaAut['entAutCPF']
$this->entregaAut['entAutCNPJ']

$this->total['vBC']
$this->total['vICMS']
$this->total['vICMSDeson']
$this->total['vBCST']
$this->total['vST']
$this->total['vProd']
$this->total['vFrete']
$this->total['vSeg']
$this->total['vDesc']
$this->total['vII']
$this->total['vIPI']
$this->total['vPIS']
$this->total['vCOFINS']
$this->total['vOutro']
$this->total['vNF']
$this->total['vTotTrib']

$this->ISSQNtot['vServ']
$this->ISSQNtot['vBC']
$this->ISSQNtot['vISS']
$this->ISSQNtot['vPIS']
$this->ISSQNtot['vCOFINS']
$this->ISSQNtot['dCompet']
$this->ISSQNtot['vDeducao']
$this->ISSQNtot['vOutro']
$this->ISSQNtot['vDescIncond']
$this->ISSQNtot['vDescCond']
$this->ISSQNtot['vISSRet']
$this->ISSQNtot['cRegTrib']

$this->retTrib['vRetPIS']
$this->retTrib['vRetCOFINS']
$this->retTrib['vRetCSLL']
$this->retTrib['vBCIRRF']
$this->retTrib['vIRRF']
$this->retTrib['vBCRetPrev']
$this->retTrib['vRetPrev']

$this->modFrete

$this->transportadora['xNome']
$this->transportadora['IE']
$this->transportadora['xEnder']
$this->transportadora['xMun']
$this->transportadora['UF']
$this->transportadora['CNPJ']
$this->transportadora['CPF']

$this->retTransp['vServ']
$this->retTransp['vBCRet']
$this->retTransp['pICMSRet']
$this->retTransp['vICMSRet']
$this->retTransp['CFOP']
$this->retTransp['cMunFG']

$this->veicTransp['placa']
$this->veicTransp['UF']
$this->veicTransp['RTNC']

$this->$valor['placa']
$this->$valor['UF']
$this->$valor['RNTC']
$this->$valor['vagao']
$this->$valor['balsa']

$this->vol[]['qVol']
$this->vol[]['esp']
$this->vol[]['marca']
$this->vol[]['nVol']
$this->vol[]['pesoL']
$this->vol[]['pesoB']
$this->vol[]['lacres'][]

$this->fat['nFat']
$this->fat['vOrig']
$this->fat['vDesc']
$this->fat['vLiq']

$this->dup[]['nDup']
$this->dup[]['dVenc']
$this->dup[]['vDup']

$this->infAdic['infAdFisco']
$this->infAdic['infCpl']

$this->obsCont[]['xCampo']
$this->obsCont[]['xTexto']

$this->obsFisco[]['xCampo']
$this->obsFisco[]['xTexto']

$this->procRef[]['nProc']
$this->procRef[]['indProc']

$this->exporta['UFEmbarq']
$this->exporta['xLocEmbarq']
$this->exporta['xLocDespacho']

$this->cana['safra']
$this->cana['ref']
$this->cana['qTotMes']
$this->cana['qTotAnt']
$this->cana['qTotGer']
$this->cana['vFor']
$this->cana['vTotDed']
$this->cana['vLiqFor']

$this->forDia[]['dia']
$this->forDia[]['qtde']

$this->deduc[]['xDed']
$this->deduc[]['vDed']
 
     
//---- Área exclusiva dos itens da nota

$this->det[]
        ['item']
        ['infAdProd']
$this->det[]
        ['prod']
            ['cProd']
            ['cEAN']
            ['xProd']
            ['NCM']
            ['EXTIPI']
            ['CFOP']
            ['uCom']
            ['qCom']
            ['vUnCom']
            ['vProd']
            ['cEANTrib']
            ['uTrib']
            ['qTrib']
            ['vUnTrib']
            ['vFrete']
            ['vSeg']
            ['vDesc']
            ['vOutro']
            ['indTot']
            ['xPed']
            ['nItemPed']
            ['nFCI']

            ['di'][]
                ['nDI']
                ['dDI']
                ['xLocDesemb']
                ['UFDesemb']
                ['dDesemb']
                ['tpViaTransp']
                ['vAFRMM']
                ['tpIntermedio']
                ['CNPJ']
                ['UFTerceiro']
                ['cExportador']
                ['adi'][]
                    ['nAdicao']
                    ['nSeqAdic']
                    ['cFabricacao']
                    ['vDescDI']
                    ['nDraw']

$this->det[]
    ['prod']
        ['veicProd']
            ['tpOp']
            ['chassi']
            ['cCor']
            ['xCor']
            ['pot']
            ['cilin']
            ['pesoL']
            ['pesoB']
            ['nSerie']
            ['tpComb']
            ['nMotor']
            ['CMT']
            ['dist']
            ['anoMod']
            ['anoFab']
            ['tpPint']
            ['tpVeic']
            ['espVeic']
            ['vIN']
            ['condVeic']
            ['cMod']
            ['cCorDENATRAN']
            ['lote']
            ['tpRest']
					
$this->det[]
    ['prod']
        ['medi'][]
            ['nLote']
            ['qLote']
            ['dFab']
            ['dVal']
            ['vPMC']
						
$this->det[]
    ['prod']
        ['arma'][]
            ['tpArma']
            ['nSerie']
            ['nCano']
            ['descr']

$this->det[]
    ['prod']
        ['comb']
            ['cProdANP']
            ['pMixGN']
            ['CODIF']
            ['qTemp']
            ['UFCons']
            ['CIDE']
                ['qBCProd']
                ['vAliqProd']
                ['vCIDE']

$this->det[]
    ['prod']
        ['imposto']
            ['vTotTrib']

$this->det[]
    ['prod']
        ['imposto']
            ['CST'] 
                ['cod'] = 00 || 10 || 20 ...
                ['orig']
                ['CST']
                ['modBC']
                ['vBC']
                ['pICMS']
                ['vICMS']
                ['modBCST']
                ['pMVAST']
                ['pRedBCST']
                ['vBCST']
                ['pICMSST']
                ['vICMSST']
                ['pRedBC']
                ['vICMSDeson']
                ['motDesICMS']
                ['vICMSOp']
                ['pDif']
                ['vICMSDif']
                ['vBCSTRet']
                ['vICMSSTRet']

     */
    

    /**
     * exportTXT
     * Método de conversão da NFe para txt, conforme
     * especificações do Manual de Importação/Exportação TXT
     * Notas Fiscais eletrônicas Versão 2.0.0
     * Referente ao modelo de NFe contido na versão 4.01
     * do manual de integração da NFe
     *
     * @name exportTxt
     * @return mixed boolean ou string
     */

    public function exportTXT()
    {
        $txt = $this->createTXT();
        if($txt == false){
            return false;
        }
        $txt = "NOTA FISCAL|001\r\n" . $txt;
        return $txt;
    } //fim exportTxt

    /**
     * createTXT
     * Função responsável por montar o TXT de acondo com os atributos da classe
     * 
     * @param type $dom 
     */
    private function createTXT()
    {
        $txt = '';

//A|versão do schema|id|pk_nItem|
//obs.: pk_nItem não deve ser preenchido de acordo com SEFAZ (https://www.nfe.fazenda.gov.br/portal/exibirArquivo.aspx?conteudo=zxlLdxB/oYA=) pág 108
// ex.: A|3.10|NFe|
        $txt .= "A|$this->id|$this->version|\r\n";

//B|cUF|cNF|natOp|indPag|mod|serie|nNF|dhEmi|dhSaiEnt|tpNF|idDest|cMunFG|tpImp|
// tpEmis|cDV|tp Amb|finNFe|indFinal|indPres|procEmi|verProc|
// dhCont|xJust| ---- TODO: VERIFICAR COM LEONARDO ESTAS OUTRAS 2 VARIAVEIS

// ex.: B|41|00000000|Venda Prod Zona Fra|1|55|001|000200001|2017-01-04T16:26:02-02:00|
// 2017-01-04T16:26:02-02:00|1|2|4125506|1|1|0|1|1|0|9|0|1.0.0| | |

        $txt .= "B|".$this->ide['cUF']."|".$this->ide['cNF']."|".
                $this->ide['natOp']."|".$this->ide['indPag']."|".
                $this->ide['mod']."|".$this->ide['serie']."|".
                $this->ide['nNF']."|".$this->ide['dhEmi']."|".
                $this->ide['dhSaiEnt']."|".$this->ide['tpNF']."|".
                $this->ide['idDest']."|".$this->ide['cMunFG']."|".
                $this->ide['tpImp']."|".$this->ide['tpEmis']."|".
                $this->ide['cDV']."|".$this->ide['tpAmb']."|".
                $this->ide['finNFe']."|".$this->ide['indFinal']."|".
                $this->ide['indPres']."|".$this->ide['procEmi']."|".
                $this->ide['verProc']."|".$this->ide['dhCont']."|".
                $this->ide['xJust']."|\r\n";

        
// Verifica se o array nfeReferenciada é informado
// ex.: nfeReferenciada[] = array("tipo"=>"02", "refNFe"=>"35080599999090910270550010000000015180051273") ou
// ex.: nfeReferenciada[] = array("tipo"=>"03", "cUF"=>"11", "AAMM"=>"1703", "CNPJ"=>"12345678901234","mod"=>"55","serie"=>"001","nNF"=>"0000001") ou
// ex.: nfeReferenciada[] = array("tipo"=>"10", "cUF"=>"11", "AAMM"=>"1703", "IE"=>"10203040","mod"=>"55","serie"=>"001","nNF"=>"0000001","refCTe"=>"35080599999090910270550010000000015180051273", "CNPJ"=>"", "CPF"=>"") informar CNPJ ou CPF ou
// ex.: nfeReferenciada[] = array("tipo"=>"20", "mod"=>"01", "nECF"=>"10152030", "nCOO"=>"1234567890")

        if(is_array($this->nfeReferencia)){
            foreach($this->nfeReferencia as $valor){
                switch($valor['tipo']){

                    case "02":
                        $txt .= "BA02|".$valor['refNFe']."|\r\n";
                        break;
                    
                    case "03":
                        $txt .= "BA03|".$valor['cUF']."|".$valor['AAMM']."|".
                            $valor['CNPJ']."|".$valor['mod']."|".
                            $valor['serie']."|".$valor['nNF']."|\r\n"; 
                        break;
                    
                    case "10":
                        $txt .= "BA10|".$valor['cUF']."|".$valor['AAMM']."|".$valor['IE']."|".$valor['mod']."|".$valor['serie']."|".$valor['nNF']."|".$valor['refCTe']."|\r\n";
                        if($valor['CNPJ'] != ""){
                            $txt .= "BA13|".$valor['CNPJ']."|\r\n";
                        }elseif($valor['CPF'] != ""){
                            $txt .= "BA14|".$valor['CPF']."|\r\n";
                        }
                        break;
                        
                    case "20":
                        $txt .= "BA20|".$valor['mod']."|".$valor['nECF']."|".$valor['nCOO']."|\r\n";
                        break;

                }
            }
        }
// Emitente
//C|XNome|XFant|IE|IEST|IM|CNAE|CRT|
// C02|CNPJ|
// C02a|CPF|
        $txt .= "C|".$this->emit['emitNome']."|".$this->emit['emitFantasia']."|".
                $this->emit['emitIE']."|".$this->emit['emitIEST']."|".
                $this->emit['emitIM']."|".$this->emit['emitCNAE']."|".
                $this->emit['emitCRT']."|\r\n";
        if($this->emit['emitCPF'] != "") {
            $txt .= "C02a|".$this->emit['emitCPF']."|\r\n";
        }elseif($this->emit['emitCNPJ'] != "") {
            $txt .= "C02|".$this->emit['emitCNPJ']."|\r\n";
        }

//C05|xLgr|nro|xCPL|xBairro|cMun|xMun|UF|CEP|cPais|xPais|fone| 
        $txt .= "C05|".$this->enderEmit['emitLogradouro']."|".$this->enderEmit['emitNro']."|".
                $this->enderEmit['emitComplemento']."|".$this->enderEmit['emitBairro']."|".
                $this->enderEmit['emitCodMunicipio']."|".$this->enderEmit['emitNomeMunicipio']."|".
                $this->enderEmit['emitUF']."|".$this->enderEmit['emitCEP']."|".$this->enderEmit['emitCodPais']."|".
                $this->enderEmit['emitNomePais']."|".$this->enderEmit['emitFone']."|\r\n";

//D|CNPJ|xOrgao|matr|xAgente|fone|UF|nDAR|dEmi|vDAR|repEmi|dPag|
// O grupo D não deve ser informado, uso exclusivo pelo FISCO emitente. (SEFAZ pag 115).
//        $txt .= "D|$CNPJ|$xOrgao|$matr|$xAgente|$fone|$UF|$nDAR|$dEmi|$vDAR|$repEmi|$dPag|\r\n";

//E|xNome|IE|ISUF|email|
// E02|CNPJ|
// E03|CPF|
        $txt .= "E|".$this->dest['destNome']."|".$this->dest['destIndIEDest']."|".
                $this->dest['destIE']."|".$this->dest['destISUF']."|".$this->dest['destEmail']."|\r\n";
        if ($this->dest['destCPF'] != "") {
            $txt .= "E03|".$this->dest['destCPF']."|\r\n";
        } elseif ($this->dest['destCNPJ'] != "") {
            $txt .= "E02|".$this->dest['destCNPJ']."|\r\n";
        } elseif ($this->dest['destIdEstrangeiro'] != "") {
            $txt .= "E02a|".$this->dest['destIdEstrangeiro']."|\r\n";
        }
// Destinatário
//E05|xLgr|nro|xCpl|xBairro|cMun|xMun|UF|CEP|cPais|xPais|fone|
// TODO verificar se é obrigatório (fazer teste antes de enviar)
        $txt .= "E05|".$this->enderDest['destLogradouro']."|".$this->enderDest['destNro']."|".
                $this->enderDest['destComplemento']."|".$this->enderDest['destBairro']."|".
                $this->enderDest['destCodMunicipio']."|".$this->enderDest['destNomeMunicipio']."|".
                $this->enderDest['destUF']."|".$this->enderDest['destCEP']."|".$this->enderDest['destCodPais']."|".
                $this->enderDest['destNomePais']."|".$this->enderDest['destFone']."|\r\n";

// Local Retirada
//F|xLgr|nro|xCpl|xBairro|cMun|xMun|UF|
// TODO verificar se é obrigatório (fazer teste antes de enviar)
        if(is_array($this->retirada)){
            $txt .= "F|".$this->retirada['retLogradouro']."|".$this->retirada['retNro']."|".
                    $this->retirada['retComplemento']."|".$this->retirada['retBairro']."|".
                    $this->retirada['retCodMunicipio']."|".$this->retirada['retNomeMunicipio']."|".
                    $this->retirada['retUF']."|\r\n";
            if ($this->retirada['retCPF'] != "") {
                $txt .= "F02a|".$this->retirada['retCPF']."|\r\n";
            } elseif ($this->retirada['retCNPJ'] != "") {
                $txt .= "F02|".$this->retirada['retCNPJ']."|\r\n";
            }
        }

//G|xLgr|nro|xCpl|xBairro|cMun|xMun|UF|
        if(is_array($this->entrega)){
            $txt .= "G|".$this->entrega['xLgr']."|".$this->entrega['nro']."|".
                    $this->entrega['xCpl']."|".$this->entrega['xBairro']."|".
                    $this->entrega['cMun']."|".$this->entrega['xMun']."|".
                    $this->entrega['UF']."|\r\n";

            if ($this->entrega['CPF'] != '') {
                $txt .= "G02a|".$this->entrega['CPF']."|\r\n";
            } else {
                $txt .= "G02|".$this->entrega['CNPJ']."|\r\n";
            }
        }

//GA|
//GA02|CNPJ| ou
//GA03|CPF| 
        if ($this->entregaAut['entAutCPF'] != "") {
            $txt .= "GA|\r\n";
            $txt .= "GA03|".$this->entregaAut['entAutCPF']."|\r\n";
        } elseif ($this->entregaAut['entAutCNPJ'] != "") {
            $txt .= "GA|\r\n";
            $txt .= "GA02|".$this->entregaAut['entAutCNPJ']."|\r\n";
        }

        //carrega dados dos itens
        $txt .= $this->gerarItens();

//W|
$txt .= "W|\r\n";

        //W02|vBC|vICMS|vICMSDeson|vBCST|vST|vProd|vFrete|vSeg|vDesc|vII|vIPI|vPIS|vCOFINS|vOutro|vNF|vTotTrib|
        $txt .= "W02|".$this->total['vBC']."|".$this->total['vICMS']."|".
                $this->total['vICMSDeson']."|".$this->total['vBCST']."|".
                $this->total['vST']."|".$this->total['vProd']."|".
                $this->total['vFrete']."|".$this->total['vSeg']."|".
                $this->total['vDesc']."|".$this->total['vII']."|".
                $this->total['vIPI']."|".$this->total['vPIS']."|".
                $this->total['vCOFINS']."|".$this->total['vOutro']."|".
                $this->total['vNF']."|".$this->total['vTotTrib']."|\r\n";
        
//W17|vServ|vBC|vISS|vPIS|vCOFINS|dCompet|vDeducao|vOutro|vDescIncond|vDescCond|vISSRet|cRegTrib| 
        if(is_array($this->ISSQNtot)){
            $txt .= "W17|".$this->ISSQNtot['vServ']."|".$this->ISSQNtot['vBC']."|".
                    $this->ISSQNtot['vISS']."|".$this->ISSQNtot['vPIS']."|".
                    $this->ISSQNtot['vCOFINS']."|".$this->ISSQNtot['dCompet']."|".
                    $this->ISSQNtot['vDeducao']."|".$this->ISSQNtot['vOutro']."|".
                    $this->ISSQNtot['vDescIncond']."|".$this->ISSQNtot['vDescCond']."|".
                    $this->ISSQNtot['vISSRet']."|".$this->ISSQNtot['cRegTrib']."\r\n";
        }

//monta dados da Retenção de tributos
//W23|vRetPIS|vRetCOFINS|vRetCSLL|vBCIRRF|vIRRF|vBCRetPrev|vRetPrev|
        if(is_array($this->retTrib)){
            $txt .= "W23|".$this->retTrib['vRetPIS']."|".$this->retTrib['vRetCOFINS']."|".
                    $this->retTrib['vRetCSLL']."|".$this->retTrib['vBCIRRF']."|".
                    $this->retTrib['vIRRF']."|".$this->retTrib['vBCRetPrev']."|".
                    $this->retTrib['vRetPrev']."|\r\n";
        }

//monta dados de Transportes
//X|ModFrete|
        $txt .= "X|".$this->modFrete."|\r\n";
            
//X03|xNome|IE|xEnder|xMun|UF| 
// X04|CNPJ|
// X05|CPF|
        if(is_array($this->transportadora)){
            $txt .= "X03|".$this->transportadora['xNome']."|".
                    $this->transportadora['IE']."|".
                    $this->transportadora['xEnder']."|".
                    $this->transportadora['xMun']."|".
                    $this->transportadora['UF']."|\r\n";
            if ($this->transportadora['CNPJ'] != "") {
                $txt .= "X04|".$this->transportadora['CNPJ']."|\r\n";
            } elseif ($this->transportadora['CPF'] != "") {
                $txt .= "X05|".$this->transportadora['CNPJ']."|\r\n";
            }
        }
            
//monta dados da retenção tributária de transporte
//X11|vServ|vBCRet|pICMSRet|vICMSRet|CFOP|cMunFG| 
        if(is_array($this->retTransp)){
            $txt .= "X11|".$this->retTransp['vServ']."|".
                    $this->retTransp['vBCRet']."|".$this->retTransp['pICMSRet']."|".
                    $this->retTransp['vICMSRet']."|".$this->retTransp['CFOP']."|".
                    $this->retTransp['cMunFG']."|\r\n";
        }

//monta dados de identificação dos veiculos utilizados no transporte
//X18|placa|UF|RNTC|
        if(is_array($this->veicTransp)){
            $txt .= "X18|".$this->veicTransp['placa']."|".$this->veicTransp['UF']."|".$this->veicTransp['RTNC']."|\r\n";
        }

//monta dados de identificação dos reboques utilizados no transporte
//X22|placa|UF|RNTC|vagao|balsa| 
        if (is_array($this->reboque)) {
            foreach($this->reboque as $valor){
                $txt .= "X22|".$this->$valor['placa']."|".$this->$valor['UF']."|".
                        $this->$valor['RNTC']."|".$this->$valor['vagao']."|".
                        $this->$valor['balsa']."|\r\n";
            }
        }

//monta dados dos volumes transportados
//X26|qVol|esp|marca|nVol|pesoL|pesoB| 
        if (is_array($this->vol)){
            foreach ($this->vol as $volumes) {
                $txt .= "X26|".$volumes['qVol']."|".$volumes['esp']."|".
                        $volumes['marca']."|".$volumes['nVol']."|".
                        $volumes['pesoL']."|".$volumes['pesoB']."|\r\n";
//monta dados dos lacres utilizados
                if (isset($volumes['lacres'])) {
                    foreach ($volumes['lacres'] as $lac) {
//X33|NLacre|
                        $txt .= "X33|$lac|\r\n";
                    }
                }
            }
        }
        
//monta dados de cobrança
//Y|
        if(is_array($this->fat) || is_array($this->dup)){
            $txt .= "Y|\r\n";
//monta dados da fatura

//Y02|nFat|vOrig|vDesc|vLiq|
            if (is_array($this->fat)){
                $txt .= "Y02|".$this->fat['nFat']."|".$this->fat['vOrig']."|".
                        $this->fat['vDesc']."|".$this->fat['vLiq']."|\r\n";
            }
//monta dados das duplicatas
            if (is_array($this->dup)){
                foreach ($this->dup as $duplicata) {
//Y07|nDup|dVenc|vDup|
                    $txt .= "Y07|".$duplicata['nDup']."|".$duplicata['dVenc']."|".$duplicata['vDup']."|\r\n";
                } 
            }
        }

//YA|tPag|vPag|card|CNPJ|tBand|cAut| 
//O nó YA não existe no XML da NFe

//monta dados das informações adicionais da NFe

//Z|InfAdFisco|InfCpl|
        if(is_array($this->infAdic)){
            $txt .= "Z|".$this->infAdic['infAdFisco']."|".
                    $this->infAdic['infCpl']."|\r\n";

    //monta dados de observaçoes da NFe
            if (is_array($this->obsCont)) {
                foreach ($this->obsCont as $obs){
    //Z04|xCampo|xTexto|
                    $txt .= "Z04|".$obs['xCampo']."|".$obs['xTexto']."|\r\n";
                }
            }

    //monta dados dos processos
    //Z07|xCampo|xTexto|
            if (is_array($this->obsFisco)) {
                foreach ($this->obsFisco as $fisco) {
                    $txt .= "Z07|".$this->$fisco['xCampo']."|".$this->$fisco['xTexto']."|\r\n";
                }
            }

    //monta dados dos processos
    //Z10|NProc|IndProc|
            if (is_array($this->procRef)) {
                foreach ($this->procRef as $procR) {
                    $txt .= "Z10|".$procR['nProc']."|".$procR['indProc']."|\r\n";
                }
            }
        }

//monta dados de exportação
        if (is_array($this->exporta)) {
//ZA|UFSaidaPais|xLocExporta|xLocDespacho|
            $txt .= "ZA|".$this->exporta['UFEmbarq']."|".$this->exporta['xLocEmbarq']."|".$this->exporta['xLocDespacho']."|\r\n";
        }

//monta dados de compra
        if (is_array($this->compra)) {
//ZB|xNEmp|xPed|xCont| 
            $txt .= "ZB|".$this->compra['xNEmp']."|".$this->compra['xPed']."|".$this->compra['xCont']."|\r\n";
        }

//monta dados de cana
        if (is_array($this->cana)) {
//ZC|safra|ref|qTotMes|qTotAnt|qTotGer|vFor|vTotDed|vLiqFor| 
            $txt .= "ZC|".$this->cana['safra']."|".$this->cana['ref']."|".
                    $this->cana['qTotMes']."|".$this->cana['qTotAnt']."|".
                    $this->cana['qTotGer']."|".$this->cana['vFor']."|".
                    $this->cana['vTotDed']."|".$this->cana['vLiqFor']."|\r\n";

//monta dados fornecimento diario
            if (is_array($this->forDia)) {
                foreach ($this->forDia as $forD) {
//ZC04|dia|qtde|
                    $txt .= "ZC04|".$forD['dia']."|".$forD['qtde']."|\r\n";
                }
            }
            
//monta dados grupo deduções
            if (is_array($this->deduc)) {
                foreach ($deduc as $dd) {
//ZC10|xDed|vDed|
                    $txt .= "ZC10|".$forD['xDed']."|".$forD['vDed']."|\r\n";
                }
            }
        }
        
        return $txt;
        
    } //fim cxtt

    /**
     * gerarItens
     * Método responsável por montar os itens da NFe
     * 
     * @return string TXT
     */
    private function gerarItens()
    {    
        $txt = '';
//instanciar uma variável para contagem
        $i = 0;

        if(!is_array($this->det)){
            $this->erroMsg = 'Atributo $det deve ser preenchido com os itens da nota, verifiquei o manual';
            return false;
        }
        
        foreach ($this->det as $det) {
//H|nItem|infAdProd|
            $txt .= "H|".$det['item']."|".@$det['infAdProd']."|\r\n";
            $i++;
            
            $prod = $det['prod'];
//I|cProd|cEAN|xProd|NCM|EXTIPI|CFOP|uCom|qCom|vUnCom|vProd|cEANTrib|uTrib|
//qTrib|vUnTrib|vFrete|vSeg|vDesc|vOutro|indTot|xPed|nItemPed|nFCI|
            $txt .= "I|".$prod['cProd']."|".$prod['cEAN']."|".$prod['xProd']."|".
                    $prod['NCM']."|".$prod['EXTIPI']."|".$prod['CFOP']."|".
                    $prod['uCom']."|".$prod['qCom']."|".$prod['vUnCom']."|".
                    $prod['vProd']."|".$prod['cEANTrib']."|".$prod['uTrib']."|".
                    $prod['qTrib']."|".$prod['vUnTrib']."|".$prod['vFrete']."|".
                    $prod['vSeg']."|".$prod['vDesc']."|".$prod['vOutro']."|".
                    $prod['indTot']."|".$prod['xPed']."|".$prod['nItemPed']."|".
                    $prod['nFCI']."\r\n";

// Não foi encontrado menção ao I05a no Manual de Integração da SEFAZ

// Declaração de Importação
            
            $di = @$prod['di'];
//I18|nDI|dDI|xLocDesemb|UFDesemb|dDesemb|tpViaTransp|vAFRMM|tpIntermedio|CNPJ|UFTerceiro|cExportador|
            if (is_array($di)) {
                foreach ($di as $dii) {
                    
                    $txt .= "I18|".$dii['nDI']."|".$dii['dDI']."|".$dii['xLocDesemb']."|".
                            $dii['UFDesemb']."|".$dii['dDesemb']."|".$dii['tpViaTransp']."|".
                            $dii['vAFRMM']."|".$dii['tpIntermedio']."|".$dii['CNPJ']."|".
                            $dii['UFTerceiro']."|".$dii['cExportador']."|\r\n";
                    if (is_array($dii['adi'])) {
                        foreach ($dii['adi'] as $adi) {
//I25|nAdicao|nSeqAdic|cFabricante|vDescDI|
                            $txt .= "I25|".$adi['nAdicao']."|".$adi['nSeqAdic']."|".
                                    $adi['cFabricacao']."|".$adi['vDescDI']."|".$adi['nDraw']."|\r\n";
                        }
                    }
                }
            }
// Não foi encontrado menção do I50 nem I52 no manual de Integração da SEFAZ

// Específico para veículos Novos
        $veicProd = @$prod['veicProd'];
//JA|tpOp|chassi|cCor|xCor|pot|cilin|pesoL|pesoB|nSerie|tpComb|nMotor|CMT|dist|anoMod|anoFab|tpPint|
//tpVeic|espVeic|VIN|condVeic|cMod|cCorDENATRAN|lota|tpRest|
        if (is_array($veicProd)) {
            $txt .= "JA|".$veicProd['tpOp']."|".$veicProd['chassi']."|".
                    $veicProd['cCor']."|".$veicProd['xCor']."|".
                    $veicProd['pot']."|".$veicProd['cilin']."|".
                    $veicProd['pesoL']."|".$veicProd['pesoB']."|".
                    $veicProd['nSerie']."|".$veicProd['tpComb']."|".
                    $veicProd['nMotor']."|".$veicProd['CMT']."|".
                    $veicProd['dist']."|".$veicProd['anoMod']."|".
                    $veicProd['anoFab']."|".$veicProd['tpPint']."|".
                    $veicProd['tpVeic']."|".$veicProd['espVeic']."|".
                    $veicProd['vIN']."|".$veicProd['condVeic']."|".
                    $veicProd['cMod']."|".$veicProd['cCorDENATRAN']."|".
                    $veicProd['lote']."|".$veicProd['tpRest']."|\r\n";
        }

// Destalhamento específico para medicamentos
        $med = @$prod['med'];
//K|nLote|qLote|dFab|dVal|vPMC|
        if (is_array($med)) {
            foreach ($med as $medi) {
                $txt .= "K|".$medi['nLote']."|".$medi['qLote']."|".$medi['dFab']."|".
                        $medi['dVal']."|".$medi['vPMC']."|\r\n";
            }
        }

// Destalhamento de armas
        $arma = @$prod['med'];
//L|tpArma|nSerie|nCano|descr|
        if (is_array($arma)) {
            foreach ($arma as $arm) {
                $txt .= "L|".$arm['tpArma']."|".$arm['nSerie']."|".$arm['nCano']."|".$arm['descr']."|\r\n";
            }
        }

// Destalhamento de combustiveis
        $comb = @$prod['comb'];
//LA|cProdANP|pMixGN|CODIF|qTemp|UFCons| 
        if (is_array($comb)) {
            $txt .= "LA|".$comb['cProdANP']."|".$comb['pMixGN']."|".
                    $comb['CODIF']."|".$comb['qTemp']."|".$comb['UFCons']."|\r\n";
//grupo CIDE
            $CIDE = $comb['CIDE'];
//LA07|qBCProd|vAliqProd|vCIDE| 
            if (is_array($CIDE)) {
                $txt .= "LA07|".$CIDE['qBCProd']."|".$CIDE['vAliqProd']."|".
                        $CIDE['vCIDE']."|\r\n";
            }
        }

//M|
//lei da transparencia 12.741/12
//Nota Técnica 2013/003
        $txt .= "M|".@$prod['imposto']['vTotTrib']."\r\n";

        //N|
        $CST = @$prod['imposto']['CST'];
        
        $txt .= "N|\r\n";
            switch ($CST['cod']){
                case '00': //CST 00 TRIBUTADO INTEGRALMENTE
                    // N02|Orig|CST|ModBC|VBC|PICMS|VICMS|
                    $txt .= "N02|".$CST['orig']."|".$CST['CST']."|".$CST['modBC']."|".
                        $CST['vBC']."|".$CST['pICMS']."|".$CST['vICMS']."|\r\n";
                    break;
                case '10': //CST 10 TRIBUTADO E COM COBRANCA DE ICMS POR SUBSTUICAO TRIBUTARIA
                    // N03|Orig|CST|ModBC|VBC|PICMS|VICMS|ModBCST|PMVAST|PRedBCST|VBCST|PICMSST|VICMSST|
                    $txt .= "N03|".$CST['orig']."|".$CST['CST']."|".$CST['modBC']."|".
                        $CST['vBC']."|".$CST['pICMS']."|".$CST['vICMS']."|".
                        $CST['modBCST']."|".$CST['pMVAST']."|".$CST['pRedBCST']."|".
                        $CST['vBCST']."|".$CST['pICMSST']."|".$CST['vICMSST']."|\r\n";
                    break;
                case '20': //CST 20 COM REDUCAO DE BASE DE CALCULO
                    // N04|Orig|CST|ModBC|PRedBC|VBC|PICMS|VICMS| 
                    $txt .= "N04|".$CST['orig']."|".$CST['CST']."|".$CST['modBC']."|".
                        $CST['pRedBC']."|".$CST['vBC']."|".$CST['pICMS']."|".
                        $CST['vICMS']."|".$CST['vICMSDeson']."|".$CST['motDesICMS']."\r\n";
                    break;
                case '30': //CST 30 ISENTA OU NAO TRIBUTADO E COM COBRANCA DO ICMS POR ST
                    // N05|Orig|CST|ModBCST|PMVAST|PRedBCST|VBCST|PICMSST|VICMSST|
                    $txt .= "N05|".$CST['orig']."|".$CST['CST']."|".$CST['modBCST']."|".
                        $CST['pMVAST']."|".$CST['pRedBCST']."|".$CST['vBCST']."|".
                        $CST['pICMSST']."|".$CST['vICMSST']."|".$CST['vICMSDeson']."|".
                        $CST['motDesICMS']."\r\n";
                    break;
                case '40': //CST 40-ISENTA 41-NAO TRIBUTADO E 50-SUSPENSAO
                case '41': //CST 40-ISENTA 41-NAO TRIBUTADO E 50-SUSPENSAO
                case '50': //CST 40-ISENTA 41-NAO TRIBUTADO E 50-SUSPENSAO
                    // N06|Orig|CST|vICMS|motDesICMS|
                    $txt .= "N06|".$CST['orig']."|".$CST['CST']."|".
                        $CST['vICMS']."|".$CST['motDesICMS']."|\r\n";
                    break;
                case '51': //CST 51 DIFERIMENTO - A EXIGENCIA DO PREECNCHIMENTO DAS INFORMAS DO ICMS DIFERIDO FICA A CRITERIO DE CADA UF
                    // N07|Orig|CST|ModBC|PRedBC|VBC|PICMS|VICMS|
                    $txt .= "N07|".$CST['orig']."|".$CST['CST']."|".$CST['modBC']."|".
                        $CST['pRedBC']."|".$CST['vBC']."|".$CST['pICMS']."|".
                        $CST['vICMSOp']."|".$CST['pDif']."|".$CST['vICMSDif']."|".
                        $CST['vICMS']."|\r\n";
                    break;
                case '60': //CST 60 ICMS COBRADO ANTERIORMENTE POR S
                    // N08|Orig|CST|VBCST|VICMSST|
                    $txt .= "N08|".$CST['orig']."|".$CST['CST']."|".$CST['vBCST']."|".
                        $CST['vBCSTRet']."|".$CST['vICMSSTRet']."|".$CST['vICMSST']."|\r\n";
                    break;
                case '70': //CST 70 - Com redução de base de cálculo e cobrança do ICMS por substituição tributária
                    // N09|Orig|CST|ModBC|PRedBC|VBC|PICMS|VICMS|ModBCST|PMVAST|PRedBCST|VBCST|PICMSST|VICMSST|
                    $txt .= "N09|".$CST['orig']."|".$CST['CST']."|".$CST['modBC']."|".
                        $CST['pRedBC']."|".$CST['vBC']."|".$CST['pICMS']."|".
                        $CST['vICMS']."|".$CST['modBCST']."|".$CST['pMVAST']."|".
                        $CST['pRedBCST']."|".$CST['vBCST']."|".$CST['pICMSST']."|".
                        $CST['vICMSST']."|".$CST['vICMSDeson']."|".$CST['motDesICMS']."\r\n";
                    break;
                case '90': //CST - 90 Outros
                    // N10|Orig|CST|ModBC|PRedBC|VBC|PICMS|VICMS|ModBCST|PMVAST|PRedBCST|VBCST|PICMSST|VICMSST|
                    $txt .= "N10|".$CST['orig']."|".$CST['CST']."|".$CST['modBC']."|".
                        $CST['vBC']."|".$CST['pRedBC']."|".$CST['pICMS']."|".
                        $CST['vICMS']."|".$CST['modBCST']."|".$CST['pMVAST']."|".
                        $CST['pRedBCST']."|".$CST['vBCST']."|".$CST['pICMSST']."|".
                        $CST['vICMSST']."|".$CST['vICMSDeson']."|".$CST['motDesICMS']."|\r\n";
                    break;
            }
            
            $CSOSN = @$prod['imposto']['CSOSN'];
 
            switch ($CSOSN['cod']) {
                case '101': // CSON - 101
// N10c|Orig|CSOSN|pCredSN|vCredICMSSN|
                    $txt .= "N10c|".$CSOSN['orig']."|".$CSOSN['CSOSN']."|".
                        $CSOSN['pCredSN']."|".$CSOSN['vCredICMSSN']."|\r\n";
                    break;
                case '102': // CSOSN=102, 103,300 ou 400 [ICMS]
                case '103': // CSOSN=102, 103,300 ou 400 [ICMS]
                case '300': // CSOSN=102, 103,300 ou 400 [ICMS]
                case '400': // CSOSN=102, 103,300 ou 400 [ICMS]
// N10d|Orig|CSOSN|
                    $txt .= "N10d|".$CSOSN['orig']."|".$CSOSN['CSOSN']."|\r\n";
					
                    break;
                case '201': // CSON - 201
// N10e|Orig|CSOSN|modBCST|pMVAST|pRedBCST|vBCST|pICMSST|vICMSST|pCredSN|vCredICMSSN|
                    $txt .= "N10e|".$CSOSN['orig']."|".$CSOSN['CSOSN']."|".
                        $CSOSN['modBCST']."|".$CSOSN['pMVAST']."|".$CSOSN['pRedBCST']."|".
                        $CSOSN['vBCST']."|".$CSOSN['pICMSST']."|".$CSOSN['vICMSST']."|".
                        $CSOSN['pCredSN']."|".$CSOSN['vCredICMSSN']."|\r\n";

                    break;
                case '202': // CSOSN=202 ou 203 [ICMS]
                case '203': // CSOSN=202 ou 203 [ICMS]
// N10f|Orig|CSOSN|modBCST|pMVAST|pRedBCST|vBCST|pICMSST|vICMSST|
                    $txt .= "N10f|".$CSOSN['orig']."|".$CSOSN['CSOSN']."|".
                        $CSOSN['modBCST']."|".$CSOSN['pMVAST']."|".$CSOSN['pRedBCST']."|".
                        $CSOSN['vBCST']."|".$CSOSN['pICMSST']."|".$CSOSN['vICMSST']."|\r\n";
						
                    break;
                case '500': // CSON - 500
// N10g|Orig|CSOSN|modBCST|vBCSTRet|vICMSSTRet|
                    $txt .= "N10g|".$CSOSN['orig']."|".$CSOSN['CSOSN']."|".
                        $CSOSN['vBCSTRet']."|".$CSOSN['vICMSSTRet']."|\r\n";
					
                    break;
                case '900': // CSON - 900
// N10h|Orig|CSOSN|modBC|vBC|pRedBC|pICMS|vICMS|modBCST|pMVAST|pRedBCST|vBCST|pICMSST|vICMSST|pCredSN|vCredICMSSN|
                    $txt .= "N10h|".$CSOSN['orig']."|".$CSOSN['CSOSN']."|".
                        $CSOSN['modBCST']."|".$CSOSN['vBC']."|".$CSOSN['pRedBC']."|".
                        $CSOSN['pICMS']."|".$CSOSN['vICMS']."|".$CSOSN['modBCST']."|".
                        $CSOSN['pMVAST']."|".$CSOSN['pRedBCST']."|".$CSOSN['vBCST']."|".
                        $CSOSN['pICMSST']."|".$CSOSN['vICMSST']."|".$CSOSN['pCredSN']."|".
                        $CSOSN['vCredICMSSN']."|\r\n";
                    break;
            }

// IPI
            $IPI = @$prod['imposto']['IPI'];
            $txtIPI = '';
            if (is_array($IPI)) {
//O|ClEnq|CNPJProd|CSelo|QSelo|CEnq|
                $txt .= "O|".$IPI['clEnq']."|".$IPI['CNPJProd']."|".$IPI['cSelo']."|".
                        $IPI['qSelo']."|".$IPI['cEnq']."|\r\n";
				
//grupo de tributação de IPI NAO TRIBUTADO
                $IPINT = @$prod['imposto']['IPINT'];
                if (is_array($IPINT)) {
// O08|CST|
                    $txtIPI = "O08|".$IPINT['CST']."|\r\n";
                }
//grupo de tributação de IPI
                $IPITrib = @$prod['imposto']['IPITrib'];
                
                if (isset($IPITrib)) {
                       
                    switch ($IPITrib['CST']) {
                        case '00':
                        case '49':
                        case '50':
                        case '99':
//O07|CST|VIPI|
                            $txtIPI = "O07|".$IPITrib['CST']."|".$IPITrib['vIPI']."|\r\n";
                            break;
                        case '01': //CST 01, 02, 03,04, 51, 52, 53, 54 e 55
                        case '02':
                        case '03':
                        case '04':
                        case '51':
                        case '52':
                        case '53':
                        case '54':
                        case '55':
//O08|CST|
                            $txtIPI = "O08|".$IPITrib['CST']."|\r\n";
                            break;
                    }
                    if (substr($txtIPI, 0, 3) == 'O07') {
                        if ($pIPI != '') {
//O10|VBC|PIPI|
                            $txtIPI .= "O10|".$IPITrib['vBC']."|".$IPITrib['pIPI']."|\r\n";
                        } else {
                            //O11|QUnid|VUnid|
                            $txtIPI .= "O11|".$IPITrib['qUnid']."|".$IPITrib['vUnid']."|".
                                    $IPITrib['vIPI']."|\r\n";
                        }
                    }
                }
            }
            $txt .= $txtIPI;
            
//P|vBC|vDespAdu|vII|vIOF|
            $II = @$prod['imposto']['II'];
            if (is_array($II)) {
                $txt .= "P|".$II['vBC']."|".$II['vDespAdu']."|".$II['vII']."|".$II['vIOF']."|\r\n";
            }
//monta dados do PIS
            $PIS = @$prod['imposto']['PIS'];
            
            if (is_array($PIS)) {
//Q|
                $txt .= "Q|\r\n";
                if ($PIS['CST'] == '01' || $PIS['CST'] == '02') {  // PIS TRIBUTADO PELA ALIQUOTA
//Q02|CST|VBC|PPIS|VPIS|
                    $txt .= "Q02|".$PIS['CST']."|".$PIS['vBC']."|".$PIS['pPIS']."|".$PIS['vPIS']."|\r\n";
                }
                if ($PIS['CST'] == '03') {  //PIS TRIBUTADO POR QTDE
//Q03|CST|QBCProd|VAliqProd|VPIS|
                    $txt .= "Q03|".$PIS['CST']."|".$PIS['qBCProd']."|".$PIS['vAliqProd']."|".$PIS['vPIS']."|\r\n";
                }
                if ($PIS['CST'] == '04' || $PIS['CST'] == '06' || $PIS['CST'] == '07' || $PIS['CST'] == '08' || $PIS['CST'] == '09') {
//PIS não tributado
//Q04|CST|
                    $txt .= "Q04|".$PIS['CST']."|\r\n";
                }
                if ($PIS['CST'] == '99') {
//PIS OUTRAS OPERACOES
//Q05|CST|vPIS|
                    $txt .= "Q05|".$PIS['CST']."|".$PIS['vPIS']."|\r\n";
                    if ($PIS['vBC'] != '' || $PIS['pPIS'] != '') {
//Q07|vBC|pPIS|
                        $txt .= "Q07|".$PIS['vBC']."|".$PIS['pPIS']."|".$PIS['vPIS']."|\r\n";
                    } else {
//Q10|qBCProd|vAliqProd|
                        $txt .= "Q10|".$PIS['qBCProd']."|".$PIS['vAliqProd']."|\r\n";
                    }
                }
            }
            
//monta dados do PIS em Substituição Tributária
            $PISST = @$prod['imposto']['PISST'];

            if (is_array($PISST)){
//R|vPIS|
                $txt .= "R|".$PISST['vPIS']."|\r\n";
                if ($PISST['vBC'] != '' || $PISST['pPIS'] != '') {
//R02|vBC|pPIS|
                    $txt .= "R02|".$PISST['vBC']."|".$PISST['pPIS']."|\r\n";
                } else {
//R04|qBCProd|vAliqProd|
                    $txt .= "R04|".$PISST['qBCProd']."|".$PISST['vAliqProd']."|".$PISST['vPIS']."|\r\n";
                }
            }
            
//monta dados do COFINS
            $COFINS = @$prod['imposto']['COFINS'];
            
            if (is_array($COFINS)) {
//S|
                $txt .= "S|\r\n";
                if ($COFINS['CST'] == '01' || $COFINS['CST'] == '02') {
                    //S02|CST|VBC|PCOFINS|VCOFINS|
                    $txt .= "S02|".$COFINS['CST']."|".$COFINS['vBC']."|".
                            $COFINS['pCOFINS']."|".$COFINS['vCOFINS']."|\r\n";
                }
                if ($COFINS['CST'] == '03') {
                    //S03|CST|QBCProd|VAliqProd|VCOFINS|
                    $txt .= "S03|".$COFINS['CST']."|".$COFINS['qBCProd']."|".
                            $COFINS['vAliqProd']."|".$COFINS['vCOFINS']."|\r\n";
                }
                if ($COFINS['CST'] == '04' || $COFINS['CST'] == '06' || $COFINS['CST'] == '07' 
                        || $COFINS['CST'] == '08' || $COFINS['CST'] == '09') {
                    //S04|CST|
                    $txt .= "S04|".$COFINS['CST']."|\r\n";
                }
                if ($COFINS['CST'] == '99') {
                    //S05|CST|VCOFINS|
                    $txt .= "S05|".$COFINS['CST']."|".$COFINS['vCOFINS']."|\r\n";
                    if ($COFINS['vBC'] != '' || $COFINS['pCOFINS'] != '') {
                        //S07|VBC|PCOFINS|
                        $txt .= "S07|".$COFINS['vBC']."|".$COFINS['pCOFINS']."|\r\n";
                    } else {
                        //S09|QBCProd|VAliqProd|
                        $txt .= "S09|".$COFINS['qBCProd']."|".$COFINS['qAliqProd']."|\r\n";
                    }
                }
            }

//monta dados do COFINS em Substituição Tributária
            $COFINSST = @$prod['imposto']['COFINSST'];

            if (is_array($COFINSST)) {
//T|VCOFINS|
                $txt .= "T|".$COFINSST['vCOFINS']."|\r\n";
                if ($COFINSST['vBC'] != '' || $COFINSST['pCOFINS'] != '') {
//T02|VBC|PCOFINS|
                    $txt .= "T02|".$COFINSST['vBC']."|".$COFINSST['pCOFINS']."|\r\n";
                } else {
//T04|QBCProd|VAliqProd|
                    $txt .= "T04|".$COFINSST['qBCProd']."|".$COFINSST['vAliqProd']."|\r\n";
                }
            }
            
//monta dados do ISS
            $ISSQN = @$prod['imposto']['ISSQN'];
            
            if (isset($ISSQN)) {
//U|VBC|VAliq|VISSQN|CMunFG|CListServ|cSitTrib|
                $txt .= "U|".$ISSQN['vBC']."|".$ISSQN['vAliq']."|".$ISSQN['vISSQN']."|".
                        $ISSQN['cMunFG']."|".$ISSQN['cListServ']."|".$ISSQN['vDeducao']."|".
                        $ISSQN['vOutro']."|".$ISSQN['vDescIncond']."|".$ISSQN['vDescCond']."|".
                        $ISSQN['vISSRet']."|".$ISSQN['indISS']."|".$ISSQN['cServico']."|".
                        $ISSQN['cMun']."|".$ISSQN['cPais']."|".$ISSQN['nProcesso']."|".
                        $ISSQN['indIncentivo']."|".$ISSQN['cSitTrib']."|\r\n";
            }

        }

        return $txt;
    }
}

//fim da classe
