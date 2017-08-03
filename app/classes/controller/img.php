<?php

class Controller_IMG extends Controller{
    
    public function action_index(){
        
        $data['dummy_text1'] = "これはダミーテキストです";
        $data['dummy_text2'] = "これはダミーテキスト2です";
        return View::forge('img/index', $data);
    }

	public function action_download(){
        
        File::download(DOCROOT.'img/001.png', '001.png');
	}
    
    public function action_upload(){
        
        if(Input::method()=='POST'){ 
            
            //アップロードの設定
            $config = array(
                'path' => DOCROOT.'upload',
                'randomize' => true,
                'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
            );

            Upload::process($config);

            if (Upload::is_valid())
            {
                Upload::save();
                var_dump(Upload::get_files());
//                Model_Uploads::add(Upload::get_files());
            }
        }
	}
}