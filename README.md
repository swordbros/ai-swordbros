# Swordbros Aimeos Extensions acquiring for PHP 
[![License](https://poser.pugx.org/swordbros/omnipay-sberbank/license)](//packagist.org/packages/swordbros/omnipay-sberbank)
# Introduction

This package supports PHP 7.1 and higher 

# Download

## Composer 

```
Add this line your web site composser.json 
    "require": {
        ...
        "swordbros/ai-swordbros": "^1.0.1"
    },
```

## Solving problems with minimal stability

Add to your composer.json

```
    "autoload": {
        "classmap": [
            ...
            "ext/ai-swordbros/admin/jqadm/src",
            "ext/ai-swordbros/lib/custom/src",
            "ext/ai-swordbros/client/html/src",
            "ext/ai-swordbros/controller/frontend/src",
            "ext/ai-swordbros/helper"
        ]
    },
    "scripts": {
        "post-update-cmd": [
            ...
            "@php artisan migrate --path=ext/ai-swordbros/lib/custom/setup/swordbros",
            "@php artisan migrate --path=ext/ai-swordbros/lib/custom/setup/slider",
            "@php artisan migrate --path=ext/ai-swordbros/lib/custom/setup/review"
        ]
    }


```
# Show Slider on your web site
Add your template blade file this code. Setup include demo slider data.
```
  <?php  echo \Aimeos\Shop\Facades\Shop::get('swordbros/slider')->getBody() ?>
```
## Standart Slider
![Slider Standard](https://tulparstudyo.net/images/slider-standart.png)
## Cover Flow Slider
![Slider Cover Flow](https://tulparstudyo.net/images/slider-cover-flow.png)
## Slider Admin Panel
![Slider Cover Flow](https://tulparstudyo.net/images/slider-admin-panel.png)
