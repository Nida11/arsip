<?php
class Dashboard_model extends CI_Model {

    // === SLOT ===
public function getTotalSlotToday() {
    return $this->db
        ->where('DATE(tanggal)', date('Y-m-d'))
        ->count_all_results('slot_number');
}

public function getGrowthSlot() {
    $tahun_ini = $this->db->where('YEAR(tanggal)', date('Y'))->count_all_results('slot_number');
    $tahun_lalu = $this->db->where('YEAR(tanggal)', date('Y') - 1)->count_all_results('slot_number');
    return $tahun_lalu ? (($tahun_ini - $tahun_lalu) / $tahun_lalu) * 100 : 0;
}

// === PENOMORAN ===
public function getTotalNumberingToday() {
    return $this->db
        ->where('DATE(created_at)', date('Y-m-d'))
        ->count_all_results('request_number');
}

public function getGrowthNumbering() {
    $tahun_ini = $this->db->where('YEAR(created_at)', date('Y'))->count_all_results('request_number');
    $tahun_lalu = $this->db->where('YEAR(created_at)', date('Y') - 1)->count_all_results('request_number');
    return $tahun_lalu ? (($tahun_ini - $tahun_lalu) / $tahun_lalu) * 100 : 0;
}

// === SPECIMEN ===
public function getTotalSpecimenToday() {
    return $this->db
        ->where('DATE(created_at)', date('Y-m-d'))
        ->count_all_results('request_specimen');
}

public function getGrowthSpecimen() {
    $tahun_ini = $this->db->where('YEAR(created_at)', date('Y'))->count_all_results('request_specimen');
    $tahun_lalu = $this->db->where('YEAR(created_at)', date('Y') - 1)->count_all_results('request_specimen');
    return $tahun_lalu ? (($tahun_ini - $tahun_lalu) / $tahun_lalu) * 100 : 0;
}

}
