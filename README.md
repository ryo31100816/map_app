# 出張管理アプリ

※テスト用アカウントはこちらです。
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
　・Users

　・Members
　・Locations
　・Histories
　・Headquarters

## Ⅴ実装機能
　・CRUD処理
　・MVC
　・Seederによる初期データの作成
　・Middlewareによる認証処理
　・APIルーティング
　・非同期処理によるテーブルレコードの得
　・GoogleMapAPIによるロケーションとルート検索
