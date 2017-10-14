<?php

namespace Domatskiy;

/**
 * @var $APPLICATION CMain
 */

use Bitrix\Main\Page\Asset;

class BitrixJSPlugins
{
    protected $plugins = array();
    protected $use_old = false;

    /**
     * @var \Domatskiy\BitrixJSPlugins
     */
    protected static $instance;

    function __construct()
    {

    }

    /**
     * @return BitrixJSPlugins
     */
    public static function getInstance()
    {
        if(!(static::$instance instanceof \Domatskiy\BitrixJSPlugins))
            static::$instance = new static();

        return static::$instance;
    }

    public function add($name, array $arJS, array $arCss = array())
    {
        if(!$name || !is_string($name))
            throw new \Exception('not correct name');

        $this->plugins[$name] = array(
            'js' => $arJS,
            'css' => $arCss,
            );
    }

    public function setUseOldApi($use_old)
    {
        $this->use_old = $use_old;
    }

    public function init($plugin_name)
    {
        if(!array_key_exists($plugin_name, $this->plugins))
            throw new \Exception('plugin not forund');

        $plugin = $this->plugins[$plugin_name];
        $js = $plugin['js'];
        $css = $plugin['css'];

        if($this->use_old)
        {
            global $APPLICATION;

            if($js)
            {
                foreach ($js as $path)
                    $APPLICATION->AddHeadScript($path);
            }

            if($css)
            {
                foreach ($css as $path)
                    $APPLICATION->SetAdditionalCSS($path);

            }
        }
        else
        {
            $asset = Asset::getInstance();

            if($js)
            {
                foreach ($js as $path)
                    $asset->addJs($path);
            }

            if($css)
            {
                foreach ($css as $path)
                    $asset->addCss($path);
            }

        }


    }
}