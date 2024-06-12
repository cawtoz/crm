<?php

$inputs = [
    ['type' => 'number', 'name' => 'id_cliente', 'placeholder' => 'Id Cliente', 'required' => true],
    ['type' => 'number', 'name' => 'id_producto', 'placeholder' => 'Id Producto', 'required' => true],
    ['type' => 'number', 'name' => 'cantidad', 'placeholder' => 'Cantidad', 'required' => true],
];

$columnas = [
    ['text' => 'ID'],
    ['text' => 'Id Cliente'],
    ['text' => 'Id Producto'],
    ['text' => 'Cantidad'],
    ['text' => ''],
];

?>

<x-management title="Ventas">
    <x-tabla
    titulo="Ventas" :columnas="$columnas" :filas="json_decode($ventas)"
    :inputs="$inputs"
    tituloModal="Crear Venta"
    tabla="ventas"
    destroy="ventas-destroy"
    />
</x-management>
