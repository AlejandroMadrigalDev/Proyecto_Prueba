<?php
    class Usuario{
        // Atributos
        private $rolCodigo;
        private $rolNombre;
        private $UsuarioCodigo;
        private $UsuarioNombres;
        private $UsuarioApellidos;
        private $UsuarioIdentificacion;
        private $UsuarioEmail;
        private $UsuarioPass;
        private $UsuarioEstado;
        private $dbh;
        
        // metodos: Sobrecarga de constructores
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Constructor 0 parametos
        public function __construct0(){}

        //Constructor 9 parametros
        public function __construct9(
        $rolCodigo,
        $rolNombre,
        $UsuarioCodigo,
        $UsuarioNombres,
        $UsuarioApellidos,
        $UsuarioIdentificacion,
        $UsuarioEmail,
        $UsuarioPass,
        $UsuarioEstado)
        {
            $this->rolCodigo = $rolCodigo;
            $this->rolNombre = $rolNombre;
            $this->UsuarioCodigo = $UsuarioCodigo;
            $this->UsuarioNombres = $UsuarioNombres;
            $this->UsuarioApellidos = $UsuarioApellidos;
            $this->UsuarioIdentificacion = $UsuarioIdentificacion;
            $this->UsuarioEmail = $UsuarioEmail;
            $this->UsuarioPass = $UsuarioPass;
            $this->UsuarioEstado = $UsuarioEstado;
        }

        //constructor 8 parametros
        public function __construct8(
        $rolCodigo,
        $UsuarioCodigo,
        $UsuarioNombres,
        $UsuarioApellidos,
        $UsuarioIdentificacion,
        $UsuarioEmail,
        $UsuarioPass,
        $UsuarioEstado)
        {
            $this->rolCodigo = $rolCodigo;
            $this->UsuarioCodigo = $UsuarioCodigo;
            $this->UsuarioNombres = $UsuarioNombres;
            $this->UsuarioApellidos = $UsuarioApellidos;
            $this->UsuarioIdentificacion = $UsuarioIdentificacion;
            $this->UsuarioEmail = $UsuarioEmail;
            $this->UsuarioPass = $UsuarioPass;
            $this->UsuarioEstado = $UsuarioEstado;
        }

        //constructor de 2 parametros
        public function __construct2($UsuarioEmail, $UsuarioPass){
            $this->UsuarioEmail = $UsuarioEmail;
            $this->UsuarioPass = $UsuarioPass;
        }

        // Metodos: Setter y Getter

        public function setRolCodigo($rolCodigo){
            $this->rolCodigo = $rolCodigo;
        }
        public function getRolCodigo(){
            return $this->rolCodigo;
        }

        public function setRolNombre($rolNombre){
            $this->rolNombre = $rolNombre;
        }
        public function getRolNombre(){
            return $this->rolNombre;
        }

        public function setUsuarioCodigo($UsuarioCodigo){
        $this->UsuarioCodigo = $UsuarioCodigo;
        }
        public function getUsuarioCodigo(){
            return $this->UsuarioCodigo;
        }

        public function setUsuarioNombres($UsuarioNombres){
        $this->UsuarioNombres = $UsuarioNombres;
        }
        public function getUsuarioNombres(){
            return $this->UsuarioNombres;
        }
        
        public function setUsuarioApellidos($UsuarioApellidos){
        $this->UsuarioApellidos = $UsuarioApellidos;
        }
        public function getUsuarioApellidos(){
            return $this->UsuarioApellidos;
        }

        public function setUsuarioIdentificacion($UsuarioIdentificacion){
        $this->UsuarioIdentificacion = $UsuarioIdentificacion;
        }
        public function getUsuarioIdentificacion(){
            return $this->UsuarioIdentificacion;
        }

        public function setUsuarioEmail($UsuarioEmail){
        $this->UsuarioEmail = $UsuarioEmail;
        }
        public function getUsuarioEmail(){
            return $this->UsuarioEmail;
        }

        public function setUsuarioPass($UsuarioPass){
            $this->UsuarioPass = $UsuarioPass;
        }
        public function getUsuarioPass(){
            return $this->UsuarioPass;
        }

        public function setUsuarioEstado($UsuarioEstado){
            $this->UsuarioEstado = $UsuarioEstado;
        }
        public function getUsuarioEstado(){
            return $this->UsuarioEstado;
        }

        //metodos de persistencia a la base de datos

        // //CU01 - Iniciar sesion
        public function login(){
            try {
                $sql = 'SELECT * FROM USUARIOS
                    WHERE usuario_email = :usuarioEmail AND usuario_pass = :usuarioPass';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('usuarioEmail', $this->getUsuarioEmail());
                $stmt->bindValue('usuarioPass', sha1($this->getUsuarioPass()));
                $stmt->execute();
                $userDb = $stmt->fetch();
                if ($userDb) {
                    $user = new Usuario(
                        $userDb['rol_codigo'],
                        $userDb['usuario_codigo'],
                        $userDb['usuario_nombres'],
                        $userDb['usuario_apellidos'],
                        $userDb['usuario_identificador'],
                        $userDb['usuario_email'],
                        $userDb['usuario_pass'],
                        $userDb['usuario_estado']
                    );
                    //unset($user->dbh);
                    return $user;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # CU03 - Registrar Rol
        public function registrarRol(){
            try {
                $sql = 'INSERT INTO ROLES VALUES (:rolCodigo,:rolNombre)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCodigo', $this->getRolCodigo());
                $stmt->bindValue('rolNombre', $this->getRolNombre());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # CU04 - Consultar Roles
        public function readRoles(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM ROLES';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $rol) {
                    $rolObj = new Usuario;
                    $rolObj->setRolCodigo($rol['rol_codigo']);
                    $rolObj->setRolNombre($rol['rol_nombre']);
                    array_push($rolList, $rolObj);
                }
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // Obtener el Rol por el código
        public function getRolById($rolCode){
            try {
                $sql = "SELECT * FROM ROLES WHERE rol_codigo=:rolCodigo";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCodigo', $rolCode);
                $stmt->execute();
                $rolDb = $stmt->fetch();
                $rol = new Usuario;
                $rol->setRolCodigo($rolDb['rol_codigo']);
                $rol->setRolNombre($rolDb['rol_nombre']);
                return $rol;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // - Actualizar Rol
        public function actualizarRol(){
            try {
                $sql = 'UPDATE ROLES SET
                            rol_codigo = :rolCodigo,
                            rol_nombre = :rolNombre
                        WHERE rol_codigo = :rolCodigo';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCodigo', $this->getRolCodigo());
                $stmt->bindValue('rolNombre', $this->getRolNombre());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF08_CU08 - Eliminar Rol
        public function eliminarRol($rolCode){
            try {
                $sql = 'DELETE FROM ROLES WHERE rol_codigo = :rolCodigo';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCodigo', $rolCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>