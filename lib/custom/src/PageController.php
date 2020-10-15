<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aimeos\Shop\Facades\Shop;

class PageController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function AboutUs()
    {
        return $this->GetPage('about-us');
    }
    public function ContactUs()
    {
        return $this->GetPage('contact-us');
    }
    public function ajaxAction($locale, $currency, $page)
    {
        return $this->GetPage($page, 'legal');
    }
    public function blogAction($locale, $currency, $page)
    {
        return $this->GetPage($page, 'page');
    }
    public function GetPage($page, $page_type='page')
    {
        $params = array();
        foreach( config( 'swordbros.pages.'.$page_type, [] ) as $name )
        {
            $params['aiheader'][$name] = Shop::get( $name )->getHeader();
            $params['aibody'][$name] = Shop::get( $name )->getBody();
        }
        $params['aiheader']['swordbros/page'] = Shop::get( 'swordbros/pages' )->getHeader($page);
        $params['aibody']['swordbros/page'] = Shop::get( 'swordbros/pages' )->getBody($page);
        
        return \View::make($page_type, $params);
    }
}
