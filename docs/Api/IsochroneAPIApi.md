# Swagger\Client\IsochroneAPIApi

All URIs are relative to *https://graphhopper.com/api/1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getIsochrone**](IsochroneAPIApi.md#getisochrone) | **GET** /isochrone | Isochrone Endpoint

# **getIsochrone**
> \Swagger\Client\Model\IsochroneResponse getIsochrone($point, $time_limit, $distance_limit, $vehicle, $buckets, $reverse_flow, $weighting)

Isochrone Endpoint

### Example You can get an example response via:  ``` curl \"https://graphhopper.com/api/1/isochrone?point=51.131108,12.414551&key=[YOUR_KEY]\" ```  Don't forget to replace the placeholder with your own key.  ### Introduction ![Isochrone screenshot](./img/isochrone-example.png)  An isochrone of a location is ''a line connecting points at which a vehicle arrives at the same time'', see Wikipedia. With the same API you can also calculate isodistances, just use the parameter distance_limit instead of time_limit`.  ### Use Cases Some possible areas in which this API may be useful to you:  - real estate analysis - realtors - vehicle scheduling - geomarketing - reach of electric vehicles - transport planning - logistics (distribution and retail network planning)  ### API Clients and Examples See the [clients](#section/API-Clients) section in the main documentation, and [live examples](https://graphhopper.com/api/1/examples/#isochrone).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\IsochroneAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$point = "point_example"; // string | Specify the start coordinate
$time_limit = 600; // int | Specify which time the vehicle should travel. In seconds.
$distance_limit = 56; // int | Specify which distance the vehicle should travel. In meters.
$vehicle = new \Swagger\Client\Model\VehicleProfileId(); // \Swagger\Client\Model\VehicleProfileId | The vehicle profile for which the route should be calculated.
$buckets = 1; // int | Number by which to divide the given `time_limit` to create `buckets` nested isochrones of time intervals `time_limit-n*time_limit/buckets`. Applies analogously to `distance_limit`.
$reverse_flow = false; // bool | If `false` the flow goes from point to the polygon, if `true` the flow goes from the polygon \"inside\" to the point. Example use case for `false`&#58; *How many potential customer can be reached within 30min travel time from your store* vs. `true`&#58; *How many customers can reach your store within 30min travel time.*
$weighting = "fastest"; // string | Use `\"shortest\"` to get an isodistance line instead of an isochrone.

try {
    $result = $apiInstance->getIsochrone($point, $time_limit, $distance_limit, $vehicle, $buckets, $reverse_flow, $weighting);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IsochroneAPIApi->getIsochrone: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **point** | **string**| Specify the start coordinate |
 **time_limit** | **int**| Specify which time the vehicle should travel. In seconds. | [optional] [default to 600]
 **distance_limit** | **int**| Specify which distance the vehicle should travel. In meters. | [optional]
 **vehicle** | [**\Swagger\Client\Model\VehicleProfileId**](../Model/.md)| The vehicle profile for which the route should be calculated. | [optional]
 **buckets** | **int**| Number by which to divide the given &#x60;time_limit&#x60; to create &#x60;buckets&#x60; nested isochrones of time intervals &#x60;time_limit-n*time_limit/buckets&#x60;. Applies analogously to &#x60;distance_limit&#x60;. | [optional] [default to 1]
 **reverse_flow** | **bool**| If &#x60;false&#x60; the flow goes from point to the polygon, if &#x60;true&#x60; the flow goes from the polygon \&quot;inside\&quot; to the point. Example use case for &#x60;false&#x60;&amp;#58; *How many potential customer can be reached within 30min travel time from your store* vs. &#x60;true&#x60;&amp;#58; *How many customers can reach your store within 30min travel time.* | [optional] [default to false]
 **weighting** | **string**| Use &#x60;\&quot;shortest\&quot;&#x60; to get an isodistance line instead of an isochrone. | [optional] [default to fastest]

### Return type

[**\Swagger\Client\Model\IsochroneResponse**](../Model/IsochroneResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

