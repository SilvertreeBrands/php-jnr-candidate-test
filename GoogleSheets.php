<?php
// Function to fetch data from a Google Sheet in CSV format
function getDataFromSheet($apiId, $parameters = []) {
    // Construct the URL for fetching the Google Sheet data in CSV format
    $url = "https://docs.google.com/spreadsheets/d/$apiId/export?format=csv";
    
    // Add parameters to the URL if available
    if (!empty($parameters)) {
        $url .= '&' . http_build_query($parameters);
    }

    // Fetch the CSV content from the Google Sheet URL
    $response = file_get_contents($url);
    
    // Split the CSV content into an array of lines
    $lines = explode("\n", $response);

    // Assuming the first line contains column headers
    $headers = str_getcsv(array_shift($lines));

    // Initialize an array to store the parsed sheet data
    $data = [];
    
    // Loop through each line of the CSV content and parse into associative arrays
    foreach ($lines as $line) {
        $row = array_combine($headers, str_getcsv($line));
        $data[] = $row;
    }

    // Return the parsed sheet data
    return $data;
}

// '1QcZQEwpMquWMdMm5EUPb26RDtLTeiEAfiU8CXtj5nIU' is the Google Sheets ID
$apiId = '1QcZQEwpMquWMdMm5EUPb26RDtLTeiEAfiU8CXtj5nIU';
$parameters = ['gid' => '0']; // Specify the gid parameter if needed

// Call the function to fetch and parse data from the Google Sheet
$data = getDataFromSheet($apiId, $parameters);

// Output the parsed sheet data
print_r($data);
?>
