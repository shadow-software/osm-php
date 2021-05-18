<?php
/**
 * GeocodingAPIApi
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
 * GeocodingAPIApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class GeocodingAPIApi
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
     * Operation getGeocode
     *
     * Geocoding Endpoint
     *
     * @param  string $q If you do forward geocoding, this is &#x60;required&#x60; and is a textual description of the address you are looking for. (optional)
     * @param  string $locale Display the search results for the specified locale. Currently French (fr), English (en), German (de) and Italian (it) are supported. If the locale wasn&#x27;t found the default (en) is used. (optional, default to en)
     * @param  int $limit Specify the maximum number of results to return (optional, default to 10)
     * @param  bool $reverse It is &#x60;required&#x60; to be &#x60;true&#x60; if you want to do a reverse geocoding request. If it is &#x60;true&#x60;, &#x60;point&#x60; must be defined as well, and &#x60;q&#x60; must not be used. (optional, default to false)
     * @param  bool $debug If &#x60;true&#x60;, the output will be formatted. (optional, default to false)
     * @param  string $point _Forward geocoding_: The location bias in the format &#x27;latitude,longitude&#x27; e.g. point&#x3D;45.93272,11.58803. _Reverse geocoding_: The location to find amenities, cities. (optional)
     * @param  string $provider The provider parameter is currently under development and can fall back to &#x60;default&#x60; at any time. The intend is to provide alternatives to our default geocoder. Each provider has its own strenghts and might fit better for certain scenarios, so it&#x27;s worth to compare the different providers. To try it append the &#x60;provider&#x60;parameter to the URL like &#x60;&amp;provider&#x3D;nominatim&#x60;, the result structure should be identical in all cases - if not, please report this back to us. Keep in mind that some providers do not support certain parameters or don&#x27;t return some fields, for example &#x60;osm_id&#x60; and &#x60;osm_type&#x60; are not supported by every geocoding provider. If you would like to use additional parameters of one of the providers, but it&#x27;s not available for the GraphHopper Geocoding API, yet? Please contact us.  The credit costs can be different for all providers - see [here](https://support.graphhopper.com/support/solutions/articles/44000718211-what-is-one-credit-) for more information about it.  Currently, only the default provider and gisgraphy supports autocompletion of partial search strings.  All providers support normal \&quot;forward\&quot; geocoding and reverse geocoding via &#x60;reverse&#x3D;true&#x60;.  #### Default (&#x60;provider&#x3D;default&#x60;)  This provider returns results of our internal geocoding engine, as described above. In addition to the above documented parameters the following parameters are possible: * &#x60;bbox&#x60; - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; * &#x60;osm_tag&#x60; - you can filter &#x60;key:value&#x60; or exclude places with certain OpenStreetMap tags &#x60;!key:value&#x60;. E.g. &#x60;osm_tag&#x3D;tourism:museum&#x60; or just the key &#x60;osm_tag&#x3D;tourism&#x60;. To exclude multiple tags you add multiple &#x60;osm_tag&#x60; parameters.  #### Nominatim (&#x60;provider&#x3D;nominatim&#x60;)  The GraphHopper Directions API uses a commercially hosted Nominatim geocoder. You can try this provider [here](https://nominatim.openstreetmap.org/). The provider does **not** fall under the [restrictions](https://operations.osmfoundation.org/policies/nominatim/) of the Nominatim instance hosted by OpenStreetMap.  In addition to the above documented parameters Nominatim allows to use the following parameters, which can be used as documented [here](https://github.com/openstreetmap/Nominatim/blob/master/docs/api/Search.md#parameters):  * &#x60;viewbox&#x60; - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; * &#x60;bounded&#x60; - If 1 and a viewbox is given, restrict the result to items contained within that viewbox. Default is 0.  #### Gisgraphy (&#x60;provider&#x3D;gisgraphy&#x60;)  This provider returns results from the Gisgraphy geocoder which you can try [here](https://services.gisgraphy.com/static/leaflet/index.html).  **Limitations:** The &#x60;locale&#x60; parameter is not supported. Gisgraphy does not return OSM tags or an extent.  Gisgraphy has a special autocomplete API, which you can use by adding &#x60;autocomplete&#x3D;true&#x60; (does not work with &#x60;reverse&#x3D;true&#x60;). The autocomplete API is optimized on predicting text input, but returns less information.  In addition to the above documented parameters Gisgraphy allows to use the following parameters, which can be used as documented [here](https://www.gisgraphy.com/documentation/user-guide.php#geocodingservice):  * &#x60;radius&#x60; - radius in meters * &#x60;country&#x60; - restrict search for the specified country. The value must be the ISO 3166 Alpha 2 code of the country.  #### NetToolKit (&#x60;provider&#x3D;nettoolkit&#x60;)  This provider returns results from the NetToolKit provider which is specialized for US addresses and provides a wrapper around Nominatim for other addresses. You can try it [here](https://www.nettoolkit.com/geo/demo).  The following additional NetToolKit parameters are supported (read [here](https://www.nettoolkit.com/docs/geo/geocoding) for more details): - &#x60;source&#x60;: User can choose which source provider to geocode the address, this value is \&quot;NetToolKit\&quot; by default - &#x60;country_code&#x60;: an iso-3166-2 country code (e.g : US) filter the results to the specify country code  **Limitations:** NetToolKit does not support the &#x60;locale&#x60; parameter. NetToolKit does not return OSM tags (e.g. osm_id, osm_type, osm_value).  #### OpenCage Data (&#x60;provider&#x3D;opencagedata&#x60;)  This provider returns results from the OpenCageData geocoder which you can try [here](https://geocoder.opencagedata.com/demo).  In addition to the above documented parameters OpenCage Data allows to use the following parameters, which can be used as documented [here](https://geocoder.opencagedata.com/api#forward-opt):  * countrycode - The country code is a two letter code as defined by the ISO 3166-1 Alpha 2 standard. E.g. gb for the United Kingdom, fr for France, us for United States.  * bounds - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; (optional, default to default)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\GeocodingResponse
     */
    public function getGeocode($q = null, $locale = 'en', $limit = '10', $reverse = 'false', $debug = 'false', $point = null, $provider = 'default')
    {
        list($response) = $this->getGeocodeWithHttpInfo($q, $locale, $limit, $reverse, $debug, $point, $provider);
        return $response;
    }

    /**
     * Operation getGeocodeWithHttpInfo
     *
     * Geocoding Endpoint
     *
     * @param  string $q If you do forward geocoding, this is &#x60;required&#x60; and is a textual description of the address you are looking for. (optional)
     * @param  string $locale Display the search results for the specified locale. Currently French (fr), English (en), German (de) and Italian (it) are supported. If the locale wasn&#x27;t found the default (en) is used. (optional, default to en)
     * @param  int $limit Specify the maximum number of results to return (optional, default to 10)
     * @param  bool $reverse It is &#x60;required&#x60; to be &#x60;true&#x60; if you want to do a reverse geocoding request. If it is &#x60;true&#x60;, &#x60;point&#x60; must be defined as well, and &#x60;q&#x60; must not be used. (optional, default to false)
     * @param  bool $debug If &#x60;true&#x60;, the output will be formatted. (optional, default to false)
     * @param  string $point _Forward geocoding_: The location bias in the format &#x27;latitude,longitude&#x27; e.g. point&#x3D;45.93272,11.58803. _Reverse geocoding_: The location to find amenities, cities. (optional)
     * @param  string $provider The provider parameter is currently under development and can fall back to &#x60;default&#x60; at any time. The intend is to provide alternatives to our default geocoder. Each provider has its own strenghts and might fit better for certain scenarios, so it&#x27;s worth to compare the different providers. To try it append the &#x60;provider&#x60;parameter to the URL like &#x60;&amp;provider&#x3D;nominatim&#x60;, the result structure should be identical in all cases - if not, please report this back to us. Keep in mind that some providers do not support certain parameters or don&#x27;t return some fields, for example &#x60;osm_id&#x60; and &#x60;osm_type&#x60; are not supported by every geocoding provider. If you would like to use additional parameters of one of the providers, but it&#x27;s not available for the GraphHopper Geocoding API, yet? Please contact us.  The credit costs can be different for all providers - see [here](https://support.graphhopper.com/support/solutions/articles/44000718211-what-is-one-credit-) for more information about it.  Currently, only the default provider and gisgraphy supports autocompletion of partial search strings.  All providers support normal \&quot;forward\&quot; geocoding and reverse geocoding via &#x60;reverse&#x3D;true&#x60;.  #### Default (&#x60;provider&#x3D;default&#x60;)  This provider returns results of our internal geocoding engine, as described above. In addition to the above documented parameters the following parameters are possible: * &#x60;bbox&#x60; - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; * &#x60;osm_tag&#x60; - you can filter &#x60;key:value&#x60; or exclude places with certain OpenStreetMap tags &#x60;!key:value&#x60;. E.g. &#x60;osm_tag&#x3D;tourism:museum&#x60; or just the key &#x60;osm_tag&#x3D;tourism&#x60;. To exclude multiple tags you add multiple &#x60;osm_tag&#x60; parameters.  #### Nominatim (&#x60;provider&#x3D;nominatim&#x60;)  The GraphHopper Directions API uses a commercially hosted Nominatim geocoder. You can try this provider [here](https://nominatim.openstreetmap.org/). The provider does **not** fall under the [restrictions](https://operations.osmfoundation.org/policies/nominatim/) of the Nominatim instance hosted by OpenStreetMap.  In addition to the above documented parameters Nominatim allows to use the following parameters, which can be used as documented [here](https://github.com/openstreetmap/Nominatim/blob/master/docs/api/Search.md#parameters):  * &#x60;viewbox&#x60; - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; * &#x60;bounded&#x60; - If 1 and a viewbox is given, restrict the result to items contained within that viewbox. Default is 0.  #### Gisgraphy (&#x60;provider&#x3D;gisgraphy&#x60;)  This provider returns results from the Gisgraphy geocoder which you can try [here](https://services.gisgraphy.com/static/leaflet/index.html).  **Limitations:** The &#x60;locale&#x60; parameter is not supported. Gisgraphy does not return OSM tags or an extent.  Gisgraphy has a special autocomplete API, which you can use by adding &#x60;autocomplete&#x3D;true&#x60; (does not work with &#x60;reverse&#x3D;true&#x60;). The autocomplete API is optimized on predicting text input, but returns less information.  In addition to the above documented parameters Gisgraphy allows to use the following parameters, which can be used as documented [here](https://www.gisgraphy.com/documentation/user-guide.php#geocodingservice):  * &#x60;radius&#x60; - radius in meters * &#x60;country&#x60; - restrict search for the specified country. The value must be the ISO 3166 Alpha 2 code of the country.  #### NetToolKit (&#x60;provider&#x3D;nettoolkit&#x60;)  This provider returns results from the NetToolKit provider which is specialized for US addresses and provides a wrapper around Nominatim for other addresses. You can try it [here](https://www.nettoolkit.com/geo/demo).  The following additional NetToolKit parameters are supported (read [here](https://www.nettoolkit.com/docs/geo/geocoding) for more details): - &#x60;source&#x60;: User can choose which source provider to geocode the address, this value is \&quot;NetToolKit\&quot; by default - &#x60;country_code&#x60;: an iso-3166-2 country code (e.g : US) filter the results to the specify country code  **Limitations:** NetToolKit does not support the &#x60;locale&#x60; parameter. NetToolKit does not return OSM tags (e.g. osm_id, osm_type, osm_value).  #### OpenCage Data (&#x60;provider&#x3D;opencagedata&#x60;)  This provider returns results from the OpenCageData geocoder which you can try [here](https://geocoder.opencagedata.com/demo).  In addition to the above documented parameters OpenCage Data allows to use the following parameters, which can be used as documented [here](https://geocoder.opencagedata.com/api#forward-opt):  * countrycode - The country code is a two letter code as defined by the ISO 3166-1 Alpha 2 standard. E.g. gb for the United Kingdom, fr for France, us for United States.  * bounds - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; (optional, default to default)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\GeocodingResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getGeocodeWithHttpInfo($q = null, $locale = 'en', $limit = '10', $reverse = 'false', $debug = 'false', $point = null, $provider = 'default')
    {
        $returnType = '\Swagger\Client\Model\GeocodingResponse';
        $request = $this->getGeocodeRequest($q, $locale, $limit, $reverse, $debug, $point, $provider);

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
                        '\Swagger\Client\Model\GeocodingResponse',
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
     * Operation getGeocodeAsync
     *
     * Geocoding Endpoint
     *
     * @param  string $q If you do forward geocoding, this is &#x60;required&#x60; and is a textual description of the address you are looking for. (optional)
     * @param  string $locale Display the search results for the specified locale. Currently French (fr), English (en), German (de) and Italian (it) are supported. If the locale wasn&#x27;t found the default (en) is used. (optional, default to en)
     * @param  int $limit Specify the maximum number of results to return (optional, default to 10)
     * @param  bool $reverse It is &#x60;required&#x60; to be &#x60;true&#x60; if you want to do a reverse geocoding request. If it is &#x60;true&#x60;, &#x60;point&#x60; must be defined as well, and &#x60;q&#x60; must not be used. (optional, default to false)
     * @param  bool $debug If &#x60;true&#x60;, the output will be formatted. (optional, default to false)
     * @param  string $point _Forward geocoding_: The location bias in the format &#x27;latitude,longitude&#x27; e.g. point&#x3D;45.93272,11.58803. _Reverse geocoding_: The location to find amenities, cities. (optional)
     * @param  string $provider The provider parameter is currently under development and can fall back to &#x60;default&#x60; at any time. The intend is to provide alternatives to our default geocoder. Each provider has its own strenghts and might fit better for certain scenarios, so it&#x27;s worth to compare the different providers. To try it append the &#x60;provider&#x60;parameter to the URL like &#x60;&amp;provider&#x3D;nominatim&#x60;, the result structure should be identical in all cases - if not, please report this back to us. Keep in mind that some providers do not support certain parameters or don&#x27;t return some fields, for example &#x60;osm_id&#x60; and &#x60;osm_type&#x60; are not supported by every geocoding provider. If you would like to use additional parameters of one of the providers, but it&#x27;s not available for the GraphHopper Geocoding API, yet? Please contact us.  The credit costs can be different for all providers - see [here](https://support.graphhopper.com/support/solutions/articles/44000718211-what-is-one-credit-) for more information about it.  Currently, only the default provider and gisgraphy supports autocompletion of partial search strings.  All providers support normal \&quot;forward\&quot; geocoding and reverse geocoding via &#x60;reverse&#x3D;true&#x60;.  #### Default (&#x60;provider&#x3D;default&#x60;)  This provider returns results of our internal geocoding engine, as described above. In addition to the above documented parameters the following parameters are possible: * &#x60;bbox&#x60; - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; * &#x60;osm_tag&#x60; - you can filter &#x60;key:value&#x60; or exclude places with certain OpenStreetMap tags &#x60;!key:value&#x60;. E.g. &#x60;osm_tag&#x3D;tourism:museum&#x60; or just the key &#x60;osm_tag&#x3D;tourism&#x60;. To exclude multiple tags you add multiple &#x60;osm_tag&#x60; parameters.  #### Nominatim (&#x60;provider&#x3D;nominatim&#x60;)  The GraphHopper Directions API uses a commercially hosted Nominatim geocoder. You can try this provider [here](https://nominatim.openstreetmap.org/). The provider does **not** fall under the [restrictions](https://operations.osmfoundation.org/policies/nominatim/) of the Nominatim instance hosted by OpenStreetMap.  In addition to the above documented parameters Nominatim allows to use the following parameters, which can be used as documented [here](https://github.com/openstreetmap/Nominatim/blob/master/docs/api/Search.md#parameters):  * &#x60;viewbox&#x60; - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; * &#x60;bounded&#x60; - If 1 and a viewbox is given, restrict the result to items contained within that viewbox. Default is 0.  #### Gisgraphy (&#x60;provider&#x3D;gisgraphy&#x60;)  This provider returns results from the Gisgraphy geocoder which you can try [here](https://services.gisgraphy.com/static/leaflet/index.html).  **Limitations:** The &#x60;locale&#x60; parameter is not supported. Gisgraphy does not return OSM tags or an extent.  Gisgraphy has a special autocomplete API, which you can use by adding &#x60;autocomplete&#x3D;true&#x60; (does not work with &#x60;reverse&#x3D;true&#x60;). The autocomplete API is optimized on predicting text input, but returns less information.  In addition to the above documented parameters Gisgraphy allows to use the following parameters, which can be used as documented [here](https://www.gisgraphy.com/documentation/user-guide.php#geocodingservice):  * &#x60;radius&#x60; - radius in meters * &#x60;country&#x60; - restrict search for the specified country. The value must be the ISO 3166 Alpha 2 code of the country.  #### NetToolKit (&#x60;provider&#x3D;nettoolkit&#x60;)  This provider returns results from the NetToolKit provider which is specialized for US addresses and provides a wrapper around Nominatim for other addresses. You can try it [here](https://www.nettoolkit.com/geo/demo).  The following additional NetToolKit parameters are supported (read [here](https://www.nettoolkit.com/docs/geo/geocoding) for more details): - &#x60;source&#x60;: User can choose which source provider to geocode the address, this value is \&quot;NetToolKit\&quot; by default - &#x60;country_code&#x60;: an iso-3166-2 country code (e.g : US) filter the results to the specify country code  **Limitations:** NetToolKit does not support the &#x60;locale&#x60; parameter. NetToolKit does not return OSM tags (e.g. osm_id, osm_type, osm_value).  #### OpenCage Data (&#x60;provider&#x3D;opencagedata&#x60;)  This provider returns results from the OpenCageData geocoder which you can try [here](https://geocoder.opencagedata.com/demo).  In addition to the above documented parameters OpenCage Data allows to use the following parameters, which can be used as documented [here](https://geocoder.opencagedata.com/api#forward-opt):  * countrycode - The country code is a two letter code as defined by the ISO 3166-1 Alpha 2 standard. E.g. gb for the United Kingdom, fr for France, us for United States.  * bounds - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; (optional, default to default)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getGeocodeAsync($q = null, $locale = 'en', $limit = '10', $reverse = 'false', $debug = 'false', $point = null, $provider = 'default')
    {
        return $this->getGeocodeAsyncWithHttpInfo($q, $locale, $limit, $reverse, $debug, $point, $provider)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getGeocodeAsyncWithHttpInfo
     *
     * Geocoding Endpoint
     *
     * @param  string $q If you do forward geocoding, this is &#x60;required&#x60; and is a textual description of the address you are looking for. (optional)
     * @param  string $locale Display the search results for the specified locale. Currently French (fr), English (en), German (de) and Italian (it) are supported. If the locale wasn&#x27;t found the default (en) is used. (optional, default to en)
     * @param  int $limit Specify the maximum number of results to return (optional, default to 10)
     * @param  bool $reverse It is &#x60;required&#x60; to be &#x60;true&#x60; if you want to do a reverse geocoding request. If it is &#x60;true&#x60;, &#x60;point&#x60; must be defined as well, and &#x60;q&#x60; must not be used. (optional, default to false)
     * @param  bool $debug If &#x60;true&#x60;, the output will be formatted. (optional, default to false)
     * @param  string $point _Forward geocoding_: The location bias in the format &#x27;latitude,longitude&#x27; e.g. point&#x3D;45.93272,11.58803. _Reverse geocoding_: The location to find amenities, cities. (optional)
     * @param  string $provider The provider parameter is currently under development and can fall back to &#x60;default&#x60; at any time. The intend is to provide alternatives to our default geocoder. Each provider has its own strenghts and might fit better for certain scenarios, so it&#x27;s worth to compare the different providers. To try it append the &#x60;provider&#x60;parameter to the URL like &#x60;&amp;provider&#x3D;nominatim&#x60;, the result structure should be identical in all cases - if not, please report this back to us. Keep in mind that some providers do not support certain parameters or don&#x27;t return some fields, for example &#x60;osm_id&#x60; and &#x60;osm_type&#x60; are not supported by every geocoding provider. If you would like to use additional parameters of one of the providers, but it&#x27;s not available for the GraphHopper Geocoding API, yet? Please contact us.  The credit costs can be different for all providers - see [here](https://support.graphhopper.com/support/solutions/articles/44000718211-what-is-one-credit-) for more information about it.  Currently, only the default provider and gisgraphy supports autocompletion of partial search strings.  All providers support normal \&quot;forward\&quot; geocoding and reverse geocoding via &#x60;reverse&#x3D;true&#x60;.  #### Default (&#x60;provider&#x3D;default&#x60;)  This provider returns results of our internal geocoding engine, as described above. In addition to the above documented parameters the following parameters are possible: * &#x60;bbox&#x60; - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; * &#x60;osm_tag&#x60; - you can filter &#x60;key:value&#x60; or exclude places with certain OpenStreetMap tags &#x60;!key:value&#x60;. E.g. &#x60;osm_tag&#x3D;tourism:museum&#x60; or just the key &#x60;osm_tag&#x3D;tourism&#x60;. To exclude multiple tags you add multiple &#x60;osm_tag&#x60; parameters.  #### Nominatim (&#x60;provider&#x3D;nominatim&#x60;)  The GraphHopper Directions API uses a commercially hosted Nominatim geocoder. You can try this provider [here](https://nominatim.openstreetmap.org/). The provider does **not** fall under the [restrictions](https://operations.osmfoundation.org/policies/nominatim/) of the Nominatim instance hosted by OpenStreetMap.  In addition to the above documented parameters Nominatim allows to use the following parameters, which can be used as documented [here](https://github.com/openstreetmap/Nominatim/blob/master/docs/api/Search.md#parameters):  * &#x60;viewbox&#x60; - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; * &#x60;bounded&#x60; - If 1 and a viewbox is given, restrict the result to items contained within that viewbox. Default is 0.  #### Gisgraphy (&#x60;provider&#x3D;gisgraphy&#x60;)  This provider returns results from the Gisgraphy geocoder which you can try [here](https://services.gisgraphy.com/static/leaflet/index.html).  **Limitations:** The &#x60;locale&#x60; parameter is not supported. Gisgraphy does not return OSM tags or an extent.  Gisgraphy has a special autocomplete API, which you can use by adding &#x60;autocomplete&#x3D;true&#x60; (does not work with &#x60;reverse&#x3D;true&#x60;). The autocomplete API is optimized on predicting text input, but returns less information.  In addition to the above documented parameters Gisgraphy allows to use the following parameters, which can be used as documented [here](https://www.gisgraphy.com/documentation/user-guide.php#geocodingservice):  * &#x60;radius&#x60; - radius in meters * &#x60;country&#x60; - restrict search for the specified country. The value must be the ISO 3166 Alpha 2 code of the country.  #### NetToolKit (&#x60;provider&#x3D;nettoolkit&#x60;)  This provider returns results from the NetToolKit provider which is specialized for US addresses and provides a wrapper around Nominatim for other addresses. You can try it [here](https://www.nettoolkit.com/geo/demo).  The following additional NetToolKit parameters are supported (read [here](https://www.nettoolkit.com/docs/geo/geocoding) for more details): - &#x60;source&#x60;: User can choose which source provider to geocode the address, this value is \&quot;NetToolKit\&quot; by default - &#x60;country_code&#x60;: an iso-3166-2 country code (e.g : US) filter the results to the specify country code  **Limitations:** NetToolKit does not support the &#x60;locale&#x60; parameter. NetToolKit does not return OSM tags (e.g. osm_id, osm_type, osm_value).  #### OpenCage Data (&#x60;provider&#x3D;opencagedata&#x60;)  This provider returns results from the OpenCageData geocoder which you can try [here](https://geocoder.opencagedata.com/demo).  In addition to the above documented parameters OpenCage Data allows to use the following parameters, which can be used as documented [here](https://geocoder.opencagedata.com/api#forward-opt):  * countrycode - The country code is a two letter code as defined by the ISO 3166-1 Alpha 2 standard. E.g. gb for the United Kingdom, fr for France, us for United States.  * bounds - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; (optional, default to default)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getGeocodeAsyncWithHttpInfo($q = null, $locale = 'en', $limit = '10', $reverse = 'false', $debug = 'false', $point = null, $provider = 'default')
    {
        $returnType = '\Swagger\Client\Model\GeocodingResponse';
        $request = $this->getGeocodeRequest($q, $locale, $limit, $reverse, $debug, $point, $provider);

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
     * Create request for operation 'getGeocode'
     *
     * @param  string $q If you do forward geocoding, this is &#x60;required&#x60; and is a textual description of the address you are looking for. (optional)
     * @param  string $locale Display the search results for the specified locale. Currently French (fr), English (en), German (de) and Italian (it) are supported. If the locale wasn&#x27;t found the default (en) is used. (optional, default to en)
     * @param  int $limit Specify the maximum number of results to return (optional, default to 10)
     * @param  bool $reverse It is &#x60;required&#x60; to be &#x60;true&#x60; if you want to do a reverse geocoding request. If it is &#x60;true&#x60;, &#x60;point&#x60; must be defined as well, and &#x60;q&#x60; must not be used. (optional, default to false)
     * @param  bool $debug If &#x60;true&#x60;, the output will be formatted. (optional, default to false)
     * @param  string $point _Forward geocoding_: The location bias in the format &#x27;latitude,longitude&#x27; e.g. point&#x3D;45.93272,11.58803. _Reverse geocoding_: The location to find amenities, cities. (optional)
     * @param  string $provider The provider parameter is currently under development and can fall back to &#x60;default&#x60; at any time. The intend is to provide alternatives to our default geocoder. Each provider has its own strenghts and might fit better for certain scenarios, so it&#x27;s worth to compare the different providers. To try it append the &#x60;provider&#x60;parameter to the URL like &#x60;&amp;provider&#x3D;nominatim&#x60;, the result structure should be identical in all cases - if not, please report this back to us. Keep in mind that some providers do not support certain parameters or don&#x27;t return some fields, for example &#x60;osm_id&#x60; and &#x60;osm_type&#x60; are not supported by every geocoding provider. If you would like to use additional parameters of one of the providers, but it&#x27;s not available for the GraphHopper Geocoding API, yet? Please contact us.  The credit costs can be different for all providers - see [here](https://support.graphhopper.com/support/solutions/articles/44000718211-what-is-one-credit-) for more information about it.  Currently, only the default provider and gisgraphy supports autocompletion of partial search strings.  All providers support normal \&quot;forward\&quot; geocoding and reverse geocoding via &#x60;reverse&#x3D;true&#x60;.  #### Default (&#x60;provider&#x3D;default&#x60;)  This provider returns results of our internal geocoding engine, as described above. In addition to the above documented parameters the following parameters are possible: * &#x60;bbox&#x60; - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; * &#x60;osm_tag&#x60; - you can filter &#x60;key:value&#x60; or exclude places with certain OpenStreetMap tags &#x60;!key:value&#x60;. E.g. &#x60;osm_tag&#x3D;tourism:museum&#x60; or just the key &#x60;osm_tag&#x3D;tourism&#x60;. To exclude multiple tags you add multiple &#x60;osm_tag&#x60; parameters.  #### Nominatim (&#x60;provider&#x3D;nominatim&#x60;)  The GraphHopper Directions API uses a commercially hosted Nominatim geocoder. You can try this provider [here](https://nominatim.openstreetmap.org/). The provider does **not** fall under the [restrictions](https://operations.osmfoundation.org/policies/nominatim/) of the Nominatim instance hosted by OpenStreetMap.  In addition to the above documented parameters Nominatim allows to use the following parameters, which can be used as documented [here](https://github.com/openstreetmap/Nominatim/blob/master/docs/api/Search.md#parameters):  * &#x60;viewbox&#x60; - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; * &#x60;bounded&#x60; - If 1 and a viewbox is given, restrict the result to items contained within that viewbox. Default is 0.  #### Gisgraphy (&#x60;provider&#x3D;gisgraphy&#x60;)  This provider returns results from the Gisgraphy geocoder which you can try [here](https://services.gisgraphy.com/static/leaflet/index.html).  **Limitations:** The &#x60;locale&#x60; parameter is not supported. Gisgraphy does not return OSM tags or an extent.  Gisgraphy has a special autocomplete API, which you can use by adding &#x60;autocomplete&#x3D;true&#x60; (does not work with &#x60;reverse&#x3D;true&#x60;). The autocomplete API is optimized on predicting text input, but returns less information.  In addition to the above documented parameters Gisgraphy allows to use the following parameters, which can be used as documented [here](https://www.gisgraphy.com/documentation/user-guide.php#geocodingservice):  * &#x60;radius&#x60; - radius in meters * &#x60;country&#x60; - restrict search for the specified country. The value must be the ISO 3166 Alpha 2 code of the country.  #### NetToolKit (&#x60;provider&#x3D;nettoolkit&#x60;)  This provider returns results from the NetToolKit provider which is specialized for US addresses and provides a wrapper around Nominatim for other addresses. You can try it [here](https://www.nettoolkit.com/geo/demo).  The following additional NetToolKit parameters are supported (read [here](https://www.nettoolkit.com/docs/geo/geocoding) for more details): - &#x60;source&#x60;: User can choose which source provider to geocode the address, this value is \&quot;NetToolKit\&quot; by default - &#x60;country_code&#x60;: an iso-3166-2 country code (e.g : US) filter the results to the specify country code  **Limitations:** NetToolKit does not support the &#x60;locale&#x60; parameter. NetToolKit does not return OSM tags (e.g. osm_id, osm_type, osm_value).  #### OpenCage Data (&#x60;provider&#x3D;opencagedata&#x60;)  This provider returns results from the OpenCageData geocoder which you can try [here](https://geocoder.opencagedata.com/demo).  In addition to the above documented parameters OpenCage Data allows to use the following parameters, which can be used as documented [here](https://geocoder.opencagedata.com/api#forward-opt):  * countrycode - The country code is a two letter code as defined by the ISO 3166-1 Alpha 2 standard. E.g. gb for the United Kingdom, fr for France, us for United States.  * bounds - the expected format is &#x60;minLon,minLat,maxLon,maxLat&#x60; (optional, default to default)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getGeocodeRequest($q = null, $locale = 'en', $limit = '10', $reverse = 'false', $debug = 'false', $point = null, $provider = 'default')
    {

        $resourcePath = '/geocode';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($q !== null) {
            $queryParams['q'] = ObjectSerializer::toQueryValue($q, null);
        }
        // query params
        if ($locale !== null) {
            $queryParams['locale'] = ObjectSerializer::toQueryValue($locale, null);
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = ObjectSerializer::toQueryValue($limit, 'int32');
        }
        // query params
        if ($reverse !== null) {
            $queryParams['reverse'] = ObjectSerializer::toQueryValue($reverse, null);
        }
        // query params
        if ($debug !== null) {
            $queryParams['debug'] = ObjectSerializer::toQueryValue($debug, null);
        }
        // query params
        if ($point !== null) {
            $queryParams['point'] = ObjectSerializer::toQueryValue($point, null);
        }
        // query params
        if ($provider !== null) {
            $queryParams['provider'] = ObjectSerializer::toQueryValue($provider, null);
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
