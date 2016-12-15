<?php

namespace Ilflask\BitrixTools;

class Element {

    /**
     * Возращает XML_ID по ID
     *
     * @param integer $iblockID
     * @param integer $id
     *
     * @return bool|int
     */
    static public function idToXml($iblockID, $id) {
        if (!intval($id) || !intval($iblockID)) {
            return false;
        }

        $arrFilter = [
            'ID'        => $id,
            'IBLOCK_ID' => $iblockID
        ];
        $arrSelect = [
            'ID',
            'XML_ID'
        ];

        $arr = \Bitrix\Iblock\ElementTable::query()
            ->setFilter($arrFilter)
            ->setSelect($arrSelect)
            ->setLimit(1)
            ->exec()
            ->fetch();

        if ($id == $arr['ID']) {

            return $arr['XML_ID'];
        }

        return false;
    }

    /**
     * Возращает ID по XML_ID
     *
     * @param integer $iblockID
     * @param string|integer $xml
     *
     * @return bool|int
     */
    static public function xmlToId($iblockID, $xml) {
        if (!$xml || !intval($iblockID)) {
            return false;
        }
        $arrFilter = [
            'XML_ID'    => $xml,
            'IBLOCK_ID' => $iblockID
        ];
        $arrSelect = [
            'ID',
            'XML_ID'
        ];

        $arr = \Bitrix\Iblock\ElementTable::query()
            ->setFilter($arrFilter)
            ->setSelect($arrSelect)
            ->setLimit(1)
            ->exec()
            ->fetch();

        if ($xml == $arr['XML_ID']) {

            return (int)$arr['ID'];
        }

        return false;
    }
}