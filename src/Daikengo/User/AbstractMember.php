<?php

/**
 * @file AbstractMember.php
 * @brief This file contains the System class.
 * @details
 * @author Filippo F. Fadda
 */


namespace Daikengo\User;


use Daikengo\Collection;


/**
 * @brief This class is used to represent a registered user.
 * @nosubgrouping
 *
 * @cond HIDDEN_SYMBOLS
 *
 * @property string $username
 * @property string $firstName
 * @property string $lastName
 *
 * @property Collection\RoleCollection $roles
 *
 * @property string $password
 * @property string $hash
 * @property string $internetProtocolAddress
 * @property string $locale
 * @property int $timeOffset
 *
 * @property string $gender
 * @property int $birthday
 * @property string $about
 *
 * @endcond
 */

abstract class AbstractMember implements IUser {
  use TMember;
}