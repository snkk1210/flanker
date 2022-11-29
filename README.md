
# Flanker

## What is this ?

WEB ベースで JMeter を操作できるアプリケーションです。

・シナリオ ( .jmx ) のアップ機能  
・シナリオを選択しての JMeter 実行  
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


![flanker01](https://user-images.githubusercontent.com/46625712/204560941-d8ac7458-43a4-4a9b-82aa-9e4f7b4c5a6b.gif)

## Version

release/0.0.2