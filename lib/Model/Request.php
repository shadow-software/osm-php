<?php
/**
 * Request
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
 * Request Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Request implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'vehicles' => '\Swagger\Client\Model\Vehicle[]',
'vehicle_types' => '\Swagger\Client\Model\VehicleType[]',
'services' => '\Swagger\Client\Model\Service[]',
'shipments' => '\Swagger\Client\Model\Shipment[]',
'relations' => '\Swagger\Client\Model\AnyOfRequestRelationsItems[]',
'algorithm' => '\Swagger\Client\Model\Algorithm',
'objectives' => '\Swagger\Client\Model\Objective[]',
'cost_matrices' => '\Swagger\Client\Model\CostMatrix[]',
'configuration' => '\Swagger\Client\Model\Configuration'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'vehicles' => null,
'vehicle_types' => null,
'services' => null,
'shipments' => null,
'relations' => null,
'algorithm' => null,
'objectives' => null,
'cost_matrices' => null,
'configuration' => null    ];

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
        'vehicles' => 'vehicles',
'vehicle_types' => 'vehicle_types',
'services' => 'services',
'shipments' => 'shipments',
'relations' => 'relations',
'algorithm' => 'algorithm',
'objectives' => 'objectives',
'cost_matrices' => 'cost_matrices',
'configuration' => 'configuration'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'vehicles' => 'setVehicles',
'vehicle_types' => 'setVehicleTypes',
'services' => 'setServices',
'shipments' => 'setShipments',
'relations' => 'setRelations',
'algorithm' => 'setAlgorithm',
'objectives' => 'setObjectives',
'cost_matrices' => 'setCostMatrices',
'configuration' => 'setConfiguration'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'vehicles' => 'getVehicles',
'vehicle_types' => 'getVehicleTypes',
'services' => 'getServices',
'shipments' => 'getShipments',
'relations' => 'getRelations',
'algorithm' => 'getAlgorithm',
'objectives' => 'getObjectives',
'cost_matrices' => 'getCostMatrices',
'configuration' => 'getConfiguration'    ];

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
        $this->container['vehicles'] = isset($data['vehicles']) ? $data['vehicles'] : null;
        $this->container['vehicle_types'] = isset($data['vehicle_types']) ? $data['vehicle_types'] : null;
        $this->container['services'] = isset($data['services']) ? $data['services'] : null;
        $this->container['shipments'] = isset($data['shipments']) ? $data['shipments'] : null;
        $this->container['relations'] = isset($data['relations']) ? $data['relations'] : null;
        $this->container['algorithm'] = isset($data['algorithm']) ? $data['algorithm'] : null;
        $this->container['objectives'] = isset($data['objectives']) ? $data['objectives'] : null;
        $this->container['cost_matrices'] = isset($data['cost_matrices']) ? $data['cost_matrices'] : null;
        $this->container['configuration'] = isset($data['configuration']) ? $data['configuration'] : null;
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
     * Gets vehicles
     *
     * @return \Swagger\Client\Model\Vehicle[]
     */
    public function getVehicles()
    {
        return $this->container['vehicles'];
    }

    /**
     * Sets vehicles
     *
     * @param \Swagger\Client\Model\Vehicle[] $vehicles Specifies the available vehicles.
     *
     * @return $this
     */
    public function setVehicles($vehicles)
    {
        $this->container['vehicles'] = $vehicles;

        return $this;
    }

    /**
     * Gets vehicle_types
     *
     * @return \Swagger\Client\Model\VehicleType[]
     */
    public function getVehicleTypes()
    {
        return $this->container['vehicle_types'];
    }

    /**
     * Sets vehicle_types
     *
     * @param \Swagger\Client\Model\VehicleType[] $vehicle_types Specifies the available vehicle types. These types can be assigned to vehicles.
     *
     * @return $this
     */
    public function setVehicleTypes($vehicle_types)
    {
        $this->container['vehicle_types'] = $vehicle_types;

        return $this;
    }

    /**
     * Gets services
     *
     * @return \Swagger\Client\Model\Service[]
     */
    public function getServices()
    {
        return $this->container['services'];
    }

    /**
     * Sets services
     *
     * @param \Swagger\Client\Model\Service[] $services Specifies the orders of the type \"service\". These are, for example, pick-ups, deliveries or other stops that are to be approached by the specified vehicles. Each of these orders contains only one location.
     *
     * @return $this
     */
    public function setServices($services)
    {
        $this->container['services'] = $services;

        return $this;
    }

    /**
     * Gets shipments
     *
     * @return \Swagger\Client\Model\Shipment[]
     */
    public function getShipments()
    {
        return $this->container['shipments'];
    }

    /**
     * Sets shipments
     *
     * @param \Swagger\Client\Model\Shipment[] $shipments Specifies the available shipments. Each shipment contains a pickup and a delivery stop, which must be processed one after the other.
     *
     * @return $this
     */
    public function setShipments($shipments)
    {
        $this->container['shipments'] = $shipments;

        return $this;
    }

    /**
     * Gets relations
     *
     * @return \Swagger\Client\Model\AnyOfRequestRelationsItems[]
     */
    public function getRelations()
    {
        return $this->container['relations'];
    }

    /**
     * Sets relations
     *
     * @param \Swagger\Client\Model\AnyOfRequestRelationsItems[] $relations Defines additional relationships between orders.
     *
     * @return $this
     */
    public function setRelations($relations)
    {
        $this->container['relations'] = $relations;

        return $this;
    }

    /**
     * Gets algorithm
     *
     * @return \Swagger\Client\Model\Algorithm
     */
    public function getAlgorithm()
    {
        return $this->container['algorithm'];
    }

    /**
     * Sets algorithm
     *
     * @param \Swagger\Client\Model\Algorithm $algorithm algorithm
     *
     * @return $this
     */
    public function setAlgorithm($algorithm)
    {
        $this->container['algorithm'] = $algorithm;

        return $this;
    }

    /**
     * Gets objectives
     *
     * @return \Swagger\Client\Model\Objective[]
     */
    public function getObjectives()
    {
        return $this->container['objectives'];
    }

    /**
     * Sets objectives
     *
     * @param \Swagger\Client\Model\Objective[] $objectives Specifies an objective function. The vehicle routing problem is solved in such a way that this objective function is minimized.
     *
     * @return $this
     */
    public function setObjectives($objectives)
    {
        $this->container['objectives'] = $objectives;

        return $this;
    }

    /**
     * Gets cost_matrices
     *
     * @return \Swagger\Client\Model\CostMatrix[]
     */
    public function getCostMatrices()
    {
        return $this->container['cost_matrices'];
    }

    /**
     * Sets cost_matrices
     *
     * @param \Swagger\Client\Model\CostMatrix[] $cost_matrices Specifies your own tranport time and distance matrices.
     *
     * @return $this
     */
    public function setCostMatrices($cost_matrices)
    {
        $this->container['cost_matrices'] = $cost_matrices;

        return $this;
    }

    /**
     * Gets configuration
     *
     * @return \Swagger\Client\Model\Configuration
     */
    public function getConfiguration()
    {
        return $this->container['configuration'];
    }

    /**
     * Sets configuration
     *
     * @param \Swagger\Client\Model\Configuration $configuration configuration
     *
     * @return $this
     */
    public function setConfiguration($configuration)
    {
        $this->container['configuration'] = $configuration;

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
