<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/28/18
 * Time: 1:42 PM
 */

class ToDoController
{
    protected $view;
    protected $app;
    private $data=array();

    public function __construct(\Slim\Views\Twig $view)
    {
       $this->view = $view;
    }

    public function home($request, $response, $args)
    {
        $todo = new ToDo();
        $this->defaultData();
        $this->addData("todos", $this->createSampleTasks());
        $data = $this->getData();
        $this->view->render($response,'main.twig',$data);
        return $response;
    }

    public function login($request, $response, $args)
    {
        $this->addData("pageTitle","Login to Slim Todo");
        $data = $this->getData();
        $this->view->render($response,'login.twig',$data);
        return $response;
    }

    public function create($request, $response, $args)
    {
        $this->addData("pageTitle","Slim Todo - Create Task");
        $data = $this->getData();
        $this->view->render($response,'create.twig',$data);
        return $response;
    }

    public function add($request, $response, $args)
    {
        if($request->isPost()){
            $allPostPutVars = $request->getParsedBody();
            return $response->withRedirect('/',301);
            //var_dump($allPostPutVars);
        }
    }

    public function edit($request, $response, $args)
    {
        $this->addData("pageTitle","Slim Todo - Edit Task");
        $this->addData("id", $args['id']);
        $data = $this->getData();
        $this->view->render($response,'edit.twig',$data);
        return $response;
    }

    private function defaultData()
    {
        $this->addData("pageTitle", "Slim To Do Tutorial");
    }

    private function addData($key, $value)
    {
        $this->data[$key] = $value;
    }

    private function getData()
    {
        return $this->data;
    }

    private function createSampleTasks()
    {
        $todo1 = new ToDo("First Task #1","My first task","Wf");
        $todo2 = new ToDo("Second Task #2","My second task","tt");
        $todo3 = new ToDo("Third Task #3","My third task","kk");
        $todo4 = new ToDo("Fourth Task #4","My fourth task","ee");
        $todo5 = new ToDo("Fifth Task #5","My fifth task","cc");
        return [ $todo1, $todo2, $todo3, $todo4, $todo5 ];
    }

}