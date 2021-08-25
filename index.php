<?php
echo "Hola generador XML";
echo '<br>';
CrearXML();

function CrearXML(){
    $documento=new DOMDocument('1.0');
    $documento->formatOutput=true;
    $raiz=$documento->createElement("ALUMNOS");
    $raiz=$documento->appendChild($raiz);
    $mysqlConexion=new mysqli("localhost","root","","agencia");
    $sqlConsulta="Select * from alumnos";
    $resultado=$mysqlConexion->query($sqlConsulta);
    while($row=$resultado->fetch_assoc())
    {
        $alumno=$documento->createElement("Alumno");
        $alumno=$raiz->appendChild($alumno);

        $id=$documento->createElement("Id");
        $id=$alumno->appendChild($id);
        $textId=$documento->createTextNode($row["Id"]);
        $textId=$id->appendChild($textId);

        $nombre=$documento->createElement("Nombre");
        $nombre=$alumno->appendChild($nombre);
        $textNombre=$documento->createTextNode($row["Nombre"]);
        $textNombre=$nombre->appendChild($textNombre);

        $direccion=$documento->createElement("Direccion");
        $direccion=$alumno->appendChild($direccion);

        $colonia=$documento->createElement("Colonia");
        $colonia=$direccion->appendChild($colonia);
        $textColonia=$documento->createTextNode($row["Colonia"]);
        $textColonia=$colonia->appendChild($textColonia);

        $numero=$documento->createElement("Numero");
        $numero=$direccion->appendChild($numero);
        $textNumero=$documento->createTextNode($row["Numero"]);
        $textNumero=$numero->appendChild($textNumero);
    }
    echo 'Se generó archivo de '. $documento->save("/Users/repto/Downloads/misalumnos.xml").'bytes <br>';
}
?>