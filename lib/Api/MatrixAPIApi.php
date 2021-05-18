<?php
/**
 * MatrixAPIApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * GraphHopper Directions API
 *
 * With the [GraphHopper Directions API](https://www.graphhopper.com/products/) you can integrate A-to-B route planning, turn-by-turn navigation, route optimization, isochrone calculations and other tools in your application.  The GraphHopper Directions API consists of the following RESTful web services:   * [Routing API](#tag/Routing-API),  * [Route Optimization API](#tag/Route-Optimization-API),  * [Isochrone API](#tag/Isochrone-API),  * [Map Matching API](#tag/Map-Matching-API),  * [Matrix API](#tag/Matrix-API),  * [Geocoding API](#tag/Geocoding-API) and  * [Cluster API](#tag/Cluster-API).  # Explore our APIs  ## Get started  1. [Sign up for GraphHopper](https://support.graphhopper.com/a/solutions/articles/44001976025) 2. [Create an API key](https://support.graphhopper.com/a/solutions/articles/44001976027)  Each API part has its own documentation. Jump to the desired API part and learn about the API through the given examples and tutorials.  In addition, for each API there are specific sample requests that you can send via Insomnia or Postman to see what the requests and responses look like.  ## Insomnia  To explore our APIs with [Insomnia](https://insomnia.rest/), follow these steps:  1. Open Insomnia and Import [our workspace](https://raw.githubusercontent.com/graphhopper/directions-api-doc/master/web/restclients/GraphHopper-Direction-API-Insomnia.json). 2. Specify [your API key](https://graphhopper.com/dashboard/#/register) in your workspace: Manage Environments -> Base Environment -> `\"api_key\": your API key` 3. Start exploring  ![Insomnia](./img/insomnia.png)  ## Postman  To explore our APIs with [Postman](https://www.getpostman.com/), follow these steps:  1. Import our [request collections](https://raw.githubusercontent.com/graphhopper/directions-api-doc/master/web/restclients/graphhopper_directions_api.postman_collection.json) as well as our [environment file](https://raw.githubusercontent.com/graphhopper/directions-api-doc/master/web/restclients/graphhopper_directions_api.postman_environment.json). 2. Specify [your API key](https://graphhopper.com/dashboard/#/register) in your environment: `\"api_key\": your API key` 3. Start exploring  ![Postman](./img/postman.png)  ## API Client Libraries  To speed up development and make coding easier, we offer the following client libraries:   * [JavaScript client](https://github.com/graphhopper/directions-api-js-client) - try the [live examples](https://graphhopper.com/api/1/examples/)  * [Others](https://github.com/graphhopper/directions-api-clients) like C#, Ruby, PHP, Python, ... automatically created for the Route Optimization API  ### Bandwidth reduction  If you create your own client, make sure it supports http/2 and gzipped responses for best speed.  If you use the Matrix or Route Optimization API and want to solve large problems, we recommend you to reduce bandwidth by [compressing your POST request](https://gist.github.com/karussell/82851e303ea7b3459b2dea01f18949f4) and specifying the header as follows: `Content-Encoding: gzip`.  ## Contact Us  If you have problems or questions, please read the following information:  - [FAQ](https://graphhopper.com/api/1/docs/FAQ/) - [Public forum](https://discuss.graphhopper.com/c/directions-api) - [Contact us](https://www.graphhopper.com/contact-form/)  To stay informed about the latest developments, you can  - follow us on [twitter](https://twitter.com/graphhopper/), - read [our blog](https://graphhopper.com/blog/), - watch [our documentation](https://github.com/graphhopper/directions-api-doc), - sign up for our newsletter or - [our forum](https://discuss.graphhopper.com/c/directions-api).  Select the channel you like the most.   # Map Data and Routing Profiles  Currently, our main data source is [OpenStreetMap](https://www.openstreetmap.org). We also integrated other network data providers. This chapter gives an overview about the options you have.  ## OpenStreetMap  #### Geographical Coverage  [OpenStreetMap](https://www.openstreetmap.org) covers the whole world. If you want to see for yourself if we can provide data suitable for your region, please visit [GraphHopper Maps](https://graphhopper.com/maps/). You can edit and modify OpenStreetMap data if you find that important information is missing, e.g. a weight limit for a bridge. [Here](https://wiki.openstreetmap.org/wiki/Beginners%27_guide) is a beginner's guide that shows how to add data. If you have edited data, we usually consider your data after 1 week at the latest.  #### Supported Vehicle Profiles  The Routing, Matrix and Route Optimization APIs support the following vehicle profiles:  Name       | Description           | Restrictions              | Icon -----------|:----------------------|:--------------------------|:--------------------------------------------------------- car        | Car mode              | car access                | ![car image](https://graphhopper.com/maps/img/car.png) small_truck| Small truck like a Mercedes Sprinter, Ford Transit or Iveco Daily | height=2.7m, width=2+0.4m, length=5.5m, weight=2080+1400 kg | ![small truck image](https://graphhopper.com/maps/img/small_truck.png) truck      | Truck like a MAN or Mercedes-Benz Actros | height=3.7m, width=2.6+0.5m, length=12m, weight=13000 + 13000 kg, hgv=yes, 3 Axes | ![truck image](https://graphhopper.com/maps/img/truck.png) scooter    | Moped mode | Fast inner city, often used for food delivery, is able to ignore certain bollards, maximum speed of roughly 50km/h | ![scooter image](https://graphhopper.com/maps/img/scooter.png) foot       | Pedestrian or walking without dangerous [SAC-scales](https://wiki.openstreetmap.org/wiki/Key:sac_scale) | foot access         | ![foot image](https://graphhopper.com/maps/img/foot.png) hike       | Pedestrian or walking with priority for more beautiful hiking tours and potentially a bit longer than `foot`. Walking duration is influenced by elevation differences.  | foot access         | ![hike image](https://graphhopper.com/maps/img/hike.png) bike       | Trekking bike avoiding hills | bike access  | ![bike image](https://graphhopper.com/maps/img/bike.png) mtb        | Mountainbike          | bike access         | ![Mountainbike image](https://graphhopper.com/maps/img/mtb.png) racingbike| Bike preferring roads | bike access         | ![racingbike image](https://graphhopper.com/maps/img/racingbike.png)  Please note:   * all motor vehicles (`car`, `small_truck`, `truck` and `scooter`) support turn restrictions via `turn_costs=true`  * the free package supports only the vehicle profiles `car`, `bike` or `foot`  * up to 2 different vehicle profiles can be used in a single optimization request. The number of vehicles is unaffected and depends on your subscription.  * we offer custom vehicle profiles with different properties, different speed profiles or different access options. To find out more about custom profiles, please [contact us](https://www.graphhopper.com/contact-form/).  * a sophisticated `motorcycle` profile is available up on request. It is powered by the [Kurviger](https://kurviger.de/en) Routing API and favors curves and slopes while avoiding cities and highways.   ## TomTom  If you want to include traffic, you can purchase the TomTom Add-on. This Add-on only uses TomTom's road network and historical traffic information. Live traffic is not yet considered. If you are interested to learn how we consider traffic information, we recommend that you read [this article](https://www.graphhopper.com/blog/2017/11/06/time-dependent-optimization/).  Please note the following:   * Currently we only offer this for our [Route Optimization API](#tag/Route-Optimization-API).  * In addition to our terms, you need to accept TomTom's [End User License Aggreement](https://www.graphhopper.com/tomtom-end-user-license-agreement/).  * We do *not* use TomTom's web services. We only use their data with our software.   [Contact us](https://www.graphhopper.com/contact-form/) for more details.  #### Geographical Coverage  We offer  - Europe including Russia - North, Central and South America - Saudi Arabia - United Arab Emirates - South Africa - Australia  #### Supported Vehicle Profiles  Name       | Description           | Restrictions              | Icon -----------|:----------------------|:--------------------------|:--------------------------------------------------------- car        | Car mode              | car access                | ![car image](https://graphhopper.com/maps/img/car.png) small_truck| Small truck like a Mercedes Sprinter, Ford Transit or Iveco Daily | height=2.7m, width=2+0.4m, length=5.5m, weight=2080+1400 kg | ![small truck image](https://graphhopper.com/maps/img/small_truck.png)
 *
 * OpenAPI spec version: 1.0.0
 * Contact: support@graphhopper.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.25
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * MatrixAPIApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class MatrixAPIApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation calculateMatrix
     *
     * Batch Matrix Endpoint
     *
     * @param  \Swagger\Client\Model\Body1 $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\JobId
     */
    public function calculateMatrix($body = null)
    {
        list($response) = $this->calculateMatrixWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation calculateMatrixWithHttpInfo
     *
     * Batch Matrix Endpoint
     *
     * @param  \Swagger\Client\Model\Body1 $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\JobId, HTTP status code, HTTP response headers (array of strings)
     */
    public function calculateMatrixWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\JobId';
        $request = $this->calculateMatrixRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\JobId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 0:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\GHError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation calculateMatrixAsync
     *
     * Batch Matrix Endpoint
     *
     * @param  \Swagger\Client\Model\Body1 $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calculateMatrixAsync($body = null)
    {
        return $this->calculateMatrixAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation calculateMatrixAsyncWithHttpInfo
     *
     * Batch Matrix Endpoint
     *
     * @param  \Swagger\Client\Model\Body1 $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function calculateMatrixAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\JobId';
        $request = $this->calculateMatrixRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'calculateMatrix'
     *
     * @param  \Swagger\Client\Model\Body1 $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function calculateMatrixRequest($body = null)
    {

        $resourcePath = '/matrix/calculate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if ($apiKey !== null) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getMatrix
     *
     * GET Matrix Endpoint
     *
     * @param  string[] $point Specify multiple points in &#x60;latitude,longitude&#x60; for which the weight-, route-, time- or distance-matrix should be calculated. In this case the starts are identical to the destinations. If there are N points, then NxN entries will be calculated. The order of the point parameter is important. Specify at least three points. Cannot be used together with from_point or to_point. (optional)
     * @param  string[] $from_point The starting points for the routes in &#x60;latitude,longitude&#x60;. E.g. if you want to calculate the three routes A-&amp;gt;1, A-&amp;gt;2, A-&amp;gt;3 then you have one from_point parameter and three to_point parameters. (optional)
     * @param  string[] $to_point The destination points for the routes in &#x60;latitude,longitude&#x60;. (optional)
     * @param  string[] $point_hint Optional parameter. Specifies a hint for each &#x60;point&#x60; parameter to prefer a certain street for the closest location lookup. E.g. if there is an address or house with two or more neighboring streets you can control for which street the closest location is looked up. (optional)
     * @param  string[] $from_point_hint For the from_point parameter. See point_hint (optional)
     * @param  string[] $to_point_hint For the to_point parameter. See point_hint (optional)
     * @param  string[] $snap_prevention Optional parameter to avoid snapping to a certain road class or road environment. Current supported values &#x60;motorway&#x60;, &#x60;trunk&#x60;, &#x60;ferry&#x60;, &#x60;tunnel&#x60;, &#x60;bridge&#x60; and &#x60;ford&#x60;. Multiple values are specified like &#x60;snap_prevention&#x3D;ferry&amp;snap_prevention&#x3D;motorway&#x60; (optional)
     * @param  string[] $curbside Optional parameter. It specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. You need to specify this parameter for either none or all points. Only supported for motor vehicles and OpenStreetMap. (optional)
     * @param  string[] $from_curbside Curbside setting for the from_point parameter. See curbside. (optional)
     * @param  string[] $to_curbside Curbside setting for the to_point parameter. See curbside. (optional)
     * @param  string[] $out_array Specifies which arrays should be included in the response. Specify one or more of the following options &#x27;weights&#x27;, &#x27;times&#x27;, &#x27;distances&#x27;. To specify more than one array use e.g. out_array&#x3D;times&amp;out_array&#x3D;distances. The units of the entries of distances are meters, of times are seconds and of weights is arbitrary and it can differ for different vehicles or versions of this API. (optional)
     * @param  \Swagger\Client\Model\VehicleProfileId $vehicle The vehicle profile for which the matrix should be calculated. (optional)
     * @param  bool $fail_fast Specifies whether or not the matrix calculation should return with an error as soon as possible in case some points cannot be found or some points are not connected. If set to &#x60;false&#x60; the time/weight/distance matrix will be calculated for all valid points and contain the &#x60;null&#x60; value for all entries that could not be calculated. The &#x60;hint&#x60; field of the response will also contain additional information about what went wrong (see its documentation). (optional, default to true)
     * @param  bool $turn_costs Specifies if turn restrictions should be considered. Enabling this option increases the matrix computation time. Only supported for motor vehicles and OpenStreetMap. (optional, default to false)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\MatrixResponse
     */
    public function getMatrix($point = null, $from_point = null, $to_point = null, $point_hint = null, $from_point_hint = null, $to_point_hint = null, $snap_prevention = null, $curbside = null, $from_curbside = null, $to_curbside = null, $out_array = null, $vehicle = null, $fail_fast = 'true', $turn_costs = 'false')
    {
        list($response) = $this->getMatrixWithHttpInfo($point, $from_point, $to_point, $point_hint, $from_point_hint, $to_point_hint, $snap_prevention, $curbside, $from_curbside, $to_curbside, $out_array, $vehicle, $fail_fast, $turn_costs);
        return $response;
    }

    /**
     * Operation getMatrixWithHttpInfo
     *
     * GET Matrix Endpoint
     *
     * @param  string[] $point Specify multiple points in &#x60;latitude,longitude&#x60; for which the weight-, route-, time- or distance-matrix should be calculated. In this case the starts are identical to the destinations. If there are N points, then NxN entries will be calculated. The order of the point parameter is important. Specify at least three points. Cannot be used together with from_point or to_point. (optional)
     * @param  string[] $from_point The starting points for the routes in &#x60;latitude,longitude&#x60;. E.g. if you want to calculate the three routes A-&amp;gt;1, A-&amp;gt;2, A-&amp;gt;3 then you have one from_point parameter and three to_point parameters. (optional)
     * @param  string[] $to_point The destination points for the routes in &#x60;latitude,longitude&#x60;. (optional)
     * @param  string[] $point_hint Optional parameter. Specifies a hint for each &#x60;point&#x60; parameter to prefer a certain street for the closest location lookup. E.g. if there is an address or house with two or more neighboring streets you can control for which street the closest location is looked up. (optional)
     * @param  string[] $from_point_hint For the from_point parameter. See point_hint (optional)
     * @param  string[] $to_point_hint For the to_point parameter. See point_hint (optional)
     * @param  string[] $snap_prevention Optional parameter to avoid snapping to a certain road class or road environment. Current supported values &#x60;motorway&#x60;, &#x60;trunk&#x60;, &#x60;ferry&#x60;, &#x60;tunnel&#x60;, &#x60;bridge&#x60; and &#x60;ford&#x60;. Multiple values are specified like &#x60;snap_prevention&#x3D;ferry&amp;snap_prevention&#x3D;motorway&#x60; (optional)
     * @param  string[] $curbside Optional parameter. It specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. You need to specify this parameter for either none or all points. Only supported for motor vehicles and OpenStreetMap. (optional)
     * @param  string[] $from_curbside Curbside setting for the from_point parameter. See curbside. (optional)
     * @param  string[] $to_curbside Curbside setting for the to_point parameter. See curbside. (optional)
     * @param  string[] $out_array Specifies which arrays should be included in the response. Specify one or more of the following options &#x27;weights&#x27;, &#x27;times&#x27;, &#x27;distances&#x27;. To specify more than one array use e.g. out_array&#x3D;times&amp;out_array&#x3D;distances. The units of the entries of distances are meters, of times are seconds and of weights is arbitrary and it can differ for different vehicles or versions of this API. (optional)
     * @param  \Swagger\Client\Model\VehicleProfileId $vehicle The vehicle profile for which the matrix should be calculated. (optional)
     * @param  bool $fail_fast Specifies whether or not the matrix calculation should return with an error as soon as possible in case some points cannot be found or some points are not connected. If set to &#x60;false&#x60; the time/weight/distance matrix will be calculated for all valid points and contain the &#x60;null&#x60; value for all entries that could not be calculated. The &#x60;hint&#x60; field of the response will also contain additional information about what went wrong (see its documentation). (optional, default to true)
     * @param  bool $turn_costs Specifies if turn restrictions should be considered. Enabling this option increases the matrix computation time. Only supported for motor vehicles and OpenStreetMap. (optional, default to false)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\MatrixResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMatrixWithHttpInfo($point = null, $from_point = null, $to_point = null, $point_hint = null, $from_point_hint = null, $to_point_hint = null, $snap_prevention = null, $curbside = null, $from_curbside = null, $to_curbside = null, $out_array = null, $vehicle = null, $fail_fast = 'true', $turn_costs = 'false')
    {
        $returnType = '\Swagger\Client\Model\MatrixResponse';
        $request = $this->getMatrixRequest($point, $from_point, $to_point, $point_hint, $from_point_hint, $to_point_hint, $snap_prevention, $curbside, $from_curbside, $to_curbside, $out_array, $vehicle, $fail_fast, $turn_costs);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\MatrixResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 0:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\GHError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMatrixAsync
     *
     * GET Matrix Endpoint
     *
     * @param  string[] $point Specify multiple points in &#x60;latitude,longitude&#x60; for which the weight-, route-, time- or distance-matrix should be calculated. In this case the starts are identical to the destinations. If there are N points, then NxN entries will be calculated. The order of the point parameter is important. Specify at least three points. Cannot be used together with from_point or to_point. (optional)
     * @param  string[] $from_point The starting points for the routes in &#x60;latitude,longitude&#x60;. E.g. if you want to calculate the three routes A-&amp;gt;1, A-&amp;gt;2, A-&amp;gt;3 then you have one from_point parameter and three to_point parameters. (optional)
     * @param  string[] $to_point The destination points for the routes in &#x60;latitude,longitude&#x60;. (optional)
     * @param  string[] $point_hint Optional parameter. Specifies a hint for each &#x60;point&#x60; parameter to prefer a certain street for the closest location lookup. E.g. if there is an address or house with two or more neighboring streets you can control for which street the closest location is looked up. (optional)
     * @param  string[] $from_point_hint For the from_point parameter. See point_hint (optional)
     * @param  string[] $to_point_hint For the to_point parameter. See point_hint (optional)
     * @param  string[] $snap_prevention Optional parameter to avoid snapping to a certain road class or road environment. Current supported values &#x60;motorway&#x60;, &#x60;trunk&#x60;, &#x60;ferry&#x60;, &#x60;tunnel&#x60;, &#x60;bridge&#x60; and &#x60;ford&#x60;. Multiple values are specified like &#x60;snap_prevention&#x3D;ferry&amp;snap_prevention&#x3D;motorway&#x60; (optional)
     * @param  string[] $curbside Optional parameter. It specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. You need to specify this parameter for either none or all points. Only supported for motor vehicles and OpenStreetMap. (optional)
     * @param  string[] $from_curbside Curbside setting for the from_point parameter. See curbside. (optional)
     * @param  string[] $to_curbside Curbside setting for the to_point parameter. See curbside. (optional)
     * @param  string[] $out_array Specifies which arrays should be included in the response. Specify one or more of the following options &#x27;weights&#x27;, &#x27;times&#x27;, &#x27;distances&#x27;. To specify more than one array use e.g. out_array&#x3D;times&amp;out_array&#x3D;distances. The units of the entries of distances are meters, of times are seconds and of weights is arbitrary and it can differ for different vehicles or versions of this API. (optional)
     * @param  \Swagger\Client\Model\VehicleProfileId $vehicle The vehicle profile for which the matrix should be calculated. (optional)
     * @param  bool $fail_fast Specifies whether or not the matrix calculation should return with an error as soon as possible in case some points cannot be found or some points are not connected. If set to &#x60;false&#x60; the time/weight/distance matrix will be calculated for all valid points and contain the &#x60;null&#x60; value for all entries that could not be calculated. The &#x60;hint&#x60; field of the response will also contain additional information about what went wrong (see its documentation). (optional, default to true)
     * @param  bool $turn_costs Specifies if turn restrictions should be considered. Enabling this option increases the matrix computation time. Only supported for motor vehicles and OpenStreetMap. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMatrixAsync($point = null, $from_point = null, $to_point = null, $point_hint = null, $from_point_hint = null, $to_point_hint = null, $snap_prevention = null, $curbside = null, $from_curbside = null, $to_curbside = null, $out_array = null, $vehicle = null, $fail_fast = 'true', $turn_costs = 'false')
    {
        return $this->getMatrixAsyncWithHttpInfo($point, $from_point, $to_point, $point_hint, $from_point_hint, $to_point_hint, $snap_prevention, $curbside, $from_curbside, $to_curbside, $out_array, $vehicle, $fail_fast, $turn_costs)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMatrixAsyncWithHttpInfo
     *
     * GET Matrix Endpoint
     *
     * @param  string[] $point Specify multiple points in &#x60;latitude,longitude&#x60; for which the weight-, route-, time- or distance-matrix should be calculated. In this case the starts are identical to the destinations. If there are N points, then NxN entries will be calculated. The order of the point parameter is important. Specify at least three points. Cannot be used together with from_point or to_point. (optional)
     * @param  string[] $from_point The starting points for the routes in &#x60;latitude,longitude&#x60;. E.g. if you want to calculate the three routes A-&amp;gt;1, A-&amp;gt;2, A-&amp;gt;3 then you have one from_point parameter and three to_point parameters. (optional)
     * @param  string[] $to_point The destination points for the routes in &#x60;latitude,longitude&#x60;. (optional)
     * @param  string[] $point_hint Optional parameter. Specifies a hint for each &#x60;point&#x60; parameter to prefer a certain street for the closest location lookup. E.g. if there is an address or house with two or more neighboring streets you can control for which street the closest location is looked up. (optional)
     * @param  string[] $from_point_hint For the from_point parameter. See point_hint (optional)
     * @param  string[] $to_point_hint For the to_point parameter. See point_hint (optional)
     * @param  string[] $snap_prevention Optional parameter to avoid snapping to a certain road class or road environment. Current supported values &#x60;motorway&#x60;, &#x60;trunk&#x60;, &#x60;ferry&#x60;, &#x60;tunnel&#x60;, &#x60;bridge&#x60; and &#x60;ford&#x60;. Multiple values are specified like &#x60;snap_prevention&#x3D;ferry&amp;snap_prevention&#x3D;motorway&#x60; (optional)
     * @param  string[] $curbside Optional parameter. It specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. You need to specify this parameter for either none or all points. Only supported for motor vehicles and OpenStreetMap. (optional)
     * @param  string[] $from_curbside Curbside setting for the from_point parameter. See curbside. (optional)
     * @param  string[] $to_curbside Curbside setting for the to_point parameter. See curbside. (optional)
     * @param  string[] $out_array Specifies which arrays should be included in the response. Specify one or more of the following options &#x27;weights&#x27;, &#x27;times&#x27;, &#x27;distances&#x27;. To specify more than one array use e.g. out_array&#x3D;times&amp;out_array&#x3D;distances. The units of the entries of distances are meters, of times are seconds and of weights is arbitrary and it can differ for different vehicles or versions of this API. (optional)
     * @param  \Swagger\Client\Model\VehicleProfileId $vehicle The vehicle profile for which the matrix should be calculated. (optional)
     * @param  bool $fail_fast Specifies whether or not the matrix calculation should return with an error as soon as possible in case some points cannot be found or some points are not connected. If set to &#x60;false&#x60; the time/weight/distance matrix will be calculated for all valid points and contain the &#x60;null&#x60; value for all entries that could not be calculated. The &#x60;hint&#x60; field of the response will also contain additional information about what went wrong (see its documentation). (optional, default to true)
     * @param  bool $turn_costs Specifies if turn restrictions should be considered. Enabling this option increases the matrix computation time. Only supported for motor vehicles and OpenStreetMap. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMatrixAsyncWithHttpInfo($point = null, $from_point = null, $to_point = null, $point_hint = null, $from_point_hint = null, $to_point_hint = null, $snap_prevention = null, $curbside = null, $from_curbside = null, $to_curbside = null, $out_array = null, $vehicle = null, $fail_fast = 'true', $turn_costs = 'false')
    {
        $returnType = '\Swagger\Client\Model\MatrixResponse';
        $request = $this->getMatrixRequest($point, $from_point, $to_point, $point_hint, $from_point_hint, $to_point_hint, $snap_prevention, $curbside, $from_curbside, $to_curbside, $out_array, $vehicle, $fail_fast, $turn_costs);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMatrix'
     *
     * @param  string[] $point Specify multiple points in &#x60;latitude,longitude&#x60; for which the weight-, route-, time- or distance-matrix should be calculated. In this case the starts are identical to the destinations. If there are N points, then NxN entries will be calculated. The order of the point parameter is important. Specify at least three points. Cannot be used together with from_point or to_point. (optional)
     * @param  string[] $from_point The starting points for the routes in &#x60;latitude,longitude&#x60;. E.g. if you want to calculate the three routes A-&amp;gt;1, A-&amp;gt;2, A-&amp;gt;3 then you have one from_point parameter and three to_point parameters. (optional)
     * @param  string[] $to_point The destination points for the routes in &#x60;latitude,longitude&#x60;. (optional)
     * @param  string[] $point_hint Optional parameter. Specifies a hint for each &#x60;point&#x60; parameter to prefer a certain street for the closest location lookup. E.g. if there is an address or house with two or more neighboring streets you can control for which street the closest location is looked up. (optional)
     * @param  string[] $from_point_hint For the from_point parameter. See point_hint (optional)
     * @param  string[] $to_point_hint For the to_point parameter. See point_hint (optional)
     * @param  string[] $snap_prevention Optional parameter to avoid snapping to a certain road class or road environment. Current supported values &#x60;motorway&#x60;, &#x60;trunk&#x60;, &#x60;ferry&#x60;, &#x60;tunnel&#x60;, &#x60;bridge&#x60; and &#x60;ford&#x60;. Multiple values are specified like &#x60;snap_prevention&#x3D;ferry&amp;snap_prevention&#x3D;motorway&#x60; (optional)
     * @param  string[] $curbside Optional parameter. It specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. You need to specify this parameter for either none or all points. Only supported for motor vehicles and OpenStreetMap. (optional)
     * @param  string[] $from_curbside Curbside setting for the from_point parameter. See curbside. (optional)
     * @param  string[] $to_curbside Curbside setting for the to_point parameter. See curbside. (optional)
     * @param  string[] $out_array Specifies which arrays should be included in the response. Specify one or more of the following options &#x27;weights&#x27;, &#x27;times&#x27;, &#x27;distances&#x27;. To specify more than one array use e.g. out_array&#x3D;times&amp;out_array&#x3D;distances. The units of the entries of distances are meters, of times are seconds and of weights is arbitrary and it can differ for different vehicles or versions of this API. (optional)
     * @param  \Swagger\Client\Model\VehicleProfileId $vehicle The vehicle profile for which the matrix should be calculated. (optional)
     * @param  bool $fail_fast Specifies whether or not the matrix calculation should return with an error as soon as possible in case some points cannot be found or some points are not connected. If set to &#x60;false&#x60; the time/weight/distance matrix will be calculated for all valid points and contain the &#x60;null&#x60; value for all entries that could not be calculated. The &#x60;hint&#x60; field of the response will also contain additional information about what went wrong (see its documentation). (optional, default to true)
     * @param  bool $turn_costs Specifies if turn restrictions should be considered. Enabling this option increases the matrix computation time. Only supported for motor vehicles and OpenStreetMap. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMatrixRequest($point = null, $from_point = null, $to_point = null, $point_hint = null, $from_point_hint = null, $to_point_hint = null, $snap_prevention = null, $curbside = null, $from_curbside = null, $to_curbside = null, $out_array = null, $vehicle = null, $fail_fast = 'true', $turn_costs = 'false')
    {

        $resourcePath = '/matrix';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($point)) {
            $point = ObjectSerializer::serializeCollection($point, 'multi', true);
        }
        if ($point !== null) {
            $queryParams['point'] = ObjectSerializer::toQueryValue($point, null);
        }
        // query params
        if (is_array($from_point)) {
            $from_point = ObjectSerializer::serializeCollection($from_point, 'multi', true);
        }
        if ($from_point !== null) {
            $queryParams['from_point'] = ObjectSerializer::toQueryValue($from_point, null);
        }
        // query params
        if (is_array($to_point)) {
            $to_point = ObjectSerializer::serializeCollection($to_point, 'multi', true);
        }
        if ($to_point !== null) {
            $queryParams['to_point'] = ObjectSerializer::toQueryValue($to_point, null);
        }
        // query params
        if (is_array($point_hint)) {
            $point_hint = ObjectSerializer::serializeCollection($point_hint, 'multi', true);
        }
        if ($point_hint !== null) {
            $queryParams['point_hint'] = ObjectSerializer::toQueryValue($point_hint, null);
        }
        // query params
        if (is_array($from_point_hint)) {
            $from_point_hint = ObjectSerializer::serializeCollection($from_point_hint, 'multi', true);
        }
        if ($from_point_hint !== null) {
            $queryParams['from_point_hint'] = ObjectSerializer::toQueryValue($from_point_hint, null);
        }
        // query params
        if (is_array($to_point_hint)) {
            $to_point_hint = ObjectSerializer::serializeCollection($to_point_hint, 'multi', true);
        }
        if ($to_point_hint !== null) {
            $queryParams['to_point_hint'] = ObjectSerializer::toQueryValue($to_point_hint, null);
        }
        // query params
        if (is_array($snap_prevention)) {
            $snap_prevention = ObjectSerializer::serializeCollection($snap_prevention, 'multi', true);
        }
        if ($snap_prevention !== null) {
            $queryParams['snap_prevention'] = ObjectSerializer::toQueryValue($snap_prevention, null);
        }
        // query params
        if (is_array($curbside)) {
            $curbside = ObjectSerializer::serializeCollection($curbside, 'multi', true);
        }
        if ($curbside !== null) {
            $queryParams['curbside'] = ObjectSerializer::toQueryValue($curbside, null);
        }
        // query params
        if (is_array($from_curbside)) {
            $from_curbside = ObjectSerializer::serializeCollection($from_curbside, 'multi', true);
        }
        if ($from_curbside !== null) {
            $queryParams['from_curbside'] = ObjectSerializer::toQueryValue($from_curbside, null);
        }
        // query params
        if (is_array($to_curbside)) {
            $to_curbside = ObjectSerializer::serializeCollection($to_curbside, 'multi', true);
        }
        if ($to_curbside !== null) {
            $queryParams['to_curbside'] = ObjectSerializer::toQueryValue($to_curbside, null);
        }
        // query params
        if (is_array($out_array)) {
            $out_array = ObjectSerializer::serializeCollection($out_array, 'multi', true);
        }
        if ($out_array !== null) {
            $queryParams['out_array'] = ObjectSerializer::toQueryValue($out_array, null);
        }
        // query params
        if ($vehicle !== null) {
            $queryParams['vehicle'] = ObjectSerializer::toQueryValue($vehicle, null);
        }
        // query params
        if ($fail_fast !== null) {
            $queryParams['fail_fast'] = ObjectSerializer::toQueryValue($fail_fast, null);
        }
        // query params
        if ($turn_costs !== null) {
            $queryParams['turn_costs'] = ObjectSerializer::toQueryValue($turn_costs, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if ($apiKey !== null) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getMatrixSolution
     *
     * GET Batch Matrix Endpoint
     *
     * @param  string $job_id Request solution with jobId (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\MatrixResponse
     */
    public function getMatrixSolution($job_id)
    {
        list($response) = $this->getMatrixSolutionWithHttpInfo($job_id);
        return $response;
    }

    /**
     * Operation getMatrixSolutionWithHttpInfo
     *
     * GET Batch Matrix Endpoint
     *
     * @param  string $job_id Request solution with jobId (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\MatrixResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMatrixSolutionWithHttpInfo($job_id)
    {
        $returnType = '\Swagger\Client\Model\MatrixResponse';
        $request = $this->getMatrixSolutionRequest($job_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\MatrixResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 0:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\GHError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMatrixSolutionAsync
     *
     * GET Batch Matrix Endpoint
     *
     * @param  string $job_id Request solution with jobId (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMatrixSolutionAsync($job_id)
    {
        return $this->getMatrixSolutionAsyncWithHttpInfo($job_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMatrixSolutionAsyncWithHttpInfo
     *
     * GET Batch Matrix Endpoint
     *
     * @param  string $job_id Request solution with jobId (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMatrixSolutionAsyncWithHttpInfo($job_id)
    {
        $returnType = '\Swagger\Client\Model\MatrixResponse';
        $request = $this->getMatrixSolutionRequest($job_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMatrixSolution'
     *
     * @param  string $job_id Request solution with jobId (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMatrixSolutionRequest($job_id)
    {
        // verify the required parameter 'job_id' is set
        if ($job_id === null || (is_array($job_id) && count($job_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $job_id when calling getMatrixSolution'
            );
        }

        $resourcePath = '/matrix/solution/{jobId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($job_id !== null) {
            $resourcePath = str_replace(
                '{' . 'jobId' . '}',
                ObjectSerializer::toPathValue($job_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if ($apiKey !== null) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation postMatrix
     *
     * POST Matrix Endpoint
     *
     * @param  \Swagger\Client\Model\Body $body body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\MatrixResponse
     */
    public function postMatrix($body = null)
    {
        list($response) = $this->postMatrixWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation postMatrixWithHttpInfo
     *
     * POST Matrix Endpoint
     *
     * @param  \Swagger\Client\Model\Body $body (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\MatrixResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function postMatrixWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\MatrixResponse';
        $request = $this->postMatrixRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\MatrixResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 0:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\GHError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation postMatrixAsync
     *
     * POST Matrix Endpoint
     *
     * @param  \Swagger\Client\Model\Body $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postMatrixAsync($body = null)
    {
        return $this->postMatrixAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postMatrixAsyncWithHttpInfo
     *
     * POST Matrix Endpoint
     *
     * @param  \Swagger\Client\Model\Body $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postMatrixAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\MatrixResponse';
        $request = $this->postMatrixRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'postMatrix'
     *
     * @param  \Swagger\Client\Model\Body $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function postMatrixRequest($body = null)
    {

        $resourcePath = '/matrix';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if ($apiKey !== null) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
