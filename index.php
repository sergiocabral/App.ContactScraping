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

class Main {

    public function run() {
        $url = FactoryUrl::googleSearch('pet shop');
        echo $url;
    }
}

(new Main())->run();