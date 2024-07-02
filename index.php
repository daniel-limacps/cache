<?php

require 'vendor/autoload.php';

require_once 'Cache.php';

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$cache = new FilesystemAdapter(
    // Nome do namespace (prefixo dos arquivos de cache)
    $namespace = '_cache_',
    // Tempo de vida padrão (em segundos) para itens de cache
    $defaultLifetime = 0,
    // Diretório onde os arquivos de cache serão armazenados
    $directory = null //'C:\Users\AppData\Local\Temp\cache'
);

$data = '
<produto>
   <codigo>223435780</codigo>
   <descricao>Caneta 001</descricao>
   <situacao>Ativo</situacao>
   <descricaoComplementar>Descrição complementar da caneta</descricaoComplementar>
   <un>Pc</un>
   <vlr_unit>1.68</vlr_unit>
   <preco_custo>1.23</preco_custo>
   <peso_bruto>0.2</peso_bruto>
   <peso_liq>0.18</peso_liq>
   <class_fiscal>1000.01.01</class_fiscal>
   <marca>Marca da Caneta</marca>
   <origem>0</origem>
   <estoque>10</estoque>
   <gtin>223435780</gtin>
   <gtinEmbalagem>54546</gtinEmbalagem>
   <largura>11</largura>
   <altura>21</altura>
   <profundidade>31</profundidade>
   <estoqueMinimo>1.00</estoqueMinimo>
   <estoqueMaximo>100.00</estoqueMaximo>
   <class_fiscal>1111.11.11</class_fiscal>
   <cest>28.040.00</cest>
   <idGrupoProduto>12345</idGrupoProduto>
   <condicao>Usado</condicao>
   <freteGratis>S</freteGratis>
   <linkExterno>https://minhaloja.com.br/meu-produto</linkExterno>
   <observacoes>Observações do meu produto</observacoes>
   <producao>T</producao>
   <dataValidade>20/11/2019</dataValidade>
   <descricaoFornecedor>Descrição do fornecedor</descricaoFornecedor>
   <idFabricante>0</idFabricante>
   <codigoFabricante>123</codigoFabricante>
    <unidadeMedida>Milímetro</unidadeMedida>
   <crossdocking>2</crossdocking>
   <garantia>4</garantia>
   <itensPorCaixa>2</itensPorCaixa>
   <volumes>2</volumes>
   <urlVideo>https://www.youtube.com/watch?v=zKKL-SgC5lY</urlVideo>
   <deposito>
      <id>123456</id>
      <estoque>200</estoque>
   </deposito>
   <imagens>
     <url>https://www.bling.com.br/bling.jpg</url>
   </imagens>
   <idCategoria>1234</idCategoria>
 </produto>
';

// Salvar um item no cache
$cacheItem = $cache->getItem('test_key');
$cacheItem->set($data);
$cache->save($cacheItem);

// Recuperar um item do cache
$cacheItem = $cache->getItem('test_key');
if ($cacheItem->isHit()) {
    echo $cacheItem->get(); // Deve imprimir 'test_value'
} else {
    echo 'Cache miss!';
}

// Deletar um item do cache
//$cache->deleteItem('test_key');