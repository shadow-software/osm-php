<?php
/**
 * SymmetricalMatrixRequest
 *
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

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * SymmetricalMatrixRequest Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SymmetricalMatrixRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SymmetricalMatrixRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'points' => 'double[][]',
'point_hints' => 'string[]',
'snap_preventions' => 'string[]',
'curbsides' => 'string[]',
'out_arrays' => 'string[]',
'vehicle' => 'AllOfSymmetricalMatrixRequestVehicle',
'fail_fast' => 'bool',
'turn_costs' => 'bool'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'points' => 'double',
'point_hints' => null,
'snap_preventions' => null,
'curbsides' => null,
'out_arrays' => null,
'vehicle' => null,
'fail_fast' => null,
'turn_costs' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'points' => 'points',
'point_hints' => 'point_hints',
'snap_preventions' => 'snap_preventions',
'curbsides' => 'curbsides',
'out_arrays' => 'out_arrays',
'vehicle' => 'vehicle',
'fail_fast' => 'fail_fast',
'turn_costs' => 'turn_costs'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'points' => 'setPoints',
'point_hints' => 'setPointHints',
'snap_preventions' => 'setSnapPreventions',
'curbsides' => 'setCurbsides',
'out_arrays' => 'setOutArrays',
'vehicle' => 'setVehicle',
'fail_fast' => 'setFailFast',
'turn_costs' => 'setTurnCosts'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'points' => 'getPoints',
'point_hints' => 'getPointHints',
'snap_preventions' => 'getSnapPreventions',
'curbsides' => 'getCurbsides',
'out_arrays' => 'getOutArrays',
'vehicle' => 'getVehicle',
'fail_fast' => 'getFailFast',
'turn_costs' => 'getTurnCosts'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['points'] = isset($data['points']) ? $data['points'] : null;
        $this->container['point_hints'] = isset($data['point_hints']) ? $data['point_hints'] : null;
        $this->container['snap_preventions'] = isset($data['snap_preventions']) ? $data['snap_preventions'] : null;
        $this->container['curbsides'] = isset($data['curbsides']) ? $data['curbsides'] : null;
        $this->container['out_arrays'] = isset($data['out_arrays']) ? $data['out_arrays'] : null;
        $this->container['vehicle'] = isset($data['vehicle']) ? $data['vehicle'] : null;
        $this->container['fail_fast'] = isset($data['fail_fast']) ? $data['fail_fast'] : true;
        $this->container['turn_costs'] = isset($data['turn_costs']) ? $data['turn_costs'] : false;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets points
     *
     * @return double[][]
     */
    public function getPoints()
    {
        return $this->container['points'];
    }

    /**
     * Sets points
     *
     * @param double[][] $points Specify multiple points for which the weight-, route-, time- or distance-matrix should be calculated as follows: `[longitude,latitude]`. In this case the origins are identical to the destinations. Thus, if there are N points, NxN entries are calculated. The order of the point parameter is important. Specify at least three points. Cannot be used together with `from_point` or `to_point.`.
     *
     * @return $this
     */
    public function setPoints($points)
    {
        $this->container['points'] = $points;

        return $this;
    }

    /**
     * Gets point_hints
     *
     * @return string[]
     */
    public function getPointHints()
    {
        return $this->container['point_hints'];
    }

    /**
     * Sets point_hints
     *
     * @param string[] $point_hints Optional parameter. Specifies a hint for each point in the `points` array to prefer a certain street for the closest location lookup. E.g. if there is an address or house with two or more neighboring streets you can control for which street the closest location is looked up.
     *
     * @return $this
     */
    public function setPointHints($point_hints)
    {
        $this->container['point_hints'] = $point_hints;

        return $this;
    }

    /**
     * Gets snap_preventions
     *
     * @return string[]
     */
    public function getSnapPreventions()
    {
        return $this->container['snap_preventions'];
    }

    /**
     * Sets snap_preventions
     *
     * @param string[] $snap_preventions Optional parameter to avoid snapping to a certain road class or road environment. Current supported values `motorway`, `trunk`, `ferry`, `tunnel`, `bridge` and `ford`
     *
     * @return $this
     */
    public function setSnapPreventions($snap_preventions)
    {
        $this->container['snap_preventions'] = $snap_preventions;

        return $this;
    }

    /**
     * Gets curbsides
     *
     * @return string[]
     */
    public function getCurbsides()
    {
        return $this->container['curbsides'];
    }

    /**
     * Sets curbsides
     *
     * @param string[] $curbsides Optional parameter. It specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. You need to specify this parameter for either none or all points. Only supported for motor vehicles and OpenStreetMap.
     *
     * @return $this
     */
    public function setCurbsides($curbsides)
    {
        $this->container['curbsides'] = $curbsides;

        return $this;
    }

    /**
     * Gets out_arrays
     *
     * @return string[]
     */
    public function getOutArrays()
    {
        return $this->container['out_arrays'];
    }

    /**
     * Sets out_arrays
     *
     * @param string[] $out_arrays Specifies which matrices should be included in the response. Specify one or more of the following options `weights`, `times`, `distances`. The units of the entries of `distances` are meters, of `times` are seconds and of `weights` is arbitrary and it can differ for different vehicles or versions of this API.
     *
     * @return $this
     */
    public function setOutArrays($out_arrays)
    {
        $this->container['out_arrays'] = $out_arrays;

        return $this;
    }

    /**
     * Gets vehicle
     *
     * @return AllOfSymmetricalMatrixRequestVehicle
     */
    public function getVehicle()
    {
        return $this->container['vehicle'];
    }

    /**
     * Sets vehicle
     *
     * @param AllOfSymmetricalMatrixRequestVehicle $vehicle vehicle
     *
     * @return $this
     */
    public function setVehicle($vehicle)
    {
        $this->container['vehicle'] = $vehicle;

        return $this;
    }

    /**
     * Gets fail_fast
     *
     * @return bool
     */
    public function getFailFast()
    {
        return $this->container['fail_fast'];
    }

    /**
     * Sets fail_fast
     *
     * @param bool $fail_fast Specifies whether or not the matrix calculation should return with an error as soon as possible in case some points cannot be found or some points are not connected. If set to `false` the time/weight/distance matrix will be calculated for all valid points and contain the `null` value for all entries that could not be calculated. The `hint` field of the response will also contain additional information about what went wrong (see its documentation).
     *
     * @return $this
     */
    public function setFailFast($fail_fast)
    {
        $this->container['fail_fast'] = $fail_fast;

        return $this;
    }

    /**
     * Gets turn_costs
     *
     * @return bool
     */
    public function getTurnCosts()
    {
        return $this->container['turn_costs'];
    }

    /**
     * Sets turn_costs
     *
     * @param bool $turn_costs Specifies if turn restrictions should be considered. Enabling this option increases the matrix computation time. Only supported for motor vehicles and OpenStreetMap.
     *
     * @return $this
     */
    public function setTurnCosts($turn_costs)
    {
        $this->container['turn_costs'] = $turn_costs;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
