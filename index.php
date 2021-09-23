<?php
/**
 * Geral url de serviços de internet.
 */
class FactoryUrl {
    /**
     * Url para pesquisa no Google.
     * @param string $term Termo de pesquisa.
     * @return string Url montada.
     */
    public static function googleSearch(string $term, int $page = 1): string
    {
        $termEncoded = urlencode($term);
        $resultsPerPage = 10;
        $start = ($page - 1) * $resultsPerPage;
        return "https://www.google.com/search" .
            "?q=$termEncoded" .
            "&rlz=1C1GCEU_pt-BRBR888BR888" .
            "&sxsrf=AOaemvIi3d66ZTIuiq9Hpi4Z3H80ZnA_Yg:1632414217800" .
            "&ei=CapMYdqEMP_T1sQPm-ufIA" .
            "&start=$start" .
            "&sa=N" .
            "&ved=2ahUKEwiarc_swJXzAhX_qZUCHZv1BwQQ8tMDegQIARA8" .
            "&biw=958" .
            "&bih=967" .
            "&dpr=1";
    }
}

/**
 * Simulador de navegação pelas página na internet.
 */
class WebBrowser {
    /**
     * Carrega uma página e retorna seu código HTML.
     * @param string $url Endereço da página.
     * @return string Código HTML
     */
    public function getHtml(string $url): string {
        return file_get_contents($url);
    }
}

/**
 * Responsável por vasculhar a internet em busca de informações.
 */
class Scrapping {
    /**
     * Nome para o tipo email.
     */
    public const EMAIL = 'email';

    /**
     * Nome para o tipo telefone.
     */
    public const PHONE = 'phone';

    private $surnames = [
        "cabral",

    ];

    /**
     * Main constructor.
     */
    public function __construct()
    {
        $this->webBrowser = new WebBrowser();
    }

    /**
     * Simulador de navegação pelas página na internet.
     * @var WebBrowser
     */
    private WebBrowser $webBrowser;

    /**
     * Retorna emails com base em um contexo de busca.
     * @param string $context Contexto da busca.
     * @return array Lista de emails.
     */
    public function getEmails(string $context = ''): array {
        return ['Not Implemented'];
    }

    /**
     * Retorna telefones com base em um contexo de busca.
     * @param string $context Contexto da busca.
     * @return array Lista de telfones.
     */
    public function getPhones(string $context = ''): array {
        return ['Not Implemented'];
    }
}

/**
 * Ponto de entrada da aplicação.
 */
class Main {

    /**
     * Main constructor.
     */
    public function __construct()
    {
        $this->scrapping = new Scrapping();
    }

    /**
     * Responsável por vasculhar a internet em busca de informações
     * @var Scrapping
     */
    private Scrapping $scrapping;

    /**
     * Executa a aplicação.
     */
    public function run() {
        global $argc;
        global $argv;

        if ($argc < 2 ||
            ($argv[1] !== Scrapping::PHONE &&
            $argv[1] !== Scrapping::EMAIL)) {
            echo "Invalid contact type. Use as parameter: " . Scrapping::EMAIL . " or " . Scrapping::PHONE;
            die;
        }

        $type = $argv[1];
        $context = $argv[2] ?? '';

        switch ($type) {
            case Scrapping::EMAIL:
                $result = $this->scrapping->getEmails($context);
                break;
            case Scrapping::PHONE:
                $result = $this->scrapping->getPhones($context);
                break;
            default:
                throw new Exception('Not implemented type for scrapping.');
        }
        var_dump($result);
    }
}

(new Main())->run();