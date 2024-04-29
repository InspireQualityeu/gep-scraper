<?php
require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$api_key = 'YOUR SERPAPI KEY';
$countries = array(

    'ee' => array(
        'title' => 'Estonia',
        'term_en' => 'gender equality plan',
        'term' => 'soolise võrdõiguslikkuse plaan',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Soolise võrdõiguslikkuse kava',
            'soolise võrdõiguslikkuse tegevuskava',
            'soolise võrdõiguslikkuse plaan',
            'võrdse kohtlemise kava',
            'Soolise võrdõiguslikkuse põhimõtted ja tegevuskava',
        ),
        'domains' => array(
        ),
        'google_country' => 'ee',
        'google_language' => 'et'
    ),

    'de' => array(
        'title' => 'Germany',
        'term_en' => 'gender equality plan',
        'term' => 'Gleichstellungsplan',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Gleichstellungsplan',
            'Frauenförderplan',
            'Chancengleichheitsplan',
            'Aktionsplan AND Gleichstellung',
            'Rahmenplan AND Gleichstellung',
            'Rahmenplan AND Chancengleichheit',
            'Gleichstellungskonzept',
            'Gleichstellungsstrategie',
        ),
        'domains' => array(
        ),
        'google_country' => 'de',
        'google_language' => 'de'
    ),

    'ie' => array(
        'title' => 'Ireland',
        'term_en' => 'gender equality plan',
        'term' => 'Gender Equality Plan',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Athena SWAN',
            'Gender equality charter',
        ),
        'domains' => array(
        ),
        'google_country' => 'ie',
        'google_language' => 'en' //'ga'
    ),

    'gr' => array(
        'title' => 'Greece',
        'term_en' => 'gender equality plan',
        'term' => 'Σχέδιο για την ισότητα των φύλων',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Σχέδιο για την ισότητα των φύλων',
            'Σχεδίου Δράσης για την Έμφυλη Ισότητα',
            'σχέδιο δράσης για την ισότητα των φύλων',
            'Σχέδιο Δράσης για την Ισότητα των Φύλων',
            'Σχέδιο Δράσης για την Έμφυλη Ισότητα',
        ),
        'domains' => array(
        ),
        'google_country' => 'gr',
        'google_language' => 'el'
    ),
);
$results = array();
$country = $search = '';

