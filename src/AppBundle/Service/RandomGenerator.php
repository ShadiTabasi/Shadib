<?php
/**
 * Created by PhpStorm.
 * User: shadi
 * Date: 07/04/15
 * Time: 15:09
 */

namespace AppBundle\Service;


class RandomGenerator {
    public function generate($min, $max){

        $number =mt_rand($min, $max);


        return $number;
    }

}