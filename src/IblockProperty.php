<?php


namespace Ilflask\BitrixTools;


class IblockProperty {


    static public function get($iblockId, $code) {
        if (!$iblockId || !$code) {
            return false;
        }
    }
}