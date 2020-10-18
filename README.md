# 出張管理アプリ

※テスト用アカウントはこちらです。<br>
E-mail:　admin_user@mail.com
Password:　admin_user

## Ⅰ作成経緯
エンジニアを目指す理由はプログラミングで課題解決をしたいことであるため、前職で経験した課題を解決するという想定で作成しました。

## Ⅱできること
　職員の毎月の出張旅費の計算を効率化するためのアプリ。給与事務担当が財政担当に旅費の請求をすることになっている。旅費は距離に応じて支給されるので、例えば財政担当から、AさんがB場所に行ったけど前月と今月で距離違くない？どちらが正しいんですか？という状況になると食い違ってしまう。しかし旅費の計算は紙ベースなので過去から調べるにしても結構大変。そんな事務担当の業務を素早く正確に助けてくれる。

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
　・CRUD処理
　・MVC
　・Seederによる初期データの作成
　・Middlewareによる認証処理
　・APIルーティング
　・非同期処理によるテーブルレコードの得
　・GoogleMapAPIによるロケーションとルート検索
