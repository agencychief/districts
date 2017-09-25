<?php
// District FIPS,District Number,State Abbr,Polygon
$file = fopen('pa_district.csv', 'w');
fputcsv($file, array('District Number', 'State Abbr', 'Polygon'));
foreach (glob("*/*.geojson") as $filename) {
  $filecontent = file_get_contents($filename);
	$json = json_decode($filecontent, true);
	$csv = "id,latitude,longitude,name";
  for($i=0;$i< count($json["geometry"]["coordinates"]);$i++) {
    $unnamed = $json["geometry"]["coordinates"][$i];
    foreach($unnamed as $latlong ) {
      foreach($latlong as $d) {
        $polygon .= $d[0] . " " .$d[1] . ",";
        }
      }
    }
}
print $polygon;

?>


// open the file "demosaved.csv" for writing
$file = fopen('demosaved.csv', 'w');

// save the column headers
fputcsv($file, array('Column 1', 'Column 2', 'Column 3', 'Column 4', 'Column 5'));

// Sample data. This can be fetched from mysql too
$data = array(
    array('Data 11', 'Data 12', 'Data 13', 'Data 14', 'Data 15'),
    array('Data 21', 'Data 22', 'Data 23', 'Data 24', 'Data 25'),
    array('Data 31', 'Data 32', 'Data 33', 'Data 34', 'Data 35'),
    array('Data 41', 'Data 42', 'Data 43', 'Data 44', 'Data 45'),
    array('Data 51', 'Data 52', 'Data 53', 'Data 54', 'Data 55')
);

// save each row of the data
foreach ($data as $row)
{
    fputcsv($file, $row);
}

// Close the file
fclose($file);
