<?php

/**
 * @file Guest.php
 * @brief This file contains the Guest class.
 * @details
 * @author Filippo F. Fadda
 */


namespace Daikengo\User;


use Daikengo\Role\GuestRole;
use Daikengo\Permission\IPermission;


/**
 * @brief This class represents an anonymous user.
 * @nosubgrouping
 */
final class Guest implements IUser {


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
   * @copydoc IUser::has()
   */
  public function has(IPermission $permission) {
    $role = new GuestRole();

    $permissionReflection = new \ReflectionObject($permission);

    if ($permissionReflection->hasMethod('checkForGuestRole')) { // If a method exists for the roleName...
      // Gets the method.
      $method = $permissionReflection->getMethod('checkForGuestRole');

      $permission->setRole($role);

      // Invokes the method.
      return $method->invoke($permission);
    }
    else
      return FALSE;
  }


  /**
   * @brief This implementation returns always `true`.
   * @return bool
   */
  public function isGuest() {
    return TRUE;
  }


  /**
   * @brief This implementation returns always `false`.
   * @return bool
   */
  public function isMember() {
    return FALSE;
  }

}