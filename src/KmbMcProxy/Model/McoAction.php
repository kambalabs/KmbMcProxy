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
namespace KmbMcProxy\Model;

class McoAction
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $summary;

    /** @var \stdClass[] */
    protected $inputArguments;

    /** @var \stdClass[] */
    protected $outputArguments;

    public function __construct($name = null, $summary = null, $inputArguments = null, $outputArguments = null)
    {
        $this->setName($name);
        $this->setSummary($summary);
        $this->setInputArguments($inputArguments);
        $this->setOutputArguments($outputArguments);
    }

    /**
     * Set Name.
     *
     * @param string $name
     * @return PuppetClass
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Summary.
     *
     * @param string $summary
     * @return PuppetClass
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * Get Summary.
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set Input Arguments.
     *
     * @param \stdClass[] $inputArguments
     * @return PuppetClass
     */
    public function setInputArguments($inputArguments)
    {
        $this->inputArguments = $inputArguments;
        return $this;
    }

    /**
     * Get Input Arguments.
     *
     * @return \stdClass[]
     */
    public function getInputArguments()
    {
        return $this->inputArguments;
    }

    /**
     * Get specified Input Arguments.
     *
     * @param string $name
     * @return \stdClass
     */
    public function getInputArgument($name)
    {
        if ($this->hasInputArguments()) {
            foreach ($this->getInputArguments() as $inputArgument) {
                if ($inputArgument->name === $name) {
                    return $inputArgument;
                }
            }
        }
        return null;
    }

    /**
     * @return bool
     */
    public function hasInputArguments()
    {
        // print_r($this->inputArguments);
        // print_r(count((array)$this->inputArguments,COUNT_RECURSIVE));
        // print_r('---');
        // print('<br/>');
        return (count((array)$this->inputArguments) > 0);
    }

    /**
     * @param string $name
     * @return bool
     */
    // public function hasParameterDefinition($name)
    // {
    //     return $this->getParameterDefinition($name) !== null;
    // }

    /**
     * Set OutputArguments.
     *
     * @param \stdClass[] $outputArguments
     * @return PuppetClass
     */
    public function setOutputArguments($outputArguments)
    {
        $this->outputArguments = $outputArguments;
        return $this;
    }

    /**
     * @param \stdClass $parameterTemplate
     * @return PuppetClass
     */
    // public function addParameterTemplate($parameterTemplate)
    // {
    //     $this->parametersTemplates[] = $parameterTemplate;
    //     return $this;
    // }

    /**
     * Get OutputArguments
     *
     * @return \stdClass[]
     */
    public function getOutputArguments()
    {
        return $this->outputArguments;
    }

    /**
     * Get specified output arguments.
     *
     * @param string $name
     * @return \stdClass
     */
    public function getOutputArgument($name)
    {
        if ($this->hasOutputArguments()) {
            foreach ($this->getOutputArguments() as $outputArgument) {
                if ($outputArgument->name === $name) {
                    return $outputArgument;
                }
            }
        }
        return null;
    }

    /**
     * @return bool
     */
    public function hasOutputArguments()
    {
        return count($this->outputArguments) > 0;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasOutputArgument($name)
    {
        return $this->getOutputArgument($name) !== null;
    }
}
