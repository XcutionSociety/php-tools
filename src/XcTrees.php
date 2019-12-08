<?php
/**
 * Class XcTrees
 * @author XcutionSociety : https://github.com/XcutionSociety
 * @version 0.1
 */
namespace XcS;

class XcTrees
{
    /**
     * @param $data
     * @param string $parent
     * @param string $son
     * @param int $pid
     * @param string $child
     * @return array
     */
    public static function getTreeList($data, $parent = 'pid', $son = 'id', $pid = 0, $child = 'child')
    {
        $tmp = [];
        foreach ($data as $k => $v) {
            if ($v[$parent] == $pid) {
                $v[$child] = self::getTreeList($data, $parent, $son, $v[$son], $child);
                $tmp[] = $v;
            }
        }
        return $tmp;
    }

    /**
     * @param $data
     * @param $id
     * @param string $parent
     * @param string $son
     * @return array
     */
    public static function getParents($data, $id, $parent = 'pid', $son = 'id')
    {
        $arr = [];
        foreach ($data as $k => $v) {
            if ($v[$son] == $id && $v[$parent] != 0) {
                $arr[] = $data[array_search($v[$parent], array_column($data, $son))];
            }
        }
        return $arr;
    }

    /**
     * @param $data
     * @param $id
     * @param string $parent
     * @param string $son
     * @return array
     */
    public static function getParentsIds($data, $id, $parent = 'pid', $son = 'id')
    {
        $arr = [];
        foreach ($data as $k => $v) {
            if ($v[$son] == $id && $v[$parent] != 0) {
                $arr[] = $v[$parent];
            }
        }
        return $arr;
    }

    /**
     * @param $data
     * @param $pid
     * @param string $parent
     * @param string $son
     * @return array
     */
    public static function getChildsId($data, $pid, $parent = 'parent_id', $son = 'id')
    {
        $arr = [];
        foreach ($data as $k => $v) {
            if ($v[$parent] == $pid) {
                $arr[] = $v[$son];
            }
        }
        return $arr;
    }

    /**
     * @param $data
     * @param $pid
     * @param string $parent
     * @return array
     */
    function getChilds($data, $pid, $parent = 'parent_id')
    {
        $arr = [];
        foreach ($data as $k => $v) {
            if ($v[$parent] == $pid) {
                $arr[] = $v;
            }
        }
        return $arr;
    }

}