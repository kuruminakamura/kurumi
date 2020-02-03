<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	// public $components = array(                   // FlashComponentとAuthComponentを宣言します
 //       'Flash',
 //       'Auth' => array(                          // AuthComponentは基本動作の設定もできます
 //           'allowedActions' => array(            // allowedActionsでログインしていなくてもアクセスできるページを指定します
 //               'login', 'create','index')
 //          )
 //      );

	 public $components = array('Session', 'Auth');
    
    public function beforeFilter() {
    	$this->set('auth',$this->Auth->user());
        // ログインを扱うアクション
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        
        // ログイン後のリダイレクト先のアクション
        $this->Auth->loginRedirect = array('controller' => 'tweets', 'action' => 'index');
        
        // ユーザがログアウトした後のリダイレクト先となるデフォルトのアクション
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        
        // ユーザの権限判定のためにアクティブなコントローラの isAuthorized() の戻り値を使う
        $this->Auth->authorize = array('Controller');
        
        // ユーザのログインに使いたい認証オブジェクトの配列を
        $this->Auth->authenticate = array(
            'Form' => array(
                'userModel' => 'User',
                'fields' => array(
                    'username' => 'username',
                    'password' => 'password'
                ),
                
            )
        );
        
        if ($this->Session->check('Auth.User')) {   //ログイン済み
            $loggedin = $this->Session->read('Auth.User');
            $this->set(compact('loggedin'));
        }
    }
    
    // 権限判定チェック
    public function isAuthorized($user) {
        // 必要ならばここで権限判定
        return true;    //許可
    }

}
?>
