
# Flanker

## What is this ?

WEB ベースで JMeter を操作できるアプリケーションです。

・シナリオ ( .jmx ) のアップ機能  
・シナリオを選択しての JMeter 実行  
・JMeter 実行進捗の確認 ( 非同期 )  
・実行結果確認  
・HTML ファイル生成、および別タブでの表示機能  
・リモート Worker ノードの種類 / 数量の確認  
・リモート Worker ノードの追加 / 削除 ( 実設定ファイルとの同期連携 )  
・シナリオファイル ( Thread group ) の調整

## Installation

下記の Ansible Playbook から自動的に環境構築、及び、アプリケーションのデプロイが行われます。  
※ phpjmadmin role が導入処理を担っています。  

https://github.com/snkk1210/jmeter-MS

## Usage

ポート 8888 にてアプリケーションが Listen しています。  
ブラウザから http://\< server ip \>:8888 に接続してください。 


![flanker3_gif](https://user-images.githubusercontent.com/46625712/233827911-af7ab831-1620-4fdb-8552-66f7c98c6402.gif)

## Version

release/0.0.7

・実行結果を ZIP でダウンロードする機能を追加しました。  
・JMeter の停止機能を追加しました。  
・シナリオファイル ( Thread group ) の調整時メッセージ表示機能を追加しました。  
・試験結果一覧の画面を追加しました。  
・シナリオファイルを新規から表示されるよう調整しました。  

![flanker3_stop_gif](https://user-images.githubusercontent.com/46625712/233827958-44898192-44c7-4ca3-a35e-4d2434c1e16f.gif)