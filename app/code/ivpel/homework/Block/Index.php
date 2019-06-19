<?php

namespace ivpel\homework\Block;

use \Magento\Framework\View\Element\Template;

/**
 * Class Index
 *
 * @package ivpel\homework\Block
 */
class Index extends Template
{
    /**
     * Get students list
     *
     * @return array
     */
    public function getStudentsList(){
        # Here must be request to DB (?) but for now it is just example.
        $students = array(
            "Irena" => "QA",
            "Tanya" => "Front-end",
            "Roma" => "Magento developer",
            "Ivan" => "QA",
        );
        return $students;
    }
}
