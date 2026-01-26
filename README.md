Nuestro proyecto llamado CAMINO PROFESIONAL, se basa en una aplicación web informativa sobre los ciclos de Formacion Profesional relacionados con el mundo de la informatica

La mejores implementadas son:
  -Un formulario capaz de ayudar a los usuarios que accedan a nuestra web para que puedan obtener informacion sobre el ciclo o ciclos que necesiten informacion
  -Panel de administador.
    En la parte superior de la web, habra un botón donde podremos acceder como adminstrador, introduciendo las credenciales obligatorias. Una vez dentro como 
    hemos indicado anteriormente, podremos tener acceso al panel de control, viendo las personas que han rellenado nuestro formuulario
  -Posibilidad de cerrar sesión como administrador, una vez registrados podemos cerrar la sesion nosotros mismos, en un boton en la misma parte superior donde hemos 
    iniciado sesión, redirigiendonos al index.php donde obtendremos la misma vista que un usuario invitado
  -Uso de sentencias preparadas para evitar inyeccions SQL

Estructura del proyecto:
  -/app: Contiene la lógica de negocio, validación de login y configuración.
  -/dat: Contiene la capa de acceso a datos "AccesoDatos.php", la clase usuarios.php y el script SQL.
  -/web: Archivos multimedia, CSS y recursos.
  -index.php: Punto de entrada principal con contenido dinámico según el rol, admin e invitado.

  Acceso de Administrador:
    Para acceder como admin y tener acceso al panel, es necesario entrar como admin y la contraseña admin
