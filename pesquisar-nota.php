<?php
/*Modelo da consulta Por RPS:
<?xml version="1.0"?>
<ConsultarNfseRpsEnvio xmlns="http://nfse.goiania.go.gov.br/xsd/nfse_gyn_v02.xsd">
  <IdentificacaoRps>
    <Numero>1</Numero>
    <Serie>UNICA</Serie>
    <Tipo>1</Tipo>
  </IdentificacaoRps>
  <Prestador>
    <CpfCnpj>
      <Cpf>28222148168</Cpf>
    </CpfCnpj>
    <InscricaoMunicipal>1442678</InscricaoMunicipal>
  </Prestador>
</ConsultarNfseRpsEnvio>*/

$client = new Zend\Soap\Client("https://nfse.goiania.go.gov.br/ws/nfse.asmx?wsdl");
$fields = array();

$result1 = $client->ConsultarNfseRps($fields);

if (isset($result1->ConsultarNfseRpsResult->any)) {
    $xml = simplexml_load_string($result1->ConsultarNfseRpsResult->any);
    if (isset($xml->NewDataSet->Table))
        return $xml->NewDataSet->Table;
}
            
            
?>
