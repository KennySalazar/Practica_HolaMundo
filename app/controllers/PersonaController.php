<?php

require_once __DIR__ . "/../models/Persona.php";

class PersonaController
{

    private $persona;

    public function __construct()
    {
        $this->persona = new Persona();
    }

    public function index()
    {

        $personas = $this->persona->all();

        require_once __DIR__ . '/../views/persona/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/persona/create.php';
    }

    public function store()
    {

        if (!isset($_POST['nombre'], $_POST['apellido'], $_POST['genero'], $_POST['email'], $_POST['password'], )) {
            die("Error, faltan datos en el formulario");
        }

        $this->persona->create([
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'genero' => $_POST['genero'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ]);
        header('Location: index.php?action=index');
        exit;
    }

    public function edit()
    {
        //Validaciones que pueden 
        if (!isset($_GET['id'])) {
            die("Error, id no proporcionado");
        }
        $id = $_GET['id'];
        $persona = $this->persona->find($id);
        if (!$persona) {
            die("Error, persona no encontrada");
        }

        //Validacion por si no encuentra la vista
        if (!file_exists(__DIR__ . '/../views/persona/edit.php')) {
            die("Error, no se encuentra la vista persona/edit.php");
        }
        require_once __DIR__ . '/../views/persona/edit.php';
    }

    public function update()
    {
        if (!isset($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['genero'], $_POST['email'])) {
            die("faltan datos en el form");
        }
        $id = $_POST['id'];
        $this->persona->update($id, [
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'genero' => $_POST['genero'],
            'email' => $_POST['email'],
            'password' => $_POST['password'] ?? ''
        ]);
        header('Location: index.php?action=index');
        exit;
    }

    public function delete()
    {
        if (!isset($_POST['id'])) {
            die("Error Id no proporcionado");
        }
        $id = $_POST['id'];
        $this->persona->delete($id);
        header('Location: index.php?action=index');
        exit;
    }


}