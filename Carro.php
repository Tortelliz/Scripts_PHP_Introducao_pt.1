<?php

class Carro {
    private $carros = []; // Armazena os carros cadastrados

    // Método para cadastrar um novo carro
    public function cadastrar_carro($marca, $modelo, $ano, $valor) {
        // Cria um array associativo com os detalhes do carro
        $carro = [
            'marca' => $marca,
            'modelo' => $modelo,
            'ano' => $ano,
            'valor' => $valor
        ];
        // Adiciona o carro ao array de carros
        $this->carros[] = $carro;
        return "Carro cadastrado com sucesso."; // Retorna uma mensagem de sucesso
    }

    // Método para visualizar todos os carros cadastrados
    public function visualizar_carros() {
        if (empty($this->carros)) { // Verifica se não há carros cadastrados
            return "Não há carros cadastrados."; // Retorna uma mensagem informando que não há carros cadastrados
        } else {
            $output = ""; // Inicializa uma string vazia para armazenar a saída
            foreach ($this->carros as $carro) { // Itera sobre cada carro cadastrado
                // Concatena os detalhes do carro à string de saída
                $output .= "Marca: " . $carro['marca'] . ", ";
                $output .= "Modelo: " . $carro['modelo'] . ", ";
                $output .= "Ano: " . $carro['ano'] . ", ";
                $output .= "Valor: " . $carro['valor'] . "\n";
            }
            return $output; // Retorna a string de saída com os detalhes de todos os carros
        }
    }
}

// Teste cadastrar_carro
$carro = new Carro();
echo $carro->cadastrar_carro('Volkswagen', 'Gol', 2023, 40000.00) . "\n";
echo $carro->cadastrar_carro('Fiat', 'Uno', 2023, 35000.00) . "\n";
echo $carro->cadastrar_carro('Chevrolet', 'Onix', 2023, 45000.00) . "\n";
echo $carro->cadastrar_carro('Ford', 'Ka', 2023, 38000.00) . "\n";

// Teste visualizar_carros
echo $carro->visualizar_carros() . "\n";

?>