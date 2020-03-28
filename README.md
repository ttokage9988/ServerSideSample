# ServerSideSample
ServerSideSample for Laravel from C# web request (Unity)
  
サーバー側(Laravel)の通信のやり取りについて
（クライアント側は、一部割愛します。）
  
・参考書籍<br>
スタートアップ・個人で作れる スマホ向けUnity ソーシャルゲーム開発ガイド
  
  
# ユーザ登録処理
  
  
## ◇クライアント側(Unity)
  
・サーバー側にリクエストを送信する。  
  
指定のURLに、「registration」という
リクエストを送信する。
  
**リクエスト送信例(C#)**
  
```C#
string URL = "www.foo.jp/registration";
UnityWebRequest request = UnityWebRequest.Get(URL);
yield return request.SendWebRequest();
```
  
## ◇サーバー側 (Laravel)

受け取ったリクエストを扱う経路を辿り、
制御（Controller）の処理を実行する。


●Route

・routes/web.php
***
Route::get('registration', 'RegistrationController@Start');
***
-処理内容-<br>
(1)'registration'のリクエストを認識<br> 
(2)コントローラーの'RegistrationController'の指定メソッドを実行<br>
  
●Controller
  
・app/Http/Controllers/RegistrationController.php
***
（ソースコード割愛）
***
-処理内容-<br>
(1)あらかじめ作成してあるDBのテーブルに、ユーザ情報を登録<br>
（ユーザIDはランダム文字列の生成）<br>
(2)登録したユーザ情報を、JSON形式でクライアントに送信<br>

 
●DB

・database/migrations/xxxx_xx_xx_xxxxxx_create_user_profile_table.php
***
（ソースコード割愛）
***
LaravelのMigration機能でテーブルを作成しています。


## ◇クライアント側(Unity)

JSONデータ受け取り、クライアント側のDB(SQLite)に保存します。

**リクエスト受信例(C#)**
```C#
//レスポンスを取得
string text = unityWebRequest.downloadHandler.text;
ResponseObjects responseObjects = JsonUtility.FromJson<ResponseObjects>(text);
```

---------------
