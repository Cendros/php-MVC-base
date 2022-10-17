<?php

namespace app\controller;

use App\model\Example;
use App\router\{Request, Response};
use App\view\View;
use \Exception;

class ExampleController
{
    protected $request;
    protected $response;
    protected $auth;
    protected $view;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function getView()
    {
        return $this->view;
    }

    public function execute($action)
    {
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            throw new Exception("Action {$action} non trouvée");
        }
    }

    public function defaultAction()
    {
        return $this->data();
    }

    public function data()
    {
        $example = new Example();
        $this->view = new View('templates/example.php');
        $this->view->setPart('title', "Example");
        $content['data'] = $example->getData();
        $this->view->setPart('content', $content);
    }
}