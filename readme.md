# fooCart
 **This is the latest version of the fooCart application and it is currently under development. The old, stable version is now located in the legacy branch.**
 
 fooCart is a Laravel 5.2 eCommerce application with integrated Stripe payments. 
 
 The goal of this project was to create a fully functional e-commerce application.
 
 The following features were required for this project:
 
  - Fully functional administration panel
  - Slideshow management module
  - Inventory management module
  - User management module
  - Order management module
  - Payment processing using the Stripe API.
  - Message management module
  - On the fly image manipulation using ImageMagick
  - Client side rendering of inventory using Handlebars JS
  
  **Note** 
  All models are located in /app/src
 
 **View Demo**
 
 [http://foocart.demos.justinc.me](http://foocart.demos.justinc.me)

 [http://foocart.demos.justinc.me/admin](http://foocart.demos.justinc.me/admin)
 
 **Username:** demo.user@justinc.me
 
 **Password:** demo123
 
 

## Requirements
 - This application requires the Composer Dependency Manager, located at [getcomposer.org](https://getcomposer.org/)
 - This application requires a Stripe account with API keys.
 - This application is configured to use the Mandrill email API and requires a Mandrill account. 

## Installation

 Clone the repository
 
    git clone https://github.com/justincdotme/foocart.git

 Install the application using Composer
 
    composer install
    
 Set your Stripe API keys in config/stripe.php
 
    return [
        'secret_key' => env('SECRET_KEY', 'secret key here'),
        'publishable_key' => env('PUBLISHABLE_KEY', 'publishable key here'),
    ];
    
 Set the URL to the app in config/app.php
 
    'url' => 'http://url.to.your.application',
    
 Add your Mandril API information to config/mail.php
 
    'driver' => 'smtp',
    'host' => 'smtp.mandrillapp.com',
    'port' => 587,
    'from' => ['address' => 'no-reply@your-server.com', 'name' => 'Name'],
    'username' => 'Mandrill username',
    'password' => 'Mandrill key',
 
 Optional: Run `php artisan ide-helper:generate`
 
 
 **IMPORTANT NOTICE**
 
 This application is a portfolio project and is not intended to be used in a production capacity. 
 The application has been developed with security in mind but **I offer no gaurantee that it is safe for use in a live environment**. 
 There are several (much better) e-commerce solutions available that are both security tested and widely supported. I would highly recommend that you use one of those for a live environment. 
 With that said, you are free to use this application however you see fit. Please review the MIT License at the bottom.

## Credits

 - [CropPic](http://www.croppic.net) for free use of the CropPic plugin.
 - All product images are courtesy of [FreeDigitalPhotos.net](FreeDigitalPhotos.net).

## License

 The MIT License (MIT)
 
 Copyright (c) 2015 Justin Christenson
 
 Permission is hereby granted, free of charge, to any person obtaining a copy
 of this software and associated documentation files (the "Software"), to deal
 in the Software without restriction, including without limitation the rights
 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the Software is
 furnished to do so, subject to the following conditions:
 
 The above copyright notice and this permission notice shall be included in
 all copies or substantial portions of the Software.
 
 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 THE SOFTWARE.
