<?php
/**
 * TagsApi
 * PHP version 5
 *
 * @category Class
 * @package  Alfresco
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Alfresco Content Services REST API
 *
 * **Core API**  Provides access to the core features of Alfresco Content Services.
 *
 * OpenAPI spec version: 1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Alfresco\Api;

use \Alfresco\ApiClient;
use \Alfresco\ApiException;
use \Alfresco\Configuration;
use \Alfresco\ObjectSerializer;

/**
 * TagsApi Class Doc Comment
 *
 * @category Class
 * @package  Alfresco
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TagsApi
{
    /**
     * API Client
     *
     * @var \Alfresco\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \Alfresco\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\Alfresco\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Alfresco\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Alfresco\ApiClient $apiClient set the API client
     *
     * @return TagsApi
     */
    public function setApiClient(\Alfresco\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation createTagForNode
     *
     * Create a tag for a node
     *
     * @param string $node_id The identifier of a node. (required)
     * @param \Alfresco\Model\TagBody $tag_body_create The new tag (required)
     * @param string[] $fields A list of field names.  You can use this parameter to restrict the fields returned within a response if, for example, you want to save on overall bandwidth.  The list applies to a returned individual entity or entries within a collection.  If the API method also supports the **include** parameter, then the fields specified in the **include** parameter are returned in addition to those specified in the **fields** parameter. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return \Alfresco\Model\TagEntry
     */
    public function createTagForNode($node_id, $tag_body_create, $fields = null)
    {
        list($response) = $this->createTagForNodeWithHttpInfo($node_id, $tag_body_create, $fields);
        return $response;
    }

    /**
     * Operation createTagForNodeWithHttpInfo
     *
     * Create a tag for a node
     *
     * @param string $node_id The identifier of a node. (required)
     * @param \Alfresco\Model\TagBody $tag_body_create The new tag (required)
     * @param string[] $fields A list of field names.  You can use this parameter to restrict the fields returned within a response if, for example, you want to save on overall bandwidth.  The list applies to a returned individual entity or entries within a collection.  If the API method also supports the **include** parameter, then the fields specified in the **include** parameter are returned in addition to those specified in the **fields** parameter. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return array of \Alfresco\Model\TagEntry, HTTP status code, HTTP response headers (array of strings)
     */
    public function createTagForNodeWithHttpInfo($node_id, $tag_body_create, $fields = null)
    {
        // verify the required parameter 'node_id' is set
        if ($node_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $node_id when calling createTagForNode');
        }
        // verify the required parameter 'tag_body_create' is set
        if ($tag_body_create === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_body_create when calling createTagForNode');
        }
        // parse inputs
        $resourcePath = "/nodes/{nodeId}/tags";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if (is_array($fields)) {
            $fields = $this->apiClient->getSerializer()->serializeCollection($fields, 'csv', true);
        }
        if ($fields !== null) {
            $queryParams['fields'] = $this->apiClient->getSerializer()->toQueryValue($fields);
        }
        // path params
        if ($node_id !== null) {
            $resourcePath = str_replace(
                "{" . "nodeId" . "}",
                $this->apiClient->getSerializer()->toPathValue($node_id),
                $resourcePath
            );
        }
        // body params
        $_tempBody = null;
        if (isset($tag_body_create)) {
            $_tempBody = $tag_body_create;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Alfresco\Model\TagEntry',
                '/nodes/{nodeId}/tags'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Alfresco\Model\TagEntry', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\TagEntry', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation deleteTagFromNode
     *
     * Delete a tag from a node
     *
     * @param string $node_id The identifier of a node. (required)
     * @param string $tag_id The identifier of a tag. (required)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return void
     */
    public function deleteTagFromNode($node_id, $tag_id)
    {
        list($response) = $this->deleteTagFromNodeWithHttpInfo($node_id, $tag_id);
        return $response;
    }

    /**
     * Operation deleteTagFromNodeWithHttpInfo
     *
     * Delete a tag from a node
     *
     * @param string $node_id The identifier of a node. (required)
     * @param string $tag_id The identifier of a tag. (required)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteTagFromNodeWithHttpInfo($node_id, $tag_id)
    {
        // verify the required parameter 'node_id' is set
        if ($node_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $node_id when calling deleteTagFromNode');
        }
        // verify the required parameter 'tag_id' is set
        if ($tag_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_id when calling deleteTagFromNode');
        }
        // parse inputs
        $resourcePath = "/nodes/{nodeId}/tags/{tagId}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($node_id !== null) {
            $resourcePath = str_replace(
                "{" . "nodeId" . "}",
                $this->apiClient->getSerializer()->toPathValue($node_id),
                $resourcePath
            );
        }
        // path params
        if ($tag_id !== null) {
            $resourcePath = str_replace(
                "{" . "tagId" . "}",
                $this->apiClient->getSerializer()->toPathValue($tag_id),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'DELETE',
                $queryParams,
                $httpBody,
                $headerParams,
                null,
                '/nodes/{nodeId}/tags/{tagId}'
            );

            return [null, $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getTag
     *
     * Get a tag
     *
     * @param string $tag_id The identifier of a tag. (required)
     * @param string[] $fields A list of field names.  You can use this parameter to restrict the fields returned within a response if, for example, you want to save on overall bandwidth.  The list applies to a returned individual entity or entries within a collection.  If the API method also supports the **include** parameter, then the fields specified in the **include** parameter are returned in addition to those specified in the **fields** parameter. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return \Alfresco\Model\TagEntry
     */
    public function getTag($tag_id, $fields = null)
    {
        list($response) = $this->getTagWithHttpInfo($tag_id, $fields);
        return $response;
    }

    /**
     * Operation getTagWithHttpInfo
     *
     * Get a tag
     *
     * @param string $tag_id The identifier of a tag. (required)
     * @param string[] $fields A list of field names.  You can use this parameter to restrict the fields returned within a response if, for example, you want to save on overall bandwidth.  The list applies to a returned individual entity or entries within a collection.  If the API method also supports the **include** parameter, then the fields specified in the **include** parameter are returned in addition to those specified in the **fields** parameter. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return array of \Alfresco\Model\TagEntry, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTagWithHttpInfo($tag_id, $fields = null)
    {
        // verify the required parameter 'tag_id' is set
        if ($tag_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_id when calling getTag');
        }
        // parse inputs
        $resourcePath = "/tags/{tagId}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if (is_array($fields)) {
            $fields = $this->apiClient->getSerializer()->serializeCollection($fields, 'csv', true);
        }
        if ($fields !== null) {
            $queryParams['fields'] = $this->apiClient->getSerializer()->toQueryValue($fields);
        }
        // path params
        if ($tag_id !== null) {
            $resourcePath = str_replace(
                "{" . "tagId" . "}",
                $this->apiClient->getSerializer()->toPathValue($tag_id),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Alfresco\Model\TagEntry',
                '/tags/{tagId}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Alfresco\Model\TagEntry', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\TagEntry', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation listTags
     *
     * List tags
     *
     * @param int $skip_count The number of entities that exist in the collection before those included in this list.  If not supplied then the default value is 0. (optional, default to 0)
     * @param int $max_items The maximum number of items to return in the list.  If not supplied then the default value is 100. (optional, default to 100)
     * @param string[] $fields A list of field names.  You can use this parameter to restrict the fields returned within a response if, for example, you want to save on overall bandwidth.  The list applies to a returned individual entity or entries within a collection.  If the API method also supports the **include** parameter, then the fields specified in the **include** parameter are returned in addition to those specified in the **fields** parameter. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return \Alfresco\Model\TagPaging
     */
    public function listTags($skip_count = '0', $max_items = '100', $fields = null)
    {
        list($response) = $this->listTagsWithHttpInfo($skip_count, $max_items, $fields);
        return $response;
    }

    /**
     * Operation listTagsWithHttpInfo
     *
     * List tags
     *
     * @param int $skip_count The number of entities that exist in the collection before those included in this list.  If not supplied then the default value is 0. (optional, default to 0)
     * @param int $max_items The maximum number of items to return in the list.  If not supplied then the default value is 100. (optional, default to 100)
     * @param string[] $fields A list of field names.  You can use this parameter to restrict the fields returned within a response if, for example, you want to save on overall bandwidth.  The list applies to a returned individual entity or entries within a collection.  If the API method also supports the **include** parameter, then the fields specified in the **include** parameter are returned in addition to those specified in the **fields** parameter. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return array of \Alfresco\Model\TagPaging, HTTP status code, HTTP response headers (array of strings)
     */
    public function listTagsWithHttpInfo($skip_count = '0', $max_items = '100', $fields = null)
    {
        if (!is_null($skip_count) && ($skip_count < 0)) {
            throw new \InvalidArgumentException('invalid value for "$skip_count" when calling TagsApi.listTags, must be bigger than or equal to 0.');
        }

        if (!is_null($max_items) && ($max_items < 1)) {
            throw new \InvalidArgumentException('invalid value for "$max_items" when calling TagsApi.listTags, must be bigger than or equal to 1.');
        }

        // parse inputs
        $resourcePath = "/tags";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($skip_count !== null) {
            $queryParams['skipCount'] = $this->apiClient->getSerializer()->toQueryValue($skip_count);
        }
        // query params
        if ($max_items !== null) {
            $queryParams['maxItems'] = $this->apiClient->getSerializer()->toQueryValue($max_items);
        }
        // query params
        if (is_array($fields)) {
            $fields = $this->apiClient->getSerializer()->serializeCollection($fields, 'csv', true);
        }
        if ($fields !== null) {
            $queryParams['fields'] = $this->apiClient->getSerializer()->toQueryValue($fields);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Alfresco\Model\TagPaging',
                '/tags'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Alfresco\Model\TagPaging', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\TagPaging', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation listTagsForNode
     *
     * List tags for a node
     *
     * @param string $node_id The identifier of a node. (required)
     * @param int $skip_count The number of entities that exist in the collection before those included in this list.  If not supplied then the default value is 0. (optional, default to 0)
     * @param int $max_items The maximum number of items to return in the list.  If not supplied then the default value is 100. (optional, default to 100)
     * @param string[] $fields A list of field names.  You can use this parameter to restrict the fields returned within a response if, for example, you want to save on overall bandwidth.  The list applies to a returned individual entity or entries within a collection.  If the API method also supports the **include** parameter, then the fields specified in the **include** parameter are returned in addition to those specified in the **fields** parameter. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return \Alfresco\Model\TagPaging
     */
    public function listTagsForNode($node_id, $skip_count = '0', $max_items = '100', $fields = null)
    {
        list($response) = $this->listTagsForNodeWithHttpInfo($node_id, $skip_count, $max_items, $fields);
        return $response;
    }

    /**
     * Operation listTagsForNodeWithHttpInfo
     *
     * List tags for a node
     *
     * @param string $node_id The identifier of a node. (required)
     * @param int $skip_count The number of entities that exist in the collection before those included in this list.  If not supplied then the default value is 0. (optional, default to 0)
     * @param int $max_items The maximum number of items to return in the list.  If not supplied then the default value is 100. (optional, default to 100)
     * @param string[] $fields A list of field names.  You can use this parameter to restrict the fields returned within a response if, for example, you want to save on overall bandwidth.  The list applies to a returned individual entity or entries within a collection.  If the API method also supports the **include** parameter, then the fields specified in the **include** parameter are returned in addition to those specified in the **fields** parameter. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return array of \Alfresco\Model\TagPaging, HTTP status code, HTTP response headers (array of strings)
     */
    public function listTagsForNodeWithHttpInfo($node_id, $skip_count = '0', $max_items = '100', $fields = null)
    {
        // verify the required parameter 'node_id' is set
        if ($node_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $node_id when calling listTagsForNode');
        }
        if (!is_null($skip_count) && ($skip_count < 0)) {
            throw new \InvalidArgumentException('invalid value for "$skip_count" when calling TagsApi.listTagsForNode, must be bigger than or equal to 0.');
        }

        if (!is_null($max_items) && ($max_items < 1)) {
            throw new \InvalidArgumentException('invalid value for "$max_items" when calling TagsApi.listTagsForNode, must be bigger than or equal to 1.');
        }

        // parse inputs
        $resourcePath = "/nodes/{nodeId}/tags";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($skip_count !== null) {
            $queryParams['skipCount'] = $this->apiClient->getSerializer()->toQueryValue($skip_count);
        }
        // query params
        if ($max_items !== null) {
            $queryParams['maxItems'] = $this->apiClient->getSerializer()->toQueryValue($max_items);
        }
        // query params
        if (is_array($fields)) {
            $fields = $this->apiClient->getSerializer()->serializeCollection($fields, 'csv', true);
        }
        if ($fields !== null) {
            $queryParams['fields'] = $this->apiClient->getSerializer()->toQueryValue($fields);
        }
        // path params
        if ($node_id !== null) {
            $resourcePath = str_replace(
                "{" . "nodeId" . "}",
                $this->apiClient->getSerializer()->toPathValue($node_id),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Alfresco\Model\TagPaging',
                '/nodes/{nodeId}/tags'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Alfresco\Model\TagPaging', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\TagPaging', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation updateTag
     *
     * Update a tag
     *
     * @param string $tag_id The identifier of a tag. (required)
     * @param \Alfresco\Model\TagBody $tag_body_update The updated tag (required)
     * @param string[] $fields A list of field names.  You can use this parameter to restrict the fields returned within a response if, for example, you want to save on overall bandwidth.  The list applies to a returned individual entity or entries within a collection.  If the API method also supports the **include** parameter, then the fields specified in the **include** parameter are returned in addition to those specified in the **fields** parameter. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return \Alfresco\Model\TagEntry
     */
    public function updateTag($tag_id, $tag_body_update, $fields = null)
    {
        list($response) = $this->updateTagWithHttpInfo($tag_id, $tag_body_update, $fields);
        return $response;
    }

    /**
     * Operation updateTagWithHttpInfo
     *
     * Update a tag
     *
     * @param string $tag_id The identifier of a tag. (required)
     * @param \Alfresco\Model\TagBody $tag_body_update The updated tag (required)
     * @param string[] $fields A list of field names.  You can use this parameter to restrict the fields returned within a response if, for example, you want to save on overall bandwidth.  The list applies to a returned individual entity or entries within a collection.  If the API method also supports the **include** parameter, then the fields specified in the **include** parameter are returned in addition to those specified in the **fields** parameter. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return array of \Alfresco\Model\TagEntry, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateTagWithHttpInfo($tag_id, $tag_body_update, $fields = null)
    {
        // verify the required parameter 'tag_id' is set
        if ($tag_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_id when calling updateTag');
        }
        // verify the required parameter 'tag_body_update' is set
        if ($tag_body_update === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_body_update when calling updateTag');
        }
        // parse inputs
        $resourcePath = "/tags/{tagId}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if (is_array($fields)) {
            $fields = $this->apiClient->getSerializer()->serializeCollection($fields, 'csv', true);
        }
        if ($fields !== null) {
            $queryParams['fields'] = $this->apiClient->getSerializer()->toQueryValue($fields);
        }
        // path params
        if ($tag_id !== null) {
            $resourcePath = str_replace(
                "{" . "tagId" . "}",
                $this->apiClient->getSerializer()->toPathValue($tag_id),
                $resourcePath
            );
        }
        // body params
        $_tempBody = null;
        if (isset($tag_body_update)) {
            $_tempBody = $tag_body_update;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Alfresco\Model\TagEntry',
                '/tags/{tagId}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Alfresco\Model\TagEntry', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\TagEntry', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
