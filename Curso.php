<?php

class Curso {
    private $cursos = []; // Armazena os cursos cadastrados

    // Método para cadastrar um novo curso
    public function cadastrar($nome, $area, $qtd_horas, $valor) {
        // Cria um array associativo com os detalhes do curso
        $curso = [
            'nome' => $nome,
            'area' => $area,
            'qtd_horas' => $qtd_horas,
            'valor' => $valor
        ];
        // Adiciona o curso ao array de cursos
        $this->cursos[] = $curso;
        return "Curso cadastrado com sucesso."; // Retorna uma mensagem de sucesso
    }

    // Método para listar todos os cursos cadastrados, agrupados por área
    public function listar_cursos() {
        if (empty($this->cursos)) { // Verifica se não há cursos cadastrados
            return "Não há cursos cadastrados."; // Retorna uma mensagem informando que não há cursos cadastrados
        } else {
            $cursosPorArea = []; // Inicializa um array para armazenar os cursos por área
            foreach ($this->cursos as $curso) { // Itera sobre cada curso cadastrado
                if (array_key_exists($curso['area'], $cursosPorArea)) { // Verifica se a área do curso já foi registrada
                    // Se sim, atualiza os dados da área
                    $cursosPorArea[$curso['area']]['qtd_cursos']++;
                    $cursosPorArea[$curso['area']]['total_valor'] += $curso['valor'];
                    $cursosPorArea[$curso['area']]['total_horas'] += $curso['qtd_horas'];
                } else {
                    // Se não, cria um novo registro para a área
                    $cursosPorArea[$curso['area']] = [
                        'qtd_cursos' => 1,
                        'total_valor' => $curso['valor'],
                        'total_horas' => $curso['qtd_horas']
                    ];
                }
            }

            $output = ""; // Inicializa uma string vazia para armazenar a saída
            foreach ($cursosPorArea as $area => $dados) { // Itera sobre cada área e seus dados
                // Concatena os detalhes da área à string de saída
                $output .= "Área: " . $area . ", ";
                $output .= "Quantidade de Cursos: " . $dados['qtd_cursos'] . ", ";
                $output .= "Total de Horas: " . $dados['total_horas'] . ", ";
                $output .= "Total de Valor: " . $dados['total_valor'] . "\n";
            }

            return $output; // Retorna a string de saída com os detalhes de todos os cursos por área
        }
    }
}

// Teste cadastrar
$curso = new Curso();
echo $curso->cadastrar('PHP Básico', 'Desenvolvimento Web', 40, 100.00) . "\n";
echo $curso->cadastrar('JavaScript Avançado', 'Desenvolvimento Web', 60, 150.00) . "\n";
echo $curso->cadastrar('Python para Ciência de Dados', 'Data Science', 50, 120.00) . "\n";
echo $curso->cadastrar('Machine Learning', 'Data Science', 70, 200.00) . "\n";

// Teste listar_cursos
echo $curso->listar_cursos() . "\n";

?>