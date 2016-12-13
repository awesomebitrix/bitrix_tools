<?php

namespace Ilflask\BitrixTools\Section;

class Section {

    /**
     * Возращает XML_ID по ID
     *
     * @param integer $id
     * @param integer $iblockID
     *
     * @return bool|int
     */
    static public function idToXml($id, $iblockID) {
        if (!intval($id) && !intval($iblockID)) {
            return false;
        }

        $arrFilter = [
            'ID'        => $id,
            'IBLOCK_ID' => $iblockID,
        ];
        $arrSelect = [
            'ID',
            'XML_ID'
        ];

        $arr = \Bitrix\Iblock\SectionTable::query()
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
     * @param string|integer $xml
     * @param $iblockID
     *
     * @return bool|int
     */
    static public function xmlToId($xml, $iblockID) {
        if (!$xml || !intval($iblockID)) {
            return false;
        }

        $arrFilter = [
            'XML_ID'    => $xml,
            'IBLOCK_ID' => $iblockID,
        ];
        $arrSelect = [
            'ID',
            'XML_ID'
        ];

        $arr = \Bitrix\Iblock\SectionTable::query()
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