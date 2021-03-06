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

class Patch implements PatchInterface
{
    /** @var ClientInterface */
    protected $mcProxyClient;


    public function registrationRun($host,$environment,$user,$actionid,$type=null) {
        if(isset($type)) {
            return $this->doRequest('mcollective','registration',$host,$environment,$user,null,$actionid,$type );
        }else{
            return $this->doRequest('mcollective','registration',$host,$environment,$user,null,$actionid);
        }
    }

    public function patch($servers,$packages,$environment,$user,$actionid) {

        if(is_string($servers)) {
            $filter = $servers;
        }else{
            $filter = '('.implode('|',$servers).')';
        }
        $result = $this->doRequest('kamba','uptodate',$filter,$environment,$user, ['packages' =>  $packages ],$actionid,'patch' );
        return $result;
    }

    public function getPackageVersion($host,$package,$environment,$user,$actionid) {
        $result = $this->doRequest('kamba','status',$host,$environment,$user,['package' => $package],$actionid );
        return $result;
    }


    public function prepatch($host,$packages,$environment,$user)
    {
        $actionid = md5($user . time());
        $result=[];
        if(is_string($host)) {
            $filter = $host;
        }else {
            $filter = '('.implode('|',$host).')';
        }
        // foreach($packages as $index => $package) {
        //     $result[] = $this->doRequest('package','checkPatch',$filter,$environment,$user, ['package' => $package],$actionid );
        // }
        $result[] = $this->doRequest('kamba','checkPatch',$filter,$environment,$user, ['package' => $packages],$actionid );
        return $result;
    }

    /**
     * @return StdClass[]
     */
    public function doRequest($agent,$action,$filter,$puppetEnv,$ihmuser,$arguments=null,$actionid = null, $type = null)
    {

        $requestData = array(
            'mc_agent' => $agent,
            'mc_action' => $action,
            'mc_filter' => $filter,
            'environment' => $puppetEnv,
            'ihm_user'  => $ihmuser,
        );
        if(isset($type)) {
            error_log('************ Type defined to :'.$type." for action ". $action);
            $requestData['type'] = $type;
        }
        if(isset($actionid)) {
            $requestData['actionid']=$actionid;
        }
        if(isset($arguments))
        {
            error_log(print_r($arguments,true));
            $requestData['args'] = $arguments;
        }
        error_log("Request sent with data : ". print_r($requestData,true));
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

}
