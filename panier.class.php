
<?php 
    class panier{
      private $bdd;
        public function __construct($bdd){
            if(!isset($_SESSION)){
                session_start();    
            }
            if(!isset($_SESSION['panier'])){
              $_SESSION['panier'] = array();
            }
            $this->bdd = $bdd;
        }
        public function total(){
          $total = 0;
          $ids = array_keys($_SESSION['panier']);
          if(empty($ids)){
            $reponse = array();
          }else{
            $reponse = $this->bdd->query('SELECT * FROM produit WHERE id IN ('.implode(',',$ids).')');
          }
          foreach($reponse as $article){
            $total += $article->prix;
          }
          return $total;
        }

        public function add($article_id){
          if(isset($_SESSION['panier'][$article_id])){
            $_SESSION['panier'][$article_id]++;
          }else{
          $_SESSION['panier'][$article_id] = 1;
        }
      }
        public function del($article_id){
          unset($_SESSION['panier'][$article_id]);
        }


    }