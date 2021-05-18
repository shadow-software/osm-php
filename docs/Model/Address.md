# Address

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**location_id** | **string** | Specifies the id of the location. | 
**name** | **string** | Name of location. | [optional] 
**lon** | **double** | Longitude of location. | 
**lat** | **double** | Latitude of location. | 
**street_hint** | **string** | Optional parameter. Specifies a hint for each address to better snap the coordinates (lon,lat) to road network. E.g. if there is an address or house with two or more neighboring streets you can control for which street the closest location is looked up. | [optional] 
**curbside** | **string** | Optional parameter. Specifies on which side a point should be relative to the driver when she leaves/arrives at a start/target/via point. Only supported for motor vehicles and OpenStreetMap. | [optional] [default to 'any']

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

