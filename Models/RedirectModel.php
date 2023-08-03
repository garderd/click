<?php

namespace Model;

use Database\Database as DB;

class RedirectModel
{
    public static function linkSelect($col, $val)
    {
        $dbconfig = require $_SERVER['DOCUMENT_ROOT'] . "/service/dbconfig.php";
        $db = new DB($dbconfig);
        $queryResult = $db->query("SELECT * FROM links_table WHERE $col=?", array($val));
        if ($queryResult) {
            $arLink = $queryResult->fetch();
        } else {
            $arLink = false;
        }
        $db->closeConnection();
        return $arLink;
    }

    public function redirect($shortLink)
    {   $shortLink = trim($shortLink, "/");
        $arLink = self::linkSelect('short_string', $shortLink);
        if ($arLink) {
            $header = "Location: " . $arLink['link'];
        } else {
            $header = "Location: /404.php";
        }
        header($header);
    }
}
