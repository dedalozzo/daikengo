<?php

/**
 * @file TMember.php
 * @brief This file contains the TMember trait.
 * @details
 * @author Filippo F. Fadda
 */


namespace Daikengo\User;


use Daikengo\User\IUser;
use Daikengo\Permission\IPermission;
use Daikengo\Collection\RoleCollection;

use Meta\Extension;


/**
 * @brief This trait implements the `IUser` interface for the `Member` class.
 * @details Use this trait when you can't extend the `Member` class since you already have a class for it in your
 * project.
 *
 * @cond HIDDEN_SYMBOLS
 *
 * @property RoleCollection $roles
 *
 * @endcond
 */
trait TMember {
  use Extension\TProperty;

  private $roles; // Associative array [roleName => roleClass].


  /**
   * @copydoc IUser::has()
   */
  public function has(IPermission $permission) {
    $result = FALSE;

    $permissionReflection = new \ReflectionObject($permission);

    foreach ($this->roles as $roleName => $roleClass) {

      do {
        $role = new $roleClass;

        // Sets the execution role for the current user.
        $permission->setRole($role);

        // Creates a reflection class for the roleName.
        $roleReflection = new \ReflectionObject($role);

        // Determines the method's name related to the roleName.
        $methodName = 'checkFor' . $roleReflection->getShortName();

        if ($permissionReflection->hasMethod($methodName)) { // If a method exists for the roleName...
          // Gets the method.
          $method = $permissionReflection->getMethod($methodName);

          // Invokes the method.
          $result = $method->invoke($permission);

          // Exits from the do while and foreach as well.
          break 2;
        }
        else {
          // Go back to the previous role class in the hierarchy. For example, from AdminRole to ModeratorRole.
          $parentRoleReflection = $roleReflection->getParentClass();

          // Proceed only if the parent role is not an abstract class.
          if (is_object($parentRoleReflection) && !$parentRoleReflection->isAbstract())
            $roleClass = $parentRoleReflection->name;
          else
            break; // No more roles in the hierarchy.
        }
      } while (TRUE);

    }

    return $result;
  }


  /**
   * @brief This implementation returns always `false`.
   * @retval bool
   */
  public function isGuest() {
    return FALSE;
  }


  /**
   * @brief This implementation returns always `true`.
   * @retval bool
   */
  public function isMember() {
    return TRUE;
  }


  /**
   * @copydoc IUser::getRoles()
   */
  public function getRoles() {
    return $this->roles;
  }

}