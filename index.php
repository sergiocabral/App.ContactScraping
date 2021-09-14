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
    public static function googleSearch(string $term): string
    {
        $termEncoded = urlencode($term);
        return "https://www.google.com/search" .
        "?q=$termEncoded" .
        "&rlz=1C1GCEU_pt-BRBR888BR888" .
        "&sxsrf=AOaemvIElWeAOvOD_ol-57QS-VqMOcUvDA%3A1631635328965" .
        "&ei=gMdAYfyuOvDF5OUPpY-fqAk" .
        "&oq=$termEncoded" .
        "&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECcyBAgjECcyCAguEIAEELEDMgQILhBDMgsILhCABBDHARDRAzIFCAAQgAQyBQgAEIAEMggIABCABBCxAzIFCAAQgAQyBQgAEIAEOgcIABBHELADOhQILhCABBCxAxCDARDHARDRAxCTAjoLCAAQgAQQsQMQgwE6DgguEIAEELEDEMcBEKMCOgsILhCABBCxAxCDAToICAAQsQMQgwE6CAguELEDEIMBOgQIABBDOgoILhDHARDRAxBDOg4ILhCABBCxAxDHARDRAzoKCC4QsQMQgwEQQzoHCC4QsQMQQ0oECEEYAFD81DRY8to0YJTdNGgDcAJ4AIABiQGIAYgFkgEDMC41mAEAoAEByAEIuAECwAEB" .
        "&sclient=gws-wiz" .
        "&ved=0ahUKEwj87r2h6_7yAhXwIrkGHaXHB5UQ4dUDCA4" .
        "&uact=5";
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

        echo "Contact type '$type' with context '$context'.";
    }
}

(new Main())->run();