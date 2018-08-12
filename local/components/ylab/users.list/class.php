<?php

/**
 * Class UsersListComponent
 */
class UsersListComponent extends \CBitrixComponent
{
    /**
     * @return mixed|void
     */
    public function executeComponent()
    {
        /** @global \CMain $APPLICATION */
        global $APPLICATION;

        $APPLICATION->RestartBuffer();
        $this->arResult = $this->getUsersList();
        $this->includeComponentTemplate();
    }

    /**
     * @return array
     *Resumes the result of the selection of the properties of the information block elements.
     * Вовзращает результат выборки свойств элементов инфоблока
     */
    protected function getUsersList()
    {
        echo "<pre>";
        if (CModule::IncludeModule("iblock")) {
            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_*");
            $arFilter = Array("IBLOCK_ID" => 1);
            $arElements = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 3), $arSelect);
            while ($arProperty = $arElements->GetNextElement()) {
                $arFields = $arProperty->GetFields();
                print_r($arFields);
            }
        }
        echo "</pre>";
    }
}




