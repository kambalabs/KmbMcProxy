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
namespace KmbMcProxy\Options;

interface ClientOptionsInterface
{
    /**
     * Set PmProxy base URI.
     *
     * @param string $baseUri
     * @return ClientOptionsInterface
     */
    public function setBaseUri($baseUri);

    /**
     * Get PmProxy base URI.
     *
     * @return string
     */
    public function getBaseUri();

    /**
     * Set HTTP client options.
     *
     * @param $httpOptions
     *
     * @return ClientOptionsInterface
     */
    public function setHttpOptions($httpOptions);

    /**
     * Get HTTP client options.
     *
     * @return array
     */
    public function getHttpOptions();
}
