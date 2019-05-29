<?php
// function getData()
// {
if (isset($_GET["search"])) {
    $item = $_GET["item"];
    $min = $_GET["min"];
    $max = $_GET["max"];
    $link = "https://www.dcfever.com/trading/search.php?keyword=" . $item . "&token=pqqqqpqqpppqpqqqqpqqpqqqppqqqpqw&type=sell&min_price=" . $min . "&max_price=" . $max;
    getData($link);
    // echo $link;
    // $doc = new DOMDocument();
    // $pageContent = file_get_contents($link);

    // $doc->loadHTML($pageContent);
} else {
    echo "<script>console.log(\"Get Search is not working\")</script>";
}

// }

function getData($link)
{
//ignore the Notice from PHP
    error_reporting(E_ALL ^ E_NOTICE);

    $html = file_get_contents($link);

    $doc = new DOMDocument();
    $internalErrors = libxml_use_internal_errors(true);
    $doc->loadHTML($html);

// echo $doc->saveHTML();

    $items = $doc->getElementsByTagName('tr');
    $titles = array();
    $prices = array();
    $dates = array();
// echo $items->saveHTML();
    for ($i = 0; $i < count($items); $i++) {
        if ($i == 0 || $i == count($items) - 2) {
            continue;
        }

        // echo $i . " " . $items[$i]->nodeValue . "<br>";

        $rows = $items->item($i)->getElementsByTagName('td');
        // echo $rows->item(2)->textContent;

        //POTENTIAL ERORRS!!
        //The
        array_push($titles, $rows->item(2)->textContent);
        array_push($prices, str_replace("HK$", "", $rows->item(3)->textContent));
        array_push($dates, $rows->item(5)->textContent);

    }
    for ($i = 0; $i < count($titles) - 1; $i++) {
        echo "<li class=\"list-group-item\">
                <div class=\"row\">
                  <div class=\"col-10 item-info\">" . $titles[$i] . "</div>
                  <div class=\"col-2\">
                    <button type=\"button\" class=\"btn btn-info price-info\">HKD " . $prices[$i] . "</button>
                  </div>
                </div>
              </li>";
    }
}
// print_r($titles);
// print_r($prices);
// echo $item->saveHTML();