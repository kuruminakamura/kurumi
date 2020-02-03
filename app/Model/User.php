
<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');            // BlowfishPasswordHasherクラスを呼び出します
class User extends AppModel {

public $validate = array(
        'name' => array(
          'rule' => 'notBlank', 
      ),


         'mail' => array(
            array(
                'rule' => 'notBlank', 
                'message' => 'メールアドレスを入力してください'
            ), 
            array(
                'rule' => 'email', 
                'message' => '正しいメールアドレスを入力してください'
            ), 
            array(
                'rule' => 'isUnique', 
                'message' => '入力されたメールアドレスは既に登録されています'
            ),
        ),
        'password' => array(
            array(
                'rule' => 'notBlank', 
                'message' => 'パスワードを入力してください'
            ), 
            // array(
            //     'rule' => 'alphaNumerric', 
            //     'message' => 'パスワードに使用できない文字が入力されています'
            // ), 
            array(
                'rule' => array('minLength', 4), 
                'message' => 'パスワードは8文字以上入力してください'
            ),
        //     array(
        //         'rule' => 'passwordConfirm', 
        //         'message' => 'パスワードが一致していません'
        //     ), 
        // ),
        // 'password_confirm' => array(
        //     array(
        //         'rule' => 'notEmpty', 
        //         'message' => 'パスワード(確認)を入力してください'
        //     ), 
        ),
    );

 public function beforeSave($options = array()) {                       // beforeSave(): 保存する前に行う処理
        if (isset($this->data[$this->alias]['password'])) {                // BlowfishPasswordHasherを適用させます
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }

}

