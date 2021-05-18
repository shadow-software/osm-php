<?php
/**
 * Vehicle
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
 * Vehicle Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Vehicle implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Vehicle';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'vehicle_id' => 'string',
'type_id' => 'string',
'start_address' => '\Swagger\Client\Model\Address',
'end_address' => '\Swagger\Client\Model\Address',
'break' => 'AnyOfVehicleModelBreak',
'return_to_depot' => 'bool',
'earliest_start' => 'int',
'latest_end' => 'int',
'skills' => 'string[]',
'max_distance' => 'int',
'max_driving_time' => 'int',
'max_jobs' => 'int',
'min_jobs' => 'int',
'max_activities' => 'int',
'move_to_end_address' => 'bool'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'vehicle_id' => null,
'type_id' => null,
'start_address' => null,
'end_address' => null,
'break' => null,
'return_to_depot' => null,
'earliest_start' => 'int64',
'latest_end' => 'int64',
'skills' => null,
'max_distance' => 'int64',
'max_driving_time' => 'int64',
'max_jobs' => 'int32',
'min_jobs' => 'int32',
'max_activities' => 'int32',
'move_to_end_address' => null    ];

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
        'vehicle_id' => 'vehicle_id',
'type_id' => 'type_id',
'start_address' => 'start_address',
'end_address' => 'end_address',
'break' => 'break',
'return_to_depot' => 'return_to_depot',
'earliest_start' => 'earliest_start',
'latest_end' => 'latest_end',
'skills' => 'skills',
'max_distance' => 'max_distance',
'max_driving_time' => 'max_driving_time',
'max_jobs' => 'max_jobs',
'min_jobs' => 'min_jobs',
'max_activities' => 'max_activities',
'move_to_end_address' => 'move_to_end_address'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'vehicle_id' => 'setVehicleId',
'type_id' => 'setTypeId',
'start_address' => 'setStartAddress',
'end_address' => 'setEndAddress',
'break' => 'setBreak',
'return_to_depot' => 'setReturnToDepot',
'earliest_start' => 'setEarliestStart',
'latest_end' => 'setLatestEnd',
'skills' => 'setSkills',
'max_distance' => 'setMaxDistance',
'max_driving_time' => 'setMaxDrivingTime',
'max_jobs' => 'setMaxJobs',
'min_jobs' => 'setMinJobs',
'max_activities' => 'setMaxActivities',
'move_to_end_address' => 'setMoveToEndAddress'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'vehicle_id' => 'getVehicleId',
'type_id' => 'getTypeId',
'start_address' => 'getStartAddress',
'end_address' => 'getEndAddress',
'break' => 'getBreak',
'return_to_depot' => 'getReturnToDepot',
'earliest_start' => 'getEarliestStart',
'latest_end' => 'getLatestEnd',
'skills' => 'getSkills',
'max_distance' => 'getMaxDistance',
'max_driving_time' => 'getMaxDrivingTime',
'max_jobs' => 'getMaxJobs',
'min_jobs' => 'getMinJobs',
'max_activities' => 'getMaxActivities',
'move_to_end_address' => 'getMoveToEndAddress'    ];

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
        $this->container['vehicle_id'] = isset($data['vehicle_id']) ? $data['vehicle_id'] : null;
        $this->container['type_id'] = isset($data['type_id']) ? $data['type_id'] : 'default-type';
        $this->container['start_address'] = isset($data['start_address']) ? $data['start_address'] : null;
        $this->container['end_address'] = isset($data['end_address']) ? $data['end_address'] : null;
        $this->container['break'] = isset($data['break']) ? $data['break'] : null;
        $this->container['return_to_depot'] = isset($data['return_to_depot']) ? $data['return_to_depot'] : true;
        $this->container['earliest_start'] = isset($data['earliest_start']) ? $data['earliest_start'] : 0;
        $this->container['latest_end'] = isset($data['latest_end']) ? $data['latest_end'] : null;
        $this->container['skills'] = isset($data['skills']) ? $data['skills'] : null;
        $this->container['max_distance'] = isset($data['max_distance']) ? $data['max_distance'] : null;
        $this->container['max_driving_time'] = isset($data['max_driving_time']) ? $data['max_driving_time'] : null;
        $this->container['max_jobs'] = isset($data['max_jobs']) ? $data['max_jobs'] : null;
        $this->container['min_jobs'] = isset($data['min_jobs']) ? $data['min_jobs'] : null;
        $this->container['max_activities'] = isset($data['max_activities']) ? $data['max_activities'] : null;
        $this->container['move_to_end_address'] = isset($data['move_to_end_address']) ? $data['move_to_end_address'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['vehicle_id'] === null) {
            $invalidProperties[] = "'vehicle_id' can't be null";
        }
        if ($this->container['start_address'] === null) {
            $invalidProperties[] = "'start_address' can't be null";
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
     * Gets vehicle_id
     *
     * @return string
     */
    public function getVehicleId()
    {
        return $this->container['vehicle_id'];
    }

    /**
     * Sets vehicle_id
     *
     * @param string $vehicle_id Specifies the ID of the vehicle. Ids must be unique, i.e. if there are two vehicles with the same ID, an error is returned.
     *
     * @return $this
     */
    public function setVehicleId($vehicle_id)
    {
        $this->container['vehicle_id'] = $vehicle_id;

        return $this;
    }

    /**
     * Gets type_id
     *
     * @return string
     */
    public function getTypeId()
    {
        return $this->container['type_id'];
    }

    /**
     * Sets type_id
     *
     * @param string $type_id The type ID assigns a vehicle type to this vehicle. You can specify types in the array of vehicle types. If you omit the type ID, the default type is used. The default type is a `car` with a capacity of 0.
     *
     * @return $this
     */
    public function setTypeId($type_id)
    {
        $this->container['type_id'] = $type_id;

        return $this;
    }

    /**
     * Gets start_address
     *
     * @return \Swagger\Client\Model\Address
     */
    public function getStartAddress()
    {
        return $this->container['start_address'];
    }

    /**
     * Sets start_address
     *
     * @param \Swagger\Client\Model\Address $start_address start_address
     *
     * @return $this
     */
    public function setStartAddress($start_address)
    {
        $this->container['start_address'] = $start_address;

        return $this;
    }

    /**
     * Gets end_address
     *
     * @return \Swagger\Client\Model\Address
     */
    public function getEndAddress()
    {
        return $this->container['end_address'];
    }

    /**
     * Sets end_address
     *
     * @param \Swagger\Client\Model\Address $end_address end_address
     *
     * @return $this
     */
    public function setEndAddress($end_address)
    {
        $this->container['end_address'] = $end_address;

        return $this;
    }

    /**
     * Gets break
     *
     * @return AnyOfVehicleModelBreak
     */
    public function getBreak()
    {
        return $this->container['break'];
    }

    /**
     * Sets break
     *
     * @param AnyOfVehicleModelBreak $break break
     *
     * @return $this
     */
    public function setBreak($break)
    {
        $this->container['break'] = $break;

        return $this;
    }

    /**
     * Gets return_to_depot
     *
     * @return bool
     */
    public function getReturnToDepot()
    {
        return $this->container['return_to_depot'];
    }

    /**
     * Sets return_to_depot
     *
     * @param bool $return_to_depot If it is false, the algorithm decides where to end the vehicle route. It ends in one of your customers' locations. The end is chosen such that it contributes to the overall objective function, e.g. min transport_time. If it is true, you can either specify a specific end location (which is then regarded as end depot) or you can leave it and the driver returns to its start location.
     *
     * @return $this
     */
    public function setReturnToDepot($return_to_depot)
    {
        $this->container['return_to_depot'] = $return_to_depot;

        return $this;
    }

    /**
     * Gets earliest_start
     *
     * @return int
     */
    public function getEarliestStart()
    {
        return $this->container['earliest_start'];
    }

    /**
     * Sets earliest_start
     *
     * @param int $earliest_start Earliest start of vehicle in seconds. It is recommended to use the unix timestamp.
     *
     * @return $this
     */
    public function setEarliestStart($earliest_start)
    {
        $this->container['earliest_start'] = $earliest_start;

        return $this;
    }

    /**
     * Gets latest_end
     *
     * @return int
     */
    public function getLatestEnd()
    {
        return $this->container['latest_end'];
    }

    /**
     * Sets latest_end
     *
     * @param int $latest_end Latest end of vehicle in seconds, i.e. the time the vehicle needs to be at its end location at latest.
     *
     * @return $this
     */
    public function setLatestEnd($latest_end)
    {
        $this->container['latest_end'] = $latest_end;

        return $this;
    }

    /**
     * Gets skills
     *
     * @return string[]
     */
    public function getSkills()
    {
        return $this->container['skills'];
    }

    /**
     * Sets skills
     *
     * @param string[] $skills Array of skills, i.e. array of string (not case sensitive).
     *
     * @return $this
     */
    public function setSkills($skills)
    {
        $this->container['skills'] = $skills;

        return $this;
    }

    /**
     * Gets max_distance
     *
     * @return int
     */
    public function getMaxDistance()
    {
        return $this->container['max_distance'];
    }

    /**
     * Sets max_distance
     *
     * @param int $max_distance Specifies the maximum distance (in meters) a vehicle can go.
     *
     * @return $this
     */
    public function setMaxDistance($max_distance)
    {
        $this->container['max_distance'] = $max_distance;

        return $this;
    }

    /**
     * Gets max_driving_time
     *
     * @return int
     */
    public function getMaxDrivingTime()
    {
        return $this->container['max_driving_time'];
    }

    /**
     * Sets max_driving_time
     *
     * @param int $max_driving_time Specifies the maximum drive time (in seconds) a vehicle/driver can go, i.e. the maximum time on the road (service and waiting times are not included here)
     *
     * @return $this
     */
    public function setMaxDrivingTime($max_driving_time)
    {
        $this->container['max_driving_time'] = $max_driving_time;

        return $this;
    }

    /**
     * Gets max_jobs
     *
     * @return int
     */
    public function getMaxJobs()
    {
        return $this->container['max_jobs'];
    }

    /**
     * Sets max_jobs
     *
     * @param int $max_jobs Specifies the maximum number of jobs a vehicle can load.
     *
     * @return $this
     */
    public function setMaxJobs($max_jobs)
    {
        $this->container['max_jobs'] = $max_jobs;

        return $this;
    }

    /**
     * Gets min_jobs
     *
     * @return int
     */
    public function getMinJobs()
    {
        return $this->container['min_jobs'];
    }

    /**
     * Sets min_jobs
     *
     * @param int $min_jobs Specifies the minimum number of jobs a vehicle should load. This is a soft constraint, i.e. if it is not possible to fulfill “min_jobs”, we will still try to get as close as possible to this constraint.
     *
     * @return $this
     */
    public function setMinJobs($min_jobs)
    {
        $this->container['min_jobs'] = $min_jobs;

        return $this;
    }

    /**
     * Gets max_activities
     *
     * @return int
     */
    public function getMaxActivities()
    {
        return $this->container['max_activities'];
    }

    /**
     * Sets max_activities
     *
     * @param int $max_activities Specifies the maximum number of activities a vehicle can conduct.
     *
     * @return $this
     */
    public function setMaxActivities($max_activities)
    {
        $this->container['max_activities'] = $max_activities;

        return $this;
    }

    /**
     * Gets move_to_end_address
     *
     * @return bool
     */
    public function getMoveToEndAddress()
    {
        return $this->container['move_to_end_address'];
    }

    /**
     * Sets move_to_end_address
     *
     * @param bool $move_to_end_address Indicates whether a vehicle should be moved even though it has not been assigned any jobs.
     *
     * @return $this
     */
    public function setMoveToEndAddress($move_to_end_address)
    {
        $this->container['move_to_end_address'] = $move_to_end_address;

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
