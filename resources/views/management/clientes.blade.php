<?php

$inputs = [
    ['type' => 'text', 'name' => 'nombre', 'placeholder' => 'Nombre', 'required' => true],
    ['type' => 'text', 'name' => 'correo', 'placeholder' => 'Correo', 'required' => true],
    ['type' => 'text', 'name' => 'telefono', 'placeholder' => 'Telefono', 'required' => true],
    ['type' => 'text', 'name' => 'direccion', 'placeholder' => 'Direccion', 'required' => true],
    ['type' => 'text', 'name' => 'ciudad', 'placeholder' => 'Ciudad', 'required' => true],
    ['type' => 'text', 'name' => 'pais', 'placeholder' => 'Pais', 'required' => true],
];

$columnas = [
    ['text' => 'ID'],
    ['text' => 'Nombre'],
    ['text' => 'Correo'],
    ['text' => 'Telefono'],
    ['text' => 'Direccion'],
    ['text' => 'Ciudad'],
    ['text' => 'Pais'],
    ['text' => '']
];

?>

<x-management title="Clientes">
    <x-tabla
        titulo="Clientes" :columnas="$columnas" :filas="json_decode($clientes)"
        :inputs="$inputs"
        tituloModal="Crear Cliente"
        tabla="clientes"
        destroy="clientes-destroy"
    />
</x-management>
