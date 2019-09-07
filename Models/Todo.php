<?php

require_once('config/dbconnect.php');
// Todoを操作するクラス（もの）
// - 追加する機能
//      追加処理を作る手順
//      1.ADDボタンがクリックされたら、入力されたタスクをcreate.phpに送信
//      2.create.phpでデータベースにタスクを追加
            // -送信されてきたタスクを取得
            // -取得したタスクをデータベースに追加
//      3.最初の画面に戻る

// - 検索する機能
// - 編集する機能
// - 削除する機能

class  Todo
{
    // プロパティ
    // - テーブル名
    // - DbManagerインスタンスを持つ変数

   private $table ='tasks';

    // - Dbmanager
   private $db_manager;

   function __construct()
   {
        // db_managerプロパティは、
        // DbManagerクラスのインスタンス
        $this->db_manager = new DbManager;
        
        // データベースに接続
        $this->db_manager->connect();
   }


   public function create($task)
   {
    //    INSERT文の準備
    $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . '(name) VALUES (?)');
    //  準備したものを実行
    $stmt->execute([$task]);

   }


   public function getAll ()
   {
     // SELECT文の準備
     $stmt = $this ->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);
     
     // 準備したSQLを実行
     $stmt->execute();

     // 実行した結果を取得
     $tasks = $stmt->fetchAll();

     // 取得した結果を返す
     return $tasks;
     
   }

     //削除するメソッド
   public function delete ($num)
   {
     $stmt = $this ->db_manager->dbh->prepare('DELETE FROM '. $this->table. ' WHERE id = '.$num);

     $stmt->execute();
     
   }


  //  1. updateメソッドを作成する。
    // - IDとタスク名を受け取り、該当IDのタスクを更新する
   public function update()
   {
      // UPDATE文の準備
      $stmt = $this ->db_maneger->dbh->prepare('UPDATE '. $this->table.'SET name = ここに変更するもの'.' WHERE id =' .$num);

      // 準備したSQLを実行
      $stmt->execute();

      // 実行した結果を取得
      $tasks = $stmt->fetcAll();
   }

}