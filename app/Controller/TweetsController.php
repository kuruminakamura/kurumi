<?php
class TweetsController extends AppController {

public function add() {
   // $this->set('tweets', $this->Post->find('all'));

}
public function index() {
        if($this->request->is('post')) {
            $this->Tweet->create();
            
            if ($this->Tweet->save($this->request->data)) {
                // $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your tweets.'));

        }
          // $this->request->data['Tweet'][user_id] =$this->Auth->user('id');
          // if($this->Tweet->save($this->request->data)){
        //koko kara sita ga idou no tame no ko-do
          // 	return $this->redirect(array('action' =>'index'));

          // }
        $this->set('Tweets', $this->Tweet->find('all', array('order'=> array('Tweet.created'=>'DESC'))));
}

public function search(){
	// public function index(){
 // リクエストがPOSTの場合
 if($this->request->is('post')){
 //Formの値を取得
 //$title=$this->data['Search']['title'];
 $title=$this->request->data['Search']['username'];
 //POSTされたデータを曖昧検索
 // $data=$this->User->find('all',array(
 // 'conditions'=>array('name like'=>'%'.$title.'%')));
 // $this->set('Users',$data);

 // }else{ //POST以外の場合
 // //Collectionモデルから全てのデータを検索
 // $data=$this->User->find('all');
 // //データの連想配列をセット
 // $this->set('Users',$data);
 // // }
 // }
}
}

public function find($searchname = NULL){
  $this->loadModel('Tweet');
  $this->loadModel('User');
  $this->loadModel('Follow');

  if(is_null($this->requset->data['Follow']['searchname'])){
  	$searchname = $this->request->data['Follow']['searchname'];

  	$data=$this->User->find('all',array(
  		'conditions' => array('User.username like ' => '%'.$searchname.'%'
  		// 'or' => array(
  		// 	array("User.username like '%$searchname%'")
  		)
  	)
	  );
  }else{
  	$searchname = $this->request->data['Search']['username'];

	  $data=$this->User->find('all',array(
	  	'conditions' => array('User.username like ' => '%'.$searchname.'%'
	  		// 'or' => array(
	  		// 	array("User.username like '%$searchname%'")
	  		)
	  	)
	  );
  }


  

  // $follows = $this->Follow->find('all',array('conditions' => array('Follow.follow_id' => AuthComponent::user(''))));

  //$da = $this->User->find('all',array('conditions' => array('User.username'=>$follows['follow'])));

  if(empty($data)){
  $this->Session->setFlash('対象のユーザーは見つかりません。');
}
  $this->set('searchname', $searchname);
  $this->set('username',$this->Auth->user());
  $this->set('users',$data);
  // $this->set('follows',$follows);

// if($this->request->is('post')){
//     if(isset($this->data['Search']['username'])){
//       $search = $this->request->data['Search']['username'];
//       $this->redirect(array('action'=>'find', $search));}

//     else if($this->Follow->save($this->request->data['Follow'])){
//       //$this->requset->deleteAll($data['Follow']);
//       $this->redirect(array('action'=>'find', $searchname));
//   }

// }
}

public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Tweet->delete($id)) {
    //     $this->Flash->success(
    //         __('The tweets with id: %s has been deleted.', h($id))
    //     );
    // } else {
    //     $this->Flash->error(
    //         __('The tweets with id: %s could not be deleted.', h($id))
    //     );
    // }

	}
	 return $this->redirect(array('action' => 'index'));
	}

}
?>