<?php

/**
 * 格式化print_r
 */
function var_print()
{
    $argv = func_get_args();
    $exit = end($argv);

    echo "<pre>\n";
    foreach ($argv as $i => $item) {
        print_r("\narg{$i}:\n");
        empty($item) ? var_dump($item) : print_r($item);
    }
    echo "\n<pre>\n";

    is_bool($exit) && !$exit ?: exit();
}

function get_page($pageName = "pageNum", $sizeName = "pageSize")
{
    $page = request()->input($pageName, null);
    $page = !is_numeric($page) ? 1 : $page;

    $size = request()->input($sizeName, 15);
    $size = !is_numeric($size) ? 15 : $size;

    return [$page, $size];
}

/**
 * 英语单词转复数
 * @param $word
 * @return bool|string|string[]|null
 */
function pluralize($word)
{
    $plural = array(
        '/(quiz)$/i' => '1zes',
        '/^(ox)$/i' => '1en',
        '/([m|l])ouse$/i' => '1ice',
        '/(matr|vert|ind)ix|ex$/i' => '1ices',
        '/(x|ch|ss|sh)$/i' => '1es',
        '/([^aeiouy]|qu)ies$/i' => '1y',
        '/([^aeiouy]|qu)y$/i' => '1ies',
        '/(hive)$/i' => '1s',
        '/(?:([^f])fe|([lr])f)$/i' => '12ves',
        '/sis$/i' => 'ses',
        '/([ti])um$/i' => '1a',
        '/(buffal|tomat)o$/i' => '1oes',
        '/(bu)s$/i' => '1ses',
        '/(alias|status)/i' => '1es',
        '/(octop|vir)us$/i' => '1i',
        '/(ax|test)is$/i' => '1es',
        '/s$/i' => 's',
        '/$/' => 's');

    $uncountable = array('equipment', 'information', 'rice', 'money', 'species', 'series', 'fish', 'sheep');

    $irregular = array(
        'person' => 'people',
        'man' => 'men',
        'child' => 'children',
        'sex' => 'sexes',
        'move' => 'moves');

    $lowercased_word = strtolower($word);

    foreach ($uncountable as $_uncountable) {
        if (substr($lowercased_word, (-1 * strlen($_uncountable))) == $_uncountable) {
            return $word;
        }
    }

    foreach ($irregular as $_plural => $_singular) {
        if (preg_match('/(' . $_plural . ')$/i', $word, $arr)) {
            return preg_replace('/(' . $_plural . ')$/i', substr($arr[0], 0, 1) . substr($_singular, 1), $word);
        }
    }

    foreach ($plural as $rule => $replacement) {
        if (preg_match($rule, $word)) {
            return preg_replace($rule, $replacement, $word);
        }
    }
    return false;

}

/**
 * 英语单词复数转单数
 * @param $word
 * @return string|string[]|null
 */
