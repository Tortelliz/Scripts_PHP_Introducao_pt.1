<?php

class Calculadora {
    private $numeros; // Armazena os números fornecidos

    public function __construct($numeros) {
        $this->numeros = $numeros; // Inicializa os números para cálculo
    }

    // Realiza a soma dos números fornecidos
    public function soma() {
        $resultado = 0;
        foreach ($this->numeros as $numero) {
            $resultado += $numero;
        }
        return $resultado;
    }

    // Realiza a subtração dos números fornecidos
    public function subtracao() {
        $resultado = $this->numeros[0];
        $numCount = count($this->numeros);
        for ($i = 1; $i < $numCount; $i++) {
            $resultado -= $this->numeros[$i];
        }
        return $resultado;
    }

    // Realiza a multiplicação dos números fornecidos
    public function multiplicacao() {
        $resultado = 1;
        foreach ($this->numeros as $numero) {
            $resultado *= $numero;
        }
        return $resultado;
    }

    // Realiza a divisão dos números fornecidos
    public function divisao() {
        $resultado = $this->numeros[0];
        $numCount = count($this->numeros);
        for ($i = 1; $i < $numCount; $i++) {
            if ($this->numeros[$i] != 0) {
                $resultado /= $this->numeros[$i];
            } else {
                return "Erro: Divisão por zero.";
            }
        }
        return $resultado;
    }
}

// Exemplo de uso:
$numeros = [10, 5, 2];
$calculadora = new Calculadora($numeros);

echo "Soma: " . $calculadora->soma() . "\n";
echo "Subtração: " . $calculadora->subtracao() . "\n";
echo "Multiplicação: " . $calculadora->multiplicacao() . "\n";
echo "Divisão: " . $calculadora->divisao() . "\n";
?>