<?php
echo "Hola generador XML";
CrearXML();

function CrearXML(){
    $documento=new DOMDocument('1.0');
    $documento->formatOutput=true;
    $raiz=$documento->createElement("ALUMNOS");
    $raiz=$documento->appendChild($raiz);

    $alumno=$documento->createElement("Alumno");
    $alumno=$raiz->appendChild($alumno);

    $id=$documento->createElement("Id");
    $id=$alumno->appendChild($id);
    $textId=$documento->createTextNode(1);
    $textId=$id->appendChild($textId);

    $nombre=$documento->createElement("Nombre");
    $nombre=$alumno->appendChild($nombre);
    $textNombre=$documento->createTextNode("Bartolome");
    $textNombre=$nombre->appendChild($textNombre);

    $direccion=$documento->createElement("Direccion");
    $direccion=$alumno->appendChild($direccion);

    $calle=$documento->createElement("Calle");
    $calle=$direccion->appendChild($calle);
    $textCalle=$documento->createTextNode("Central");
    $textCalle=$calle->appendChild($textCalle);
    $colonia=$documento->createElement("Colonia");
    $colonia=$direccion->appendChild($colonia);
    $textColonia=$documento->createTextNode("Teran");
    $textColonia=$colonia->appendChild($textColonia);
    echo 'generar'. $documento->save("/Users/repto/Downloads/misalumnos.xml").'bytes <br>';
}
?>