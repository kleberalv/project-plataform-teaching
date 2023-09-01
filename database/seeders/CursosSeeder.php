<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cursos;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cursos::create([
            'titulo' => 'Biologia',
            'descricao' => 'O curso de Biologia envolve o estudo da vida e dos organismos vivos, abrangendo tópicos como ecologia, genética e anatomia.',
        ]);

        Cursos::create([
            'titulo' => 'Química',
            'descricao' => 'A Química é a ciência que estuda a matéria, suas propriedades e suas transformações. Neste curso, você explorará reações químicas e propriedades dos elementos químicos.',
        ]);

        Cursos::create([
            'titulo' => 'Matemática',
            'descricao' => 'A Matemática é uma disciplina fundamental que lida com números, formas e padrões. Este curso aborda tópicos como álgebra, geometria e cálculo.',
        ]);

        Cursos::create([
            'titulo' => 'História',
            'descricao' => 'O curso de História explora eventos passados e como eles moldaram o presente. Você estudará diferentes períodos históricos e suas influências na sociedade atual.',
        ]);

        Cursos::create([
            'titulo' => 'Artes',
            'descricao' => 'O curso de Artes é uma jornada criativa que abrange pintura, escultura, música e muito mais. Você desenvolverá habilidades artísticas e explorará expressões culturais.',
        ]);

        Cursos::create([
            'titulo' => 'Inglês',
            'descricao' => 'O curso de Inglês é essencial para a comunicação global. Você aprenderá gramática, vocabulário e habilidades de conversação em inglês.',
        ]);

        Cursos::create([
            'titulo' => 'Economia',
            'descricao' => 'A Economia estuda como as sociedades alocam recursos escassos. Este curso explora teorias econômicas e sua aplicação no mundo real.',
        ]);

        Cursos::create([
            'titulo' => 'Física',
            'descricao' => 'A Física descreve as leis fundamentais do universo. Neste curso, você explorará fenômenos naturais, desde a mecânica até a física quântica.',
        ]);

        Cursos::create([
            'titulo' => 'Literatura',
            'descricao' => 'A Literatura é uma forma de arte que utiliza palavras para criar histórias e expressar ideias. Este curso abrange escritores clássicos e contemporâneos.',
        ]);

        Cursos::create([
            'titulo' => 'Programação',
            'descricao' => 'O curso de Programação ensina a criar software e aplicativos. Você aprenderá linguagens de programação e desenvolvimento de software.',
        ]);

        Cursos::create([
            'titulo' => 'Engenharia de Software',
            'descricao' => 'A Engenharia de Software é o estudo da concepção, desenvolvimento e manutenção de software. Este curso aborda práticas de engenharia de software e metodologias de desenvolvimento.',
        ]);

        Cursos::create([
            'titulo' => 'Marketing Digital',
            'descricao' => 'O Marketing Digital envolve estratégias de marketing online, como publicidade em mídias sociais e otimização de mecanismos de busca (SEO). Este curso explora técnicas de marketing digital.',
        ]);

        Cursos::create([
            'titulo' => 'Design Gráfico',
            'descricao' => 'O Design Gráfico é a arte de criar elementos visuais atraentes. Neste curso, você aprenderá princípios de design e software de design gráfico.',
        ]);

        Cursos::create([
            'titulo' => 'Nutrição',
            'descricao' => 'A Nutrição é a ciência da alimentação e da saúde. Este curso aborda dietas equilibradas, nutrição esportiva e saúde alimentar.',
        ]);

        Cursos::create([
            'titulo' => 'Música',
            'descricao' => 'A Música é uma forma de expressão artística através do som. Este curso cobre teoria musical, composição e performance musical.',
        ]);

        Cursos::create([
            'titulo' => 'Psicologia',
            'descricao' => 'A Psicologia estuda o comportamento humano e os processos mentais. Neste curso, você explorará teorias psicológicas e práticas terapêuticas.',
        ]);

        Cursos::create([
            'titulo' => 'Sociologia',
            'descricao' => 'A Sociologia explora a sociedade e os comportamentos humanos em grupos. Neste curso, você estudará teorias sociológicas e questões sociais.',
        ]);

        Cursos::create([
            'titulo' => 'Gastronomia',
            'descricao' => 'A Gastronomia é a arte da culinária e da preparação de alimentos. Você aprenderá técnicas de cozinha e criação de pratos deliciosos.',
        ]);

        Cursos::create([
            'titulo' => 'Geografia',
            'descricao' => 'A Geografia estuda a Terra e seus fenômenos naturais e sociais. Neste curso, você explorará questões geográficas e ambientais.',
        ]);

        Cursos::create([
            'titulo' => 'Jornalismo',
            'descricao' => 'O Jornalismo envolve a coleta e divulgação de notícias. Este curso cobre reportagem, redação jornalística e ética na comunicação.',
        ]);

        Cursos::create([
            'titulo' => 'Direito',
            'descricao' => 'O Direito é o estudo das leis e do sistema legal. Neste curso, você explorará princípios legais, jurisprudência e resolução de conflitos.',
        ]);

        Cursos::create([
            'titulo' => 'Ciências Políticas',
            'descricao' => 'A Ciência Política analisa o governo, políticas públicas e sistemas políticos. Este curso aborda teorias políticas e questões políticas contemporâneas.',
        ]);

        Cursos::create([
            'titulo' => 'Arquitetura',
            'descricao' => 'A Arquitetura é a arte de projetar e construir edifícios e estruturas. Este curso explora design arquitetônico e história da arquitetura.',
        ]);

        Cursos::create([
            'titulo' => 'Artes Visuais',
            'descricao' => 'As Artes Visuais incluem pintura, escultura e outras formas de arte visual. Neste curso, você explorará várias mídias artísticas e movimentos artísticos.',
        ]);

        Cursos::create([
            'titulo' => 'Linguística',
            'descricao' => 'A Linguística estuda a linguagem e a comunicação. Este curso aborda a estrutura das línguas, a evolução das línguas e a sociolinguística.',
        ]);

        Cursos::create([
            'titulo' => 'Astrofísica',
            'descricao' => 'A Astrofísica é o estudo do universo e dos objetos celestes. Neste curso, você explorará astronomia, cosmologia e fenômenos cósmicos.',
        ]);

        Cursos::create([
            'titulo' => 'Psicologia Infantil',
            'descricao' => 'A Psicologia Infantil se concentra no desenvolvimento e no comportamento de crianças. Este curso aborda teorias de desenvolvimento infantil e práticas de aconselhamento.',
        ]);
    }
}
