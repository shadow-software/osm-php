<?php
/**
 * RouteRequest
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
 * RouteRequest Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class RouteRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'RouteRequest';

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
'vehicle' => 'AllOfRouteRequestVehicle',
'locale' => 'string',
'elevation' => 'bool',
'details' => 'string[]',
'optimize' => 'string',
'instructions' => 'bool',
'calc_points' => 'bool',
'debug' => 'bool',
'points_encoded' => 'bool',
'ch_disable' => 'bool',
'weighting' => 'string',
'headings' => 'int[]',
'heading_penalty' => 'int',
'pass_through' => 'bool',
'block_area' => 'string',
'avoid' => 'string',
'algorithm' => 'string',
'round_trip_distance' => 'int',
'round_trip_seed' => 'int',
'alternative_route_max_paths' => 'int',
'alternative_route_max_weight_factor' => 'float',
'alternative_route_max_share_factor' => 'float'    ];

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
'vehicle' => null,
'locale' => null,
'elevation' => null,
'details' => null,
'optimize' => null,
'instructions' => null,
'calc_points' => null,
'debug' => null,
'points_encoded' => null,
'ch_disable' => null,
'weighting' => null,
'headings' => 'int32',
'heading_penalty' => 'int32',
'pass_through' => null,
'block_area' => null,
'avoid' => null,
'algorithm' => null,
'round_trip_distance' => 'int32',
'round_trip_seed' => 'int64',
'alternative_route_max_paths' => 'int32',
'alternative_route_max_weight_factor' => null,
'alternative_route_max_share_factor' => null    ];

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
'vehicle' => 'vehicle',
'locale' => 'locale',
'elevation' => 'elevation',
'details' => 'details',
'optimize' => 'optimize',
'instructions' => 'instructions',
'calc_points' => 'calc_points',
'debug' => 'debug',
'points_encoded' => 'points_encoded',
'ch_disable' => 'ch.disable',
'weighting' => 'weighting',
'headings' => 'headings',
'heading_penalty' => 'heading_penalty',
'pass_through' => 'pass_through',
'block_area' => 'block_area',
'avoid' => 'avoid',
'algorithm' => 'algorithm',
'round_trip_distance' => 'round_trip.distance',
'round_trip_seed' => 'round_trip.seed',
'alternative_route_max_paths' => 'alternative_route.max_paths',
'alternative_route_max_weight_factor' => 'alternative_route.max_weight_factor',
'alternative_route_max_share_factor' => 'alternative_route.max_share_factor'    ];

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
'vehicle' => 'setVehicle',
'locale' => 'setLocale',
'elevation' => 'setElevation',
'details' => 'setDetails',
'optimize' => 'setOptimize',
'instructions' => 'setInstructions',
'calc_points' => 'setCalcPoints',
'debug' => 'setDebug',
'points_encoded' => 'setPointsEncoded',
'ch_disable' => 'setChDisable',
'weighting' => 'setWeighting',
'headings' => 'setHeadings',
'heading_penalty' => 'setHeadingPenalty',
'pass_through' => 'setPassThrough',
'block_area' => 'setBlockArea',
'avoid' => 'setAvoid',
'algorithm' => 'setAlgorithm',
'round_trip_distance' => 'setRoundTripDistance',
'round_trip_seed' => 'setRoundTripSeed',
'alternative_route_max_paths' => 'setAlternativeRouteMaxPaths',
'alternative_route_max_weight_factor' => 'setAlternativeRouteMaxWeightFactor',
'alternative_route_max_share_factor' => 'setAlternativeRouteMaxShareFactor'    ];

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
'vehicle' => 'getVehicle',
'locale' => 'getLocale',
'elevation' => 'getElevation',
'details' => 'getDetails',
'optimize' => 'getOptimize',
'instructions' => 'getInstructions',
'calc_points' => 'getCalcPoints',
'debug' => 'getDebug',
'points_encoded' => 'getPointsEncoded',
'ch_disable' => 'getChDisable',
'weighting' => 'getWeighting',
'headings' => 'getHeadings',
'heading_penalty' => 'getHeadingPenalty',
'pass_through' => 'getPassThrough',
'block_area' => 'getBlockArea',
'avoid' => 'getAvoid',
'algorithm' => 'getAlgorithm',
'round_trip_distance' => 'getRoundTripDistance',
'round_trip_seed' => 'getRoundTripSeed',
'alternative_route_max_paths' => 'getAlternativeRouteMaxPaths',
'alternative_route_max_weight_factor' => 'getAlternativeRouteMaxWeightFactor',
'alternative_route_max_share_factor' => 'getAlternativeRouteMaxShareFactor'    ];

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

    const CURBSIDES_ANY = 'any';
const CURBSIDES_RIGHT = 'right';
const CURBSIDES_LEFT = 'left';
const ALGORITHM_ROUND_TRIP = 'round_trip';
const ALGORITHM_ALTERNATIVE_ROUTE = 'alternative_route';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCurbsidesAllowableValues()
    {
        return [
            self::CURBSIDES_ANY,
self::CURBSIDES_RIGHT,
self::CURBSIDES_LEFT,        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAlgorithmAllowableValues()
    {
        return [
            self::ALGORITHM_ROUND_TRIP,
self::ALGORITHM_ALTERNATIVE_ROUTE,        ];
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
        $this->container['vehicle'] = isset($data['vehicle']) ? $data['vehicle'] : null;
        $this->container['locale'] = isset($data['locale']) ? $data['locale'] : 'en';
        $this->container['elevation'] = isset($data['elevation']) ? $data['elevation'] : false;
        $this->container['details'] = isset($data['details']) ? $data['details'] : null;
        $this->container['optimize'] = isset($data['optimize']) ? $data['optimize'] : 'false';
        $this->container['instructions'] = isset($data['instructions']) ? $data['instructions'] : true;
        $this->container['calc_points'] = isset($data['calc_points']) ? $data['calc_points'] : true;
        $this->container['debug'] = isset($data['debug']) ? $data['debug'] : false;
        $this->container['points_encoded'] = isset($data['points_encoded']) ? $data['points_encoded'] : true;
        $this->container['ch_disable'] = isset($data['ch_disable']) ? $data['ch_disable'] : false;
        $this->container['weighting'] = isset($data['weighting']) ? $data['weighting'] : 'fastest';
        $this->container['headings'] = isset($data['headings']) ? $data['headings'] : null;
        $this->container['heading_penalty'] = isset($data['heading_penalty']) ? $data['heading_penalty'] : 120;
        $this->container['pass_through'] = isset($data['pass_through']) ? $data['pass_through'] : false;
        $this->container['block_area'] = isset($data['block_area']) ? $data['block_area'] : null;
        $this->container['avoid'] = isset($data['avoid']) ? $data['avoid'] : null;
        $this->container['algorithm'] = isset($data['algorithm']) ? $data['algorithm'] : null;
        $this->container['round_trip_distance'] = isset($data['round_trip_distance']) ? $data['round_trip_distance'] : 10000;
        $this->container['round_trip_seed'] = isset($data['round_trip_seed']) ? $data['round_trip_seed'] : null;
        $this->container['alternative_route_max_paths'] = isset($data['alternative_route_max_paths']) ? $data['alternative_route_max_paths'] : 2;
        $this->container['alternative_route_max_weight_factor'] = isset($data['alternative_route_max_weight_factor']) ? $data['alternative_route_max_weight_factor'] : null;
        $this->container['alternative_route_max_share_factor'] = isset($data['alternative_route_max_share_factor']) ? $data['alternative_route_max_share_factor'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getAlgorithmAllowableValues();
        if (!is_null($this->container['algorithm']) && !in_array($this->container['algorithm'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'algorithm', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

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
     * @param double[][] $points The points for the route in an array of `[longitude,latitude]`. For instance, if you want to calculate a route from point A to B to C then you specify `points: [ [A_longitude, A_latitude], [B_longitude, B_latitude], [C_longitude, C_latitude]]
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
        $allowedValues = $this->getCurbsidesAllowableValues();
        if (!is_null($curbsides) && array_diff($curbsides, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'curbsides', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['curbsides'] = $curbsides;

        return $this;
    }

    /**
     * Gets vehicle
     *
     * @return AllOfRouteRequestVehicle
     */
    public function getVehicle()
    {
        return $this->container['vehicle'];
    }

    /**
     * Sets vehicle
     *
     * @param AllOfRouteRequestVehicle $vehicle vehicle
     *
     * @return $this
     */
    public function setVehicle($vehicle)
    {
        $this->container['vehicle'] = $vehicle;

        return $this;
    }

    /**
     * Gets locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->container['locale'];
    }

    /**
     * Sets locale
     *
     * @param string $locale The locale of the resulting turn instructions. E.g. `pt_PT` for Portuguese or `de` for German.
     *
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->container['locale'] = $locale;

        return $this;
    }

    /**
     * Gets elevation
     *
     * @return bool
     */
    public function getElevation()
    {
        return $this->container['elevation'];
    }

    /**
     * Sets elevation
     *
     * @param bool $elevation If `true`, a third coordinate, the altitude, is included with all positions in the response. This changes the format of the `points` and `snapped_waypoints` fields of the response, in both their encodings. Unless you switch off the `points_encoded` parameter, you need special code on the client side that can handle three-dimensional coordinates. A request can fail if the vehicle profile does not support elevation. See the features object for every vehicle profile.
     *
     * @return $this
     */
    public function setElevation($elevation)
    {
        $this->container['elevation'] = $elevation;

        return $this;
    }

    /**
     * Gets details
     *
     * @return string[]
     */
    public function getDetails()
    {
        return $this->container['details'];
    }

    /**
     * Sets details
     *
     * @param string[] $details Optional parameter to retrieve path details. You can request additional details for the route: `street_name`, `time`, `distance`, `max_speed`, `toll`, `road_class`, `road_class_link`, `road_access`, `road_environment`, `lanes`, and `surface`. Read more about the usage of path details [here](https://discuss.graphhopper.com/t/2539).
     *
     * @return $this
     */
    public function setDetails($details)
    {
        $this->container['details'] = $details;

        return $this;
    }

    /**
     * Gets optimize
     *
     * @return string
     */
    public function getOptimize()
    {
        return $this->container['optimize'];
    }

    /**
     * Sets optimize
     *
     * @param string $optimize Normally, the calculated route will visit the points in the order you specified them. If you have more than two points, you can set this parameter to `\"true\"` and the points may be re-ordered to minimize the total travel time. Keep in mind that the limits on the number of locations of the Route Optimization API applies, and the request costs more credits.
     *
     * @return $this
     */
    public function setOptimize($optimize)
    {
        $this->container['optimize'] = $optimize;

        return $this;
    }

    /**
     * Gets instructions
     *
     * @return bool
     */
    public function getInstructions()
    {
        return $this->container['instructions'];
    }

    /**
     * Sets instructions
     *
     * @param bool $instructions If instructions should be calculated and returned
     *
     * @return $this
     */
    public function setInstructions($instructions)
    {
        $this->container['instructions'] = $instructions;

        return $this;
    }

    /**
     * Gets calc_points
     *
     * @return bool
     */
    public function getCalcPoints()
    {
        return $this->container['calc_points'];
    }

    /**
     * Sets calc_points
     *
     * @param bool $calc_points If the points for the route should be calculated at all.
     *
     * @return $this
     */
    public function setCalcPoints($calc_points)
    {
        $this->container['calc_points'] = $calc_points;

        return $this;
    }

    /**
     * Gets debug
     *
     * @return bool
     */
    public function getDebug()
    {
        return $this->container['debug'];
    }

    /**
     * Sets debug
     *
     * @param bool $debug If `true`, the output will be formatted.
     *
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->container['debug'] = $debug;

        return $this;
    }

    /**
     * Gets points_encoded
     *
     * @return bool
     */
    public function getPointsEncoded()
    {
        return $this->container['points_encoded'];
    }

    /**
     * Sets points_encoded
     *
     * @param bool $points_encoded Allows changing the encoding of location data in the response. The default is polyline encoding, which is compact but requires special client code to unpack. (We provide it in our JavaScript client library!) Set this parameter to `false` to switch the encoding to simple coordinate pairs like `[lon,lat]`, or `[lon,lat,elevation]`. See the description of the response format for more information.
     *
     * @return $this
     */
    public function setPointsEncoded($points_encoded)
    {
        $this->container['points_encoded'] = $points_encoded;

        return $this;
    }

    /**
     * Gets ch_disable
     *
     * @return bool
     */
    public function getChDisable()
    {
        return $this->container['ch_disable'];
    }

    /**
     * Sets ch_disable
     *
     * @param bool $ch_disable Use this parameter in combination with one or more parameters from below.
     *
     * @return $this
     */
    public function setChDisable($ch_disable)
    {
        $this->container['ch_disable'] = $ch_disable;

        return $this;
    }

    /**
     * Gets weighting
     *
     * @return string
     */
    public function getWeighting()
    {
        return $this->container['weighting'];
    }

    /**
     * Sets weighting
     *
     * @param string $weighting Determines the way the ''best'' route is calculated. Default is `fastest`. Other options are `shortest` (e.g. for `vehicle=foot` or `bike`) and `short_fastest` which finds a reasonable balance between `shortest` and `fastest`. Requires `ch.disable=true`.
     *
     * @return $this
     */
    public function setWeighting($weighting)
    {
        $this->container['weighting'] = $weighting;

        return $this;
    }

    /**
     * Gets headings
     *
     * @return int[]
     */
    public function getHeadings()
    {
        return $this->container['headings'];
    }

    /**
     * Sets headings
     *
     * @param int[] $headings Favour a heading direction for a certain point. Specify either one heading for the start point or as many as there are points. In this case headings are associated by their order to the specific points. Headings are given as north based clockwise angle between 0 and 360 degree. This parameter also influences the tour generated with `algorithm=round_trip` and forces the initial direction.  Requires `ch.disable=true`.
     *
     * @return $this
     */
    public function setHeadings($headings)
    {
        $this->container['headings'] = $headings;

        return $this;
    }

    /**
     * Gets heading_penalty
     *
     * @return int
     */
    public function getHeadingPenalty()
    {
        return $this->container['heading_penalty'];
    }

    /**
     * Sets heading_penalty
     *
     * @param int $heading_penalty Time penalty in seconds for not obeying a specified heading. Requires `ch.disable=true`.
     *
     * @return $this
     */
    public function setHeadingPenalty($heading_penalty)
    {
        $this->container['heading_penalty'] = $heading_penalty;

        return $this;
    }

    /**
     * Gets pass_through
     *
     * @return bool
     */
    public function getPassThrough()
    {
        return $this->container['pass_through'];
    }

    /**
     * Sets pass_through
     *
     * @param bool $pass_through If `true`, u-turns are avoided at via-points with regard to the `heading_penalty`. Requires `ch.disable=true`.
     *
     * @return $this
     */
    public function setPassThrough($pass_through)
    {
        $this->container['pass_through'] = $pass_through;

        return $this;
    }

    /**
     * Gets block_area
     *
     * @return string
     */
    public function getBlockArea()
    {
        return $this->container['block_area'];
    }

    /**
     * Sets block_area
     *
     * @param string $block_area Block road access via a point with the format `latitude,longitude` or an area defined by a circle `lat,lon,radius` or a rectangle `lat1,lon1,lat2,lon2`. Separate several values with `;`. Requires `ch.disable=true`.
     *
     * @return $this
     */
    public function setBlockArea($block_area)
    {
        $this->container['block_area'] = $block_area;

        return $this;
    }

    /**
     * Gets avoid
     *
     * @return string
     */
    public function getAvoid()
    {
        return $this->container['avoid'];
    }

    /**
     * Sets avoid
     *
     * @param string $avoid Specify which road classes and environments you would like to avoid. Possible values are `motorway`, `steps`, `track`, `toll`, `ferry`, `tunnel` and `bridge`. Separate several values with `;`. Obviously not all the values make sense for all vehicle profiles e.g. `bike` is already forbidden on a `motorway`. Requires `ch.disable=true`.
     *
     * @return $this
     */
    public function setAvoid($avoid)
    {
        $this->container['avoid'] = $avoid;

        return $this;
    }

    /**
     * Gets algorithm
     *
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->container['algorithm'];
    }

    /**
     * Sets algorithm
     *
     * @param string $algorithm Rather than looking for the shortest or fastest path, this lets you solve two different problems related to routing: With `round_trip`, the route will get you back to where you started. This is meant for fun (think of a bike trip), so we will add some randomness. This requires `ch.disable=true`. With `alternative_route`, we give you not one but several routes that are close to optimal, but not too similar to each other. You can control both of these features with additional parameters, see below.
     *
     * @return $this
     */
    public function setAlgorithm($algorithm)
    {
        $allowedValues = $this->getAlgorithmAllowableValues();
        if (!is_null($algorithm) && !in_array($algorithm, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'algorithm', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['algorithm'] = $algorithm;

        return $this;
    }

    /**
     * Gets round_trip_distance
     *
     * @return int
     */
    public function getRoundTripDistance()
    {
        return $this->container['round_trip_distance'];
    }

    /**
     * Sets round_trip_distance
     *
     * @param int $round_trip_distance If `algorithm=round_trip`, this parameter configures approximative length of the resulting round trip. Requires `ch.disable=true`.
     *
     * @return $this
     */
    public function setRoundTripDistance($round_trip_distance)
    {
        $this->container['round_trip_distance'] = $round_trip_distance;

        return $this;
    }

    /**
     * Gets round_trip_seed
     *
     * @return int
     */
    public function getRoundTripSeed()
    {
        return $this->container['round_trip_seed'];
    }

    /**
     * Sets round_trip_seed
     *
     * @param int $round_trip_seed If `algorithm=round_trip`, this sets the random seed. Change this to get a different tour for each value.
     *
     * @return $this
     */
    public function setRoundTripSeed($round_trip_seed)
    {
        $this->container['round_trip_seed'] = $round_trip_seed;

        return $this;
    }

    /**
     * Gets alternative_route_max_paths
     *
     * @return int
     */
    public function getAlternativeRouteMaxPaths()
    {
        return $this->container['alternative_route_max_paths'];
    }

    /**
     * Sets alternative_route_max_paths
     *
     * @param int $alternative_route_max_paths If `algorithm=alternative_route`, this parameter sets the number of maximum paths which should be calculated. Increasing can lead to worse alternatives.
     *
     * @return $this
     */
    public function setAlternativeRouteMaxPaths($alternative_route_max_paths)
    {
        $this->container['alternative_route_max_paths'] = $alternative_route_max_paths;

        return $this;
    }

    /**
     * Gets alternative_route_max_weight_factor
     *
     * @return float
     */
    public function getAlternativeRouteMaxWeightFactor()
    {
        return $this->container['alternative_route_max_weight_factor'];
    }

    /**
     * Sets alternative_route_max_weight_factor
     *
     * @param float $alternative_route_max_weight_factor If `algorithm=alternative_route`, this parameter sets the factor by which the alternatives routes can be longer than the optimal route. Increasing can lead to worse alternatives.
     *
     * @return $this
     */
    public function setAlternativeRouteMaxWeightFactor($alternative_route_max_weight_factor)
    {
        $this->container['alternative_route_max_weight_factor'] = $alternative_route_max_weight_factor;

        return $this;
    }

    /**
     * Gets alternative_route_max_share_factor
     *
     * @return float
     */
    public function getAlternativeRouteMaxShareFactor()
    {
        return $this->container['alternative_route_max_share_factor'];
    }

    /**
     * Sets alternative_route_max_share_factor
     *
     * @param float $alternative_route_max_share_factor If `algorithm=alternative_route`, this parameter specifies how similar an alternative route can be to the optimal route. Increasing can lead to worse alternatives.
     *
     * @return $this
     */
    public function setAlternativeRouteMaxShareFactor($alternative_route_max_share_factor)
    {
        $this->container['alternative_route_max_share_factor'] = $alternative_route_max_share_factor;

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
