<?php
/*
 * Copyright 2007-2016 Abstrium <contact (at) pydio.com>
 * This file is part of Pydio.
 *
 * Pydio is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Pydio is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Pydio.  If not, see <http://www.gnu.org/licenses/>.
 *
 * The latest code can be found at <https://pydio.com/>.
 */
namespace Pydio\Core\Model;

defined('AJXP_EXEC') or die('Access not allowed');

use Pydio\Access\Core\Filter\ContentFilter;


/**
 * The basic abstraction of a data store. Can map a FileSystem, but can also map data from a totally
 * different source, like the application configurations, a mailbox, etc.
 * @package Pydio
 * @subpackage Core
 */
interface RepositoryInterface
{
    /**
     * @param ContentFilter $contentFilter
     */
    public function setContentFilter($contentFilter);

    /**
     * Check if a ContentFilter is set or not
     * @return bool
     */
    public function hasContentFilter();

    /**
     * @return ContentFilter
     */
    public function getContentFilter();

    /**
     * Create a shared version of this repository
     * @param string $newLabel
     * @param array $newOptions
     * @param string $parentId
     * @param string $owner
     * @param string $uniqueUser
     * @return RepositoryInterface
     */
    public function createSharedChild($newLabel, $newOptions, $parentId = null, $owner = null, $uniqueUser = null);

    /**
     * Create a child from this repository if it's a template
     * @param string $newLabel
     * @param array $newOptions
     * @param string $owner
     * @param string $uniqueUser
     * @return RepositoryInterface
     */
    public function createTemplateChild($newLabel, $newOptions, $owner = null, $uniqueUser = null);

    /**
     * Recompute uuid
     * @return bool
     */
    public function upgradeId();

    /**
     * Get a uuid
     * @param bool $serial
     * @return string
     */
    public function getUniqueId($serial = false);

    /**
     * Alias for this repository
     * @return string
     */
    public function getSlug();

    /**
     * Use the slugify function to generate an alias from the label
     * @param string $slug
     * @return void
     */
    public function setSlug($slug = null);

    /**
     * Get the <client_settings> content of the manifest.xml
     * @return \DOMElement|\DOMNodeList|string
     */
    public function getClientSettings();

    /**
     * Find the streamWrapper declared by the access driver
     * @param bool $register
     * @param array $streams
     * @return bool
     */
    public function detectStreamWrapper($register = false, &$streams = null);

    /**
     * Add options
     * @param $oName
     * @param $oValue
     * @return void
     */
    public function addOption($oName, $oValue);

    /**
     * Get the repository options, filtered in various maners
     * @param string $oName
     * @param bool $safe Do not filter
     * @param UserInterface $resolveUser
     * @return mixed|string
     * @throws \Exception
     */
    public function getOption($oName, $safe = false, $resolveUser = null);

    /**
     * Get the options that already have a value
     * @return array
     */
    public function getOptionsDefined();

    /**
     * Get the DEFAULT_RIGHTS option
     * @return string
     */
    public function getDefaultRight();

    /**
     * The the access driver type
     * @return String
     */
    public function getAccessType();

    /**
     * The label of this repository
     * @return String
     */
    public function getDisplay();

    /**
     * @return string
     */
    public function getId();

    /**
     * @return boolean
     */
    public function getCreate();

    /**
     * @param boolean $create
     */
    public function setCreate($create);

    /**
     * @param String $accessType
     */
    public function setAccessType($accessType);

    /**
     * @param String $display
     */
    public function setDisplay($display);

    /**
     * @param int $id
     */
    public function setId($id);

    /**
     * @return bool
     */
    public function isWriteable();

    /**
     * @param bool $w
     */
    public function setWriteable($w);

    /**
     * @param string $id
     */
    public function setDisplayStringId($id);

    /**
     * @param string $repoParentId
     * @param string|null $ownerUserId
     * @param string|null $childUserId
     */
    public function setOwnerData($repoParentId, $ownerUserId = null, $childUserId = null);

    /**
     * @return string|null
     */
    public function getOwner();

    /**
     * @return string|null
     */
    public function getParentId();

    /**
     * @return string|null
     */
    public function getUniqueUser();

    /**
     * @return bool
     */
    public function hasOwner();

    /**
     * @return bool
     */
    public function hasParent();

    /**
     * @param $bool
     */
    public function setInferOptionsFromParent($bool);

    /**
     * @return bool
     */
    public function getInferOptionsFromParent();

    /**
     * @param String $descriptionText
     */
    public function setDescription($descriptionText);

    /**
     * @return string
     */
    public function getAccessStatus();

    /**
     * @param string $accessStatus
     */
    public function setAccessStatus($accessStatus);

    /**
     * @return string
     */
    public function getRepositoryType();

    /**
     * @param string $repositoryType
     */
    public function setRepositoryType($repositoryType);

    /**
     * @param bool $public
     * @param null $ownerLabel
     * @return String
     */
    public function getDescription($public = false, $ownerLabel = null);

    /**
     * Infer a security scope for this repository. Will determine to whome the messages
     * will be broadcasted.
     * @return bool|string
     */
    public function securityScope();
}