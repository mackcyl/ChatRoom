<?php
/**
 * Created by PhpStorm.
 * User: mackcyl
 * Date: 15/3/4
 * Time: 下午4:11
 */

namespace Demo\Controller;


use Think\Controller;

class BaseController extends Controller{

    public function _initialize(){
        $this->viewPath = __ROOT__."/Application/Demo"."/View/";
        $view_css_dir = $this->viewPath."css";
        $view_js_dir = $this->viewPath."js";
        $view_img_dir = $this->viewPath."image";
        $this->assign("view_css_dir",$view_css_dir);
        $this->assign("view_js_dir",$view_js_dir);
        $this->assign("view_img_dir",$view_img_dir);
    }
} 