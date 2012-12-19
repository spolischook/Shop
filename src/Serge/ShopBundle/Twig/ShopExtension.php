<?php
namespace Serge\ShopBundle\Twig;

use Twig_Extension;

class ShopExtension extends Twig_Extension
{
    public function getFilters()
    {
        return array(
            'dotdotdot' => new \Twig_Filter_Method($this, 'dotDotDotFilter'),
        );
    }

    public function dotDotDotFilter($str, $number = 30)
    {
        $aStr = explode(' ', $str);
//        var_dump($aStr); exit;
        if($str != '') {
            $str = '';
            for ($i=0; $number>$i; $i++) {
                $str .= $aStr[$i].' ';
            }
            $str .= '...';
        }

        return $str;
    }

    public function getName()
    {
        return 'shop_extension';
    }
}