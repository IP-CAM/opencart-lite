<?php namespace Model\Setting;

use Engine\Model;

class Extension {
    use Model;

	public function getInstalled($type) {
		$extension_data = array();
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "extension WHERE `type` = " . $this->db->quote($type));
		
		foreach ($query->rows as $result) {
			$extension_data[] = $result['code'];
		}
		
		return $extension_data;
	}
	
	public function install($type, $code) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "extension SET `type` = " . $this->db->quote($type) . ", `code` = " . $this->db->quote($code));
	}
	
	public function uninstall($type, $code) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "extension WHERE `type` = " . $this->db->quote($type) . " AND `code` = " . $this->db->quote($code));
	}
}
?>