<?php

class Controller_Login extends Controller
{
    
//    public function before()
//    {
//        parent::before();
//
//        if (Auth::check()) {
//        } else {
//            // 未ログイン時はログインページへリダイレクト
//            Response::redirect('login/index');
//        }
//    }
    
    /**
     * ログイン
     */
    public function action_index()
    {
        $error = null;
        
        //すでにログイン済であればログイン後のページへリダイレクト
        Auth::check() and Response::redirect('login/get_userinfo');
        
        //ログイン用のオブジェクト生成
        $auth = Auth::instance();
        
        if (Input::post()) {
            
            //ユーザー名とパスワードを検証する
            $user_info = $auth->validate_user(Input::post('username'), Input::post('password'));
            
            //del_flag をチェック
            if ($user_info['del_flag'] === '0'){
                
                //ログイン処理実行
                if ($auth->login(Input::post('username'), Input::post('password'))) {
                    
                    // ログイン成功時、ログイン後のページへリダイレクト
                    Response::redirect('login/get_userinfo');
                } else {
                    
                    // ログイン失敗時、エラーメッセージ作成
                    $error = 'ログイン中に予期せぬ問題が発生しました';
                }
                
            } else {
                
               // ログイン失敗時、エラーメッセージ作成
                $error = 'ユーザ名かパスワードに誤りがあるか、すでに削除されたユーザーです';
            }
        }
        
        //ビューテンプレートを呼び出し
        $view = View::forge('login/index');
        
        //エラーメッセージをビューにセット
        $view->set('error', $error);
        
        return $view;
    }
    
    /**
     * ユーザー登録
     */
    public function action_add_user()
    {
        $mes = null;
        
        if (Input::post()) {
            
             //POSTデータを受け取る
             $username=Input::post('username');
             $password=Input::post('password');
             $email=Input::post('email');
            
             // Authのインスタンス化
             $auth = Auth::instance();
            
             //ユーザー登録
             try{
                 
                $auth->create_user($username,$password,$email);
             } catch (Exception $e) {
                 
                 $mes = 'ユーザー登録に失敗しました: ';
                 $mes .= $e->getMessage();
                 
             }
        }
        
        $view = View::forge('login/add_user');
        $view->set('messages', $mes);
        
        return $view;
    }
    
    /**
     * ユーザー情報取得(テスト用)
     */
    public function action_get_userinfo()
    {
        SSSUtil::check_login();
        
        // Authのインスタンス化
        $auth = Auth::instance();
        
        $mes = 'ログイン中';
        $data['user_group'] = $auth->get('group');
        $data['created_at'] = date('Y-m-d', $auth->get('created_at')); //時間変換
        $data['del_flag'] =$auth->get('del_flag');
        
        $view = View::forge('login/userinfo');
        $view->set('userinfo', $data);
        
        return $view;
    }
    
    
    /**
     * ダミーページ
     */
    public function action_get_dummypage()
    {
        SSSUtil::check_login();
        $view = View::forge('login/dummypage');
        
        return $view;
    }
    
    /**
     * ログアウト
     * @param
     */
    public function action_logout()
    {
        
        $auth = Auth::instance();
        $auth->logout();
        
    }
}