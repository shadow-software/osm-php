# Swagger\Client\ClusterAPIApi

All URIs are relative to *https://graphhopper.com/api/1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**asyncClusteringProblem**](ClusterAPIApi.md#asyncclusteringproblem) | **POST** /cluster/calculate | Batch Cluster Endpoint
[**getClusterSolution**](ClusterAPIApi.md#getclustersolution) | **GET** /cluster/solution/{jobId} | GET Batch Solution Endpoint
[**solveClusteringProblem**](ClusterAPIApi.md#solveclusteringproblem) | **POST** /cluster | POST Cluster Endpoint

# **asyncClusteringProblem**
> \Swagger\Client\Model\JobId asyncClusteringProblem($body)

Batch Cluster Endpoint

Prefer the [synchronous endpoint](#operation/solveClusteringProblem) and use this Batch Cluster endpoint for long running problems only. The work flow is asynchronous:  - send a POST request towards `https://graphhopper.com/api/1/cluster/calculate?key=<your_key>` and fetch the job_id. - poll the solution every 500ms until it gives `status=finished`. Do this with a GET request   towards `https://graphhopper.com/api/1/cluster/solution/<job_id>?key=<your_key>`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\ClusterAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ClusterRequest(); // \Swagger\Client\Model\ClusterRequest | Request object that contains the problem to be solved

try {
    $result = $apiInstance->asyncClusteringProblem($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ClusterAPIApi->asyncClusteringProblem: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ClusterRequest**](../Model/ClusterRequest.md)| Request object that contains the problem to be solved |

### Return type

[**\Swagger\Client\Model\JobId**](../Model/JobId.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getClusterSolution**
> \Swagger\Client\Model\ClusterResponse getClusterSolution($job_id)

GET Batch Solution Endpoint

This endpoint returns the solution of the clustering problems submitted to the [Batch Cluster endpoint](#operation/asyncClusteringProblem). You can fetch it with the job_id, you have been sent.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\ClusterAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = "job_id_example"; // string | Request solution with jobId

try {
    $result = $apiInstance->getClusterSolution($job_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ClusterAPIApi->getClusterSolution: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **job_id** | **string**| Request solution with jobId |

### Return type

[**\Swagger\Client\Model\ClusterResponse**](../Model/ClusterResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **solveClusteringProblem**
> \Swagger\Client\Model\ClusterResponse solveClusteringProblem($body)

POST Cluster Endpoint

The Cluster endpoint is used with a POST request towards `https://graphhopper.com/api/1/cluster?key=<your_key>`. The solution will be provided in the JSON response. Please note that for problems that take longer than 10 seconds a bad request error is returned. In this case please use the asynchronous [Batch Cluster Endpoint](#operation/asyncClusteringProblem) instead.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\ClusterAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ClusterRequest(); // \Swagger\Client\Model\ClusterRequest | Request object that contains the problem to be solved

try {
    $result = $apiInstance->solveClusteringProblem($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ClusterAPIApi->solveClusteringProblem: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ClusterRequest**](../Model/ClusterRequest.md)| Request object that contains the problem to be solved |

### Return type

[**\Swagger\Client\Model\ClusterResponse**](../Model/ClusterResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

