# Swagger\Client\RoutingAPIApi

All URIs are relative to *https://graphhopper.com/api/1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getRoute**](RoutingAPIApi.md#getroute) | **GET** /route | GET Route Endpoint
[**postRoute**](RoutingAPIApi.md#postroute) | **POST** /route | POST Route Endpoint
[**routeInfoGet**](RoutingAPIApi.md#routeinfoget) | **GET** /route/info | Coverage information

# **getRoute**
> \Swagger\Client\Model\RouteResponse getRoute($point, $point_hint, $snap_prevention, $vehicle, $curbside, $turn_costs, $locale, $elevation, $details, $optimize, $instructions, $calc_points, $debug, $points_encoded, $ch_disable, $weighting, $heading, $heading_penalty, $pass_through, $block_area, $avoid, $algorithm, $round_trip_distance, $round_trip_seed, $alternative_route_max_paths, $alternative_route_max_weight_factor, $alternative_route_max_share_factor)

GET Route Endpoint

The GET request is the most simple one: just specify the parameter in the URL and you are done. Can be tried directly in every browser.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\RoutingAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$point = array("point_example"); // string[] | The points for which the route should be calculated. Format: `[latitude,longitude]`. Specify at least an origin and a destination. Via points are possible. The maximum number depends on your plan.
$point_hint = array("point_hint_example"); // string[] | The `point_hint` is typically a road name to which the associated `point` parameter should be snapped to. Specify no `point_hint` parameter or the same number as you have `point` parameters.
$snap_prevention = array("snap_prevention_example"); // string[] | Optional parameter to avoid snapping to a certain road class or road environment. Currently supported values are `motorway`, `trunk`, `ferry`, `tunnel`, `bridge` and `ford`. Multiple values are specified like `snap_prevention=ferry&snap_prevention=motorway`.
$vehicle = new \Swagger\Client\Model\VehicleProfileId(); // \Swagger\Client\Model\VehicleProfileId | The vehicle profile for which the route should be calculated.
$curbside = array("curbside_example"); // string[] | Optional parameter. It specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. You need to specify this parameter for either none or all points. Only supported for motor vehicles and OpenStreetMap.
$turn_costs = false; // bool | Specifies if turn restrictions should be considered. Enabling this option increases the route computation time. Only supported for motor vehicles and OpenStreetMap.
$locale = "en"; // string | The locale of the resulting turn instructions. E.g. `pt_PT` for Portuguese or `de` for German.
$elevation = false; // bool | If `true`, a third coordinate, the altitude, is included with all positions in the response. This changes the format of the `points` and `snapped_waypoints` fields of the response, in both their encodings. Unless you switch off the `points_encoded` parameter, you need special code on the client side that can handle three-dimensional coordinates. A request can fail if the vehicle profile does not support elevation. See the features object for every vehicle profile.
$details = array("details_example"); // string[] | Optional parameter to retrieve path details. You can request additional details for the route: `street_name`,  `time`, `distance`, `max_speed`, `toll`, `road_class`, `road_class_link`, `road_access`, `road_environment`, `lanes`, and `surface`. Read more about the usage of path details [here](https://discuss.graphhopper.com/t/2539).
$optimize = "false"; // string | Normally, the calculated route will visit the points in the order you specified them. If you have more than two points, you can set this parameter to `\"true\"` and the points may be re-ordered to minimize the total travel time. Keep in mind that the limits on the number of locations of the Route Optimization API applies, and the request costs more credits.
$instructions = true; // bool | If instructions should be calculated and returned
$calc_points = true; // bool | If the points for the route should be calculated at all.
$debug = false; // bool | If `true`, the output will be formatted.
$points_encoded = true; // bool | Allows changing the encoding of location data in the response. The default is polyline encoding, which is compact but requires special client code to unpack. (We provide it in our JavaScript client library!) Set this parameter to `false` to switch the encoding to simple coordinate pairs like `[lon,lat]`, or `[lon,lat,elevation]`. See the description of the response format for more information.
$ch_disable = false; // bool | Use this parameter in combination with one or more parameters from below.
$weighting = "fastest"; // string | Determines the way the \"best\" route is calculated. Besides `fastest` you can use `short_fastest` which finds a reasonable balance between the distance influence (`shortest`) and the time (`fastest`). You could also use `shortest` but is deprecated and not recommended for motor vehicles. All except `fastest` require `ch.disable=true`.
$heading = array(56); // int[] | Favour a heading direction for a certain point. Specify either one heading for the start point or as many as there are points. In this case headings are associated by their order to the specific points. Headings are given as north based clockwise angle between 0 and 360 degree. This parameter also influences the tour generated with `algorithm=round_trip` and forces the initial direction.  Requires `ch.disable=true`.
$heading_penalty = 120; // int | Time penalty in seconds for not obeying a specified heading. Requires `ch.disable=true`.
$pass_through = false; // bool | If `true`, u-turns are avoided at via-points with regard to the `heading_penalty`. Requires `ch.disable=true`.
$block_area = "block_area_example"; // string | Block road access by specifying a point close to the road segment to be blocked, with the format `lat,lon`. You can also block all road segments crossing a geometric shape. Specify a circle using the format `lat,lon,radius`, or a polygon using the format `lat1,lon1,lat2,lon2,...,latN,lonN`. You can specify several shapes, separating them with `;`. Requires `ch.disable=true`.
$avoid = "avoid_example"; // string | Specify which road classes and environments you would like to avoid.  Possible values are `motorway`, `steps`, `track`, `toll`, `ferry`, `tunnel` and `bridge`. Separate several values with `;`. Obviously not all the values make sense for all vehicle profiles e.g. `bike` is already forbidden on a `motorway`. Requires `ch.disable=true`.
$algorithm = "algorithm_example"; // string | Rather than looking for the shortest or fastest path, this parameter lets you solve two different problems related to routing: With `alternative_route`, we give you not one but several routes that are close to optimal, but not too similar to each other.  With `round_trip`, the route will get you back to where you started. This is meant for fun (think of a bike trip), so we will add some randomness. The `round_trip` option requires `ch.disable=true`. You can control both of these features with additional parameters, see below.
$round_trip_distance = 10000; // int | If `algorithm=round_trip`, this parameter configures approximative length of the resulting round trip. Requires `ch.disable=true`.
$round_trip_seed = 789; // int | If `algorithm=round_trip`, this sets the random seed. Change this to get a different tour for each value.
$alternative_route_max_paths = 2; // int | If `algorithm=alternative_route`, this parameter sets the number of maximum paths which should be calculated. Increasing can lead to worse alternatives.
$alternative_route_max_weight_factor = 1.4; // float | If `algorithm=alternative_route`, this parameter sets the factor by which the alternatives routes can be longer than the optimal route. Increasing can lead to worse alternatives.
$alternative_route_max_share_factor = 0.6; // float | If `algorithm=alternative_route`, this parameter specifies how similar an alternative route can be to the optimal route. Increasing can lead to worse alternatives.

try {
    $result = $apiInstance->getRoute($point, $point_hint, $snap_prevention, $vehicle, $curbside, $turn_costs, $locale, $elevation, $details, $optimize, $instructions, $calc_points, $debug, $points_encoded, $ch_disable, $weighting, $heading, $heading_penalty, $pass_through, $block_area, $avoid, $algorithm, $round_trip_distance, $round_trip_seed, $alternative_route_max_paths, $alternative_route_max_weight_factor, $alternative_route_max_share_factor);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutingAPIApi->getRoute: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **point** | [**string[]**](../Model/string.md)| The points for which the route should be calculated. Format: &#x60;[latitude,longitude]&#x60;. Specify at least an origin and a destination. Via points are possible. The maximum number depends on your plan. |
 **point_hint** | [**string[]**](../Model/string.md)| The &#x60;point_hint&#x60; is typically a road name to which the associated &#x60;point&#x60; parameter should be snapped to. Specify no &#x60;point_hint&#x60; parameter or the same number as you have &#x60;point&#x60; parameters. | [optional]
 **snap_prevention** | [**string[]**](../Model/string.md)| Optional parameter to avoid snapping to a certain road class or road environment. Currently supported values are &#x60;motorway&#x60;, &#x60;trunk&#x60;, &#x60;ferry&#x60;, &#x60;tunnel&#x60;, &#x60;bridge&#x60; and &#x60;ford&#x60;. Multiple values are specified like &#x60;snap_prevention&#x3D;ferry&amp;snap_prevention&#x3D;motorway&#x60;. | [optional]
 **vehicle** | [**\Swagger\Client\Model\VehicleProfileId**](../Model/.md)| The vehicle profile for which the route should be calculated. | [optional]
 **curbside** | [**string[]**](../Model/string.md)| Optional parameter. It specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. You need to specify this parameter for either none or all points. Only supported for motor vehicles and OpenStreetMap. | [optional]
 **turn_costs** | **bool**| Specifies if turn restrictions should be considered. Enabling this option increases the route computation time. Only supported for motor vehicles and OpenStreetMap. | [optional] [default to false]
 **locale** | **string**| The locale of the resulting turn instructions. E.g. &#x60;pt_PT&#x60; for Portuguese or &#x60;de&#x60; for German. | [optional] [default to en]
 **elevation** | **bool**| If &#x60;true&#x60;, a third coordinate, the altitude, is included with all positions in the response. This changes the format of the &#x60;points&#x60; and &#x60;snapped_waypoints&#x60; fields of the response, in both their encodings. Unless you switch off the &#x60;points_encoded&#x60; parameter, you need special code on the client side that can handle three-dimensional coordinates. A request can fail if the vehicle profile does not support elevation. See the features object for every vehicle profile. | [optional] [default to false]
 **details** | [**string[]**](../Model/string.md)| Optional parameter to retrieve path details. You can request additional details for the route: &#x60;street_name&#x60;,  &#x60;time&#x60;, &#x60;distance&#x60;, &#x60;max_speed&#x60;, &#x60;toll&#x60;, &#x60;road_class&#x60;, &#x60;road_class_link&#x60;, &#x60;road_access&#x60;, &#x60;road_environment&#x60;, &#x60;lanes&#x60;, and &#x60;surface&#x60;. Read more about the usage of path details [here](https://discuss.graphhopper.com/t/2539). | [optional]
 **optimize** | **string**| Normally, the calculated route will visit the points in the order you specified them. If you have more than two points, you can set this parameter to &#x60;\&quot;true\&quot;&#x60; and the points may be re-ordered to minimize the total travel time. Keep in mind that the limits on the number of locations of the Route Optimization API applies, and the request costs more credits. | [optional] [default to false]
 **instructions** | **bool**| If instructions should be calculated and returned | [optional] [default to true]
 **calc_points** | **bool**| If the points for the route should be calculated at all. | [optional] [default to true]
 **debug** | **bool**| If &#x60;true&#x60;, the output will be formatted. | [optional] [default to false]
 **points_encoded** | **bool**| Allows changing the encoding of location data in the response. The default is polyline encoding, which is compact but requires special client code to unpack. (We provide it in our JavaScript client library!) Set this parameter to &#x60;false&#x60; to switch the encoding to simple coordinate pairs like &#x60;[lon,lat]&#x60;, or &#x60;[lon,lat,elevation]&#x60;. See the description of the response format for more information. | [optional] [default to true]
 **ch_disable** | **bool**| Use this parameter in combination with one or more parameters from below. | [optional] [default to false]
 **weighting** | **string**| Determines the way the \&quot;best\&quot; route is calculated. Besides &#x60;fastest&#x60; you can use &#x60;short_fastest&#x60; which finds a reasonable balance between the distance influence (&#x60;shortest&#x60;) and the time (&#x60;fastest&#x60;). You could also use &#x60;shortest&#x60; but is deprecated and not recommended for motor vehicles. All except &#x60;fastest&#x60; require &#x60;ch.disable&#x3D;true&#x60;. | [optional] [default to fastest]
 **heading** | [**int[]**](../Model/int.md)| Favour a heading direction for a certain point. Specify either one heading for the start point or as many as there are points. In this case headings are associated by their order to the specific points. Headings are given as north based clockwise angle between 0 and 360 degree. This parameter also influences the tour generated with &#x60;algorithm&#x3D;round_trip&#x60; and forces the initial direction.  Requires &#x60;ch.disable&#x3D;true&#x60;. | [optional]
 **heading_penalty** | **int**| Time penalty in seconds for not obeying a specified heading. Requires &#x60;ch.disable&#x3D;true&#x60;. | [optional] [default to 120]
 **pass_through** | **bool**| If &#x60;true&#x60;, u-turns are avoided at via-points with regard to the &#x60;heading_penalty&#x60;. Requires &#x60;ch.disable&#x3D;true&#x60;. | [optional] [default to false]
 **block_area** | **string**| Block road access by specifying a point close to the road segment to be blocked, with the format &#x60;lat,lon&#x60;. You can also block all road segments crossing a geometric shape. Specify a circle using the format &#x60;lat,lon,radius&#x60;, or a polygon using the format &#x60;lat1,lon1,lat2,lon2,...,latN,lonN&#x60;. You can specify several shapes, separating them with &#x60;;&#x60;. Requires &#x60;ch.disable&#x3D;true&#x60;. | [optional]
 **avoid** | **string**| Specify which road classes and environments you would like to avoid.  Possible values are &#x60;motorway&#x60;, &#x60;steps&#x60;, &#x60;track&#x60;, &#x60;toll&#x60;, &#x60;ferry&#x60;, &#x60;tunnel&#x60; and &#x60;bridge&#x60;. Separate several values with &#x60;;&#x60;. Obviously not all the values make sense for all vehicle profiles e.g. &#x60;bike&#x60; is already forbidden on a &#x60;motorway&#x60;. Requires &#x60;ch.disable&#x3D;true&#x60;. | [optional]
 **algorithm** | **string**| Rather than looking for the shortest or fastest path, this parameter lets you solve two different problems related to routing: With &#x60;alternative_route&#x60;, we give you not one but several routes that are close to optimal, but not too similar to each other.  With &#x60;round_trip&#x60;, the route will get you back to where you started. This is meant for fun (think of a bike trip), so we will add some randomness. The &#x60;round_trip&#x60; option requires &#x60;ch.disable&#x3D;true&#x60;. You can control both of these features with additional parameters, see below. | [optional]
 **round_trip_distance** | **int**| If &#x60;algorithm&#x3D;round_trip&#x60;, this parameter configures approximative length of the resulting round trip. Requires &#x60;ch.disable&#x3D;true&#x60;. | [optional] [default to 10000]
 **round_trip_seed** | **int**| If &#x60;algorithm&#x3D;round_trip&#x60;, this sets the random seed. Change this to get a different tour for each value. | [optional]
 **alternative_route_max_paths** | **int**| If &#x60;algorithm&#x3D;alternative_route&#x60;, this parameter sets the number of maximum paths which should be calculated. Increasing can lead to worse alternatives. | [optional] [default to 2]
 **alternative_route_max_weight_factor** | **float**| If &#x60;algorithm&#x3D;alternative_route&#x60;, this parameter sets the factor by which the alternatives routes can be longer than the optimal route. Increasing can lead to worse alternatives. | [optional] [default to 1.4]
 **alternative_route_max_share_factor** | **float**| If &#x60;algorithm&#x3D;alternative_route&#x60;, this parameter specifies how similar an alternative route can be to the optimal route. Increasing can lead to worse alternatives. | [optional] [default to 0.6]

### Return type

[**\Swagger\Client\Model\RouteResponse**](../Model/RouteResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postRoute**
> \Swagger\Client\Model\RouteResponse postRoute($body)

POST Route Endpoint

Please see the [GET endpoint](#operation/getRoute) for a simpler method on how to get started. If you are familiar with POST requests and JSON then do not hesitate to continue here.  Especially when you use many locations you should get familiar with this POST endpoint as the GET endpoint has an URL length limitation. Additionally the request of this POST endpoint can be compressed and can slightly speed up the request.  To do a request you send JSON data. Both request scenarios GET and POST are identical except that all singular parameter names are named as their plural for a POST request. The effected parameters are: `points`, `point_hints` and `snap_preventions`.  **Please note that in opposite to the GET endpoint, points are specified in the order of `longitude, latitude`**.  For example `point=10,11&point=20,22` will be converted to the `points` array (plural): ```json { \"points\": [[11,10], [22,20]] } ``` Note again that also the order changes from `[latitude,longitude]` to `[longitude,latitude]` similar to [GeoJson](http://geojson.org/geojson-spec.html#examples).  Example: ```bash curl -X POST -H \"Content-Type: application/json\" \"https://graphhopper.com/api/1/route?key=[YOUR_KEY]\" -d '{\"elevation\":false,\"points\":[[-0.087891,51.534377],[-0.090637,51.467697]],\"vehicle\":\"car\"}' ```

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\RoutingAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\RouteRequest(); // \Swagger\Client\Model\RouteRequest | 

try {
    $result = $apiInstance->postRoute($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutingAPIApi->postRoute: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\RouteRequest**](../Model/RouteRequest.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\RouteResponse**](../Model/RouteResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **routeInfoGet**
> \Swagger\Client\Model\InfoResponse routeInfoGet()

Coverage information

Use this to find out details about the supported vehicle profiles and features, or if you just need to ping the server.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');

$apiInstance = new Swagger\Client\Api\RoutingAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->routeInfoGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RoutingAPIApi->routeInfoGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\InfoResponse**](../Model/InfoResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