function singular($word)
{
    $singular = array(
        '/(quiz)zes$/i' => '\1',
        '/(matr)ices$/i' => '\1ix',
        '/(vert|ind)ices$/i' => '\1ex',
        '/^(ox)en/i' => '\1',
        '/(alias|status)es$/i' => '\1',
        '/([octop|vir])i$/i' => '\1us',
        '/(cris|ax|test)es$/i' => '\1is',
        '/(shoe)s$/i' => '\1',
        '/(o)es$/i' => '\1',
        '/(bus)es$/i' => '\1',
        '/([m|l])ice$/i' => '\1ouse',
        '/(x|ch|ss|sh)es$/i' => '\1',
        '/(m)ovies$/i' => '\1ovie',
        '/(s)eries$/i' => '\1eries',
        '/([^aeiouy]|qu)ies$/i' => '\1y',
        '/([lr])ves$/i' => '\1f',
        '/(tive)s$/i' => '\1',
        '/(hive)s$/i' => '\1',
        '/([^f])ves$/i' => '\1fe',
        '/(^analy)ses$/i' => '\1sis',
        '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\1\2sis',
        '/([ti])a$/i' => '\1um',
        '/(n)ews$/i' => '\1ews',
        '/s$/i' => '',
    );

    $uncountable = array('equipment', 'information', 'rice', 'money', 'species', 'series', 'fish', 'sheep');

    $irregular = array(
        'person' => 'people',
        'man' => 'men',
        'child' => 'children',
        'sex' => 'sexes',
        'move' => 'moves',
        'goods' => 'goods',
    );

    $lowercased_word = strtolower($word);
    foreach ($uncountable as $_uncountable) {
        if (substr($lowercased_word, (-1 * strlen($_uncountable))) == $_uncountable) {
            return $word;
        }
    }

    foreach ($irregular as $_plural => $_singular) {
        if (preg_match('/(' . $_singular . ')$/i', $word, $arr)) {
            return preg_replace('/(' . $_singular . ')$/i', substr($arr[0], 0, 1) . substr($_plural, 1), $word);
        }
    }

    foreach ($singular as $rule => $replacement) {
        if (preg_match($rule, $word)) {
            return preg_replace($rule, $replacement, $word);
        }
    }

    return $word;
}

/**
 * 获取客户端ip
 */
function getClientIp()
{
    static $realip = NULL;
    if ($realip !== NULL) {
        return $realip;
    }
    if (isset($_SERVER)) {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($arr AS $ip) {
                $ip = trim($ip);
                if ($ip != 'unknown') {
                    $realip = $ip;
                    break;
                }
            }
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $realip = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            if (isset($_SERVER['REMOTE_ADDR'])) {
                $realip = $_SERVER['REMOTE_ADDR'];
            } else {
                $realip = '0.0.0.0';
            }
        }
    } else {
        if (getenv('HTTP_X_FORWARDED_FOR')) {
            $realip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_CLIENT_IP')) {
            $realip = getenv('HTTP_CLIENT_IP');
        } else {
            $realip = getenv('REMOTE_ADDR');
        }
    }
    preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
    $realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
    return isIp($realip) ? $realip : '0.0.0.0';
}

/**
 * 获取客户端手机型号
 * @param $agent //$_SERVER['HTTP_USER_AGENT']
 * @return array[mobile]            手机品牌
 * @return array[mobile_ver]        手机型号
 */
