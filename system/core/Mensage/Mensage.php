<?php

    namespace Core\Mensage;

    /**
     * Classe responsável por exibir as mensagens do sistema.
     * 
     * @author Rivanildo Júnior 
     */
    class Mensage {
        private $text = 'mensagem de teste';
        private $css;

        public function __toString()
        {
            return $this->render();
        }

        /**
         * Renderiza a mensagem.
         * 
         * @return string
         */
        public function render(): string {
            $model = "<div class='{$this->css}'>{$this->text}</div>";
            
            return $model;
        }

        /**
         * Filtra a mensagem.
         * 
         * @param string $mensage
         * @return string
         */
        private function filter(string $mensage): string {
            return filter_var(strip_tags($mensage), FILTER_SANITIZE_SPECIAL_CHARS);
        }

        /**
         * Define a mensagem como uma mensagem de sucesso.
         * 
         * @param string $mensage
         * @return Mensage
         */
        public function success(string $mensage): Mensage {
            $this->css = 'alert alert-success';
            $this->text = $this->filter($mensage);

            return $this;
        }

        /**
         * Define a mensagem como uma mensagem de erro.
         * 
         * @param string $mensage
         * @return Mensage
         */
        public function error(string $mensage): Mensage {
            $this->css = 'alert alert-danger';
            $this->text = $this->filter($mensage);

            return $this;
        }

        /**
         * Define a mensagem como uma mensagem de alerta.
         * 
         * @param string $mensage
         * @return Mensage
         */
        public function alert(string $mensage): Mensage {
            $this->css = 'alert alert-warning';
            $this->text = $this->filter($mensage);

            return $this;
        }

        /**
         * Define a mensagem como uma mensagem de informação.
         * 
         * @param string $mensage
         * @return Mensage
         */
        public function info(string $mensage): Mensage {
            $this->css = 'alert alert-primary';
            $this->text = $this->filter($mensage);

            return $this;
        }
    }