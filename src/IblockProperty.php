<?php


namespace Ilflask\BitrixTools;


class IblockProperty {


    static public function get($iblockId, $code) {
        if (!$iblockId || !$code) {
            return false;
        }
    }

    static public function getAll() {
        echo '<pre style="font-size: 15px">';
        var_dump('dsad');
        echo '</pre>';
    }
}