function getClientMobile($agent = '')
{
    if (preg_match('/iPhone\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '苹果';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/SAMSUNG|Galaxy|GT-|SCH-|SM-\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '三星';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/Huawei|Honor|H60-|H30-\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '华为';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/Mi note|mi one\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '小米';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/HM NOTE|HM201\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '红米';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/Coolpad|8190Q|5910\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '酷派';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/ZTE|X9180|N9180|U9180\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '中兴';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/OPPO|X9007|X907|X909|R831S|R827T|R821T|R811|R2017\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = 'OPPO';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/HTC|Desire\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = 'HTC';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/Nubia|NX50|NX40\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '努比亚';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/M045|M032|M355\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '魅族';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/Gionee|GN\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '金立';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/HS-U|HS-E\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '海信';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/Lenove\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '联想';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/ONEPLUS\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '一加';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/vivo\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = 'vivo';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/K-Touch\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '天语';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/DOOV\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '朵唯';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/GFIVE\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '基伍';
        $mobile_ver = $regs[0];
    } elseif (preg_match('/Nokia\s([^\s|;]+)/i', $agent, $regs)) {
        $mobile_brand = '诺基亚';
        $mobile_ver = $regs[0];
    } else {
        $mobile_brand = '其他';
        $mobile_ver = '';
    }
    return ['mobile' => $mobile_brand, 'mobile_ver' => $mobile_ver];
}

/**
 * 获取客户端浏览器以及版本号
 * @param $agent //$_SERVER['HTTP_USER_AGENT']
 * @return array[browser]       浏览器名称
 * @return array[browser_ver]   浏览器版本号
 */
function getClientBrowser($agent = '')
{
    $browser = '';
    $browser_ver = '';
    if (preg_match('/OmniWeb\/(v*)([^\s|;]+)/i', $agent, $regs)) {
        $browser = 'OmniWeb';
        $browser_ver = $regs[2];
    }
    if (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $browser = 'Netscape';
        $browser_ver = $regs[2];
    }
    if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
        $browser = 'Safari';
        $browser_ver = $regs[1];
    }
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $browser = 'Internet Explorer';
        $browser_ver = $regs[1];
    }
    if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $browser = 'Opera';
        $browser_ver = $regs[1];
    }
    if (preg_match('/NetCaptor\s([^\s|;]+)/i', $agent, $regs)) {
        $browser = '(Internet Explorer ' . $browser_ver . ') NetCaptor';
        $browser_ver = $regs[1];
    }
    if (preg_match('/Maxthon/i', $agent, $regs)) {
        $browser = '(Internet Explorer ' . $browser_ver . ') Maxthon';
        $browser_ver = '';
    }
    if (preg_match('/360SE/i', $agent, $regs)) {
        $browser = '(Internet Explorer ' . $browser_ver . ') 360SE';
        $browser_ver = '';
    }
    if (preg_match('/SE 2.x/i', $agent, $regs)) {
        $browser = '(Internet Explorer ' . $browser_ver . ') 搜狗';
        $browser_ver = '';
    }
    if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
        $browser = 'FireFox';
        $browser_ver = $regs[1];
    }
    if (preg_match('/Lynx\/([^\s]+)/i', $agent, $regs)) {
        $browser = 'Lynx';
        $browser_ver = $regs[1];
    }
    if (preg_match('/Chrome\/([^\s]+)/i', $agent, $regs)) {
        $browser = 'Chrome';
        $browser_ver = $regs[1];
    }
    if (preg_match('/MicroMessenger\/([^\s]+)/i', $agent, $regs)) {
        $browser = '微信浏览器';
        $browser_ver = $regs[1];
    }
    if ($browser != '') {
        return ['browser' => $browser, 'browser_ver' => $browser_ver];
    } else {
        return ['browser' => '未知', 'browser_ver' => ''];
    }
}

/**
 * 检查是否是合法的IP
 */
function isIp($ip)
{
    if (preg_match('/^((\d|[1-9]\d|2[0-4]\d|25[0-5]|1\d\d)(?:\.(\d|[1-9]\d|2[0-4]\d|25[0-5]|1\d\d)){3})$/', $ip)) {
        return true;
    } else {
        return false;
    }
}

/**
 * 验证手机号
 */
function checkMobile($mobile)
{
    return preg_match('/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/i', $mobile);
}

/**
 * @param $list
 * @param string $primaryKey
 * @param string $parentKey
 * @param string $childStr
 * @param int $root
 * @param array $tree
 * @return array
 */
function list2tree($list, $primaryKey = 'id', $parentKey = 'pid', $childStr = 'children', $root = 0, array &$tree)
{

    if (is_array($list)) {

        //创建基于主键的数组引用
        $refer = array();

        foreach ($list as $key => $data) {
            $refer[$data[$primaryKey]] = &$list[$key];
        }

        foreach ($list as $key => $data) {

            //判断是否存在parent
            $parantId = $data[$parentKey];

            if ($root == $parantId) {


                $tree[] = &$list[$key];

            } else {

                if (isset($refer[$parantId])) {
                    $parent = &$refer[$parantId];
                    $parent[$childStr][] = &$list[$key];
                }

            }
        }
    }

    return $tree;
}

/**
 * 返回可读性更好的文件尺寸
 */
function fmtFileSize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}

/**
 * 判断文件的MIME类型是否为图片
 */
function isImage($mimeType)
{
    return starts_with($mimeType, 'image/');
}
