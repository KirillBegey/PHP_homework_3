<?php
require("src/function.php");

//task1
orderInformation();
echo "<hr>";

//task2
$array1 = ['a' => 1, 'b' =>2, 'c' => 3];
$array2 = ['d' => 4, 'e' =>5, 'f' => 6];
$jsonFile1 = arrayToJson($array1);
createJsonFile('output.json', $jsonFile1);
$arrayJsonString1 = readJsonFile('output.json');
changingData('output2.json', $arrayJsonString1, $array2);
$arrayJsonString2 = readJsonFile('output2.json');
echo arrayComparison($arrayJsonString1, $arrayJsonString2);
echo "<hr>";

//task3
$arbitraryArray = createArray(1, 100, 50);
createCsvFile('output.csv', $arbitraryArray);
$arrayNumbers = openCsvFile('output.csv');
echo sumOfNumbers($arrayNumbers);
echo "<hr>";

//task4
$url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";
$jsonString = readJsonFile($url);
$arrayJson = jsonToArray($jsonString);
echo $arrayJson['query']['pages']['15580374']['title'] . "<br>";
echo $arrayJson['query']['pages']['15580374']['pageid'];