<?php
/*
$json = '{
            "foo-bar": "12345", 
            "fod-bar": "12345"
        }';
$ext = ".json";
$api_url = 'C:\xampp\htdocs\FAQ-COVID\api_test\data'.$ext;

$api_content = file_get_contents($api_url);

$obj = json_decode($api_content,false);

//echo $obj->{'foo-bar'};


echo "<table>";
foreach($obj  as $R=>$D){
 echo "<tr id='Tr_".$R."'>"; 
 foreach($D as $key=>$Value){
    echo "<td id='Td_".$R."_".$key."'>".$Value."</td>";
  }
 echo "</tr>";
}
echo "</table>";

echo $obj->{'Results'}[0]->{''};
//print_r($obj);

*/
 
$json = '{
  "results": [
      {
          "isp": "United States - Wikipedia",
          "link": "https://en.wikipedia.org/wiki/United_States",
          "country": "The United States of America (USA), commonly known as the United States (U.S. or US) or America, is a country mostly located in central North America, ..."
      },
      {
          "isp": "United States - Simple English Wikipedia, the free encyclopedia",
          "link": "https://simple.wikipedia.org/wiki/United_States",
          "country": "The United States of America is a federal republic of fifty states, a federal district, and several territories. It is commonly called the United States, the United States ..."
      },
      {
          "isp": "United States | History, Map, Flag, & Population | Britannica",
          "link": "https://www.britannica.com/place/United-States",
          "country": "6 days ago - United States, country in North America that is a federal republic of 50 states and was founded in 1776."
      },
      {
          "isp": "United States of America - Wikitravel",
          "link": "https://wikitravel.org/en/United_States_of_America",
          "country": "In 1903, the new country of Panama promptly granted the United States control over a swath of territory known as the Canal Zone. The US constructed the Panama ..."
      },
      {
          "isp": "About the United States | USAGov",
          "link": "https://www.usa.gov/about-the-us",
          "country": "Have a question about the USA? Learn where to find answers to the most requested facts about the United States of America."
      },
      {
          "isp": "North America :: United States — The World Factbook - CIA",
          "link": "https://www.cia.gov/library/publications/the-world-factbook/geos/us.html",
          "country": "View United States Photo Gallery. ONE-PAGE SUMMARY. View 359 photos of. UNITED STATES. TRAVEL FACTS. The World Factbook Country/Location Photo ..."
      },
      {
          "isp": "Suspension of Private Charter Flights between the United ...",
          "link": "https://www.state.gov/suspension-of-private-charter-flights-between-the-united-states-and-cuba/",
          "country": "2 days ago - Suspension of Private Charter Flights between the United States and Cuba. Press Statement. Michael R. Pompeo, Secretary of State. August ..."
      },
      {
          "isp": "United States - Statistics, Rankings, News | US News Best ...",
          "link": "https://www.usnews.com/news/best-countries/united-states",
          "country": "The United States of America is a North American nation that is the world\'s most dominant economic and military power. Likewise, its cultural imprint spans the ..."
      }
  ]
}';
$api_url = 'https://api.goog.io/v1/search/q=visartculture';
 
//$api_content = file_get_contents($api_url);
//print_r($api_content);

$api_content_array = json_decode($json,true);
//print_r($api_content_array);
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Adresse IP</title>
</head>
<body>
<?php
/*foreach ($api_content_array as $array => $api) {
  foreach ($api as $a => $ap) {
      echo '<p>'.$ap['title'].'</p>';
      echo '<p">'.$ap['description'].'</p>';
      echo '<br /> Type de la variable retounée: api '.gettype($ap);
  }
}

    echo '<br /> Type de la variable retounée: '.gettype($api_content_array);
*/
    //test du remplacement
    $test ="l'enfant";
    $cote="'";
    $test=str_replace('\'','\\\'',$test);
    echo $test;
?>
