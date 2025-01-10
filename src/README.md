# お問い合わせフォーム

## 環境構築

### Dockerビルド
1. git clone git@github.com:coachtech-material/laravel-docker-template.git  
2. docker-compose up -d --build  

※MySQLはOSによっては起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。  

### Laravel環境構築
1. docker-compose exec php bash  
2. composer install  
3. .env.exampleファイルから.envを作成し、環境変数を変更  
4. php artisan key:generate  
5. php artisan migrate  
6. php artisan db:seed  

## 使用技術
- PHP7.4.9
- Laravel8.83.8
- MySQL8.0.26

## ER図

![ER Diagram](er.png)

## URL
- 開発環境：http://localhost/  
- phpMyAdmin：http://localhost:8080/
