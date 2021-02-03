<?php

namespace Filip785\MVC\Controllers;

abstract class BaseController
{
    private array $viewVars;
    private string $controllerName;
    private string $actionName;
    private string $baseDir;

    public function __construct($className, $actionName)
    {
        $this->viewVars = [];
        $this->controllerName = str_replace('Controller', '', $className);
        $this->actionName = $actionName;
        $this->baseDir = dirname(__DIR__);
    }

    private function generateBaseHTML(string $viewPath)
    {
        ob_start();

        extract($this->viewVars);
        require($this->baseDir . '../Views/base.template.php');

        return ob_get_clean();
    }

    protected function setViewVar(string $varName, $varVal)
    {
        $this->viewVars[$varName] = $varVal;
    }

    protected function render()
    {
        // build path of child view based on controller and action name
        $viewPath = $this->baseDir . "/Views/" . $this->controllerName . '/' . $this->actionName . '.php';

        // load html of $viewPath
        ob_start();
        extract($this->viewVars);
        require($viewPath);
        $childViewHtml = ob_get_clean();

        // set view to render inside of base.template.php
        $this->setViewVar('view', $childViewHtml);

        // output complete html
        echo $this->generateBaseHTML($viewPath);
    }

    protected function redirect($path)
    {
        header("Location: $path");
    }

    protected function setError($key, $value)
    {
        session_start();

        if (!isset($_SESSION['errors'])) {
            $_SESSION['errors'] = [];
        }

        $_SESSION['errors'][$key] = $value;
    }

    protected function setErrors($errors)
    {
        session_start();

        $_SESSION['errors'] = $errors;
    }

    protected function setValues($values)
    {
        $_SESSION['values'] = $values;
    }

    protected function hasValues()
    {
        return isset($_SESSION['values']);
    }

    protected function getValues()
    {
        return $_SESSION['values'];
    }

    protected function hasErrors()
    {
        if (session_id() === '') {
            session_start();
        }

        return isset($_SESSION['errors']);
    }

    protected function getErrors()
    {
        $errors = $_SESSION['errors'];
        session_destroy();

        return $errors;
    }
}
