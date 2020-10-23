# 出張管理アプリ

※テスト用アカウントはこちらです。<br>
E-mail:　admin_user@mail.com
Password:　admin_user

## Ⅰ作成経緯
エンジニアを目指す理由はプログラミングで課題解決をしたいことであるため、前職で経験した課題を解決するという想定で作成しました。

## Ⅱできること
社員の毎月の出張旅費の計算を効率化するためのアプリ。<br>
ある会社では旅費担当が会計担当に毎月の請求をすることになっている。旅費は距離に応じて支給されるため「最短経路」という厳しいチェックがあり、もし同じシチュエーションにもかかわらず前回請求時の距離と違う場合請求書は作り直しになってしまう。<br>
しかし旅費の計算は紙ベースで管理しているため過去の情報を調べるのは結構大変。<br>そんな旅費担当の業務を素早く、正確に助けてくれます。

## Ⅲ使用言語・環境
　Laravel 7
　Mysql 5.7

## Ⅳテーブル

```
　・Users
+-------------------+------------------+------+-----+---------+----------------+
| Field             | Type             | Null | Key | Default | Extra          |
+-------------------+------------------+------+-----+---------+----------------+
| id                | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| name              | varchar(255)     | NO   |     | NULL    |                |
| email             | varchar(255)     | NO   | UNI | NULL    |                |
| email_verified_at | timestamp        | YES  |     | NULL    |                |
| password          | varchar(255)     | NO   |     | NULL    |                |
| member_id         | tinyint(4)       | NO   |     | NULL    |                |
| role              | tinyint(4)       | NO   | MUL | 0       |                |
| remember_token    | varchar(100)     | YES  |     | NULL    |                |
| last_login_at     | timestamp        | YES  |     | NULL    |                |
| created_at        | timestamp        | YES  |     | NULL    |                |
| updated_at        | timestamp        | YES  |     | NULL    |                |
+-------------------+------------------+------+-----+---------+----------------+

 ・Members
+------------+------------------+------+-----+---------+----------------+
| Field      | Type             | Null | Key | Default | Extra          |
+------------+------------------+------+-----+---------+----------------+
| id         | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| user_id    | int(10) unsigned | YES  |     | NULL    |                |
| name       | varchar(255)     | YES  |     | NULL    |                |
| address    | varchar(255)     | YES  |     | NULL    |                |
| latitude   | double(9,6)      | YES  |     | NULL    |                |
| longitude  | double(9,6)      | YES  |     | NULL    |                |
| created_at | timestamp        | YES  |     | NULL    |                |
| updated_at | timestamp        | YES  |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+

　・Locations
+------------+------------------+------+-----+---------+----------------+
| Field      | Type             | Null | Key | Default | Extra          |
+------------+------------------+------+-----+---------+----------------+
| id         | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| name       | varchar(255)     | NO   |     | NULL    |                |
| address    | varchar(255)     | YES  |     | NULL    |                |
| latitude   | double(9,6)      | YES  |     | NULL    |                |
| longitude  | double(9,6)      | YES  |     | NULL    |                |
| created_at | timestamp        | YES  |     | NULL    |                |
| updated_at | timestamp        | YES  |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+

　・Histories
+-------------+------------------+------+-----+---------+----------------+
| Field       | Type             | Null | Key | Default | Extra          |
+-------------+------------------+------+-----+---------+----------------+
| id          | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| trip_date   | date             | NO   |     | NULL    |                |
| member_id   | int(10) unsigned | NO   | MUL | NULL    |                |
| start       | int(11)          | NO   |     | NULL    |                |
| location_id | int(10) unsigned | NO   | MUL | NULL    |                |
| distance    | int(11)          | YES  |     | NULL    |                |
| created_at  | timestamp        | YES  |     | NULL    |                |
| updated_at  | timestamp        | YES  |     | NULL    |                |
| deleted_at  | timestamp        | YES  |     | NULL    |                |
+-------------+------------------+------+-----+---------+----------------

　・Headquarters
+------------+---------------------+------+-----+---------+----------------+
| Field      | Type                | Null | Key | Default | Extra          |
+------------+---------------------+------+-----+---------+----------------+
| id         | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| address    | varchar(255)        | NO   |     | NULL    |                |
| latitude   | double(9,6)         | NO   |     | NULL    |                |
| longitude  | double(9,6)         | NO   |     | NULL    |                |
| created_at | timestamp           | YES  |     | NULL    |                |
| updated_at | timestamp           | YES  |     | NULL    |                |
+------------+---------------------+------+-----+---------+----------------+
```

## Ⅴ実装機能
　・CRUD処理<br>
　・MVC<br>
　・Seederによる初期データの作成<br>
　・Middlewareによる認証処理<br>
　・APIルーティング<br>
　・非同期処理によるテーブルレコードの取得<br>
　・GoogleMapAPIによるロケーションとルート検索<br>
