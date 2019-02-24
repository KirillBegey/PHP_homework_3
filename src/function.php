<?php
//function task1
function orderInformation()
{
    $fileData = file_get_contents('data.xml');
    $xml = new SimpleXMLElement($fileData);
    echo "Номер заказа: " . $xml->attributes()['PurchaseOrderNumber'] . "<br>";
    echo "Дата заказа: " . $xml->attributes()['OrderDate'] . "<br>";
    foreach ($xml->Address as $typeAddress) {
        if ($typeAddress->attributes() == "Shipping") {
            echo "Адрес магазина:<br>";
        } elseif ($typeAddress->attributes() == "Billing") {
            echo "Адрес накладной:<br>";
        }
        echo "Имя получателя: " . $typeAddress->Name . "<br>";
        echo "Улица получателя: " . $typeAddress->Street . "<br>";
        echo "Город получателя: " . $typeAddress->City . "<br>";
        echo "Штат получателя: " . $typeAddress->State . "<br>";
        echo "Индекс получателя: " . $typeAddress->Zip . "<br>";
        echo "Страна получателя: " . $typeAddress->Country . "<br>";
    }
    echo "Комментарий к заказу: " . $xml->DeliveryNotes . "<br>";
    foreach ($xml->Items->Item as $item) {
        echo "Артикул товара: " . $item->attributes() . "<br>";
        echo "Наименование товара: " . $item->ProductName . "<br>";
        echo "Количество товара: " . $item->Quantity . "<br>";
        echo "Цена товара: " . $item->USPrice . "<br>";
        echo "Дата отправки: " . $item->ShipDate . "<br>";
    }
}

//function task2
function arrayToJson($array)
{
    return json_encode($array);
}

function createJsonFile($fileName, $jsonFile)
{
    return file_put_contents($fileName, $jsonFile);
}

function readJsonFile(string $fileName)
{
    return file_get_contents($fileName);
}

function changingData($fileName, $data, $array)
{
    $changingData = rand(0, 1);
    if ($changingData) {
        return createJsonFile($fileName, $data);
    } else {
        $jsonFile2 = arrayToJson($array);
        return createJsonFile($fileName, $jsonFile2);
    }
}

function arrayComparison($array1, $array2)
{
    if ($array1 === $array2) {
        return "Файлы одинаковые";
    } else {
        return "Содержание 1-го файла: <br>$array1 <br>" . "Содержание 2-го файла: <br>$array2";
    }
}

//function task3
function createArray($numbersFrom, $numbersTo, $arrayLength)
{
    $arbitraryArray = [];
    for ($i = 0; $i <= ($arrayLength - 1); $i++) {
        $arbitraryArray[$i] = rand($numbersFrom, $numbersTo);
    }
    return $arbitraryArray;
}
function createCsvFile(string $fileName, $array) {
    $createFile = fopen($fileName, "w+");
    fputcsv($createFile, $array);
    fclose($createFile);
}

function openCsvFile(string $fileName)
{
    $openFile = fopen($fileName, "r");
    $arrayNumbers = fgetcsv($openFile, 1000, ",");
    fclose($openFile);
    return $arrayNumbers;
}

function sumOfNumbers($array)
{
    $evenNumbers = [];
    foreach ($array as $key => $value) {
        if (($value % 2) == 0) {
            $evenNumbers[] = $value;
        }
    }
    return array_sum($evenNumbers);
}

//function task4
function jsonToArray($json)
{
    return json_decode($json, true);
}
