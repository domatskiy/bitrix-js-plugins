# bitrix-angular

## install 

```
composer require domatskiy/bitrix-js-plugins
```
## use

in php_interface/init.php

```php
if(class_exists('\Domatskiy\BitrixJSPlugins'))
{
    $CBitrixJSPlugins = \Domatskiy\BitrixJSPlugins::getInstance();
    #$CBitrixJSPlugins->setUseOldApi(true); // for old api
    
    $CBitrixJSPlugins->add(<plugin_name>, 
        array(), // js path array 
        array(), // css path array 
        );
}
```

in component_epilog.php 

```php
if(class_exists('\Domatskiy\BitrixJSPlugins'))
{
    $CBitrixJSPlugins = \Domatskiy\BitrixJSPlugins::getInstance();
	$CBitrixJSPlugins->init(<plugin_name>);
}
```
