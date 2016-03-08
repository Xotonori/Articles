<?php


class DB_article
{
    public function __construct($data_base) {
        $link = mysql_connect('localhost', 'root', '');
        if(!$link) {
            die('Не удалось соединиться : ' . mysql_error());
        }
        $db_selected = mysql_select_db($data_base, $link);
        if(!$db_selected) {
            die('Не удалось выбрать базу: ' . mysql_error());
        }
    }

    public function insert($table,$field,$val) {
        $ins = mysql_query("INSERT INTO " . $table . " (" . $field . ") VALUES ('" . $val . "')");
        if (!$ins) {
            die('Не удалось отправить данные: ' . mysql_error());
        }
    }
    public function update($table,$field,$val,$id) {
        $update = mysql_query("UPDATE " . $table . " SET " . $field . "=" . $val . " WHERE id=" . $id);
        if (!$update) {
            die('Не удалось обновить данные: ' . mysql_error());
        }
    }
    public function getAll($sql) {
        $resourse = mysql_query($sql);
        if (!$resourse) {
            die('Не удалось получить данные: ' . mysql_error());
        }
        $arrDates = [];
        while ($res = mysql_fetch_array($resourse)) {
            $arrDates[] = $res;
        }
        return $arrDates;
    }
}
