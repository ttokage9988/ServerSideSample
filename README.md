# ServerSideSample
ServerSideSample for Laravel from C# web request (Unity)
  
サーバー側(Laravel使用)の通信のやり取りについて
（クライアント側は、割愛）
  
・参考
  
https://www.amazon.co.jp/%E3%82%B9%E3%82%BF%E3%83%BC%E3%83%88%E3%82%A2%E3%83%83%E3%83%97%E3%83%BB%E5%80%8B%E4%BA%BA%E3%81%A7%E4%BD%9C%E3%82%8C%E3%82%8B%E3%82%B9%E3%83%9E%E3%83%9B%E5%90%91%E3%81%91-Unity%E3%82%BD%E3%83%BC%E3%82%B7%E3%83%A3%E3%83%AB%E3%82%B2%E3%83%BC%E3%83%A0%E9%96%8B%E7%99%BA%E3%82%AC%E3%82%A4%E3%83%89-Game-developer-books/dp/4798059382/ref=sr_1_1?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&keywords=%E3%82%BD%E3%83%BC%E3%82%B7%E3%83%A3%E3%83%AB%E3%82%B2%E3%83%BC%E3%83%A0&qid=1584435432&sr=8-1
  
  
1.登録処理の場合
  
  
◇クライアント側
  
・サーバー側にリクエストを送信する。
  
指定のURLに、「registration」という
リクエストを送信する。
  
**イメージ**
  
<www.foo.jp>/registration
  
  
◇サーバー側
  
２．受け取ったリクエストを扱う経路を辿り、
制御（Controller）の処理を実行する。
  
●Route
  
(1)URLから「registration」のリクエストを受け取り、
(2)コントローラの「RegistrationController」の
(3)「Start()」メソッドを実行する。
  
・routes/web.php
***

Route::get('registration', 'RegistrationController@Start');

***
  
●Controller
  
ユーザ情報の登録処理を行う。
登録したユーザ情報を、JSON形式でクライアントに返す。
  
・app/Http/Controllers/RegistrationController.php
  
↑追加で必要なこと
  
●DB(モデルで生成)
  
  
◇クライアント側
  
3.JSONデータ受け取り、
クライアント側のDB(SQLite)に保存する。

---------------
