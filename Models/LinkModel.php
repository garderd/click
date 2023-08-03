<?php
namespace Model;
use Database\Database as DB;
class LinkModel{
    public static function linkSelect($col, $val){
        $dbconfig = require $_SERVER['DOCUMENT_ROOT'] . "/service/dbconfig.php";
        $db = new DB($dbconfig);
        $queryResult = $db->query("SELECT * FROM links_table WHERE $col=?", array($val));
        if($queryResult){
            $arLink = $queryResult->fetch();
        }
        else{
            $arLink = false;
        }
        $db->closeConnection();
        return $arLink;
    }
    public static function linkInsert($data){
        $dbconfig = require $_SERVER['DOCUMENT_ROOT'] . "/service/dbconfig.php";
        $db = new DB($dbconfig);
        $queryResult = $db->query("INSERT INTO links_table (short_string, link) VALUES (?, ?)", $data);
        $db->closeConnection();
        return true;
    }

    public static function generateShortLink($link){
        $domen = str_replace('https://', '', $link);
        $domen = str_replace('http://', '', $link);
        $hash = md5($domen);
        $short = mb_substr($hash, 0, 8, "UTF-8");
        return $short;

    }

    public function checkURL($data){
        $arLink = self::linkSelect('link', $data);
        return $arLink;
    }
    public function createShortURL($link){
        $shortLink = self::generateShortLink($link);
        if(self::linkInsert(array($shortLink, $link))){
            $arLink = self::checkURL($link);
        }
        return $arLink;
    }
}