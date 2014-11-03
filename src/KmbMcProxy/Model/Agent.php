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

class Agent
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $summary;

    /** @var McoAction[] */
    protected $actions;

    /**
     * @param string $name
     * @param string $version
     */
    public function __construct($name = null)
    {
        $this->setName($name);
    }

    /**
     * Set Name.
     *
     * @param string $name
     * @return Module
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
     * @return Module
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
     * Set Actions.
     *
     * @param \KmbMcProxy\Model\McoAction[] $actions
     * @return Agent
     */
    public function setActions($actions)
    {
        $this->actions = $actions;
        return $this;
    }

    /**
     * Get Classes.
     *
     * @return \KmbMcProxy\Model\McoAction[]
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Get Class.
     *
     * @param string $name
     * @return \KmbMcProxy\Model\McoAction
     */
    public function getAction($name)
    {
        if ($this->hasActions()) {
            foreach ($this->getActions() as $action) {
                if ($action->getName() === $name) {
                    return $class;
                }
            }
        }
        return null;
    }

    /**
     * @return bool
     */
    public function hasActions()
    {
        return count($this->actions) > 0;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasAction($name)
    {
        return $this->getActions($name) !== null;
    }
}
