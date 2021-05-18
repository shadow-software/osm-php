# Swagger\Client\RouteOptimizationAPIApi

All URIs are relative to *https://graphhopper.com/api/1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**asyncVRP**](RouteOptimizationAPIApi.md#asyncvrp) | **POST** /vrp/optimize | POST route optimization problem (batch mode)
[**getSolution**](RouteOptimizationAPIApi.md#getsolution) | **GET** /vrp/solution/{jobId} | GET the solution (batch mode)
[**solveVRP**](RouteOptimizationAPIApi.md#solvevrp) | **POST** /vrp | POST route optimization problem

# **asyncVRP**
> \Swagger\Client\Model\JobId asyncVRP($body)

POST route optimization problem (batch mode)

To solve a vehicle routing problem, perform the following steps:  1.) Make a HTTP POST to this URL  ``` https://graphhopper.com/api/1/vrp/optimize?key=<your_key> ```  It returns a job id (job_id).  2.) Take the job id and fetch the solution for the vehicle routing problem from this URL:  ``` https://graphhopper.com/api/1/vrp/solution/<job_id>?key=<your_key> ```  We recommend to query the solution every 500ms until it returns 'status=finished'.  **Note**: Since the workflow is a bit more cumbersome and since you lose some time in fetching the solution, you should always prefer the [synchronous endpoint](#operation/solveVRP). You should use the batch mode only for long running problems.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\RouteOptimizationAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Request(); // \Swagger\Client\Model\Request | The request that contains the problem to be solved.

try {
    $result = $apiInstance->asyncVRP($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RouteOptimizationAPIApi->asyncVRP: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Request**](../Model/Request.md)| The request that contains the problem to be solved. |

### Return type

[**\Swagger\Client\Model\JobId**](../Model/JobId.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSolution**
> \Swagger\Client\Model\Response getSolution($job_id)

GET the solution (batch mode)

Take the job id and fetch the solution for the vehicle routing problem from this URL:  ``` https://graphhopper.com/api/1/vrp/solution/<job_id>?key=<your_key> ```  You get the job id by sending a vehicle routing problem to the [batch mode URL](#operation/asyncVRP).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\RouteOptimizationAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = "job_id_example"; // string | Request solution with jobId

try {
    $result = $apiInstance->getSolution($job_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RouteOptimizationAPIApi->getSolution: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **job_id** | **string**| Request solution with jobId |

### Return type

[**\Swagger\Client\Model\Response**](../Model/Response.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **solveVRP**
> \Swagger\Client\Model\Response solveVRP($body)

POST route optimization problem

To get started with the Route Optimization API, please read the [introduction](#tag/Route-Optimization-API).  To solve a new vehicle routing problem, make a HTTP POST to this URL  ``` https://graphhopper.com/api/1/vrp?key=<your_key> ```  It returns the solution to this problem in the JSON response.  Please note that this URL is very well suited to solve minor problems. Larger vehicle routing problems, which take longer than 10 seconds to solve, cannot be solved. To solve them, please use the [batch mode URL](#operation/asyncVRP) instead.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\RouteOptimizationAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Request(); // \Swagger\Client\Model\Request | The request that contains the vehicle routing problem to be solved.

try {
    $result = $apiInstance->solveVRP($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RouteOptimizationAPIApi->solveVRP: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Request**](../Model/Request.md)| The request that contains the vehicle routing problem to be solved. |

### Return type

[**\Swagger\Client\Model\Response**](../Model/Response.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

