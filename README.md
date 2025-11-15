# fashionablylate
リポジトリの設定  
　　＄ git clone git@github.com:laughricotetsu/fashionablylate.git  
リモートリポジトリの作成及びURLの取得  
リモートリポジトリのURLの変更  
　　$ cd fashionablylate  
　　$ git remote set -url origin 作成したリポジトリのURL  
　　$ git remote -v  
ローカルリポジトリの内容をリモートに反映させる  
   $ git add .  
   $ git commit -m "リモートリポジトリの変更"  
   $ git push origin main  
Dockerの設定  
   $ docker-compose up -d --build  
   $ code .  
Laravelのパッケージのインストール  
   $ docker-compose exec php bash  
   $ docker install  
.envファイルの作成（.env.exampleファイルから.envファイルを作成し、環境変数を変更）  
 （.envファイルの作成）  
   $ CP .env.example .env  
   $ exit  
   (.envファイルの修正)  
   //前略  
   DB_CONECTION = mysql  
    DB_HOST = 127.0.0.1 => DB_HOST = mysql  
   DB_PORT = 3306  
    DB_DATABASE = laravel => DB_DATABASE = laravel_db  
    DB_USERNAME = root => DB_USERNAME = laravel_user  
    DB_PASSWORD =   => DB_PASSWORD = laravel_pass  
    //後略  
 マイグレーションの実行  
    $ php artisan migrate  
 アプリケーションの起動をするためのキーを作成  
 　　$ php artisan key:generate  
 シーディング処理の実行  
    $ php artisan DB:seed  
使用技術  
    PHP 8.1  
    Laravel 8  
    MySQL 8.0  
URL
　　開発環境：http//localhost/  
   phpMyAdmin:http//localhost:8080/  
