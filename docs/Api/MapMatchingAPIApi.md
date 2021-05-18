# Swagger\Client\MapMatchingAPIApi

All URIs are relative to *https://graphhopper.com/api/1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**postGPX**](MapMatchingAPIApi.md#postgpx) | **POST** /match | Map-match a GPX file

# **postGPX**
> \Swagger\Client\Model\RouteResponse postGPX($gps_accuracy, $vehicle)

Map-match a GPX file

### Example You get an example response for a GPX via:  ``` curl -XPOST -H \"Content-Type: application/gpx+xml\" \"https://graphhopper.com/api/1/match?vehicle=car&key=[YOUR_KEY]\" --data @/path/to/some.gpx ```  A minimal working GPX file looks like ```gpx <gpx>  <trk>   <trkseg>    <trkpt lat=\"51.343657\" lon=\"12.360708\"></trkpt>    <trkpt lat=\"51.343796\" lon=\"12.361337\"></trkpt>    <trkpt lat=\"51.342784\" lon=\"12.361882\"></trkpt>   </trkseg>  </trk> </gpx> ```  ### Introduction ![Map Matching screenshot](./img/map-matching-example.gif)  The Map Matching API is part of the GraphHopper Directions API and with this API you can snap measured GPS points typically as GPX files to a digital road network to e.g. clean data or attach certain data like elevation or turn instructions to it. Read more at Wikipedia.  In the example screenshot above and demo you see the Map Matching API in action where the black line is the GPS track and the green one is matched result.  Most of the times, you can simply POST a GPX file, but some of the request parameters of the [Routing API](#tag/Routing-API) apply here, too.  ### API Clients and Examples See the [clients](#section/API-Clients) section in the main documentation, and [live examples](https://graphhopper.com/api/1/examples/#map-matching).  ### Limits and Counts The cost for one request depends on the number of GPS location and is documented [here](https://graphhopper.com/api/1/docs/FAQ/).  One request should not exceed the Map Matching API location limit depending on the package, see the pricing in our dashboard.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\MapMatchingAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$gps_accuracy = 56; // int | Specify the precision of a point, in meter
$vehicle = "vehicle_example"; // string | Specify the vehicle profile like car

try {
    $result = $apiInstance->postGPX($gps_accuracy, $vehicle);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MapMatchingAPIApi->postGPX: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **gps_accuracy** | **int**| Specify the precision of a point, in meter | [optional]
 **vehicle** | **string**| Specify the vehicle profile like car | [optional]

### Return type

[**\Swagger\Client\Model\RouteResponse**](../Model/RouteResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

