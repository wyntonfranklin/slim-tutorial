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
    protected $db;
    protected $app;
    protected $flash;
    private $data=array();

    public function __construct(\Slim\Views\Twig $view, PDO $db, \Slim\Flash\Messages $flash)
    {
       $this->view = $view;
       $this->db = $db;
       $this->flash = $flash;
    }

    public function home($request, $response, $args)
    {
        $todo = new ToDo();
        $this->defaultData();
        $this->addData("todos", $this->getTasks());
        $this->addData("successMessage",$this->getFlashMessage("success")[0]);
        $this->view->render($response,'main.twig',$this->getData());
        return $response;
    }

    public function login($request, $response, $args)
    {
        $this->addData("pageTitle","Login to Slim Todo");
        $data = $this->getData();
        $this->view->render($response,'login.twig',$data);
        return $response;
    }

    public function authenticateUser($request, $response, $args)
    {
        if($request->isPost()){
            $allPostPutVars = $request->getParsedBody();
           // return $response->withRedirect('/',301);
            var_dump($allPostPutVars);
        }
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
            $postValues = $request->getParsedBody();
            $name = $postValues["task"];
            $details = $postValues["details"];
            $author = $postValues["author"];
            $this->createTask($name, $details, $author);
            $this->addFlashMessage("success","Task Created");
            return $response->withRedirect('/',301);
        }
    }

    public function edit($request, $response, $args)
    {
        $this->addData("pageTitle","Slim Todo - Edit Task");
        $task = $this->getTask($args['id']);
        $this->addData("todo", $task);
        $this->addData("successMessage",$this->getFlashMessage("success")[0]);
        $this->view->render($response,'edit.twig', $this->getData());
        return $response;
    }

    public function update($request, $response, $args)
    {
        if($request->isPost()) {
            $postValues = $request->getParsedBody();
            $name = $postValues["task"];
            $details = $postValues["details"];
            $author = $postValues["author"];
            $this->updateTask($name, $details,$author, $args["id"]);
            $this->addFlashMessage("success","Task Updated");
            return $response->withRedirect("/edit/{$args['id']}",301);
        }

    }

    public function view($request, $response, $args)
    {
        $this->addData("pageTitle","Slim Todo - View Task");
        $task = $this->getTask($args['id']);
        $this->addData("todo", $task);
        $this->view->render($response,'view.twig',$this->getData());
        return $response;
    }

    public function quickAdd($request, $response, $args)
    {
        if($request->isPost() && $request->isXhr()) {
            $body = $request->getParsedBody();
            if(isset($body["task"])){
                $this->createTask($body["task"],$body["task"],"");
            }
        }else{
            return $response->write("You Shouldn't be here");
        }
    }

    public function delete($request, $response, $args)
    {
        if($request->isPost() && $request->isXhr()) {
            $body = $request->getParsedBody();
            if(isset($body["taskId"])){
                $this->deleteTask($body["taskId"]);
            }
        }
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

    private function getTasks()
    {
        $query = $this->db->query('SELECT * FROM slim_tasks');
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $tasks = array();
        foreach ($results as $row){
            $tdo = new ToDo();
            $tasks[] = $tdo->create($row);
        }
        return $tasks;
    }

    private function getTask($id)
    {
        $query = $this->db->query('SELECT * FROM slim_tasks WHERE task_id='.$id);
        $query->execute();
        $result = $query->fetch();
        $task = new ToDo();
        return $task->create($result);
    }

    private function createTask($name, $details, $author)
    {
        $query= $this->db->prepare("INSERT INTO slim_tasks(name, details, author)
          VALUES(:name, :details, :author)");
        $query->execute([
           "name" => $name,
           "details" => $details,
           "author" => $author
        ]);
    }

    private function updateTask( $name, $details, $author, $id )
    {
        $query= $this->db->prepare("UPDATE slim_tasks SET `name`=:name,
            `details`=:details, `author`=:author WHERE task_id=". $id);
        $query->execute([
            "name" => $name,
            "details" => $details,
            "author" => $author,
        ]);
    }

    private function deleteTask($id)
    {
        $query = $this->db->prepare("DELETE FROM slim_tasks WHERE task_id=:id");
        $query->execute([
            "id" => $id,
        ]);
    }

    private function addFlashMessage($key, $message)
    {
        $this->flash->addMessage($key, $message);
    }

    private function getFlashMessage($key)
    {
        return $this->flash->getMessage($key);
    }

}