<?php

namespace Ilflask\BitrixTools\Iblock;

class Iblock {

    /**
     * Возращает ID по Type и Code
     *
     * @param string $iblockType
     * @param string $iblockCode
     *
     * @return bool|int
     *
     * @throws \Exception
     */
    static public function id($iblockType, $iblockCode) {
        if (!$iblockType || !$iblockCode) {
            return false;
        }

        $arrFilter = [
            'CODE'           => $iblockCode,
            'IBLOCK_TYPE_ID' => $iblockType
        ];
        $arrSelect = [
            'ID'
        ];

        $arr = \Bitrix\Iblock\IblockTable::query()
            ->setFilter($arrFilter)
            ->setSelect($arrSelect)
            ->exec()
            ->fetch();

        if (!$arr['ID']) {
            throw new \Exception('Проблема с доступом к инфоблоку или нет такого инфоблока (' . $iblockType . ',' . $iblockCode . ')');
        }

        return (integer)$arr['ID'];
    }
}