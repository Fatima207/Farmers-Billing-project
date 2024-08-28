<?php

if (!function_exists('getSettingValByKey')) {
    function getSettingValByKey($pairs=array()) {
        $type = $pairs['type'];
        $key = $pairs['key'];
        $CI =& get_instance();
        $res = $CI->db->select('key_value')->get_where('settings', array('type' => $type))->result_array();
        foreach($res as $r) {
            $keyVal = json_decode($r['key_value'], TRUE);
            //pr($keyVal); exit;
            if(isset($keyVal[$key])){
                return $keyVal[$key];
            } else {
                return '';
            }
        }
    }
}
    function buildTree(Array $data, $parent = 0) {
    $tree = array();
    foreach ($data as $d) {
        if ($d['parent_ID'] == $parent) {
            $children = buildTree($data, $d['ID']);
            // set a trivial key
            if (!empty($children)) {
                $d['_children'] = $children;
            }
            $tree[] = $d;
        }
    }
    return $tree;
    }
    

    function printTree($tree, $r = 0, $p = null) {
        foreach ($tree as $i => $t) {
            $dash = ($t['parent_ID'] == 0) ? '' : str_repeat('-', $r) .' ';
            printf("\t<option value='%d'>%s%s</option>\n", $t['ID'], $dash, $t['name']);
            if ($t['parent_ID'] == $p) {
                // reset $r
                $r = 0;
            }
            if (isset($t['_children'])) {
                printTree($t['_children'], ++$r, $t['parent_ID']);
            }
        }
    }
    function findKey($products, $field, $value)
    {
       foreach($products as $key => $product)
       {
        pr($product);
          if ( $product->$field === $value )
             return $key;
       }
       return false;
    }
    // function isLeaveRequestApproved($array) {
    //     $appData = json_decode($array, true);
    //     $flag = 0;
    //     $k=0;
    //     foreach ($appData as $key => $value) {
    //         $key = key($value);
    //         if($value[$key]==1 && $k>0) {
    //             $flag = 1;
    //         }
    //         $k++;
    //     }
    //     return $flag;
    // }
    function isLeaveRequestApproved($array) {
        $appData = json_decode($array, true);
        //pr($appData);
        $flag = 0;
        //$k=0;
        foreach ($appData as $key => $value) {
            //pr($value);
            $key = key($value);
            //echo "valll = ".$value2[$key]; exit;
            if($value[$key]==2) {
                //echo "find";
                $flag = 1;
            }
            //$k++;
        }
        //exit;
        return $flag;
    }
    function checkRequestApprovalByUser($array, $employeeID) {
        $appData = json_decode($array, true);
        $level = 0;
        $flag=0;
        foreach ($appData as $key2 => $value) {
            $levelData = explode('_', $key2);
            if(key($value)==$employeeID && $level==1){
                $flag = 1;
            }
            if(key($value)==$employeeID && intval($levelData[1]) > 1) {
                --$level;
                $mainKey = key($appData['level_'.$level]);
                $mainVal = $appData['level_'.$level][$mainKey];
                if($mainVal==1) {
                    $flag = 1;
                }
                break;
            }
            $level++;
        }
        return $flag;
    }
    function getLevelByUser($array, $employeeID) {
        $appData = json_decode($array, true);
        $level = 0;
        foreach ($appData as $key2 => $value) {
            $levelData = explode('_', $key2);
            if(key($value) == $employeeID && intval($levelData[1]) > 0) {
                break;
            }
            $level++;
        }
        return $level;
    }
    // function getPreviousEmployee($approve_by) {
    //     $appData = json_decode($approve_by, true);
    //     foreach ($appData as $key2 => $value) {
    //         if(key($value) == $employeeID && intval($levelData[1]) > 0) {
    //             $levelData = explode('_', $key2);
    //             $level = $levelData[1];
    //             break;
    //         }
    //     }
    //     $emp = key($appData[$level])
    //     return $emp;
    // }
    function is_permitted($employeeID) {
        $CI =& get_instance();
        $CI->db->where('(is_manager = 1 OR is_personnel = 1 OR is_gm = 1 OR is_hr_manager = 1 OR is_ceo = 1)');
        $res = $CI->db->select('is_manager, is_personnel, is_gm, is_ceo, is_hr_manager, is_ceo')->get_where('leave_user_manager', array('employee_number' => $employeeID));
        // echo $CI->db->last_query();
        // pr($res->row());
        // echo $res->num_rows();  
        if($res->num_rows() == 0) {
            return 0 ;
        }
        return 1;
    }
    function is_personnel($employeeID) {
        $CI =& get_instance();
        $CI->db->where('is_personnel', 1);
        $res = $CI->db->select('is_manager, is_personnel, is_gm, is_ceo, is_hr_manager')->get_where('leave_user_manager', array('employee_number' => $employeeID));
        if($res->num_rows() == 0) {
            return 0 ;
        }
        return 1;
    }