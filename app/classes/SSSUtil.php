<?php

class SSSUtil {
    
    /**
     * ログインしているかのチェック
     */
    public static function check_login(){
        
        if (Auth::check()) {
        } else {
            // 未ログイン時はログインページへリダイレクト
            Response::redirect('login/index');
        }
    }
}