<?php

    namespace system\core\Helpers;

    use Exception;

    class Helpers {

        /**
         * Retorna uma saudação com base na hora atual do dia
         * 
         * @return string Saudação apropriada
         */
        public static function greeting(): string {
            $hora = date('H');
            $hora = (int)$hora;

            $mensage = match(true) {
                $hora >= 0 && $hora < 5 => 'Boa madrugada',
                $hora >= 5 && $hora < 12 => 'Bom dia',
                $hora >= 12 && $hora < 18 => 'Boa tarde',
                default => 'Boa noite',
            };

            return $mensage;
        }

        /**
         * Resume um texto para um determinado número de caracteres
         * 
         * @param string $text Texto a ser resumido
         * @param int $limit Número máximo de caracteres
         * @param string $continue Texto a ser adicionado ao final do resumo (padrão: '...')
         * @return string Texto resumido
         */
        public static function resumeText(string $text, int $limit, string $continue = '...'): string {
            $cleanText = trim(strip_tags($text));

            if (mb_strlen($cleanText) <= $limit) {
                return $cleanText;
            }

            $resumeText = mb_substr($cleanText, 0, $limit);

            return $resumeText . $continue;
        }

        /**
         * Formata um número
         * 
         * @param string|null $number Número a ser formatado
         * @return string Número formatado
         */
        public static function formatNumber(?string $number = null): string {
            $newNumber = $number ?? 0;

            return number_format($newNumber, 0, '.', '.');
        }

        /**
         * Formata um valor monetário
         * 
         * @param float|null $value Valor a ser formatado
         * @return string Valor formatado
         */
        public static function formatValue(?float $value = null, int $e): string {
            $newValue = $value ?? 0;

            return number_format($newValue, 2, ',', '.');
        }

        /**
         * Conta o tempo decorrido desde uma data
         * 
         * @param string $date Data a ser verificada
         * @return string Tempo decorrido
         */
        public static function countDate(string $date): string {
            $now = strtotime(date('Y-m-d H:i:s'));
            $time = strtotime($date);

            $diff = $now - $time;

            $seconds = $diff;
            $minutes = round($diff / 60);
            $hours = round($diff / (60 * 60));
            $days = round($diff / (60 * 60 * 24));
            $weeks = round($diff / (60 * 60 * 24 * 7));
            $months = round($diff / (60 * 60 * 24 * 7 * 4));
            $years = round($diff / (60 * 60 * 24 * 7 * 4 * 12));

            if ($seconds < 60) {
                return 'agora';
            }

            if ($minutes < 60) {
                return $minutes == 1 ? 'há 1 minuto' : 'há ' . $minutes . ' minutos';
            }

            if ($hours < 24) {
                return $hours == 1 ? 'há 1 hora' : 'há ' . $hours . ' horas';
            }

            if ($days < 7) {
                return $days == 1 ? 'há 1 dia' : 'há ' . $days . ' dias';
            }

            if ($weeks < 4) {
                return $weeks == 1 ? 'há 1 semana' : 'há ' . $weeks . ' semanas';
            }

            if ($months < 12) {
                return $months == 1 ? 'há 1 mês' : 'há ' . $months . ' meses';
            }

            return $years == 1 ? 'há 1 ano' : 'há ' . $years . ' anos';
        }

        /**
         * Valida um endereço de e-mail
         * 
         * @param string $email Endereço de e-mail a ser validado
         * @return bool Verdadeiro se o e-mail for válido, falso caso contrário
         */
        public static function validateEmail(string $email): bool {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        /**
         * Valida um endereço de URL
         * 
         * @param string $url Endereço de URL a ser validado
         * @return bool Verdadeiro se a URL for válida, falso caso contrário
         */
        public static function validateURLWithFilter(string $url): bool {
            return filter_var($url, FILTER_VALIDATE_URL);
        }

        /**
         * Valida um endereço de URL
         * 
         * @param string $url Endereço de URL a ser validado
         * @return bool Verdadeiro se a URL for válida, falso caso contrário
         */
        public static function validateURL(string $url): bool {
            if (mb_strlen($url) < 10) {
                return false;
            }

            if (!str_contains($url, '.')) {
                return false;
            }

            if (!(str_contains($url, 'http://') || str_contains($url, 'https://'))) {
                return false;
            }

            return true;
        }

        /**
         * Verifica se o ambiente é localhost
         * 
         * @return bool Verdadeiro se o ambiente for localhost, falso caso contrário
         */
        public static function isLocalhost(): bool {
            $server = filter_input(INPUT_SERVER, 'SERVER_NAME');
            $port = filter_input(INPUT_SERVER, 'SERVER_PORT');

            return ($server === 'localhost' || $server === '127.0.0.1') && $port === '80';
        }

        /**
         * Gera a URL completa a partir de uma URL relativa
         * 
         * @param string $url URL relativa
         * @return string URL completa
         */
        public static function url(string $url = null): string {
            $environment = self::isLocalhost() ? DEVELOP_URL : PRODUCTION_URL;

            if (str_starts_with($url, '/')) {
                return $environment . trim($url);
            }

            return $environment . '/' . trim($url);
        }

        /**
         * Retorna a data atual formatada
         * 
         * @return string Data atual formatada
         */
        public static function currentDate(): string {
            $dayMonth = date('d');
            $dayWeek = date('w');
            $month = date('m') - 1;
            $year = date('Y');

            $daysOfWeek = [
                'Domingo',
                'Segunda-feira',
                'Terça-feira',
                'Quarta-feira',
                'Quinta-feira',
                'Sexta-feira',
                'Sábado'
            ];

            $nameMonths = [
                'Janeiro',
                'Fevereiro',
                'Março',
                'Abril',
                'Maio',
                'Junho',
                'Julho',
                'Agosto',
                'Setembro',
                'Outubro',
                'Novembro',
                'Dezembro'
            ];

            $formatDate = $daysOfWeek[$dayWeek] . ', ' . $dayMonth . ' de ' . $nameMonths[$month] . ' de ' . $year;

            return $formatDate;
        }

        /**
         * Gera um slug a partir de um texto
         *
         * @param string $text Texto a ser transformado em slug
         * @return string Slug gerado a partir do texto
         */
        public static function slugfy(string $text): string {
            $newText = mb_strtolower($text, 'UTF-8');

            $newText = transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $newText);

            $newText = preg_replace('/[^a-z0-9]+/', '-', $newText);

            $newText = trim($newText, '-');

            $newText = preg_replace('/-+/', '-', $newText);

            return $newText;
        }

        /**
         * Valida um CPF
         * 
         * @param string $cpf CPF a ser validado
         * @return bool Verdadeiro se o CPF for válido, falso caso contrário
         */
        public static function cpfValidate(string $cpf): bool {
            $newCpf = self::clearNumber($cpf);

            if (mb_strlen($newCpf) !== 11 || preg_match('/^(\d)\1{10}$/', $newCpf)) {
                throw new Exception('O CPF precisa ter 11 digitos');
            }

            for ($i = 9; $i < 11; $i++) {
                for ($d = 0, $c = 0; $c < $i; $c++) {
                    $d += $newCpf[$c] * (($i + 1) - $c);
                }

                $d = (($d * 10) % 11) % 10;

                if ($newCpf[$c] != $d) {
                    throw new Exception('O CPF é inválido');
                }
            }

            return true;
        }

        /**
         * Remove todos os caracteres não numéricos de uma string
         *
         * @param string $value String a ser limpa
         * @return string String limpa, contendo apenas números
         */
        public static function clearNumber(string $value): string {
            return preg_replace('/[^0-9]/', '', $value);
        }

        /**
         * Redireciona para uma URL
         *
         * @param string|null $url URL para redirecionar
         * @return void
         */
        public static function redirect(string $url = null): void {
            header('HTTP/1.1 302 Found');

            $local = $url ? self::url($url) : self::url();

            header("Location: {$local}");
            exit;
        }
    }