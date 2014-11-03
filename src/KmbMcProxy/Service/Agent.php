<?php
/**
 * @copyright Copyright (c) 2014 Orange Applications for Business
 * @link      http://github.com/kambalabs for the sources repositories
 *
 * This file is part of Kamba.
 *
 * Kamba is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * Kamba is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kamba.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace KmbMcProxy\Service;

use KmbDomain\Model;
use KmbDomain;
use KmbMcProxy\ClientInterface;
use KmbMcProxy;
use Zend\Stdlib\Hydrator\HydratorInterface;

class Agent implements AgentInterface
{
    /** @var ClientInterface */
    protected $mcProxyClient;


    /** @var ModuleServiceOptionsInterface */
    protected $options;


    /** @var HydratorInterface */
    protected $agentHydrator;

    /** @var HydratorInterface */
    protected $mcoActionHydrator;

    /**
     * @return KmbMcProxy\Model\Module[]
     */
    public function getAll()
    {
        $agents = [];
        $result = $this->mcProxyClient->get('/agentslist');
        foreach($result as $agentName => $agentData)
        {
            $agentEntityClassName = $this->getOptions()->getAgentEntityClass();
            $agent = new $agentEntityClassName();
            $this->getAgentHydrator()->hydrate(array( 'name' => $agentName),$agent);

            $actions = [];
            foreach($agentData->actions as $action)
            {
                $mcoActionEntityClassName = $this->getOptions()->getMcoActionEntityClass();
                $mcoAction = new $mcoActionEntityClassName();
                $actions[] = $this->getMcoActionHydrator()->hydrate((array)$action,$mcoAction);
            }
            $agents[$agent->getName()] = $agent->setActions($actions);
        }
        return $agents;
    }

    /**
     * @return StdClass[]
     */
    public function doRequest($agent,$action,$filter,$puppetEnv,$ihmuser,$arguments=null)
    {
        $requestData = array(
            'mc_agent' => $agent,
            'mc_action' => $action,
            'mc_filter' => $filter,
            'environment' => $puppetEnv,
            'ihm_user'  => $ihmuser,
        );
        if($arguments)
        {
            $requestData['args'] = $arguments;
        }
        
        $mcresult = $this->mcProxyClient->post('/mc_requests',$requestData);
        return $mcresult;
    }

    /**
     * Set McProxyClient.
     *
     * @param \KmbMcProxy\ClientInterface $mcProxyClient
     * @return Agent
     */
    public function setMcProxyClient($mcProxyClient)
    {
        $this->mcProxyClient = $mcProxyClient;
        return $this;
    }

    /**
     * Get McProxyClient.
     *
     * @return \KmbMcProxy\ClientInterface
     */
    public function getMcProxyClient()
    {
        return $this->mcProxyClient;
    }

    /**
     * Set AgentHydrator.
     *
     * @param \Zend\Stdlib\Hydrator\HydratorInterface $agentHydrator
     * @return Agent
     */
    public function setAgentHydrator($agentHydrator)
    {
        $this->agentHydrator = $agentHydrator;
        return $this;
    }

    /**
     * Get AgentHydrator.
     *
     * @return \Zend\Stdlib\Hydrator\HydratorInterface
     */
    public function getAgentHydrator()
    {
        if ($this->agentHydrator == null) {
            $agentHydratorClass = $this->getOptions()->getAgentHydratorClass();
            $this->agentHydrator = new $agentHydratorClass;
        }
        return $this->agentHydrator;
    }

    /**
     * Set ClassHydrator.
     *
     * @param \Zend\Stdlib\Hydrator\HydratorInterface $classHydrator
     * @return Module
     */
    public function setMcoActionHydrator($mcoActionHydrator)
    {
        $this->mcoActionHydrator = $mcoActionHydrator;
        return $this;
    }

    /**
     * Get ClassHydrator.
     *
     * @return \Zend\Stdlib\Hydrator\HydratorInterface
     */
    public function getMcoActionHydrator()
    {
        if ($this->mcoActionHydrator == null) {
            $mcoActionHydratorClass = $this->getOptions()->getMcoActionHydratorClass();
            $this->mcoActionHydrator = new $mcoActionHydratorClass;
        }
        return $this->mcoActionHydrator;
    }

    /**
     * Get Options.
     *
     * @return \KmbPmProxy\Options\ModuleServiceOptionsInterface
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set Options.
     *
     * @param \KmbPmProxy\Options\ModuleServiceOptionsInterface $options
     * @return Module
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }


}
