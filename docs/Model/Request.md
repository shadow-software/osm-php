# Request

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**vehicles** | [**\Swagger\Client\Model\Vehicle[]**](Vehicle.md) | Specifies the available vehicles. | [optional] 
**vehicle_types** | [**\Swagger\Client\Model\VehicleType[]**](VehicleType.md) | Specifies the available vehicle types. These types can be assigned to vehicles. | [optional] 
**services** | [**\Swagger\Client\Model\Service[]**](Service.md) | Specifies the orders of the type \&quot;service\&quot;. These are, for example, pick-ups, deliveries or other stops that are to be approached by the specified vehicles. Each of these orders contains only one location. | [optional] 
**shipments** | [**\Swagger\Client\Model\Shipment[]**](Shipment.md) | Specifies the available shipments. Each shipment contains a pickup and a delivery stop, which must be processed one after the other. | [optional] 
**relations** | [**\Swagger\Client\Model\AnyOfRequestRelationsItems[]**](.md) | Defines additional relationships between orders. | [optional] 
**algorithm** | [**\Swagger\Client\Model\Algorithm**](Algorithm.md) |  | [optional] 
**objectives** | [**\Swagger\Client\Model\Objective[]**](Objective.md) | Specifies an objective function. The vehicle routing problem is solved in such a way that this objective function is minimized. | [optional] 
**cost_matrices** | [**\Swagger\Client\Model\CostMatrix[]**](CostMatrix.md) | Specifies your own tranport time and distance matrices. | [optional] 
**configuration** | [**\Swagger\Client\Model\Configuration**](Configuration.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

