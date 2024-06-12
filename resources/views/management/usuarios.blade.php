<?php

$inputs = [
    ['type' => 'text', 'name' => 'username', 'placeholder' => 'Usuario', 'required' => true],
    ['type' => 'text', 'name' => 'password', 'placeholder' => 'Contraseña', 'required' => true],
    ['type' => 'email', 'name' => 'correo', 'placeholder' => 'Correo', 'required' => true],
    ['type' => 'text', 'name' => 'rol', 'placeholder' => 'Rol', 'required' => true],
];

$columnas = [
    ['text' => 'ID'],
    ['text' => 'Usuario'],
    ['text' => 'Correo'],
    ['text' => 'email_verified_at'],
    ['text' => 'rol'],
    ['text' => '']
];

?>

<x-management title="Usuarios">
    <x-tabla
        titulo="Usuarios" :columnas="$columnas" :filas="json_decode($usuarios)"
        :inputs="$inputs"
        tituloModal="Crear Usuario"
        tabla="usuarios"
        destroy="usuarios-destroy"
    />
</x-management>
