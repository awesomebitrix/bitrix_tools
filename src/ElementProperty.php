<?php


namespace Ilflask\BitrixTools;


class ElementProperty {

    /**
     * Значения свойства для элемента
     *
     * @param integer $iblockId
     * @param integer $elementId
     * @param string $code
     *
     * @return array|false
     */

    static public function get($iblockId, $elementId, $code) {
        if (!$iblockId || !$elementId || !$code) {
            return false;
        }

        return \CIBlockElement::GetProperty($iblockId, $elementId, [], ['CODE' => $code])->Fetch();
    }

    /**
     * Значений всех свойств для элемента
     *
     * @param integer $iblockId
     * @param integer $elementId
     *
     * @return array|false
     */

    static public function getAll($iblockId, $elementId) {
        if (!$iblockId || !$elementId) {
            return false;
        }
        $arrProp = false;
        $obj = \CIBlockElement::GetProperty($iblockId, $elementId);
        while ($arr = $obj->Fetch()) {
            $arrProp[$arr['CODE']] = $arr;
        }

        return $arrProp;
    }
}