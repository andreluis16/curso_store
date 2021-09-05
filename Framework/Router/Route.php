<?php

namespace Framework\Router;

class Route{ 
    
    const METHOD_GET = "GET";
    const METHOD_POST = "POST";
    
    private $uri;
    private $method;
    private $class;
    private $functionName;
    
    public function __construct($uri, $method, $class, $functionName) {
        $this->uri = $uri;
        $this->method = $method;
        $this->class = $class;
        $this->functionName = $functionName;
    }

        public function getUri() {
        return $this->uri;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getClass() {
        return $this->class;
    }

    public function getFunctionName() {
        return $this->functionName;
    }

    public function setUri($uri): void {
        $this->uri = $uri;
    }

    public function setMethod($method): void {
        $this->method = $method;
    }

    public function setClass($class): void {
        $this->class = $class;
    }

    public function setFunctionName($functionName): void {
        $this->functionName = $functionName;
    }


    
    


}