<?php

namespace App\Config;

class Router{
    public static function configRouters(\Framework\Router\Routing $router) {
        
        //base Url
        $router->setBaseUrl(Config::$BASE_URL);
        
        //404
        $router->setPage404(function(){echo "Page 404";});
        
        //routers
        $router->get('/', \App\Controlers\Home::class, "home");
        $router->get('/about', \App\Controlers\About::class, "about");
        $router->get('/contact', \App\Controlers\Contact::class, "contact");
        $router->get('/banner', \App\Controlers\Admin\BannerControler::class, "showBanner");
        
        //routers - admin news
        $router->get('/admin/news/create', \App\Controlers\Admin\NewsControler::class, "create");
        $router->post('/admin/news/create/save', \App\Controlers\Admin\NewsControler::class, "saveNew");
        
        //routers - admin register
        $router->get('/register', \App\Controlers\Admin\RegisterControler::class, "register");
        $router->post('/register_confirm', \App\Controlers\Admin\RegisterControler::class, "saveRegister");
        
        //routers - admin products
        $router->get('/admin/products/list-products', \App\Controlers\Admin\ProductsControler::class, "listProducts");
        $router->get('/admin/products/create', \App\Controlers\Admin\ProductsControler::class, "create");
        $router->post('/admin/products/create/save', \App\Controlers\Admin\ProductsControler::class, "saveCreate");
        $router->get('/admin/products/delete', \App\Controlers\Admin\ProductsControler::class, "delete");
        $router->get('/admin/products/edit', \App\Controlers\Admin\ProductsControler::class, "edit");
        $router->post('/admin/products/edit/save', \App\Controlers\Admin\ProductsControler::class, "saveEdit");
        
        //routers - admin banner
        $router->get('/admin/banner', \App\Controlers\Admin\BannerControler::class, "listBanner");
        $router->get('/admin/banner/create-form', \App\Controlers\Admin\BannerControler::class, "createForm");
        $router->post('/admin/banner/save-new-banner', \App\Controlers\Admin\BannerControler::class, "saveBanner");
        $router->get('/admin/banner/delete', \App\Controlers\Admin\BannerControler::class, "delete");
        $router->get('/admin/banner/edit-form', \App\Controlers\Admin\BannerControler::class, "editForm");
        $router->post('/admin/banner/save-edit', \App\Controlers\Admin\BannerControler::class, "saveEditBanner");
    }
    
    
}