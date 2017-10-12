<?php

/**
 * @file Member.php
 * @brief This file contains the Member class.
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
 * @property Collection\RoleCollection $roles
 *
 * @endcond
 */
abstract class Member implements IUser {
  use TMember;
}