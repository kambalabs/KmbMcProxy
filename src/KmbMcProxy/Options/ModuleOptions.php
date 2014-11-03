<?php
/**
 * @copyright Copyright (c) 2014 Orange Applications for Business
 * @link      http://github.com/multimediabs/kamba for the canonical source repository
 *
 * This file is part of kamba.
 *
 * kamba is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * kamba is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with kamba.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace KmbMcProxy\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements ClientOptionsInterface
{
    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;

    /**
     * @var string
     */
    protected $baseUri = 'http://localhost:3000';

    /**
     * @var array
     */
    protected $httpOptions = [];

    /**
     * @var string
     */
    protected $agentEntityClass = 'KmbMcProxy\Model\Agent';

    /**
     * @var string
     */
    protected $mcoActionEntityClass = 'KmbMcProxy\Model\McoAction';

    /**
     * @var string
     */
    protected $agentHydratorClass = 'KmbMcProxy\Model\AgentHydrator';

    /**
     * @var string
     */
    protected $mcoActionHydratorClass = 'KmbMcProxy\Model\McoActionHydrator';

    /**
     * Set McProxy base URI.
     *
     * @param string $baseUri
     * @return ClientOptionsInterface
     */
    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
        return $this;
    }

    /**
     * Get McProxy base URI.
     *
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * Set HTTP client options.
     *
     * @param $httpOptions
     *
     * @return ClientOptionsInterface
     */
    public function setHttpOptions($httpOptions)
    {
        $this->httpOptions = $httpOptions;
        return $this;
    }

    /**
     * Get HTTP client options.
     *
     * @return array
     */
    public function getHttpOptions()
    {
        return $this->httpOptions;
    }

    /**
     * Set agent entity class name.
     *
     * @param string $agentEntityClass
     * @return ModuleServiceOptionsInterface
     */
    public function setAgentEntityClass($moduleEntityClass)
    {
        $this->agentEntityClass = $agentEntityClass;
        return $this;
    }

    /**
     * Get agent entity class name.
     *
     * @return string
     */
    public function getAgentEntityClass()
    {
        return $this->agentEntityClass;
    }

    /**
     * Set agent hydrator class name.
     *
     * @param string $moduleHydratorClass
     * @return ModuleServiceOptionsInterface
     */
    public function setAgentHydratorClass($agentHydratorClass)
    {
        $this->agentHydratorClass = $agentHydratorClass;
        return $this;
    }

    /**
     * Get agent hydrator class name.
     *
     * @return string
     */
    public function getAgentHydratorClass()
    {
        return $this->agentHydratorClass;
    }

    // /**
    //  * Set mcoAction entity class name.
    //  *
    //  * @param string $mcoActionEntityClass
    //  * @return ModuleServiceOptionsInterface
    //  */
    public function setMcoActionEntityClass($mcoActionEntityClass)
    {
        $this->mcoActionEntityClass = $mcoActionEntityClass;
        return $this;
    }

    // /**
    //  * Get class entity class name.
    //  *
    //  * @return string
    //  */
    public function getMcoActionEntityClass()
    {
        return $this->mcoActionEntityClass;
    }

    /**
     * Set mcoAction hydrator class name.
     *
     * @param string $classHydratorClass
     * @return ModuleServiceOptionsInterface
     */
    public function setMcoActionHydratorClass($mcoActionHydratorClass)
    {
        $this->mcoActionHydratorClass = $mcoActionHydratorClass;
        return $this;
    }

    /**
     * Get mcoAction hydrator class name.
     *
     * @return string
     */
    public function getMcoActionHydratorClass()
    {
        return $this->mcoActionHydratorClass;
    }
}
