<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mdl_product extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_tblItem() {
        return "items";
    }

    function get_tblItem_sub() {
        return "items_sub";
    }

    function get_tblGroup_Item() {
        return "groups_items";
    }

    function get_groupType() {
        return "ProductType";
    }

    function get_count($where = NULL, $like = NULL) {
        if ($where != NULL)
            $this->db->where($where);
        if ($like != NULL)
            $this->db->like('IVTitle', $like['searchKey']);
        $this->db->where('IVType', $this->get_groupType());
        return $this->db->get($this->get_tblItem())->num_rows();
    }

    function get_limit($where, $limit, $offset, $like = NULL, $order_by = 'IDCDate') {
        if ($where != NULL)
            $this->db->where($where);
        if ($order_by != NULL)
            $this->db->order_by($order_by, 'desc');
        if ($like != NULL)
            $this->db->like('IVTitle', $like['searchKey']);
        $this->db->where('IVType', $this->get_groupType());
        return $this->db->limit($limit, $offset)
                        ->get($this->get_tblItem())->result();
    }

    function get_order($flag = NULL, $order_by = 'IDCDate') {
        $flag = $this->security->xss_clean($flag);
        if ($flag != NULL)
            $this->db->where('IIFlag', $flag);
        return $this->db->where('IVType', $this->get_groupType())
                        ->order_by($order_by, 'desc')
                        ->get($this->get_tblItem())->result();
        //$this->db->last_query();
    }

    function get_where($id, $sub_order_by = 'SIDCDate') {
        $data = $this->db->where('IUID', $id)
                        ->get($this->get_tblItem())->row();
//        $sdata['SIVTitle'] = $data['Quantity'] != 'null' ? $data['Quantity'] : NULL;
//        $sdata['SIVDesc'] = $data['Origin'] != 'null' ? $data['Origin'] : NULL;
//        $sdata['SIVEmail'] = $data['Color'] != 'null' ? $data['Color'] : NULL;
//        $sdata['SIVAuthor'] = $data['Size'] != 'null' ? $data['Size'] : NULL;
//        $sdata['SIVImages'] = $data['Images'];
        $data->sub_item = $this->db->select('SIUID,SIVTitle,SIVDesc,SIVEmail,SIVAuthor,SIVImages')
                        ->where('IUID', $id)
                        ->order_by($sub_order_by)
                        ->get($this->get_tblItem_sub())->result();
        $data->GUID = $this->db->select('GUID')
                        ->where('IUID', $id)
                        ->get($this->get_tblGroup_Item())->row()->GUID;
        return $data;
    }

    function get_where_sub($id, $sub_order_by = 'SIDCDate') {
        return $this->db->where('IUID', $id)
                        ->order_by($sub_order_by, 'DESC')
                        ->get($this->get_tblItem_sub())->result();
    }

    function get_where_list($items, $sub_order_by = 'SIDCDate') {
        $data = array();
        foreach ($items as $key => $value) {
            if ($value[1] != 'null')
                $qry = "SELECT i.*,s.SIUID,s.SIVTitle,s.SIVDesc,s.SIVEmail,s.SIVAuthor,s.SIVImages,g.GUID,g.GVTitle "
                        . "FROM items as i "
                        . "INNER JOIN items_sub as s ON i.IUID = s.IUID "
                        . "INNER JOIN groups_items as gi ON i.IUID = gi.IUID "
                        . "INNER JOIN groups as g ON g.GUID = gi.GUID "
                        . "WHERE i.IUID='$value[0]' "
                        . "AND s.SIUID='$value[1]'";
            else
                $qry = "SELECT i.*,g.GUID,g.GVTitle "
                        . "FROM items as i "
                        . "INNER JOIN groups_items as gi ON i.IUID = gi.IUID "
                        . "INNER JOIN groups as g ON g.GUID = gi.GUID "
                        . "WHERE i.IUID='$value[0]'";
            $data[] = $this->db->query($qry)->row();
            //$data[] = $this->db->last_query();
        }
        return $data;
        //return $this->db->last_query();
    }

    function _insert($data, $sdata, $images = NULL) {
        $this->db->trans_begin();
        $IUID = $this->_insert_main($data);
        foreach ($sdata as $value)
            $this->_insert_sub($IUID, $value);
        $this->_update_total_sub_item($IUID);
        $this->_update_qty_main($IUID);
        $this->_insert_group_item(array('GUID' => $data['GIParentID'], 'IUID' => $IUID));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

    function _insert_main($data) {
        $mdata['ApplicationId'] = TM_ApplicaionID;
        $mdata['IUID'] = UUID::NewGuid();
        $mdata['IVType'] = $this->get_groupType();
        $mdata['LVLangCode'] = $this->mdl_language->langcode();
        //$data['IVImages'] = $images;
        $mdata['IVTitle'] = $data['Title'];
        $mdata['IVKey'] = $data['Code'];
        $mdata['IFFPrice'] = $data['FPrice'];
        $mdata['IFLPrice'] = $data['LPrice'];
        $mdata['IIOrder'] = $data['Orders'];
        $mdata['IVDesc'] = $data['Desc'];
        $mdata['IVContent'] = $data['Content'];
        $mdata['IIFlag'] = isset($data['Flag']) ? 1 : 0;
        $mdata['IVAuthor'] = 'admin';
        $mdata['IDCDate'] = TMLib::getNow();
        $this->db->insert($this->get_tblItem(), $mdata);
        return $mdata['IUID'];
    }

    function _insert_sub($IUID, $data) {
        $sdata['ApplicationId'] = TM_ApplicaionID;
        $sdata['SIUID'] = UUID::NewGuid();
        $sdata['IUID'] = $IUID;
        $sdata['LVLangCode'] = $this->mdl_language->langcode();
        $sdata['SIVTitle'] = $data['Quantity'] != 'null' ? $data['Quantity'] : 0;
        $sdata['SIVDesc'] = $data['Origin'] != 'null' ? $data['Origin'] : NULL;
        $sdata['SIVEmail'] = $data['Color'] != 'null' ? $data['Color'] : NULL;
        $sdata['SIVAuthor'] = $data['Size'] != 'null' ? $data['Size'] : NULL;
        $sdata['SIVImages'] = $data['Images'];
        $sdata['SIDCDate'] = TMLib::getNow();
        if ($sdata['SIVTitle'] != '' || $sdata['SIVDesc'] != '' ||
                $sdata['SIVEmail'] != '' || $sdata['SIVAuthor'] != '' || $sdata['SIVImages'] != ',')
            $this->db->insert($this->get_tblItem_sub(), $sdata);
        return intval($sdata['SIVTitle']);
    }

    function _insert_group_item($data) {
        $data['ApplicationId'] = TM_ApplicaionID;
//        $data['GUID'] = $data['GUID'];
//        $data['IUID'] = $data['IUID'];
        $data['GIVType'] = $this->get_groupType();
        $data['GIDCDate'] = TMLib::getNow();
        $this->db->insert($this->get_tblGroup_Item(), $data);
    }

    function _update($data, $sdata, $images = NULL) {
        $this->db->trans_begin();
        $this->_update_main($data);
        foreach ($sdata as $value) {
            if ($value['SIUID'] != NULL)
                $this->_update_sub($value);
            else
                $this->_insert_sub($data['IUID'], $value);
        }
        $this->_update_total_sub_item($data['IUID']);
        $this->_update_qty_main($data['IUID']);
        $this->_update_group_item(array('GUID' => $data['GIParentID'], 'IUID' => $data['IUID']));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
        //return $this->db->last_query();
    }

    function _update_main($data) {
        $mdata['IVTitle'] = $data['Title'];
        $mdata['IVKey'] = $data['Code'];
        $mdata['IFFPrice'] = $data['FPrice'];
        $mdata['IFLPrice'] = $data['LPrice'];
        $mdata['IIOrder'] = $data['Orders'];
        $mdata['IVDesc'] = $data['Desc'];
        $mdata['IVContent'] = $data['Content'];
        $mdata['IIFlag'] = isset($data['Flag']) ? 1 : 0;
        $mdata['IDUDate'] = TMLib::getNow();
        $this->db->where('IUID', $data['IUID'])
                ->update($this->get_tblItem(), $mdata);
    }

    function _update_sub($data) {
        $sdata['SIVTitle'] = $data['Quantity'] != 'null' ? $data['Quantity'] : 0;
        $sdata['SIVDesc'] = $data['Origin'] != 'null' ? $data['Origin'] : NULL;
        $sdata['SIVEmail'] = $data['Color'] != 'null' ? $data['Color'] : NULL;
        $sdata['SIVAuthor'] = $data['Size'] != 'null' ? $data['Size'] : NULL;
        $sdata['SIVImages'] = $this->db->select('SIVImages')
                        ->where('SIUID', $data['SIUID'])
                        ->get($this->get_tblItem_sub())->row()->SIVImages;
        //if ($data['Images'] != ',' && $data['Images'] != '')
        $sdata['SIVImages'] = rtrim($sdata['SIVImages'], ',') . $data['Images'];
        $sdata['SIDUDate'] = TMLib::getNow();
        if ($sdata['SIVTitle'] != '' || $sdata['SIVDesc'] != '' ||
                $sdata['SIVEmail'] != '' || $sdata['SIVAuthor'] != '')
            $this->db->where('SIUID', $data['SIUID'])
                    ->update($this->get_tblItem_sub(), $sdata);
        return intval($sdata['SIVTitle']);
    }

    function _update_group_item($data) {
        $data['GIDUDate'] = TMLib::getNow();
        $this->db->where('IUID', $data['IUID'])
                ->update($this->get_tblGroup_Item(), $data);
    }

    function _remove_sub_item($data) {
        $this->db->delete($this->get_tblItem_sub(), array('SIUID' => $data[1]));
        $this->_update_qty_main($data[0]);
        $this->_update_total_sub_item($data[0]);
    }

    function _remove_images($SIUID, $Images) {
        $SIVImages = $this->db->select('SIVImages')
                        ->where('SIUID', $SIUID)
                        ->get($this->get_tblItem_sub())->row()->SIVImages;
        $SIVImages = str_replace(',' . $Images . ',', ',', $SIVImages);
        $this->db->where('SIUID', $SIUID)
                ->update($this->get_tblItem_sub(), array('SIVImages' => $SIVImages));
    }

    function _get_qty_main($id) {
        return $this->db->select('IITotalView')
                        ->where('IUID', $id)
                        ->get($this->get_tblItem())->row()->IITotalView;
    }

    function _update_qty_main($id) {
        $sql = 'SELECT SUM(SIVTitle) AS TotalQuantity FROM ' . $this->get_tblItem_sub() . ' WHERE IUID=?';
        $value = $this->db->query($sql, array($id))->row()->TotalQuantity;
        $this->db->where('IUID', $id)
                ->update($this->get_tblItem(), array('IITotalView' => $value));
    }

    function _get_total_sub_item($id) {
        return $this->db->select('IITotalSubItems')
                        ->where('IUID', $id)
                        ->get($this->get_tblItem())->row()->IITotalSubItems;
    }

    function _update_total_sub_item($id) {
        $sql = 'SELECT COUNT(*) AS TotalItem FROM ' . $this->get_tblItem_sub() . ' WHERE IUID=?';
        $value = $this->db->query($sql, array($id))->row()->TotalItem;
        $this->db->where('IUID', $id)
                ->update($this->get_tblItem(), array('IITotalSubItems' => $value));
    }

    function _get_qty_sub($id) {
        return $this->db->select('SIVTitle')
                        ->where('IUID', $id)
                        ->get($this->get_tblItem_sub())->row()->SIVTitle;
    }

    function _update_qty_sub($id, $value) {
        $sql = 'UPDATE ' . $this->get_tblItem_sub() . ' SET SIVTitle=(SIVTitle-?) WHERE SIUID=?';
        $this->db->query($sql, array($value, $id));
    }

    function _update_status($id, $flag) {
        $this->db->where('IUID', $id)
                ->update($this->get_tblItem(), array('IIFlag' => $flag));
    }

    function _delete($data) {
        $this->db->delete($this->get_tblItem(), array('IUID' => $data));
    }

}