foreach($countries as $key => $value) {
    $country = $key;
    $file = 'serpapi-' . strtoupper($key);
    $file_xlsx = './exports/' . $file . '.xlsx';
    $root_export_dir = './exports/PDFs/' . strtoupper($key) . '/';

    if ( !file_exists( $root_export_dir ) && !is_dir( $root_export_dir ) ) {
        mkdir( $root_export_dir );
    }

    $xls = [
        ['step', 'source', 'title', 'link', 'snippet', 'snippet_highlighted_words']
    ];

    foreach($countries[$country]['domains'] as $domain) {
        $export_dir = $root_export_dir . $domain . '/';
        if ( !file_exists( $export_dir ) && !is_dir( $export_dir ) ) {
            mkdir( $export_dir );
        }

        $str = '(site:' .$domain . ') filetype:pdf';

        if($key == 'ie') {
            $steps = array(
                /*
                '4' => array(
                    'hl' => 'en',
                    'terms' => $value['term_en']
                ),
                */
                '3' =>  array(
                    'hl' => $countries[$country]['google_language'],
                    'terms' => $value['term']
                ),
                /*
                '2' =>  array(
                    'hl' => 'en',
                    'terms' => $value['terms_en']
                ),
                */
                '1' =>  array(
                    'hl' => $countries[$country]['google_language'],
                    'terms' => $value['terms']
                )
            );
        }
        else {
            $steps = array(
                '4' => array(
                    'hl' => 'en',
                    'terms' => $value['term_en']
                ),
                '3' =>  array(
                    'hl' => $countries[$country]['google_language'],
                    'terms' => $value['term']
                ),
                '2' =>  array(
                    'hl' => 'en',
                    'terms' => $value['terms_en']
                ),
                '1' =>  array(
                    'hl' => $countries[$country]['google_language'],
                    'terms' => $value['terms']
                )
            );
        }

        foreach($steps as $step_key => $step_value) {
            $index = array_search($step_key, array_keys($steps));
            ${'go_step_'. $step_key } = true; //( $index === 0 ? true: false);
        }

        foreach($steps as $step_key => $step_value) {
            if ( ${'go_step_'. $step_key }) {

                $_str = ' ' . query_terms($step_value['terms']);
                $query = [
                    'q' => $str . $_str,
                    'engine' => 'google',
                    //'google_domain' => 'google.com',
                    'num' => 10,
                    'location' => $countries[$country]['title'],
                    'gl' => $countries[$country]['google_country'],
                    'hl' => $step_value['hl'], //$countries[$country]['google_language'],
                    //"hl" => $countries[$country]['google_language'],
                    'async' => 'false',
                ];

                $client = new GoogleSearchResults($api_key);
                $results = $client->get_json($query);
                $total_results = 0;
                $files = array();

                if (isset($results->organic_results) && count($results->organic_results) &&
                    isset($results->search_information->organic_results_state) &&
                    ($results->search_information->organic_results_state == 'Results for exact spelling')) {

                    $total_results = isset($results->search_information->total_results) ? $results->search_information->total_results : 0;

                    foreach ($results->organic_results as $result) {
                        $xls[] = [$step_key, $result->source, $result->title, $result->link, (isset($result->snippet) ? $result->snippet : ''), (isset
                        ($result->snippet_highlighted_words) ? implode("|", $result->snippet_highlighted_words) : '')];

                        $files[] = rawurldecode($result->link);
                    }
                }

                if($total_results == 0) {
                    if (isset($results->organic_results) && count($results->organic_results) &&
                        isset($results->search_information->organic_results_state) &&
                        ($results->search_information->organic_results_state == 'Empty showing fixed spelling results')) {

                        $total_results = isset($results->search_information->total_results) ? $results->search_information->total_results : 0;

                        foreach ($results->organic_results as $result) {
                            $xls[] = [$step_key, $result->source, $result->title, $result->link, (isset($result->snippet) ? $result->snippet : ''), (isset
                            ($result->snippet_highlighted_words) ? implode("|", $result->snippet_highlighted_words) : '')];

                            $files[] = rawurldecode($result->link);
                        }
                    }
                }

                $url_request = chr(10) . 'https://www.google.com/search?' . http_build_query($query) . ' | ' . $total_results . ' results' . chr(10);
                $file_requests = './exports/requests.txt';

                file_put_contents($file_requests, $url_request, FILE_APPEND);

                if(is_array($files) && count($files)) {
                    foreach($files as $file) {
                        if ($rfile = isPdf($file)) {
                            $filename = '';

                            $parts = parse_url($rfile);
                            $pathInfo = pathinfo($parts['path']);
                            $filename = $pathInfo['basename'];

                            // Check if the basename has a PDF extension
                            if(!strtolower(mb_substr($filename, -3, 3)) === 'pdf' && !empty($filename)) {
                                $filename .= '.pdf';
                            }

                            if(!empty($filename)) {

                                // Initialize cURL session
                                $ch = curl_init($rfile);

                                // Set cURL options
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                                // Execute cURL session and get the HTML content
                                $file_content = curl_exec($ch);

                                // Close cURL session
                                curl_close($ch);

                                if($file_content) {
                                    if(file_exists($export_dir . urldecode(urldecode($filename)))) {
                                        $filename = time() . '-' . $filename;
                                    }
                                    file_put_contents($export_dir . urldecode(urldecode($filename)), $file_content);

                                    file_put_contents($file_requests, 'success file - ' .  urldecode(urldecode($filename)) . chr(10), FILE_APPEND);
                                }
                                else {
                                    file_put_contents($file_requests, 'error getting - ' . $rfile . chr(10), FILE_APPEND);
                                }
                            }
                            else
                                file_put_contents($file_requests, 'error parsing - ' . $rfile . chr(10), FILE_APPEND);
                        }
                        else { //we assume it's a page that includes links to pdfs
                            file_put_contents($file_requests, 'file not recognised as direct pdf - ' . $file . chr(10), FILE_APPEND);

                        }
                    }
                }

            }
        }

    }

    $spreadsheet = new Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->fromArray($xls);


    $writer = new Xlsx($spreadsheet);
    $writer->save($file_xlsx);

}

