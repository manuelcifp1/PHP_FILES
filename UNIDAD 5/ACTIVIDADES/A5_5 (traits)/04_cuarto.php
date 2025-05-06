<?php
/* 
4. Crea un trait llamado Autenticacion que defina un método público login($usuario, $contrasena) 
para autenticar usuarios.

- En el trait, declara un método abstracto llamado validarCredenciales($usuario, $contrasena).
- Usa el trait en una clase llamada UsuarioAuth y define la implementación del método abstracto
  para verificar que las credenciales sean "user" y "1234".
- Implementa una clase adicional llamada AdminAuth que extienda UsuarioAuth y modifique
  la validación para permitir solo al usuario "admin".
*/

//Definimos el trait Autenticacion
trait Autenticacion {
       //Método público login: intenta autenticar con las credenciales dadas.
       public function login($usuario, $contrasena) {
              //Se llama al método abstracto validarCredenciales(), que debe implementarlo la clase que use el trait.
              if ($this->validarCredenciales($usuario, $contrasena)) {
                     echo "Usuario y contraseña válidos<br>";
              } else {
                     echo "Usuario o contraseña inválidos<br>";
              }
       }

       //Declaramos un método abstracto: cualquier clase que use este trait debe definirlo.
       abstract public function validarCredenciales($usuario, $contrasena);
}

//Clase UsuarioAuth: implementa el método abstracto y usa el trait.
class UsuarioAuth {
       use Autenticacion; //Incluye el trait

       //Implementación concreta del método abstracto.
       public function validarCredenciales($usuario, $contrasena) {
              //Verifica si usuario y contraseña son exactamente "user" y "1234".
              return $usuario === "user" && $contrasena === "1234";
       }
}

//Clase AdminAuth: hereda de UsuarioAuth pero redefine la validación.
class AdminAuth extends UsuarioAuth {
       //Sobrescribe el método para permitir únicamente al usuario "admin" con contraseña "1234".
       public function validarCredenciales($usuario, $contrasena) {
              return $usuario === "admin" && $contrasena === "1234";
       }
}

//Creamos una instancia de UsuarioAuth y probamos login:
$usuario = new UsuarioAuth();
$usuario->login("user", "1234");   //válido
$usuario->login("admin", "1234");  //inválido

//Creamos una instancia de AdminAuth y probamos login:
$admin = new AdminAuth();
$admin->login("admin", "1234");    //válido
$admin->login("user", "1234");     //inválido
?>
