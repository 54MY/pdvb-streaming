<p align="center"><img width="200" src="www/images/logos/pv_blanco.png" alt="Palabrade vida Bolivia"></p>
<h1 align="center">Palabra de vida Bolivia</h1>
<p align="center">"Alcanzando a la juventud con el evangelio de Jesucristo"</p>

### Palabrade vida Bolivia
Palabra de Vida es una Organización Cristiana sin fines de lucro, que se encuentra en más de 65 países, desde hace más de 75 Años y en Bolivia desde hace 30 años, trabajando de una manera directa con la Juventud y la Niñez, llevando el Evangelio en toda Bolivia.

Actualmente la Organización Palabra de Vida Bolivia tiene su Sede Central en la Localidad de Arbieto, más precisamente en La Angostura, Zona Caluyo, camino a Tarata, bajo la Personería Jurídica reconocida mediante Resolución Suprema No 215650. Manteniéndonos fieles a los Estatutos y Propósitos de la Organización, los cuales son conocidos y aprobados por el Ministerio de Relaciones Exteriores y Culto; nos abocamos a cumplirlos con todo el corazón, esmero y esfuerzo; transmitiendo valores morales y éticos a la Juventud y a la Niñez de Bolivia.

### Campamento Virtual Streaming
Por primera vez en la historia PdVB entra al territorio virtual, realizando el campamento desde sus plataformas de [Facebook](https://www.facebook.com/Palabra-de-Vida-Bolivia-101117892019) y [Youtube](https://www.youtube.com/channel/UCkWg8_h4xmv21YqfIiBHR-A)
<p align="center"><img width="300" src="www/images/logos/logo_completo.png" alt="Campamento Streaming logo"></p>

### Proceso de instalacion

Previamente tener instalado Docker y Docker-Compose para trabajar con Apache, MySql 8.0, PhpMyAdmin y Php

- Puedes usar MariaDB 10.1 si tu miras el tag en el archivo docker-compose.yml `mariadb-10.1`
- Puedes usar MySql 5.7 si tu miras el tag en el archivo docker-compose.yml `mysql5.7`

Usa docker-compose como el orquestador. Para correr el sistema simplemente ejecuta el siguiente comando:

```
docker-compose up -d
```

Abre phpmyadmin en [http://localhost:8000](http://localhost:8000) para realizar consultas SQL

Abre tu navegador web e ingresa en el siguiente link para acceder a la pagina [http://localhost:80](http://localhost:80)

Ejectua el cliente de mysql por consola en el puerto 3307:

```
docker-compose exec db mysql -u root -p
```

Y Listo !!!