function query_terms($terms) {
    $_str = array();

    if(is_array($terms)){
        foreach ($terms as $val) {
            $_arr = explode(" AND ", $val);
            $_arr = array_map('trim', $_arr);

            if (is_array($_arr) && count($_arr) > 1)
                $_str[] = '("' . implode('" AND "', $_arr) . '")';
            else
                $_str[] = '"' . $val . '"';
        }

        $out = ' (' . implode(" OR ", $_str) . ')';
    }
    else {
        $out = '"' . $terms . '"';
    }

    return $out;
}

function isPdf($url) {
    $urlComponents = parse_url($url);

    // Separate the path and filename
    $pathInfo = pathinfo($urlComponents['path']);

    // Encode only the filename
    $encodedFilename = $pathInfo['basename'];

    if(strtolower(mb_substr($encodedFilename, -3, 3)) === 'pdf' && !empty($encodedFilename)) {
        // Reconstruct the URL
        $url = $urlComponents['scheme'] . '://' . $urlComponents['host'] . $pathInfo['dirname'] . '/' . rawurlencode($encodedFilename);

        // Add any remaining components (query, fragment, etc.)
        if (isset($urlComponents['query'])) {
            $url .= '?' . $urlComponents['query'];
        }
        if (isset($urlComponents['fragment'])) {
            $url .= '#' . $urlComponents['fragment'];
        }
    }

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/121.0');
    curl_setopt($ch, CURLOPT_HEADER, true); // Include headers in the response
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute cURL session and get the response
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    if ($response === false) {
        // Handle error when fetching the content
        return false;
    }

    // Split the response into header and body
    list($headers, $body) = explode("\r\n\r\n", $response, 2);
    // Extract the content type from headers
    //preg_match('/content-type: ([^\r\n]+)/', $headers, $matches);

    if (stripos($headers, 'Content-Type: application/pdf') !== false) {
    //if (!empty($matches[1])) {
        //$contentType = $matches[1];

        // Check if the Content-Type header indicates a PDF file
        // return strpos($contentType, 'application/pdf') !== false;
        //return true;
        return $url;
    }
    else if (stripos($headers, 'Status: HTTP/1.1 301 Moved Permanently') !== false) {
        preg_match('/Location:(.*?)\n/', $response, $matches);

        $newurl = trim(array_pop($matches));
        if(mb_substr($newurl, 0, 1) === '/') {
            $newurl = $urlComponents['scheme'] . '://' . $urlComponents['host'] . $newurl;
        }
        if($newurl = isPDF($newurl)) {
            return $newurl;
        }
    }
    else {
        //echo '<pre>'.print_r($headers, true).'</pre>'.chr(10);
        //$urlComponents = parse_url($url);
        //echo '<pre>'.print_r($urlComponents, true).'</pre>'.chr(10);
    }

    return false;
}

function getLinksFromPage($url) {
    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute cURL session and get the HTML content
    $html = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    if ($html === false || empty($html)) {
        // Handle error when fetching the content
        return [];
    }

    $dom = new DOMDocument;
    libxml_use_internal_errors(true); // Disable warnings for HTML5 elements

    // Load the HTML content into the DOMDocument
    $dom->loadHTML($html);

    $links = [];

    // Find all anchor (a) tags
    $anchorTags = $dom->getElementsByTagName('a');

    foreach ($anchorTags as $anchor) {
        // Get the href attribute of each anchor tag
        $href = $anchor->getAttribute('href');

        // Filter out non-URL links and include only links ending with ".pdf"
        if (filter_var($href, FILTER_VALIDATE_URL) !== false && $href = isPdf($href)) { //} && pathinfo($href, PATHINFO_EXTENSION) === 'pdf') {
            $links[] = $href;
        }
    }

    return $links;
}