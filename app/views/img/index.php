<!DOCTYPE html>
<html lang="ja">
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row text-center" style="margin-top: 200px;">
                <div class="col-md-6 col-md-offset-3">
                    <h2 style="margin-bottom: 50px;">画像アップロード</h2>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <form enctype="multipart/form-data" action="<?php echo Uri::base(false) . 'img/upload'; ?>" method="POST">
                        <div class="col-md-6">
                            <label>
                                <span class="btn btn-primary">
                                    ファイル選択
                                    <input type="file" name="upload_file" style="display: none;">
                                </span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" value="アップロード" class="btn btn-default">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>