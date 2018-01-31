<?php
/**
 * RenditionsApi
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
 * RenditionsApi Class Doc Comment
 *
 * @category Class
 * @package  Alfresco
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class RenditionsApi
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
     * @return RenditionsApi
     */
    public function setApiClient(\Alfresco\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation createRendition
     *
     * Create rendition
     *
     * @param string $node_id The identifier of a node. (required)
     * @param \Alfresco\Model\RenditionBodyCreate $rendition_body_create The rendition \&quot;id\&quot;. (required)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return void
     */
    public function createRendition($node_id, $rendition_body_create)
    {
        list($response) = $this->createRenditionWithHttpInfo($node_id, $rendition_body_create);
        return $response;
    }

    /**
     * Operation createRenditionWithHttpInfo
     *
     * Create rendition
     *
     * @param string $node_id The identifier of a node. (required)
     * @param \Alfresco\Model\RenditionBodyCreate $rendition_body_create The rendition \&quot;id\&quot;. (required)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function createRenditionWithHttpInfo($node_id, $rendition_body_create)
    {
        // verify the required parameter 'node_id' is set
        if ($node_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $node_id when calling createRendition');
        }
        // verify the required parameter 'rendition_body_create' is set
        if ($rendition_body_create === null) {
            throw new \InvalidArgumentException('Missing the required parameter $rendition_body_create when calling createRendition');
        }
        // parse inputs
        $resourcePath = "/nodes/{nodeId}/renditions";
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
        // body params
        $_tempBody = null;
        if (isset($rendition_body_create)) {
            $_tempBody = $rendition_body_create;
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
                null,
                '/nodes/{nodeId}/renditions'
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
     * Operation getRendition
     *
     * Get rendition information
     *
     * @param string $node_id The identifier of a node. (required)
     * @param string $rendition_id The name of a thumbnail rendition, for example *doclib*, or *pdf*. (required)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return \Alfresco\Model\RenditionEntry
     */
    public function getRendition($node_id, $rendition_id)
    {
        list($response) = $this->getRenditionWithHttpInfo($node_id, $rendition_id);
        return $response;
    }

    /**
     * Operation getRenditionWithHttpInfo
     *
     * Get rendition information
     *
     * @param string $node_id The identifier of a node. (required)
     * @param string $rendition_id The name of a thumbnail rendition, for example *doclib*, or *pdf*. (required)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return array of \Alfresco\Model\RenditionEntry, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRenditionWithHttpInfo($node_id, $rendition_id)
    {
        // verify the required parameter 'node_id' is set
        if ($node_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $node_id when calling getRendition');
        }
        // verify the required parameter 'rendition_id' is set
        if ($rendition_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $rendition_id when calling getRendition');
        }
        // parse inputs
        $resourcePath = "/nodes/{nodeId}/renditions/{renditionId}";
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
        if ($rendition_id !== null) {
            $resourcePath = str_replace(
                "{" . "renditionId" . "}",
                $this->apiClient->getSerializer()->toPathValue($rendition_id),
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
                '\Alfresco\Model\RenditionEntry',
                '/nodes/{nodeId}/renditions/{renditionId}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Alfresco\Model\RenditionEntry', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\RenditionEntry', $e->getResponseHeaders());
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
     * Operation getRenditionContent
     *
     * Get rendition content
     *
     * @param string $node_id The identifier of a node. (required)
     * @param string $rendition_id The name of a thumbnail rendition, for example *doclib*, or *pdf*. (required)
     * @param bool $attachment **true** enables a web browser to download the file as an attachment. **false** means a web browser may preview the file in a new tab or window, but not download the file.  You can only set this parameter to **false** if the content type of the file is in the supported list; for example, certain image files and PDF files.  If the content type is not supported for preview, then a value of **false**  is ignored, and the attachment will be returned in the response. (optional, default to true)
     * @param \DateTime $if_modified_since Only returns the content if it has been modified since the date provided. Use the date format defined by HTTP. For example, &#x60;Wed, 09 Mar 2016 16:56:34 GMT&#x60;. (optional)
     * @param bool $placeholder If **true** and there is no rendition for this **nodeId** and **renditionId**,  then the placeholder image for the mime type of this rendition is returned, rather  than a 404 response. (optional, default to false)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return void
     */
    public function getRenditionContent($node_id, $rendition_id, $attachment = 'true', $if_modified_since = null, $placeholder = 'false')
    {
        list($response) = $this->getRenditionContentWithHttpInfo($node_id, $rendition_id, $attachment, $if_modified_since, $placeholder);
        return $response;
    }

    /**
     * Operation getRenditionContentWithHttpInfo
     *
     * Get rendition content
     *
     * @param string $node_id The identifier of a node. (required)
     * @param string $rendition_id The name of a thumbnail rendition, for example *doclib*, or *pdf*. (required)
     * @param bool $attachment **true** enables a web browser to download the file as an attachment. **false** means a web browser may preview the file in a new tab or window, but not download the file.  You can only set this parameter to **false** if the content type of the file is in the supported list; for example, certain image files and PDF files.  If the content type is not supported for preview, then a value of **false**  is ignored, and the attachment will be returned in the response. (optional, default to true)
     * @param \DateTime $if_modified_since Only returns the content if it has been modified since the date provided. Use the date format defined by HTTP. For example, &#x60;Wed, 09 Mar 2016 16:56:34 GMT&#x60;. (optional)
     * @param bool $placeholder If **true** and there is no rendition for this **nodeId** and **renditionId**,  then the placeholder image for the mime type of this rendition is returned, rather  than a 404 response. (optional, default to false)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRenditionContentWithHttpInfo($node_id, $rendition_id, $attachment = 'true', $if_modified_since = null, $placeholder = 'false')
    {
        // verify the required parameter 'node_id' is set
        if ($node_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $node_id when calling getRenditionContent');
        }
        // verify the required parameter 'rendition_id' is set
        if ($rendition_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $rendition_id when calling getRenditionContent');
        }
        // parse inputs
        $resourcePath = "/nodes/{nodeId}/renditions/{renditionId}/content";
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
        if ($attachment !== null) {
            $queryParams['attachment'] = $this->apiClient->getSerializer()->toQueryValue($attachment);
        }
        // query params
        if ($placeholder !== null) {
            $queryParams['placeholder'] = $this->apiClient->getSerializer()->toQueryValue($placeholder);
        }
        // header params
        if ($if_modified_since !== null) {
            $headerParams['If-Modified-Since'] = $this->apiClient->getSerializer()->toHeaderValue($if_modified_since);
        }
        // path params
        if ($node_id !== null) {
            $resourcePath = str_replace(
                "{" . "nodeId" . "}",
                $this->apiClient->getSerializer()->toPathValue($node_id),
                $resourcePath
            );
        }
        // path params
        if ($rendition_id !== null) {
            $resourcePath = str_replace(
                "{" . "renditionId" . "}",
                $this->apiClient->getSerializer()->toPathValue($rendition_id),
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
                null,
                '/nodes/{nodeId}/renditions/{renditionId}/content'
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
     * Operation listRenditions
     *
     * List renditions
     *
     * @param string $node_id The identifier of a node. (required)
     * @param string $where A string to restrict the returned objects by using a predicate. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return \Alfresco\Model\RenditionPaging
     */
    public function listRenditions($node_id, $where = null)
    {
        list($response) = $this->listRenditionsWithHttpInfo($node_id, $where);
        return $response;
    }

    /**
     * Operation listRenditionsWithHttpInfo
     *
     * List renditions
     *
     * @param string $node_id The identifier of a node. (required)
     * @param string $where A string to restrict the returned objects by using a predicate. (optional)
     * @throws \Alfresco\ApiException on non-2xx response
     * @return array of \Alfresco\Model\RenditionPaging, HTTP status code, HTTP response headers (array of strings)
     */
    public function listRenditionsWithHttpInfo($node_id, $where = null)
    {
        // verify the required parameter 'node_id' is set
        if ($node_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $node_id when calling listRenditions');
        }
        // parse inputs
        $resourcePath = "/nodes/{nodeId}/renditions";
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
        if ($where !== null) {
            $queryParams['where'] = $this->apiClient->getSerializer()->toQueryValue($where);
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
                '\Alfresco\Model\RenditionPaging',
                '/nodes/{nodeId}/renditions'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Alfresco\Model\RenditionPaging', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Alfresco\Model\RenditionPaging', $e->getResponseHeaders());
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
