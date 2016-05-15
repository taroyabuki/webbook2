<?php
 
//検索キーワードが無ければ終了
if (isset($_GET['q'])) { //（注：書籍版とは違っています）
 
  //データベースに接続
  $db = new PDO('mysql:host=localhost;dbname=mydb', 'test', 'pass',
                  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  //検索
  $query = 'SELECT code,address1,address2,address3,address4,office '
          . 'FROM zip WHERE code LIKE ? ORDER BY code LIMIT 20';
  $stmt = $db->prepare($query);
  $stmt->execute(array($_GET['q'] . '%'));
 
  //結果を1件ずつ処理する
  echo '<table>';
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $code = $row['code'];
    $address = $row['address1']
            . $row['address2']
            . $row['address3']
            . $row['address4'];
    $office = $row['office'];
    echo '<tr>';
    echo '<td>' . htmlspecialchars($code) . '</td>';
    echo '<td class="address">' . htmlspecialchars($address) . '</td>';
    echo '<td>' . htmlspecialchars($office) . '</td>';
    echo '</tr>';
  }
  echo '</table>';
}