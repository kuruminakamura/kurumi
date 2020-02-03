<?php
// app/Controller/UsesController.php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('create', 'login','index');
    }

    public function login() {
        // if (!empty($this->data)){
        //     $this->User->create();
        //     if ($this->User->validates()){
                
        //     }
        // }
       if ($this->request->is('post')) {                   // ポスト送信されたデータがあれば、
           if ($this->Auth->login()) {                     // ログインが成功したら、
               return $this->redirect($this->Auth->redirect()); // postのindexページ(ブログ一覧のページ)に戻る
           } else {                                        // ログイン失敗したら
               $this->Session->setFlash('Invalid username or password, try again');
           }                                               // エラーメッセージを吐き出す
       }
    }


    public function logout() {
        $this->Auth->logout();                             // ログアウト実行
        $this->redirect('login');                          // ログインページに戻る指示
    }


//    public $scaffold;
    public function add()  {

    }
    public function create() {


        if ($this->request->is('post')) {  
$this->User->create();
      if($this->User->save($this->request->data)){       //ユーザ登録が成功したら                         //ログインページへ
return $this->redirect(array('action'=> 'login')); 
}
     }
    	// if(!$this->request->data){
     //        $this->render();
     //        return;
     //    }

     //    //入力データをセット
     //    $this->User->set($this->request->data);

     //    //入力内容を検査
     //    if($this->User->validates()){

     //        //モデルの状態をリセット
     //        $this->User->create();

     //        //入力済みデータをモデルにセット
     //        $user = array('User' => $this->request->data['User']);

     //        //データを保存
     //        $this->User->save($this->request->data);

     //        //サンクス画面を表示
     //        $this->render('add');

     //    }
 }

}
?>