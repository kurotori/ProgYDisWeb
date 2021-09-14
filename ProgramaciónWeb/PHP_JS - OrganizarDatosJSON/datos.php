<?php
    
    /**
     * Este archivo contiene colecciones de datos y funciones para generar
     * conjuntos de registros al azar.
     */

    function GenerarNombre(){
        return array_rand( $GLOBALS['nombres'], 1 );
    }

    function GenerarApellido(){
        return array_rand( $GLOBALS['apellidos'], 1 );
    }


    $nombres=array(
        'Ursa', 'Jocelyn', 'Hilda', 'Chelsea',
        'Naida','Sopoline','Colin','Laith','Echo',
        'Candice','Jermaine','Madeline','Graham','Zelda',
        'Blake','Yolanda','Stacey','Lael','Jermaine',
        'Lacy','Nigel','Shana','Alisa','Heidi','Hanae',
        'Simone','Illiana','Ethan','Rhoda','Ariana',
        'Risa','Zachary','Raya','Charlotte','Vance',
        'Keane','Len','Alden','Imani','Maia','Yoko',
        'Daphne','Rose','Dawn','Aretha','Marny',
        'Bertha','Jael','Dustin','Kelly','Sybil',
        'Cedric','Bruce','Ishmael','Ronan','Isadora',
        'Paula','Darryl','Wendy','Allistair','Alfreda',
        'Zorita','Phoebe','Chava','Lucian','Leandra',
        'Gretchen','Phelan','Louis','Jonas','Uriel',
        'Kelly','Xanthus','Fay','Yasir','Emerald',
        'Jordan','Stephanie','Hermione','Brianna',
        'Russell','Rebecca','Quin','Sheila','Isaac',
        'Amber','Kermit','Joel','Rhona','Roanna',
        'Hilda','Wang','Shana','August','Chaim',
        'Valentine','Sierra','Amaya','Sage','Amos'
    );

    $apellidos=array(
        'Patel',
'Hebert',
'Travis',
'Mack',
'Wallace',
'Cherry',
'English',
'Ball',
'Espinoza',
'Evans',
'Bishop',
'Alexander',
'Woodward',
'Moss',
'Donaldson',
'Valdez',
'Long',
'Villarreal',
'Garcia',
'Clay',
'Manning',
'Kirkland',
'Hardy',
'Wise',
'Conway',
'Wolfe',
'Sutton',
'Travis',
'Perry',
'Tate',
'Cantrell',
'Hancock',
'Randolph',
'Harris',
'Mckinney',
'England',
'George',
'Mckinney',
'David',
'Leonard',
'Maldonado',
'Potter',
'Hoover',
'Santana',
'Hobbs',
'Maldonado',
'Herrera',
'Gregory',
'Armstrong',
'Keith',
'Pennington',
'Mckee',
'Fernandez',
'Stuart',
'Juarez',
'Bolton',
'Kaufman',
'Suarez',
'Cherry',
'Brown',
'Castaneda',
'Rocha',
'Mckee',
'Leblanc',
'Garcia',
'Alvarado',
'Gomez',
'Joyce',
'Higgins',
'Delaney',
'Baker',
'Wilder',
'Spears',
'Glenn',
'Welch',
'Wade',
'Manning',
'Hull',
'Estes',
'Massey',
'Mcclure',
'Anderson',
'Cleveland',
'Meadows',
'Hobbs',
'Barber',
'Callahan',
'Mills',
'Vincent',
'Alexander',
'Morales',
'Holloway',
'Tanner',
'Kramer',
'White',
'Castillo',
'Salinas',
'Baird',
'Garner',
'Dean'
    );



$dia = rand(1,31);
$meses = rand(1,12);
$anio = rand(1980,2021);


?>