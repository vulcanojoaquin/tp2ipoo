<?php

class Login {
    private $nombreUsuario;
    private $contrasenaActual;
    private $fraseRecordar;
    private $historicoContrasenas = []; // Para almacenar las últimas 4 contraseñas

    // Constructor
    public function __construct($nombreUsuario, $contrasenaInicial, $fraseRecordar) {
        $this->nombreUsuario = $nombreUsuario;
        $this->contrasenaActual = $contrasenaInicial;
        $this->fraseRecordar = $fraseRecordar;
        $this->historicoContrasenas[] = $contrasenaInicial;
    }

    // Validar la contraseña actual
    public function validarContrasena($contrasena) {
        return password_verify($contrasena, $this->contrasenaActual);
    }

    // Cambiar la contraseña
    public function cambiarContrasena($nuevaContrasena) {
        // Verificar que la nueva contraseña no esté en el historial reciente
        if (in_array($nuevaContrasena, $this->historicoContrasenas)) {
            throw new Exception('La nueva contraseña no puede ser una de las últimas 4 contraseñas utilizadas.');
        }

        // Actualizar el historial de contraseñas
        if (count($this->historicoContrasenas) >= 4) {
            array_shift($this->historicoContrasenas); // Eliminar la más antigua
        }
        $this->historicoContrasenas[] = $this->contrasenaActual;
        $this->contrasenaActual = password_hash($nuevaContrasena, PASSWORD_DEFAULT); // Almacenar la nueva contraseña
    }

    // Recordar la frase
    public function recordar() {
        return $this->fraseRecordar;
    }
}

// Ejemplo de uso
try {
    $login = new Login('usuario1', 'contrasena123', 'Tu contraseña es memorable!');
    
    // Validar contraseña
    $esValida = $login->validarContrasena('contrasena123');
    echo $esValida ? 'Contraseña válida' : 'Contraseña inválida';
    echo "\n";

    // Cambiar contraseña
    $login->cambiarContrasena('nuevaContrasena456');
    
    // Intentar cambiar a una contraseña reciente
    try {
        $login->cambiarContrasena('contrasena123'); // Debería lanzar una excepción
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
    // Recordar frase
    echo "Frase para recordar: " . $login->recordar() . "\n";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
