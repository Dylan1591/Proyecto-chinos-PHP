<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Lista de Artistas </h1>
    <table>
        <thead>
            <tr>
                <th>Artista(Grupo)</th>
                <th>Albumes </th>
            </tr>
        </thead>
        <tbody>
            @foreach($artistas as $artista)
            <!-- Aqui muestro cada artista -->
                <tr>
                    <td>{{  $artista->Name     }}</td>
                    <td>
                        <ul>
                            @foreach($artista->albumes()->get()  as $album  )
                            <li> {{  $album->Title    }}    </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>    

            @endforeach
        </tbody>
    </table>

</body>
</html>