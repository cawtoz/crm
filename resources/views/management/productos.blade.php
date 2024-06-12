<?php

$inputs = [
    ['type' => 'text', 'name' => 'nombre', 'placeholder' => 'Nombre', 'required' => true],
    ['type' => 'text', 'name' => 'descripcion', 'placeholder' => 'Descripción', 'required' => true],
    ['type' => 'number', 'name' => 'precio', 'placeholder' => 'Precio', 'required' => true],
    ['type' => 'text', 'name' => 'color', 'placeholder' => 'Color', 'required' => true],
    ['type' => 'text', 'name' => 'talla', 'placeholder' => 'Talla', 'required' => true],
    ['type' => 'text', 'name' => 'material', 'placeholder' => 'Material', 'required' => true],
];

$columnas = [
    ['text' => 'ID'],
    ['text' => 'Nombre'],
    ['text' => 'Descripción'],
    ['text' => 'Precio'],
    ['text' => 'Color'],
    ['text' => 'Talla'],
    ['text' => 'Material'],
    ['text' => '']
];

?>

<x-management title="Productos">
    <x-tabla
        titulo="Productos" :columnas="$columnas" :filas="json_decode($productos)"
        :inputs="$inputs"
        tituloModal="Crear Producto"
        tabla="productos"
        destroy="productos-destroy"
    />
</x-management>
