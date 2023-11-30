<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class WeatherAPIController extends BaseController
{
  private $city;
  private $state;

  public function __construct()
  {
    $this->city = "";
    $this->state = "";
  }

  public function index()
  {
    $data = [
      'title' => 'Weather API',
      'description' => 'API para consulta de dados climáticos',
      'content' => view('pages/weatherAPI')
    ];

    return view('template/index', $data);
  }

  public function getClientCity()
  {
    try {
      // Obtém o endereço IP do cliente
      //$ip = $_SERVER['REMOTE_ADDR'];
      $ip = "177.57.21.5";

      // Monta a URL para a API de geolocalização
      $url = "http://ip-api.com/json/$ip";

      // Inicia a sessão cURL
      $curl = curl_init($url);

      // Configura as opções cURL
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      // Executa a requisição cURL
      $response = curl_exec($curl);

      // Verifica se a requisição foi bem-sucedida
      if ($response === false) {
        throw new \Exception('Erro na requisição cURL: ' . curl_error($curl));
      }

      // Fecha a sessão cURL
      curl_close($curl);

      // Decodifica a resposta JSON
      $responseData = json_decode($response);

      // Verifica se a resposta é válida e contém as informações necessárias
      if (json_last_error() !== JSON_ERROR_NONE) {
        throw new \Exception('Erro ao decodificar a resposta JSON da API de geolocalização: ' . json_last_error_msg());
      }

      // Verifica se a resposta contém as informações necessárias
      if (!isset($responseData->city) || !isset($responseData->regionName)) {
        throw new \Exception('A resposta da API de geolocalização não contém as informações esperadas.');
      }

      // Atualiza as propriedades da classe
      $this->city = $responseData->city;
      $this->state = $responseData->regionName;

      // Retorna a cidade (ou você pode fazer o redirecionamento para a função getWeather())
      return $this->city;
    } catch (\Exception $e) {
      // Trata erros e exibe uma mensagem detalhada
      echo 'Erro ao obter a cidade: ' . $e->getMessage();
    }
  }

  public function getCityWeather()
  {
    $API_KEY = '13f911840563e00b1cbd889efc5c67ae';
    $city = $this->getClientCity();

    try {
      // Verifica se a cidade foi definida
      if (empty($city)) {
        throw new \Exception('A cidade não foi definida.');
      }

      // Monta a URL para a API de clima
      $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid=$API_KEY&units=metric&lang=pt_br";

      // Inicia a sessão cURL
      $curl = curl_init($url);

      // Configura as opções cURL
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      // Executa a requisição cURL
      $response = curl_exec($curl);

      // Verifica se a requisição foi bem-sucedida
      if ($response === false) {
        throw new \Exception('Erro na requisição cURL: ' . curl_error($curl));
      }

      // Fecha a sessão cURL
      curl_close($curl);

      // Decodifica a resposta JSON
      $responseData = json_decode($response);

      // Verifica se a resposta é válida e contém as informações necessárias
      if (json_last_error() !== JSON_ERROR_NONE) {
        throw new \Exception('Erro ao decodificar a resposta JSON da API de clima: ' . json_last_error_msg());
      }

      // Verifica se a resposta contém as informações necessárias
      if (!isset($responseData->main->temp) || !isset($responseData->weather[0]->description)) {
        throw new \Exception('A resposta da API de clima não contém as informações esperadas.');
      }

      // Retorna os dados do clima

      $data = [
        'city' => $this->city,
        'temperature' => $responseData->main->temp,
        'description' => $responseData->weather[0]->description
      ];
      
      return $data;
    } catch (\Exception $e) {
      // Trata erros e exibe uma mensagem detalhada
      echo 'Erro ao obter os dados do clima: ' . $e->getMessage();
    }
  }
}
