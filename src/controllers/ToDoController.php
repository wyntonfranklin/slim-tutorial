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

    public function __construct(\Slim\Views\Twig $view) {
       $this->view = $view;
    }
    public function home($request, $response, $args) {
        // your code here
        // use $this->view to render the HTML
        //$response->getBody()-
        $todo = new ToDo();
        $data = [
            "todo"=> $todo,
            "status" => "heelow word" ,
        ];
        $this->view->render($response,'home.twig',$data);
        return $response;
    }

}