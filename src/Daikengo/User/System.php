<?php

/**
 * @file System.php
 * @brief This file contains the System class.
 * @details
 * @author Filippo F. Fadda
 */


namespace Daikengo\User;


use Daikengo\Permission\IPermission;
use Daikengo\Collection\RoleCollection;


/**
 * @brief A special user used to perform special tasks, for example when you need to run a program from the command line.
 * @nosubgrouping
 */
final class System implements IUser {


  /**
   * @brief This implementation returns always `null`.
   * @return null
   */
  public function getId() {
    return NULL;
  }


  /**
   * @brief This implementation returns always `false`.
   * @param[in] string $id The id to match.
   * @return bool
   */
  public function match($id) {
    return FALSE;
  }


  /**
   * @brief This implementation returns always `true`.
   * @return bool
   */
  public function has(IPermission $permission) {
    return TRUE;
  }


  /**
   * @brief This implementation returns always `false`.
   * @return bool
   */
  public function isGuest() {
    return FALSE;
  }


  /**
   * @brief This implementation returns always `false`.
   * @return bool
   */
  public function isMember() {
    return FALSE;
  }


  /**
   * @brief This method is never called for this class, but in case it will return an empty collection.
   * @return RoleCollection
   */
  public function getRoles() {
    $roles = [];
    return new RoleCollection('roles', $roles);
  }

}