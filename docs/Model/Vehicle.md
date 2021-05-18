# Vehicle

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**vehicle_id** | **string** | Specifies the ID of the vehicle. Ids must be unique, i.e. if there are two vehicles with the same ID, an error is returned. | 
**type_id** | **string** | The type ID assigns a vehicle type to this vehicle. You can specify types in the array of vehicle types. If you omit the type ID, the default type is used. The default type is a &#x60;car&#x60; with a capacity of 0. | [optional] [default to 'default-type']
**start_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | 
**end_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | [optional] 
**break** | [**AnyOfVehicleModelBreak**](AnyOfVehicleModelBreak.md) |  | [optional] 
**return_to_depot** | **bool** | If it is false, the algorithm decides where to end the vehicle route. It ends in one of your customers&#x27; locations. The end is chosen such that it contributes to the overall objective function, e.g. min transport_time. If it is true, you can either specify a specific end location (which is then regarded as end depot) or you can leave it and the driver returns to its start location. | [optional] [default to true]
**earliest_start** | **int** | Earliest start of vehicle in seconds. It is recommended to use the unix timestamp. | [optional] [default to 0]
**latest_end** | **int** | Latest end of vehicle in seconds, i.e. the time the vehicle needs to be at its end location at latest. | [optional] 
**skills** | **string[]** | Array of skills, i.e. array of string (not case sensitive). | [optional] 
**max_distance** | **int** | Specifies the maximum distance (in meters) a vehicle can go. | [optional] 
**max_driving_time** | **int** | Specifies the maximum drive time (in seconds) a vehicle/driver can go, i.e. the maximum time on the road (service and waiting times are not included here) | [optional] 
**max_jobs** | **int** | Specifies the maximum number of jobs a vehicle can load. | [optional] 
**min_jobs** | **int** | Specifies the minimum number of jobs a vehicle should load. This is a soft constraint, i.e. if it is not possible to fulfill “min_jobs”, we will still try to get as close as possible to this constraint. | [optional] 
**max_activities** | **int** | Specifies the maximum number of activities a vehicle can conduct. | [optional] 
**move_to_end_address** | **bool** | Indicates whether a vehicle should be moved even though it has not been assigned any jobs. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

