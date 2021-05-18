# SwaggerClient-php
With the [GraphHopper Directions API](https://www.graphhopper.com/products/) you can integrate A-to-B route planning, turn-by-turn navigation, route optimization, isochrone calculations and other tools in your application.  The GraphHopper Directions API consists of the following RESTful web services:   * [Routing API](#tag/Routing-API),  * [Route Optimization API](#tag/Route-Optimization-API),  * [Isochrone API](#tag/Isochrone-API),  * [Map Matching API](#tag/Map-Matching-API),  * [Matrix API](#tag/Matrix-API),  * [Geocoding API](#tag/Geocoding-API) and  * [Cluster API](#tag/Cluster-API).  # Explore our APIs  ## Get started  1. [Sign up for GraphHopper](https://support.graphhopper.com/a/solutions/articles/44001976025) 2. [Create an API key](https://support.graphhopper.com/a/solutions/articles/44001976027)  Each API part has its own documentation. Jump to the desired API part and learn about the API through the given examples and tutorials.  In addition, for each API there are specific sample requests that you can send via Insomnia or Postman to see what the requests and responses look like.  ## Insomnia  To explore our APIs with [Insomnia](https://insomnia.rest/), follow these steps:  1. Open Insomnia and Import [our workspace](https://raw.githubusercontent.com/graphhopper/directions-api-doc/master/web/restclients/GraphHopper-Direction-API-Insomnia.json). 2. Specify [your API key](https://graphhopper.com/dashboard/#/register) in your workspace: Manage Environments -> Base Environment -> `\"api_key\": your API key` 3. Start exploring  ![Insomnia](./img/insomnia.png)  ## Postman  To explore our APIs with [Postman](https://www.getpostman.com/), follow these steps:  1. Import our [request collections](https://raw.githubusercontent.com/graphhopper/directions-api-doc/master/web/restclients/graphhopper_directions_api.postman_collection.json) as well as our [environment file](https://raw.githubusercontent.com/graphhopper/directions-api-doc/master/web/restclients/graphhopper_directions_api.postman_environment.json). 2. Specify [your API key](https://graphhopper.com/dashboard/#/register) in your environment: `\"api_key\": your API key` 3. Start exploring  ![Postman](./img/postman.png)  ## API Client Libraries  To speed up development and make coding easier, we offer the following client libraries:   * [JavaScript client](https://github.com/graphhopper/directions-api-js-client) - try the [live examples](https://graphhopper.com/api/1/examples/)  * [Others](https://github.com/graphhopper/directions-api-clients) like C#, Ruby, PHP, Python, ... automatically created for the Route Optimization API  ### Bandwidth reduction  If you create your own client, make sure it supports http/2 and gzipped responses for best speed.  If you use the Matrix or Route Optimization API and want to solve large problems, we recommend you to reduce bandwidth by [compressing your POST request](https://gist.github.com/karussell/82851e303ea7b3459b2dea01f18949f4) and specifying the header as follows: `Content-Encoding: gzip`.  ## Contact Us  If you have problems or questions, please read the following information:  - [FAQ](https://graphhopper.com/api/1/docs/FAQ/) - [Public forum](https://discuss.graphhopper.com/c/directions-api) - [Contact us](https://www.graphhopper.com/contact-form/)  To stay informed about the latest developments, you can  - follow us on [twitter](https://twitter.com/graphhopper/), - read [our blog](https://graphhopper.com/blog/), - watch [our documentation](https://github.com/graphhopper/directions-api-doc), - sign up for our newsletter or - [our forum](https://discuss.graphhopper.com/c/directions-api).  Select the channel you like the most.   # Map Data and Routing Profiles  Currently, our main data source is [OpenStreetMap](https://www.openstreetmap.org). We also integrated other network data providers. This chapter gives an overview about the options you have.  ## OpenStreetMap  #### Geographical Coverage  [OpenStreetMap](https://www.openstreetmap.org) covers the whole world. If you want to see for yourself if we can provide data suitable for your region, please visit [GraphHopper Maps](https://graphhopper.com/maps/). You can edit and modify OpenStreetMap data if you find that important information is missing, e.g. a weight limit for a bridge. [Here](https://wiki.openstreetmap.org/wiki/Beginners%27_guide) is a beginner's guide that shows how to add data. If you have edited data, we usually consider your data after 1 week at the latest.  #### Supported Vehicle Profiles  The Routing, Matrix and Route Optimization APIs support the following vehicle profiles:  Name       | Description           | Restrictions              | Icon -----------|:----------------------|:--------------------------|:--------------------------------------------------------- car        | Car mode              | car access                | ![car image](https://graphhopper.com/maps/img/car.png) small_truck| Small truck like a Mercedes Sprinter, Ford Transit or Iveco Daily | height=2.7m, width=2+0.4m, length=5.5m, weight=2080+1400 kg | ![small truck image](https://graphhopper.com/maps/img/small_truck.png) truck      | Truck like a MAN or Mercedes-Benz Actros | height=3.7m, width=2.6+0.5m, length=12m, weight=13000 + 13000 kg, hgv=yes, 3 Axes | ![truck image](https://graphhopper.com/maps/img/truck.png) scooter    | Moped mode | Fast inner city, often used for food delivery, is able to ignore certain bollards, maximum speed of roughly 50km/h | ![scooter image](https://graphhopper.com/maps/img/scooter.png) foot       | Pedestrian or walking without dangerous [SAC-scales](https://wiki.openstreetmap.org/wiki/Key:sac_scale) | foot access         | ![foot image](https://graphhopper.com/maps/img/foot.png) hike       | Pedestrian or walking with priority for more beautiful hiking tours and potentially a bit longer than `foot`. Walking duration is influenced by elevation differences.  | foot access         | ![hike image](https://graphhopper.com/maps/img/hike.png) bike       | Trekking bike avoiding hills | bike access  | ![bike image](https://graphhopper.com/maps/img/bike.png) mtb        | Mountainbike          | bike access         | ![Mountainbike image](https://graphhopper.com/maps/img/mtb.png) racingbike| Bike preferring roads | bike access         | ![racingbike image](https://graphhopper.com/maps/img/racingbike.png)  Please note:   * all motor vehicles (`car`, `small_truck`, `truck` and `scooter`) support turn restrictions via `turn_costs=true`  * the free package supports only the vehicle profiles `car`, `bike` or `foot`  * up to 2 different vehicle profiles can be used in a single optimization request. The number of vehicles is unaffected and depends on your subscription.  * we offer custom vehicle profiles with different properties, different speed profiles or different access options. To find out more about custom profiles, please [contact us](https://www.graphhopper.com/contact-form/).  * a sophisticated `motorcycle` profile is available up on request. It is powered by the [Kurviger](https://kurviger.de/en) Routing API and favors curves and slopes while avoiding cities and highways.   ## TomTom  If you want to include traffic, you can purchase the TomTom Add-on. This Add-on only uses TomTom's road network and historical traffic information. Live traffic is not yet considered. If you are interested to learn how we consider traffic information, we recommend that you read [this article](https://www.graphhopper.com/blog/2017/11/06/time-dependent-optimization/).  Please note the following:   * Currently we only offer this for our [Route Optimization API](#tag/Route-Optimization-API).  * In addition to our terms, you need to accept TomTom's [End User License Aggreement](https://www.graphhopper.com/tomtom-end-user-license-agreement/).  * We do *not* use TomTom's web services. We only use their data with our software.   [Contact us](https://www.graphhopper.com/contact-form/) for more details.  #### Geographical Coverage  We offer  - Europe including Russia - North, Central and South America - Saudi Arabia - United Arab Emirates - South Africa - Australia  #### Supported Vehicle Profiles  Name       | Description           | Restrictions              | Icon -----------|:----------------------|:--------------------------|:--------------------------------------------------------- car        | Car mode              | car access                | ![car image](https://graphhopper.com/maps/img/car.png) small_truck| Small truck like a Mercedes Sprinter, Ford Transit or Iveco Daily | height=2.7m, width=2+0.4m, length=5.5m, weight=2080+1400 kg | ![small truck image](https://graphhopper.com/maps/img/small_truck.png)

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 1.0.0
- Build package: io.swagger.codegen.v3.generators.php.PhpClientCodegen
For more information, please visit [https://www.graphhopper.com/](https://www.graphhopper.com/)

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

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

## Documentation for API Endpoints

All URIs are relative to *https://graphhopper.com/api/1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ClusterAPIApi* | [**asyncClusteringProblem**](docs/Api/ClusterAPIApi.md#asyncclusteringproblem) | **POST** /cluster/calculate | Batch Cluster Endpoint
*ClusterAPIApi* | [**getClusterSolution**](docs/Api/ClusterAPIApi.md#getclustersolution) | **GET** /cluster/solution/{jobId} | GET Batch Solution Endpoint
*ClusterAPIApi* | [**solveClusteringProblem**](docs/Api/ClusterAPIApi.md#solveclusteringproblem) | **POST** /cluster | POST Cluster Endpoint
*GeocodingAPIApi* | [**getGeocode**](docs/Api/GeocodingAPIApi.md#getgeocode) | **GET** /geocode | Geocoding Endpoint
*IsochroneAPIApi* | [**getIsochrone**](docs/Api/IsochroneAPIApi.md#getisochrone) | **GET** /isochrone | Isochrone Endpoint
*MapMatchingAPIApi* | [**postGPX**](docs/Api/MapMatchingAPIApi.md#postgpx) | **POST** /match | Map-match a GPX file
*MatrixAPIApi* | [**calculateMatrix**](docs/Api/MatrixAPIApi.md#calculatematrix) | **POST** /matrix/calculate | Batch Matrix Endpoint
*MatrixAPIApi* | [**getMatrix**](docs/Api/MatrixAPIApi.md#getmatrix) | **GET** /matrix | GET Matrix Endpoint
*MatrixAPIApi* | [**getMatrixSolution**](docs/Api/MatrixAPIApi.md#getmatrixsolution) | **GET** /matrix/solution/{jobId} | GET Batch Matrix Endpoint
*MatrixAPIApi* | [**postMatrix**](docs/Api/MatrixAPIApi.md#postmatrix) | **POST** /matrix | POST Matrix Endpoint
*RouteOptimizationAPIApi* | [**asyncVRP**](docs/Api/RouteOptimizationAPIApi.md#asyncvrp) | **POST** /vrp/optimize | POST route optimization problem (batch mode)
*RouteOptimizationAPIApi* | [**getSolution**](docs/Api/RouteOptimizationAPIApi.md#getsolution) | **GET** /vrp/solution/{jobId} | GET the solution (batch mode)
*RouteOptimizationAPIApi* | [**solveVRP**](docs/Api/RouteOptimizationAPIApi.md#solvevrp) | **POST** /vrp | POST route optimization problem
*RoutingAPIApi* | [**getRoute**](docs/Api/RoutingAPIApi.md#getroute) | **GET** /route | GET Route Endpoint
*RoutingAPIApi* | [**postRoute**](docs/Api/RoutingAPIApi.md#postroute) | **POST** /route | POST Route Endpoint
*RoutingAPIApi* | [**routeInfoGet**](docs/Api/RoutingAPIApi.md#routeinfoget) | **GET** /route/info | Coverage information

## Documentation For Models

 - [Activity](docs/Model/Activity.md)
 - [Address](docs/Model/Address.md)
 - [Algorithm](docs/Model/Algorithm.md)
 - [AllOfMatrixRequestVehicle](docs/Model/AllOfMatrixRequestVehicle.md)
 - [AllOfRouteRequestVehicle](docs/Model/AllOfRouteRequestVehicle.md)
 - [AllOfRouteResponsePathPoints](docs/Model/AllOfRouteResponsePathPoints.md)
 - [AllOfRouteResponsePathSnappedWaypoints](docs/Model/AllOfRouteResponsePathSnappedWaypoints.md)
 - [AllOfSymmetricalMatrixRequestVehicle](docs/Model/AllOfSymmetricalMatrixRequestVehicle.md)
 - [AllOfVehicleTypeProfile](docs/Model/AllOfVehicleTypeProfile.md)
 - [AnyOfRequestRelationsItems](docs/Model/AnyOfRequestRelationsItems.md)
 - [AnyOfVehicleModelBreak](docs/Model/AnyOfVehicleModelBreak.md)
 - [BadRequest](docs/Model/BadRequest.md)
 - [Body](docs/Model/Body.md)
 - [Body1](docs/Model/Body1.md)
 - [Cluster](docs/Model/Cluster.md)
 - [ClusterConfiguration](docs/Model/ClusterConfiguration.md)
 - [ClusterConfigurationClustering](docs/Model/ClusterConfigurationClustering.md)
 - [ClusterConfigurationRouting](docs/Model/ClusterConfigurationRouting.md)
 - [ClusterCustomer](docs/Model/ClusterCustomer.md)
 - [ClusterCustomerAddress](docs/Model/ClusterCustomerAddress.md)
 - [ClusterRequest](docs/Model/ClusterRequest.md)
 - [ClusterResponse](docs/Model/ClusterResponse.md)
 - [Configuration](docs/Model/Configuration.md)
 - [CostMatrix](docs/Model/CostMatrix.md)
 - [CostMatrixData](docs/Model/CostMatrixData.md)
 - [CostMatrixDataInfo](docs/Model/CostMatrixDataInfo.md)
 - [Detail](docs/Model/Detail.md)
 - [DriveTimeBreak](docs/Model/DriveTimeBreak.md)
 - [EncodedLineString](docs/Model/EncodedLineString.md)
 - [ErrorMessage](docs/Model/ErrorMessage.md)
 - [GHError](docs/Model/GHError.md)
 - [GHErrorHints](docs/Model/GHErrorHints.md)
 - [GeocodingLocation](docs/Model/GeocodingLocation.md)
 - [GeocodingPoint](docs/Model/GeocodingPoint.md)
 - [GeocodingResponse](docs/Model/GeocodingResponse.md)
 - [GroupRelation](docs/Model/GroupRelation.md)
 - [InfoResponse](docs/Model/InfoResponse.md)
 - [InlineResponse404](docs/Model/InlineResponse404.md)
 - [InternalErrorMessage](docs/Model/InternalErrorMessage.md)
 - [IsochroneResponse](docs/Model/IsochroneResponse.md)
 - [IsochroneResponsePolygon](docs/Model/IsochroneResponsePolygon.md)
 - [IsochroneResponsePolygonProperties](docs/Model/IsochroneResponsePolygonProperties.md)
 - [JobId](docs/Model/JobId.md)
 - [JobRelation](docs/Model/JobRelation.md)
 - [LineString](docs/Model/LineString.md)
 - [MatrixRequest](docs/Model/MatrixRequest.md)
 - [MatrixResponse](docs/Model/MatrixResponse.md)
 - [MatrixResponseHints](docs/Model/MatrixResponseHints.md)
 - [Objective](docs/Model/Objective.md)
 - [OneOfbody](docs/Model/OneOfbody.md)
 - [OneOfbody1](docs/Model/OneOfbody1.md)
 - [Pickup](docs/Model/Pickup.md)
 - [Polygon](docs/Model/Polygon.md)
 - [Request](docs/Model/Request.md)
 - [Response](docs/Model/Response.md)
 - [ResponseAddress](docs/Model/ResponseAddress.md)
 - [ResponseInfo](docs/Model/ResponseInfo.md)
 - [Route](docs/Model/Route.md)
 - [RoutePoint](docs/Model/RoutePoint.md)
 - [RouteRequest](docs/Model/RouteRequest.md)
 - [RouteResponse](docs/Model/RouteResponse.md)
 - [RouteResponsePath](docs/Model/RouteResponsePath.md)
 - [RouteResponsePathInstructions](docs/Model/RouteResponsePathInstructions.md)
 - [Routing](docs/Model/Routing.md)
 - [Service](docs/Model/Service.md)
 - [Shipment](docs/Model/Shipment.md)
 - [SnappedWaypoint](docs/Model/SnappedWaypoint.md)
 - [Solution](docs/Model/Solution.md)
 - [SolutionUnassigned](docs/Model/SolutionUnassigned.md)
 - [Stop](docs/Model/Stop.md)
 - [SymmetricalMatrixRequest](docs/Model/SymmetricalMatrixRequest.md)
 - [TimeWindow](docs/Model/TimeWindow.md)
 - [TimeWindowBreak](docs/Model/TimeWindowBreak.md)
 - [Vehicle](docs/Model/Vehicle.md)
 - [VehicleProfileId](docs/Model/VehicleProfileId.md)
 - [VehicleType](docs/Model/VehicleType.md)

## Documentation For Authorization


## api_key

- **Type**: API key
- **API key parameter name**: key
- **Location**: URL query string


## Author

support@graphhopper.com

