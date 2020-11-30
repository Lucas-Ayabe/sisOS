<?php
    namespace App\Controller;

    use App\Model\Conexao;

    class Login {
        protected $usuario;
        protected $senha;

        public function setUsuario($u) {
            $this->usuario = $u;
        }

        public function setSenha($s) {
            $this->senha = $s;
        }

        public function getUsuario() {
            return $this->usuario;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function Logar() {
            $user = $this->getUsuario();
            $sql = 'SELECT * FROM usuarios WHERE usuario = ?';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->execute([$user]);

            if($stmt->rowCount() > 0) {
                $info = $stmt->fetch();
                $pass = $this->getSenha();

                if(password_verify($pass, $info['senha'])) {
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['usuario'] = $info['usuario'];

                    header('Location: painel.php');
                    exit();
                } else {
                    echo '<script>window.alert("Senha incorreta!")</script>';
                    echo '<script>window.location="index.php"</script>';
                    exit();
                }
            } else {
                echo '<script>window.alert("Usuário incorreto!")</script>';
                echo '<script>window.location="index.php"</script>';
                exit();
            }
        }
    }
?>