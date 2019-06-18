<?php

namespace ivpel\homework\Block;

/**
 * Class Index
 * @package ivpel\homework\Block
 */
class Index extends \Magento\Framework\View\Element\Template
{

    /**
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

        foreach ($students as $key => $value){
            echo "<li> {$key} ". " is: "."  {$value}</li><br/> ";
        }

    }
}