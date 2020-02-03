<?php
// app/Controller/followsController.php
class followsController extends AppController {

    public $helpers = array('Tweet', 'Form');

    public function add() {
        
    }

<?php
function getUserData($params){
	//DBの接続情報
	include_once('Users/Users.php');
	
	}

//     public function index() {
//         if($this->request->is('GET')) {
//             $this->Follow->create();
            
//             if ($this->Follow->save($this->request->data)) {
              
//                 return $this->redirect(array('action' => 'index'));
//             }
//             $this->Flash->error(__('Unable to add your tweets.'));

//         }
//           // $this->request->data['Tweet'][user_id] =$this->Auth->user('id');
//           // if($this->Tweet->save($this->request->data)){
//         //下記、移動の為のコード
//           // 	return $this->redirect(array('action' =>'index'));

//           // }
//         $this->set('follows', $this->Follow->find('all', array('order'=> array('Tweet.created'=>'DESC'))));
// }