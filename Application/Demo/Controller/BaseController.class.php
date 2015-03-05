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

        if ($this->is_mobile()) {
            $this->assign("client",1);
        }else{
            $this->assign("client",0);
        }


    }


    private function is_mobile() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $mobile_agents = Array(
            "iPhone", "240x320", "acer", "acoon", "acs-", "abacho", "ahong", "airness", "alcatel", "amoi", "android",
            "anywhereyougo.com", "applewebkit/525", "applewebkit/532", "asus", "audio", "au-mic", "avantogo", "becker",
            "benq", "bilbo", "bird", "blackberry", "blazer", "bleu", "cdm-", "compal", "coolpad", "danger", "dbtel",
            "dopod", "elaine", "eric", "etouch", "fly ", "fly_", "fly-", "go.web", "goodaccess", "gradiente", "grundig",
            "haier", "hedy", "hitachi", "htc", "huawei", "hutchison", "inno", "ipad", "ipaq", "ipod", "jbrowser",
            "kddi", "kgt", "kwc", "lenovo", "lg ", "lg2", "lg3", "lg4", "lg5", "lg7", "lg8", "lg9", "lg-", "lge-",
            "lge9", "longcos", "maemo", "mercator", "meridian", "micromax", "midp", "mini", "mitsu", "mmm", "mmp",
            "mobi", "mot-", "moto", "nec-", "netfront", "newgen", "nexian", "nf-browser", "nintendo", "nitro", "nokia",
            "nook", "novarra", "obigo", "palm", "panasonic", "pantech", "philips", "phone", "pg-", "playstation",
            "pocket", "pt-", "qc-", "qtek", "rover", "sagem", "sama", "samu", "sanyo", "samsung", "sch-", "scooter",
            "sec-", "sendo", "sgh-", "sharp", "siemens", "sie-", "softbank", "sony", "spice", "sprint", "spv",
            "symbian", "tablet", "talkabout", "tcl-", "teleca", "telit", "tianyu", "tim-", "toshiba", "tsm",
            "up.browser", "utec", "utstar", "verykool", "virgin", "vk-", "voda", "voxtel", "vx", "wap", "wellco",
            "wig browser", "wii", "windows ce", "wireless", "xda", "xde", "zte"
        );
        $is_mobile     = false;
        foreach ($mobile_agents as $device) {
            if (stristr($user_agent, $device)) {
                $is_mobile = true;
                break;
            }
        }
        return $is_mobile;
    }

} 