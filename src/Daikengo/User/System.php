<?php

/**
 * @file System.php
 * @brief This file contains the System class.
 * @details
 * @author Filippo F. Fadda
 */


namespace Daikengo\User;


use Daikengo\Permission\IPermission;


/**
 * @brief A special user used to perform special task.
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

}