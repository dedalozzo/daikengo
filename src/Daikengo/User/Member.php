<?php

/**
 * @file Member.php
 * @brief This file contains the Member class.
 * @details
 * @author Filippo F. Fadda
 */


namespace Daikengo\User;


/**
 * @brief This class is used to represent a registered user.
 * @nosubgrouping
 */
abstract class Member implements IUser {
  use TMember;
}