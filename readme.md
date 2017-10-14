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
    $angular = \Domatskiy\BitrixJSPlugins::getInstance();
    #$angular->setUseOldApi(true); // for old api
    
    $angular->add(<plugin_name>, 
        array(), // js path array 
        array(), // css path array 
        );
}
```

in component_epilog.php 

```php
if(class_exists('\Domatskiy\BitrixJSPlugins'))
{
    $angular = \Domatskiy\BitrixJSPlugins::getInstance();
	$angular->init(<plugin_name>);
	
}
```
