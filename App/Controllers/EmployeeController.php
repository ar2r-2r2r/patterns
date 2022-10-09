<?php

namespace App\Controllers;

use App\Models\Employee;
use App\Models\EmployeeModel;
use \Core\View;
use \Core\MysqlQueryBuilder;

class EmployeeController extends \Core\Controller

{
    
    
    public function __construct()
    {
        $this->employee=new EmployeeModel();
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function addAction()
    {
        if (isset($_GET['firstName'])) { //если были переданы данные, то заносим их в бд
    
            $firstName = htmlspecialchars($_GET['firstName']);
            $lastName = htmlspecialchars($_GET['lastName']);
            $dob = htmlspecialchars($_GET['dob']);
            $salary = htmlspecialchars($_GET['salary']);
            $this->employee->insertAll($firstName, $lastName, $dob, $salary); //отправляем данные в бд
            header('Location: ../public/index.php');
        } else { //если данные ещё не были переданы, то загружаем рендер страницы
            View::render('Add/Add.php');
        }
    }
    public function editAction()
    {

        if (isset($_GET['firstName'])) { //если были переданы данные, то заносим их в бд
            $firstName = htmlspecialchars($_GET['firstName']);
            $lastName = htmlspecialchars($_GET['lastName']);
            $dob = htmlspecialchars($_GET['dob']);
            $salary = htmlspecialchars($_GET['salary']);
            $id = htmlspecialchars($_GET['id']);
            $this->employee->edit($id, $firstName, $lastName, $dob, $salary); //отправляем данные в бд
            header('Location: ../public/index.php');
        } else { //если данные ещё не были переданы, то загружаем рендер страницы
            $id = $_GET['id'];
            View::render('Edit/Edit.php', [
                'id' => $id,
            ]);
        }

    }
    public function deleteAction()
    {

        if (isset($_GET['id'])) { //если были переданы данные, то заносим их в бд

            $this->employee->delete((htmlspecialchars($_GET['id'])), new MysqlQueryBuilder()); //отправляем данные в бд
            header('Location: ../public/index.php');
        }

    }
    public function homeAction()
    {
        View::render('Home/index.php', [
            'result' => $this->employee->selectAll(new MysqlQueryBuilder()),
        ]);
    }

    public function sortAscByFNAction()
    {
        View::render('Home/index.php', [
            'result' => $this->employee->sortAscByFN(),
        ]);
    }
    public function sortDescByFNAction()
    {
        View::render('Home/index.php', [
            'result' => $this->employee->sortDescByFN(),
        ]);
    }
    public function sortAscByLNAction()
    {
        View::render('Home/index.php', [
            'result' => $this->employee->sortAscByLN(),
        ]);
    }
    public function sortDescByLNAction()
    {
        View::render('Home/index.php', [
            'result' => $this->employee->sortDescByLN(),
        ]);
    }
    public function sortAscByDOBAction()
    {
        View::render('Home/index.php', [
            'result' => $this->employee->sortAscByDOB(),
        ]);
    }
    public function sortDescByDOBAction()
    {
        View::render('Home/index.php', [
            'result' => $this->employee->sortDescByDOB(),
        ]);
    }
    public function sortAscBySAction()
    {
        View::render('Home/index.php', [
            'result' => $this->employee->sortAscByS(),
        ]);
    }
    public function sortDescBySAction()
    {
        View::render('Home/index.php', [
            'result' => $this->employee->sortDescByS(),
        ]);
    }
}
