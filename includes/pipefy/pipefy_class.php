<?php
/*
* Pipefy
* Classe para controlar as requisições no pipefy
* 
*/

class pipefy{
  //disparando a classe
  public function __construct(){

  }
  
  public function queryPipefy(string $query){
      $headers = ['Content-Type: application/json'];
      $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJ1c2VyIjp7ImlkIjo3NTU5NzksImVtYWlsIjoidGhpYWdvQG9uaS5jb20uYnIiLCJhcHBsaWNhdGlvbiI6MzAwMDkyODg3fX0.HzYQ9GazuMWPpwcuMcTbiFHU3P9ESW8km2MlpasrlcYZNwiMn91_5528inaU_NzaZBx99RpvRYu4xwc1oK1ABw";
      $headers[] = "Authorization: Bearer $token";
      $endpoint = 'https://api.pipefy.com/graphql';
  

      if (false === $data = @file_get_contents($endpoint, false, stream_context_create([
          'http' => [
            'method' => 'POST',
            'header' => $headers,
            'content' => json_encode(['query' => $query]),
          ]
      ]))) {
          $error = error_get_last();
          throw new \ErrorException($error['message'], $error['type']);
      }

      return json_decode($data, true);
  }


      
  /**
  * Escuta a requisição vinda do https://minha.oni.com.br/wp-json/apioni/v1/alteraprojeto/
  *
  * @return Array com o projeto alterado e as frentes
  *  [
  *  'projeto_alterado'    => (array) com o ID do projeto alterado
  *      [
  *      (string) ID do table record de projeto
  *      ]    
  *  'frentes_alteradas'    => (array) com os IDs das frentes alteradas
  *      [
  *      (string) ID do table record de frente alterada
  *      ]    
  *  ]  
  */
  public function escutaAlteraProjeto( $request ) {

    $data = $request->get_json_params();        
    $requisita = self::puxaCard($data['data']['card']['id']);
    set_transient('api', $requisita);
    if(is_array($requisita['data']['card']['fields'])){
      $fields =  array_column($requisita['data']['card']['fields'], 'name');
      $id_frentes_alteradas = array_search('Frentes alteradas', $fields);
      $frentes_alteradas = $requisita['data']['card']['fields'][$id_frentes_alteradas]['array_value'];
      set_transient('frentes_alteradas', $frentes_alteradas);
      $id_projeto_alterado = array_search('Projeto que precisa de alteração', $fields);
      $projeto_alterado = $requisita['data']['card']['fields'][$id_projeto_alterado]['array_value'];
      set_transient('projeto_alterado', $projeto_alterado);
    }
    $tables_alteradas = array(
      'projeto_alterado' => $projeto_alterado,
      'frentes_alteradas' => $frentes_alteradas
    );
    return $tables_alteradas;



  }
  /**
  * Puxa record da database de acordo com os IDs
  *
  * @param String com os IDS
  * @return Array com o card
  *  
  */
  public function puxaCard($id){
    $query = '
    query{
      card(id : "'.$id.'"){
        id
        fields{
          field {
            id
          }
          name
          array_value
          value
        }
      }
    }
    ';
   
    $card = self::queryPipefy($query);
    return $card;   
  }

  /**
  * Puxa record da database de acordo com os IDs
  *
  * @param Array com os IDS
  *  [
  *  (string) ID do table record de projeto
  *  ]    
  * @return Array com o table record
  *  
  */
  public function puxaDaTabela($ids){
    $table_records = array();
    foreach($ids as $id){
      $query = '
      query{
        table_record(id : "'.$id.'"){
          record_fields{
            field {
              id
              label
            }
            array_value
            value
          } 
        }
      }
      ';
      $requisita = self::queryPipefy($query);
      $table_records[] = $requisita;
    }
    return $table_records;
  }

}

//Criando o objeto
$pipefy = new pipefy;


//$dados = query_pipefy($query);

/*
CRIANDO UM WEBHOOK
mutation{
  createWebhook(input:{
    actions:"card.done"
    name:"Webhook-Name"
    url:"https://minha.oni.com.br/wp-json/apioni/v1/alteraprojeto/"
    email:"thiago@email.com"
    pipe_id:301582636
    }) {
    clientMutationId
  }
}

LISTANDO WEBHOOKS
query{
  pipe(id : 301582636){
    webhooks{
      name
      id
    }
  }
}

DELETANDO UM WEBHOOK
mutation {
  deleteWebhook(input:{
    id : 300092630  }){
    clientMutationId success
  }
}

LISTANDO TABELAS
query{
	table(id : "n5j_NVUI"){
    table_records{
      edges{
        node{
          record_fields{
            field {
              id
            }
            array_value
            value
          }
        }
      }
    }
  }
}


*/


?>