# Swagger\Client\MatrixAPIApi

All URIs are relative to *https://graphhopper.com/api/1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**calculateMatrix**](MatrixAPIApi.md#calculatematrix) | **POST** /matrix/calculate | Batch Matrix Endpoint
[**getMatrix**](MatrixAPIApi.md#getmatrix) | **GET** /matrix | GET Matrix Endpoint
[**getMatrixSolution**](MatrixAPIApi.md#getmatrixsolution) | **GET** /matrix/solution/{jobId} | GET Batch Matrix Endpoint
[**postMatrix**](MatrixAPIApi.md#postmatrix) | **POST** /matrix | POST Matrix Endpoint

# **calculateMatrix**
> \Swagger\Client\Model\JobId calculateMatrix($body)

Batch Matrix Endpoint

Prefer the [synchronous endpoint](#operation/postMatrix) and use this Batch endpoint for long running problems only.  The Batch Matrix endpoint allows using matrices with more locations and works asynchronously - similar to the [Batch Route Optimization endpoint](#operation/asyncVRP):  * Create a HTTP POST request against `/matrix/calculate` and add the key in the URL: `/matrix/calculate?key=[YOUR_KEY]`. This will give you the `job_id` from the response json like `{ \"job_id\": \"7ac65787-fb99-4e02-a832-2c3010c70097\" }`  * Poll via HTTP GET requests every 500ms against `/matrix/solution/[job_id]`  Here are some full examples via curl: ```bash $ curl -X POST -H \"Content-Type: application/json\" \"https://graphhopper.com/api/1/matrix/calculate?key=[YOUR_KEY]\" -d '{\"points\":[[13.29895,52.48696],[13.370876,52.489575],[13.439026,52.511206]]}' {\"job_id\":\"7ac65787-fb99-4e02-a832-2c3010c70097\"} ```  Pick the returned `job_id` and use it in the next GET requests: ```bash $ curl -X GET \"https://graphhopper.com/api/1/matrix/solution/7ac65787-fb99-4e02-a832-2c3010c70097?key=[YOUR_KEY]\" {\"status\":\"waiting\"} ```  When the calculation is finished (`status:finished`) the JSON response will contain the full matrix JSON under `solution`: ```bash $ curl -X GET \"https://graphhopper.com/api/1/matrix/solution/7ac65787-fb99-4e02-a832-2c3010c70097?key=[YOUR_KEY]\" {\"solution\":{\"weights\":[[0.0,470.453,945.414],[503.793,0.0,580.871],[970.49,569.511,0.0]],\"info\":{\"copyrights\":[\"GraphHopper\",\"OpenStreetMap contributors\"]}},\"status\":\"finished\"} ```  Please note that if an error occured while calculation the JSON will not have a status but contain directly the error message e.g.: ```json {\"message\":\"Cannot find from_points: 1\",\"hints\":[{...}]} ```

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\MatrixAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Body1(); // \Swagger\Client\Model\Body1 | 

try {
    $result = $apiInstance->calculateMatrix($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MatrixAPIApi->calculateMatrix: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Body1**](../Model/Body1.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\JobId**](../Model/JobId.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMatrix**
> \Swagger\Client\Model\MatrixResponse getMatrix($point, $from_point, $to_point, $point_hint, $from_point_hint, $to_point_hint, $snap_prevention, $curbside, $from_curbside, $to_curbside, $out_array, $vehicle, $fail_fast, $turn_costs)

GET Matrix Endpoint

With this Matrix Endpoint you submit the points and parameters via URL parameters and is the most convenient as it works out-of-the-box in the browser. If possible you should prefer using the [POST Matrix Endpoint](#operation/postMatrix) that avoids problems with many locations and automatically gzipps the request (note that all endpoints return gzipped results).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\MatrixAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$point = array("point_example"); // string[] | Specify multiple points in `latitude,longitude` for which the weight-, route-, time- or distance-matrix should be calculated. In this case the starts are identical to the destinations. If there are N points, then NxN entries will be calculated. The order of the point parameter is important. Specify at least three points. Cannot be used together with from_point or to_point.
$from_point = array("from_point_example"); // string[] | The starting points for the routes in `latitude,longitude`. E.g. if you want to calculate the three routes A-&gt;1, A-&gt;2, A-&gt;3 then you have one from_point parameter and three to_point parameters.
$to_point = array("to_point_example"); // string[] | The destination points for the routes in `latitude,longitude`.
$point_hint = array("point_hint_example"); // string[] | Optional parameter. Specifies a hint for each `point` parameter to prefer a certain street for the closest location lookup. E.g. if there is an address or house with two or more neighboring streets you can control for which street the closest location is looked up.
$from_point_hint = array("from_point_hint_example"); // string[] | For the from_point parameter. See point_hint
$to_point_hint = array("to_point_hint_example"); // string[] | For the to_point parameter. See point_hint
$snap_prevention = array("snap_prevention_example"); // string[] | Optional parameter to avoid snapping to a certain road class or road environment. Current supported values `motorway`, `trunk`, `ferry`, `tunnel`, `bridge` and `ford`. Multiple values are specified like `snap_prevention=ferry&snap_prevention=motorway`
$curbside = array("curbside_example"); // string[] | Optional parameter. It specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. You need to specify this parameter for either none or all points. Only supported for motor vehicles and OpenStreetMap.
$from_curbside = array("from_curbside_example"); // string[] | Curbside setting for the from_point parameter. See curbside.
$to_curbside = array("to_curbside_example"); // string[] | Curbside setting for the to_point parameter. See curbside.
$out_array = array("out_array_example"); // string[] | Specifies which arrays should be included in the response. Specify one or more of the following options 'weights', 'times', 'distances'. To specify more than one array use e.g. out_array=times&out_array=distances. The units of the entries of distances are meters, of times are seconds and of weights is arbitrary and it can differ for different vehicles or versions of this API.
$vehicle = new \Swagger\Client\Model\VehicleProfileId(); // \Swagger\Client\Model\VehicleProfileId | The vehicle profile for which the matrix should be calculated.
$fail_fast = true; // bool | Specifies whether or not the matrix calculation should return with an error as soon as possible in case some points cannot be found or some points are not connected. If set to `false` the time/weight/distance matrix will be calculated for all valid points and contain the `null` value for all entries that could not be calculated. The `hint` field of the response will also contain additional information about what went wrong (see its documentation).
$turn_costs = false; // bool | Specifies if turn restrictions should be considered. Enabling this option increases the matrix computation time. Only supported for motor vehicles and OpenStreetMap.

try {
    $result = $apiInstance->getMatrix($point, $from_point, $to_point, $point_hint, $from_point_hint, $to_point_hint, $snap_prevention, $curbside, $from_curbside, $to_curbside, $out_array, $vehicle, $fail_fast, $turn_costs);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MatrixAPIApi->getMatrix: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **point** | [**string[]**](../Model/string.md)| Specify multiple points in &#x60;latitude,longitude&#x60; for which the weight-, route-, time- or distance-matrix should be calculated. In this case the starts are identical to the destinations. If there are N points, then NxN entries will be calculated. The order of the point parameter is important. Specify at least three points. Cannot be used together with from_point or to_point. | [optional]
 **from_point** | [**string[]**](../Model/string.md)| The starting points for the routes in &#x60;latitude,longitude&#x60;. E.g. if you want to calculate the three routes A-&amp;gt;1, A-&amp;gt;2, A-&amp;gt;3 then you have one from_point parameter and three to_point parameters. | [optional]
 **to_point** | [**string[]**](../Model/string.md)| The destination points for the routes in &#x60;latitude,longitude&#x60;. | [optional]
 **point_hint** | [**string[]**](../Model/string.md)| Optional parameter. Specifies a hint for each &#x60;point&#x60; parameter to prefer a certain street for the closest location lookup. E.g. if there is an address or house with two or more neighboring streets you can control for which street the closest location is looked up. | [optional]
 **from_point_hint** | [**string[]**](../Model/string.md)| For the from_point parameter. See point_hint | [optional]
 **to_point_hint** | [**string[]**](../Model/string.md)| For the to_point parameter. See point_hint | [optional]
 **snap_prevention** | [**string[]**](../Model/string.md)| Optional parameter to avoid snapping to a certain road class or road environment. Current supported values &#x60;motorway&#x60;, &#x60;trunk&#x60;, &#x60;ferry&#x60;, &#x60;tunnel&#x60;, &#x60;bridge&#x60; and &#x60;ford&#x60;. Multiple values are specified like &#x60;snap_prevention&#x3D;ferry&amp;snap_prevention&#x3D;motorway&#x60; | [optional]
 **curbside** | [**string[]**](../Model/string.md)| Optional parameter. It specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. You need to specify this parameter for either none or all points. Only supported for motor vehicles and OpenStreetMap. | [optional]
 **from_curbside** | [**string[]**](../Model/string.md)| Curbside setting for the from_point parameter. See curbside. | [optional]
 **to_curbside** | [**string[]**](../Model/string.md)| Curbside setting for the to_point parameter. See curbside. | [optional]
 **out_array** | [**string[]**](../Model/string.md)| Specifies which arrays should be included in the response. Specify one or more of the following options &#x27;weights&#x27;, &#x27;times&#x27;, &#x27;distances&#x27;. To specify more than one array use e.g. out_array&#x3D;times&amp;out_array&#x3D;distances. The units of the entries of distances are meters, of times are seconds and of weights is arbitrary and it can differ for different vehicles or versions of this API. | [optional]
 **vehicle** | [**\Swagger\Client\Model\VehicleProfileId**](../Model/.md)| The vehicle profile for which the matrix should be calculated. | [optional]
 **fail_fast** | **bool**| Specifies whether or not the matrix calculation should return with an error as soon as possible in case some points cannot be found or some points are not connected. If set to &#x60;false&#x60; the time/weight/distance matrix will be calculated for all valid points and contain the &#x60;null&#x60; value for all entries that could not be calculated. The &#x60;hint&#x60; field of the response will also contain additional information about what went wrong (see its documentation). | [optional] [default to true]
 **turn_costs** | **bool**| Specifies if turn restrictions should be considered. Enabling this option increases the matrix computation time. Only supported for motor vehicles and OpenStreetMap. | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\MatrixResponse**](../Model/MatrixResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMatrixSolution**
> \Swagger\Client\Model\MatrixResponse getMatrixSolution($job_id)

GET Batch Matrix Endpoint

This endpoint returns the solution of a JSON submitted to the Batch Matrix endpoint. You can fetch it with the job_id, you have been sent.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\MatrixAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = "job_id_example"; // string | Request solution with jobId

try {
    $result = $apiInstance->getMatrixSolution($job_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MatrixAPIApi->getMatrixSolution: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **job_id** | **string**| Request solution with jobId |

### Return type

[**\Swagger\Client\Model\MatrixResponse**](../Model/MatrixResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postMatrix**
> \Swagger\Client\Model\MatrixResponse postMatrix($body)

POST Matrix Endpoint

The [GET endpoint](#operation/getMatrix) has an URL length limitation, which hurts for many locations per request. In those cases use this POST endpoint with a JSON as input. The only parameter in the URL will be the key. Both request scenarios are identical except that all singular parameter names are named as their plural for a POST request. The effected parameters are: `points`, `from_points`, `to_points`, and `out_arrays`. For the remaining parameters please refer to the [guide of the GET endpoint](#operation/getMatrix).  **Please note that in contrast to GET endpoint the points have to be specified as `longitude, latitude` pairs (in that order, similar to [GeoJson](http://geojson.org/geojson-spec.html#examples))**.  For example the query `point=10,11&point=20,22&vehicle=car` will be converted to the following JSON: ```json { \"points\": [[11,10], [22,20]], \"vehicle\": \"car\" } ```  A complete curl Example: ```bash curl -X POST -H \"Content-Type: application/json\" \"https://graphhopper.com/api/1/matrix?key=[YOUR_KEY]\" -d '{\"elevation\":false,\"out_arrays\":[\"weights\", \"times\"],\"from_points\":[[-0.087891,51.534377],[-0.090637,51.467697],[-0.171833,51.521241],[-0.211487,51.473685]],\"to_points\":[[-0.087891,51.534377],[-0.090637,51.467697],[-0.171833,51.521241],[-0.211487,51.473685]],\"vehicle\":\"car\"}' ```

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\MatrixAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Body(); // \Swagger\Client\Model\Body | 

try {
    $result = $apiInstance->postMatrix($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MatrixAPIApi->postMatrix: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Body**](../Model/Body.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\MatrixResponse**](../Model/MatrixResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

