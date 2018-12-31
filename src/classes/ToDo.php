<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/28/18
 * Time: 12:49 PM
 */

class ToDo
{

    private $task;
    private $details;
    private $date;
    private $time;
    private $author;
    private $status;

    /**
     * ToDo constructor.
     */
    public function __construct($task="", $details="",$author="")
    {
        $this->task = $task;
        $this->details = $details;
        $this->author = $author;
        $this->date = date("Y-m-d");
        $this->time = date("h:i:s");
    }

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param mixed $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param mixed $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }



    public function getName(){
        return "My first Tod";
    }

}