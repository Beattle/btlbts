<?php
/**
 * User: Hipno
 * Date: 25.04.2017
 * Time: 15:30
 * Project: btlbts
 */

namespace ninjacat;

use Bitrix\Main;
use Bitrix\Main\Entity;
\Bitrix\Main\Loader::includeModule("iblock");
use \Bitrix\Iblock\PropertyIndex\Facet;
use \Bitrix\Iblock\PropertyIndex\Storage;

class FacetMod extends \Bitrix\Iblock\PropertyIndex\Facet
{

    public function query(array $filter, array $facetTypes = array(), $facetId = 0)
    {
        $connection = \Bitrix\Main\Application::getConnection();
        $sqlHelper = $connection->getSqlHelper();

        $facetFilter = $this->getFacetFilter($facetTypes);
        if (!$facetFilter)
        {
            return false;
        }

        if ($filter)
        {
            $filter["IBLOCK_ID"] = $this->iblockId;
            if(is_array($GLOBALS["arrFilter"]))
                $filter=array_merge($filter,$GLOBALS["arrFilter"]);

            $element = new \CIBlockElement;
            $element->strField = "ID";
            $element->prepareSql(array("ID"), $filter, false, false);
            $elementFrom = $element->sFrom;
            $elementWhere = $element->sWhere;
        }
        else
        {
            $elementFrom = "";
            $elementWhere = "";
        }

        $facets = array();
        if ($facetId)
        {
            $facets[] = array(
                "where" => $this->getWhere($facetId),
                "facet" => array($facetId),
            );
        }
        else
        {
            foreach ($facetFilter as $facetId)
            {
                $where = $this->getWhere($facetId);

                $found = false;
                foreach ($facets as $i => $facetWhereAndFacets)
                {
                    if ($facetWhereAndFacets["where"] == $where)
                    {
                        $facets[$i]["facet"][] = $facetId;
                        $found = true;
                        break;
                    }
                }

                if (!$found)
                {
                    $facets[] = array(
                        "where" => $where,
                        "facet" => array($facetId),
                    );
                }
            }
        }

        $sqlUnion = array();
        foreach ($facets as $facetWhereAndFacets)
        {
            $where = $facetWhereAndFacets["where"];
            $facetFilter = $facetWhereAndFacets["facet"];

            $sqlSearch = array("1=1");

            if (empty($where))
            {
                $sqlUnion[] = "
					SELECT
						F.FACET_ID
						,F.VALUE
						,MIN(F.VALUE_NUM) MIN_VALUE_NUM
						,MAX(F.VALUE_NUM) MAX_VALUE_NUM
						".($connection instanceof \Bitrix\Main\DB\MysqlCommonConnection
                        ?",MAX(case when LOCATE('.', F.VALUE_NUM) > 0 then LENGTH(SUBSTRING_INDEX(F.VALUE_NUM, '.', -1)) else 0 end)"
                        :",MAX(".$sqlHelper->getLengthFunction("ABS(F.VALUE_NUM) - FLOOR(ABS(F.VALUE_NUM))")."+1-".$sqlHelper->getLengthFunction("0.1").")"
                    )." VALUE_FRAC_LEN
						,COUNT(DISTINCT F.ELEMENT_ID) ELEMENT_COUNT
					FROM
						".($elementFrom
                        ?$elementFrom."
							INNER JOIN ".$this->storage->getTableName()." F ON BE.ID = F.ELEMENT_ID"
                        :$this->storage->getTableName()." F"
                    )."
					WHERE
						F.SECTION_ID = ".$this->sectionId."
						and F.FACET_ID in (".implode(",", $facetFilter).")
						".$elementWhere."
					GROUP BY
						F.FACET_ID, F.VALUE
				";
                continue;
            }
            elseif (count($where) == 1)
            {
                $fcJoin = "INNER JOIN ".$this->storage->getTableName()." FC on FC.ELEMENT_ID = BE.ID";
                foreach ($where as $facetWhere)
                {
                    $sqlWhere = $this->whereToSql($facetWhere, "FC");
                    if ($sqlWhere)
                        $sqlSearch[] = $sqlWhere;
                }
            }
            elseif (count($where) <= 5)
            {
                $subJoin = "";
                $subWhere = "";
                $i = 0;
                foreach ($where as $facetWhere)
                {
                    if ($i == 0)
                        $subJoin .= "FROM ".$this->storage->getTableName()." FC$i\n";
                    else
                        $subJoin .= "INNER JOIN ".$this->storage->getTableName()." FC$i ON FC$i.ELEMENT_ID = FC0.ELEMENT_ID\n";

                    $sqlWhere = $this->whereToSql($facetWhere, "FC$i");
                    if ($sqlWhere)
                    {
                        if ($subWhere)
                            $subWhere .= "\nAND ".$sqlWhere;
                        else
                            $subWhere .= $sqlWhere;
                    }

                    $i++;
                }
                $fcJoin = "
					INNER JOIN (
						SELECT FC0.ELEMENT_ID
						$subJoin
						WHERE
						$subWhere
					) FC on FC.ELEMENT_ID = BE.ID
				";
            }
            else
            {
                $condition = array();
                foreach ($where as $facetWhere)
                {
                    $sqlWhere = $this->whereToSql($facetWhere, "FC0");
                    if ($sqlWhere)
                        $condition[] = $sqlWhere;
                }
                $fcJoin = "
						INNER JOIN (
							SELECT FC0.ELEMENT_ID
							FROM ".$this->storage->getTableName()." FC0
							WHERE FC0.SECTION_ID = ".$this->sectionId."
							AND (
							(".implode(")OR(", $condition).")
							)
						GROUP BY FC0.ELEMENT_ID
						HAVING count(DISTINCT FC0.FACET_ID) = ".count($condition)."
						) FC on FC.ELEMENT_ID = BE.ID
					";
            }

            $sqlUnion[] = "
				SELECT
					F.FACET_ID
					,F.VALUE
					,MIN(F.VALUE_NUM) MIN_VALUE_NUM
					,MAX(F.VALUE_NUM) MAX_VALUE_NUM
					".($connection instanceof \Bitrix\Main\DB\MysqlCommonConnection
                    ?",MAX(case when LOCATE('.', F.VALUE_NUM) > 0 then LENGTH(SUBSTRING_INDEX(F.VALUE_NUM, '.', -1)) else 0 end)"
                    :",MAX(".$sqlHelper->getLengthFunction("ABS(F.VALUE_NUM) - FLOOR(ABS(F.VALUE_NUM))")."+1-".$sqlHelper->getLengthFunction("0.1").")"
                )." VALUE_FRAC_LEN
					,COUNT(DISTINCT F.ELEMENT_ID) ELEMENT_COUNT
				FROM
					".$this->storage->getTableName()." F
					INNER JOIN (
						SELECT BE.ID
						FROM
							".($elementFrom
                    ?$elementFrom
                    :"b_iblock_element BE"
                )."
							".$fcJoin."
						WHERE ".implode(" AND ", $sqlSearch)."
						".$elementWhere."
					) E ON E.ID = F.ELEMENT_ID
				WHERE
					F.SECTION_ID = ".$this->sectionId."
					and F.FACET_ID in (".implode(",", $facetFilter).")
				GROUP BY
					F.FACET_ID, F.VALUE
			";
        }

        $result = $connection->query(implode("\nUNION ALL\n", $sqlUnion));

        return $result;
    }
}