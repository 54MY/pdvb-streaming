<p align="center"><img width="200" src="www/images/logo.jpg" alt="Campamento Streaming logo"></p>
<h1 align="center">Palabra de vida Bolivia</h1>
<p align="center">"Alcanzando a la juventud con el evangelio de Jesucristo"</p>

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