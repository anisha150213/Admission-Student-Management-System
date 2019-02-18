<?php

/**
 * Created by PhpStorm.
 * User: anik
 * Date: 9/12/2017
 * Time: 6:17 AM
 */
class Main
{
    public $url;
    public $controllerName = "Index";
    public $methodName = "Index";
    public $controllerPath = "app/controllers/";
    public $controller;

    public function __construct()
    {
        $this->getUrl();
        $this->loadConrtroller();
        $this->callMethod();
    }

    public function getUrl(){
        $this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
        if($this->url != NULL) {
            $this->url = rtrim($this->url, '/');
            $this->url = explode("/", $this->url );
        }
        else {
            unset($this->url);
        }
    }

    public function loadConrtroller(){
        if(!isset($this->url[0])){
            require $this->controllerPath. $this->controllerName.".php";
            $this->controller = new $this->controllerName();
        }else{
            $this->controllerName = $this->url[0];
            $fileName = $this->controllerPath . $this->controllerName .".php";

            if(file_exists($fileName)){
                require $fileName;
                if(class_exists($this->controllerName)){
                    $this->controller = new $this->controllerName();
                }else{
                    header("Location: ".BASE_URL."/Index");
                }
            }else{
                header("Location: ".BASE_URL."/Index");
            }
        }
    }

    public function callMethod(){
        if(isset($this->url[2])){
            $this->methodName = $this->url[1];
            if(method_exists($this->controller, $this->methodName)){
                $this->controller->{$this->methodName}($this->url[2]);
            }else{
                header("Location: ".BASE_URL."/Index");
            }
        }else{
            if(isset($this->url[1])){
                $this->methodName = $this->url[1];
                if(method_exists($this->controller, $this->methodName)){
                    $this->controller->{$this->methodName}();
                }else{
                    header("Location: ".BASE_URL."/Index");
                }
            }else{
                if(method_exists($this->controller, $this->methodName)){
                    $this->controller->{$this->methodName}();
                }else{
                    header("Location: ".BASE_URL."/Index");

                }
            }
        }
    }
}