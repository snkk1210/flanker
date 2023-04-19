
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


![flanker_o_01](https://user-images.githubusercontent.com/46625712/205951781-eef218f3-1c6e-413c-ae86-4707cf235d36.gif)

## Version

release/0.0.6

・実行結果を ZIP でダウンロードする機能を追加しました。  
・JMeter の停止機能を追加しました。

![stop](https://user-images.githubusercontent.com/46625712/233142609-eb60e91a-2f25-4100-b218-3e6d1a86e32d.gif)