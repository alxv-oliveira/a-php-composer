<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client([
    'base_uri' => 'https://www.alura.com.br/',
    'verify' => false
]);
$resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');
// Faz requisição ao uma página HTML, retornando as informações presentes nela;


$html = $resposta->getBody();
// Capturo todas as informações presentes no Body;

$crawler = new Crawler();
$crawler->addHtmlContent($html);
// Adiciono a html específica a varíavel que permitirar a retira e manipulação de elementos;

$cursos = $crawler->filter('span.card-curso__nome');
// Retiro e deposito em uma variável tudo relacionado a esse nome específico passado;

foreach ($cursos as $curso) {
    echo $curso->textContent . "<br>";
}