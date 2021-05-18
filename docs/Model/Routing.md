# Routing

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**calc_points** | **bool** | It lets you specify whether the API should provide you with route geometries for vehicle routes or not. Thus, you do not need to do extra routing to get the polyline for each route. | [optional] [default to false]
**consider_traffic** | **bool** | indicates whether historical traffic information should be considered | [optional] [default to false]
**network_data_provider** | **string** | specifies the data provider, read more about it [here](#section/Map-Data-and-Routing-Profiles). | [optional] [default to 'openstreetmap']
**curbside_strictness** | **string** | In some cases curbside constraints cannot be fulfilled. For example in one-way streets you cannot arrive at a building that is on the left side of the street such that the building is to the right of you (unless you drove the one-way street the wrong/illegal way). You can set the &#x60;curbside_strictness&#x60; to &#x60;soft&#x60; to ignore the curbside constraint in such cases or set it to &#x60;strict&#x60; to get an error response instead. You can also set it to &#x60;ignore&#x60; to ignore all curbside constraints (this is useful to compare the results with and without constraints without modifying every single address). | [optional] [default to 'soft']
**fail_fast** | **bool** | indicates whether matrix calculation should fail fast when points cannot be connected | [optional] [default to true]
**return_snapped_waypoints** | **bool** | Indicates whether a solution includes snapped waypoints. In contrary to the address coordinate a snapped waypoint is the access point to the (road) network. | [optional] [default to false]
**snap_preventions** | **string[]** | Prevents snapping locations to road links of specified road types, e.g. to motorway. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

