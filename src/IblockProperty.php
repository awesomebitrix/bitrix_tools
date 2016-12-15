<?php


namespace Ilflask\BitrixTools;


class IblockProperty {

    /**
     * Свойство инфоблока
     *
     * @param integer $iblockId
     * @param string $code
     *
     * @return array|false
     */
    static public function get($iblockId, $code) {
        if (!$iblockId || !$code) {
            return false;
        }

        $arr = \Bitrix\Iblock\PropertyTable::query()
            ->setFilter([
                'IBLOCK_ID' => $iblockId,
                'CODE' => $code
                ]
            )
            ->setSelect(["*"])
            ->exec()
            ->fetch();

        return $arr;
    }

    /**
     * Список всех свойств инфоблока
     *
     * @param integer $iblockId
     *
     * @return array|false
     */
    static public function getAll($iblockId) {
        if (!$iblockId) {
            return false;
        }

        $arrProp = false;
        $obj = \Bitrix\Iblock\PropertyTable::query()
            ->setFilter(['IBLOCK_ID' => $iblockId])
            ->setSelect(["*"])
            ->exec();
        while ($arr = $obj->fetch()) {
            $arrProp[$arr['CODE']] = $arr;
        }

        return $arrProp;
    }
}